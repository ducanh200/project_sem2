<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard(){
        return view("admin.dashboard");
    }

    public function orders(){
        $orders = Order::orderBy("id","desc")->paginate(100);
        return view("admin.orders",[
            "orders"=>$orders
        ]);
    }

    public function invoice(Order $order)
    {
        return view("admin.invoice",[
            "order"=>$order
        ]);
    }

    public function products(){
        $products = Product::orderBy("id","desc")->limit(session("length"))->get();
        return view("admin.products",[
            "products"=>$products
        ]);
    }


    //Gửi tới gmail khách hàng
    public function confirm(Order $order){
        //cập nhật status của order thành 1 (confirm)
        $order->update(["status"=>1]);
        //gửi email cho khách báo đơn đã được chuyển trạng thái
        Mail::to($order->email)->send(new OrderMail($order));
        return redirect()->to("/admin/orders/".$order->id);

    }
    public function cancel(Order $order){
        //cập nhật status của order thành 1 (cancel)
        $order->update(["status"=>5]);
        //gửi email cho khách báo đơn đã được chuyển trạng thái
        Mail::to($order->email)->send(new OrderMail($order));
        return redirect()->to("/admin/orders/".$order->id);
    }
    public function shipping(Order $order){
        //cập nhật status của order thành 1 (shipping)
        $order->update(["status"=>2]);
        //gửi email cho khách báo đơn đã được chuyển trạng thái
        Mail::to($order->email)->send(new OrderMail($order));
        return redirect()->to("/admin/orders/".$order->id);
    }
    public function shipped(Order $order){
        //cập nhật status của order thành 1 (shipped)
        $order->update(["status"=>3]);
        //gửi email cho khách báo đơn đã được chuyển trạng thái
        Mail::to($order->email)->send(new OrderMail($order));
        return redirect()->to("/admin/orders/".$order->id);
    }
    public function complete(Order $order){
        //cập nhật status của order thành 4 (complete)
        $order->update(["status"=>4]);
        $order->update(["is_paid"=>1]);
        //gửi email cho khách báo đơn đã được chuyển trạng thái
        Mail::to($order->email)->send(new OrderMail($order));
        return redirect()->to("/admin/orders/".$order->id);
    }

    public function productCreate(){
        $categories = Category::all();
        return view('admin.product_form',[
            "categories"=>$categories
        ]);
    }
    public function productEdit(Product $product){
        $categories = Category::all();
        return view('admin.product_edit',[
            "categories"=>$categories,
            "product"=>$product,
        ]);
    }
    public function productUpdate(Request $request,Product $product){
        $request->validate([
            "name"=>"required",
            "price"=>"required|numeric|min:0",
            "qty"=>"required|numeric|min:0",
            "product"=>$product
        ],[

        ]);
        $product = Product::findOrFail($product->id);
        // upload file
        $thumbnail = $product->thumbnail;
        if ($request->hasFile("thumbnail")) {
            $file = $request->file("thumbnail");
            $fileName = time() . $file->getClientOriginalName();
            $path = public_path("uploads");
            $file->move($path, $fileName);
            $thumbnail = "/uploads/" . $fileName;

            // Xóa thumbnail cũ
            if ($product->thumbnail) {
                $oldThumbnail = public_path($product->thumbnail);
                if (file_exists($oldThumbnail)) {
                    unlink($oldThumbnail);
                }
            }
        }
        $product->name = $request->get("name");
        $product->slug = Str::slug($request->get("name"));
        $product->price = $request->get("price");
        $product->discount = $request->get("discount");
        $product->qty = $request->get("qty");
        $product->description = $request->get("description");
        $product->category_id = $request->get("category_id");
        $product->thumbnail = $thumbnail;
        $product->save();

        return redirect()->to("/admin/products");
    }

    public function productSave(Request $request){
        $request->validate([
            "name"=>"required",
            "price"=>"required|numeric|min:0",
            "qty"=>"required|numeric|min:0"
        ],[
            // thong bao gi thi thong bao
        ]);
        // upload file
        $thumbnail = null;
        if($request->hasFile("thumbnail")){
            $file = $request->file("thumbnail");
            $fileName = time().$file->getClientOriginalName();
            $path = public_path("uploads");
            $file->move($path,$fileName);
            $thumbnail = "/uploads/".$fileName;
        }
        Product::create([
            "name"=>$request->get("name"),
            "slug"=>Str::slug($request->get("name")),
            "price"=>$request->get("price"),
            "discount"=>$request->get("discount"),
            "qty"=>$request->get("qty"),
            "description"=>$request->get("description"),
            "category_id"=>$request->get("category_id"),
            "thumbnail"=>$thumbnail
        ]);
        return redirect()->to("/admin/products");
    }

    public function productDelete(Product $product){
        $product->delete();
        return redirect()->to("/admin/products");
    }

}


