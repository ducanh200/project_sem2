<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
class WebController extends Controller
{
    public function home(){
        $categories = Category::limit(4)->get();
        $products = Product::paginate(8);
        return view("home",[
            "categories"=>$categories,
            "products"=>$products
        ]);
    }


    public function shop(){
        $categories = Category::limit(4)->get();
        $products = Product::paginate(16);
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
    public function cartDelete(Product $product)
    {
        $cart = session()->has("cart") ? session()->get("cart") : [];
        foreach ($cart as $item) {
            if ($item->id == $product->id) {
                session(["cart" => $cart])->remove(id);
                return redirect()->to("/cart");
            }
        }
    }

    public function wishlist()
    {
        $products = session()->has("wishlist")?session()->get("wishlist"):[];
        $categories = Category::limit(10)->get();
        return view("wishlist",[
            "products"=>$products,
            "categories"=>$categories,
        ]);
    }
    public function addToWishlist(Product $product,Request $request)
    {
        $favorite = session()->has("wishlist") ? session()->get("wishlist") : [];
        $qty = $request->has("qty") ? $request->get("qty") : 1;
        foreach ($favorite as $item) {
            if ($item->id == $product->id) {
                $item->buy_qty = $item->buy_qty + $qty;
                session(["wishlist" => $favorite]);
                return redirect()->to("/wishlist");
            }
        }
        $product->buy_qty = $qty;
        $favorite[] = $product;
        session(["wishlist" => $favorite]);
        return redirect()->to("/wishlist");
    }

    public function detail(Product $product){
        $favorite = session()->has("wishlist") ? session()->get("wishlist") : [];
        $categories = Category::limit(4)->get();
        return view("detail",[
            "categories"=>$categories,
            "product"=>$product,
            "favorite"=>$favorite
        ]);
    }

    public function checkout(){
        $products = session()->has("cart")?session()->get("cart"):[];
        $categories = Category::limit(4)->get();
        $total = 0;
        foreach ($products as $item){
            $total+= ($item->price-($item->price*$item->discount/100)) * $item->buy_qty;
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
    public function thankYou(Order $order){
        $categories = Category::limit(10)->get();
        return view("thankyou",[
            'order'=>$order,
            "categories"=>$categories
        ]);
    }

    public function successTransaction(Order $order,Request $request){
        $order->update(["is_paid"=>true,"status"=>1]);// đã thanh toán, trạng thái về xác nhận
        return redirect()->to("/thank-you/".$order->id);
    }

    public function cancelTransaction(Order $order,Request $request){
        return redirect()->to("/thank-you/".$order->id);
    }
}
