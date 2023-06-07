<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
class WebController extends Controller
{
    public function home(){
        $products = Product::paginate(8);
        return view("home",[
            "products"=>$products
        ]);
    }


    public function shop(){
        $categories = Category::limit(10)->get();
        $products = Product::paginate(12);
        return view("shop",[
            "categories"=>$categories,
            "products"=>$products
        ]);
    }

    public function search(Request $request){
        $q = $request->get("q");
        $limit = $request->has("limit")?$request->get("limit"):20;
        $categories = Category::limit(4)->get();
//        $products = Product::where("name",$q)->paginate(18);
        $products = Product::where("name",'like',"%$q%")->paginate($limit);
//        dd($products);
        return view("search",
            [
                "categories"=>$categories,
                "products"=>$products
            ]);
    }

    public function category(Category $category){
        $products = Product::where("category_id",$category->id)->paginate(12);
        $categories = Category::limit(4)->get();
        return view("category",
            [
                "categories"=>$categories,
                "products"=>$products,
                "category"=>$category
            ]);
    }

    public function about(){
        return view("about");
    }

    public function contact(){
        return view("contact");
    }

    public function cart(){
        $products = session()->has("cart")?session()->get("cart"):[];
        $categories = Category::limit(4)->get();
        $total = 0;
        foreach ($products as $item){
            $total+= ($item->price-($item->price*$item->discount/100)) * $item->buy_qty;
        }
        return view("cart",[
            "products"=>$products,
            "categories"=>$categories,
            "total"=>$total
        ]);
    }

    public function addToCart(Product $product,Request $request){
        $cart = session()->has("cart")?session()->get("cart"):[];
        $qty = $request->has("qty")?$request->get("qty"):1;
        foreach ($cart as $item){
            if($item->id == $product->id){
                $item->buy_qty = $item->buy_qty+$qty;
                session(["cart"=>$cart]);
                return redirect()->to("/cart");
            }
        }
        $product->buy_qty = $qty;
        $cart[] = $product;
        session(["cart"=>$cart]);
        return redirect()->to("/cart");
    }
    public function productDelete(Product $product)
    {
        $cart = session()->has("cart") ? session()->get("cart") : [];
        foreach ($cart as $item) {
            if ($item->id == $product->id) {
                session(["cart" => $cart])->forget("cart");
                return redirect()->to("/cart");
            }
        }
    }

    public function wishlist(){
        return view("wishlist");
    }

    public function detail(Product $product){
        $categories = Category::limit(4)->get();
        return view("detail",[
            "categories"=>$categories,
            "product"=>$product
        ]);
    }

    public function checkout(){
        $products = session()->has("cart")?session()->get("cart"):[];
        $categories = Category::limit(10)->get();
        $total = 0;
        foreach ($products as $item){
            $total+= $item->price * $item->buy_qty;
        }
        return view("checkout",[
            "products"=>$products,
            "categories"=>$categories,
            "total"=>$total
        ]);
    }
    public function placeOrder(Request $request)
    {
        $request->validate([
            "firstname" => "required",
            "lastname" => "required",
            "address" => "required",
            "phone" => "required|min:10|max:20",
            "email" => "required",
            "payment_method" => "required",
        ], [
            "required" => "Vui lòng điền đầy đủ thông tin",
            "min" => "Phải nhập tối thiểu :min",
            "max" => "Nhập giá trị không vượt quá :max"
        ]);
        $products = session()->has("cart") ? session()->get("cart") : [];
        $total = 0;
        foreach ($products as $item) {
            $total += $item->price * $item->buy_qty;
        }

        $order = Order::create([
            "firstname" => $request->get("firstname"),
            "lastname" => $request->get("lastname"),
            "country" => $request->get("country"),
            "address" => $request->get("address"),
            "city" => $request->get("city"),
            "state" => $request->get("state"),
            "postcode" => $request->get("postcode"),
            "phone" => $request->get("phone"),
            "email" => $request->get("email"),
            "total" => $total,
            "payment_method" => $request->get("payment_method"),
            //  "is_paid"=>false,
            //   "status"=>0,
        ]);
        foreach ($products as $item) {
            DB::table("order_products")->insert([
                "order_id" => $order->id,
                "product_id" => $item->id,
                "buy_qty" => $item->buy_qty,
                "price" => $item->price
            ]);
        }
    }
}
