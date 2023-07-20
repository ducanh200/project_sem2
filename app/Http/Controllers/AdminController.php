<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Category;
use App\Models\Event;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard(){
//        $x=Order::whereMonth("created_at",6)->where("status",4)->count();
        $x1=Order::whereMonth("created_at",1)->where("status",4)->sum("total");
        $x2=Order::whereMonth("created_at",2)->where("status",4)->sum("total");
        $x3=Order::whereMonth("created_at",3)->where("status",4)->sum("total");
        $x4=Order::whereMonth("created_at",4)->where("status",4)->sum("total");
        $x5=Order::whereMonth("created_at",5)->where("status",4)->sum("total");
        $x6=Order::whereMonth("created_at",6)->where("status",4)->sum("total");
        $x7=Order::whereMonth("created_at",7)->where("status",4)->sum("total");
        $x8=Order::whereMonth("created_at",8)->where("status",4)->sum("total");
        $x9=Order::whereMonth("created_at",9)->where("status",4)->sum("total");
        $x10=Order::whereMonth("created_at",10)->where("status",4)->sum("total");
        $x11=Order::whereMonth("created_at",11)->where("status",4)->sum("total");
        $x12=Order::whereMonth("created_at",12)->where("status",4)->sum("total");

        $now = Carbon::now();
        $now = Order::whereMonth('created_at', $now)->where('status', 4)->sum('total');



        $d1 = Carbon::now()->format('Y-m-d');
        $d2 = Carbon::now()->subDay(1)->format('Y-m-d');
        $d3 = Carbon::now()->subDay(2)->format('Y-m-d');
        $d4 = Carbon::now()->subDay(3)->format('Y-m-d');
        $d5 = Carbon::now()->subDay(4)->format('Y-m-d');
        $d6 = Carbon::now()->subDay(5)->format('Y-m-d');
        $d7 = Carbon::now()->subDay(6)->format('Y-m-d');
        $d8 = Carbon::now()->subDay(7)->format('Y-m-d');
        $d9 = Carbon::now()->subDay(8)->format('Y-m-d');
        $d10 = Carbon::now()->subDay(9)->format('Y-m-d');



        $d1 = Order::whereDate('created_at', $d1)->where('status', 4)->sum('total');
        $d2 = Order::whereDate('created_at', $d2)->where('status', 4)->sum('total');
        $d3 = Order::whereDate('created_at', $d3)->where('status', 4)->sum('total');
        $d4 = Order::whereDate('created_at', $d4)->where('status', 4)->sum('total');
        $d5 = Order::whereDate('created_at', $d5)->where('status', 4)->sum('total');
        $d6 = Order::whereDate('created_at', $d6)->where('status', 4)->sum('total');
        $d7 = Order::whereDate('created_at', $d7)->where('status', 4)->sum('total');
        $d8 = Order::whereDate('created_at', $d8)->where('status', 4)->sum('total');
        $d9 = Order::whereDate('created_at', $d9)->where('status', 4)->sum('total');
        $d10 = Order::whereDate('created_at', $d10)->where('status', 4)->sum('total');

        $n1 = Carbon::now();
        $n2 = Carbon::now()->subDay(1);
        $n3 = Carbon::now()->subDay(2);
        $n4 = Carbon::now()->subDay(3);
        $n5 = Carbon::now()->subDay(4);
        $n6 = Carbon::now()->subDay(5);
        $n7 = Carbon::now()->subDay(6);
        $n8 = Carbon::now()->subDay(7);
        $n9 = Carbon::now()->subDay(8);
        $n10 = Carbon::now()->subDay(9);

        $n1 = $n1->format('d');
        $n2 = $n2->format('d');
        $n3 = $n3->format('d');
        $n4 = $n4->format('d');
        $n5 = $n5->format('d');
        $n6 = $n6->format('d');
        $n7 = $n7->format('d');
        $n8 = $n8->format('d');
        $n9 = $n9->format('d');
        $n10 = $n10->format('d');

        $c1 = Carbon::now()->format('Y-m-d');
        $c2 = Carbon::now()->subDay(1)->format('Y-m-d');
        $c3 = Carbon::now()->subDay(2)->format('Y-m-d');
        $c4 = Carbon::now()->subDay(3)->format('Y-m-d');
        $c5 = Carbon::now()->subDay(4)->format('Y-m-d');
        $c6 = Carbon::now()->subDay(5)->format('Y-m-d');
        $c7 = Carbon::now()->subDay(6)->format('Y-m-d');
        $c8 = Carbon::now()->subDay(7)->format('Y-m-d');
        $c9 = Carbon::now()->subDay(8)->format('Y-m-d');
        $c10 = Carbon::now()->subDay(9)->format('Y-m-d');

        $c1 = Order::whereDate('created_at', $c1)->count();
        $c2 = Order::whereDate('created_at', $c2)->count();
        $c3 = Order::whereDate('created_at', $c3)->count();
        $c4 = Order::whereDate('created_at', $c4)->count();
        $c5 = Order::whereDate('created_at', $c5)->count();
        $c6 = Order::whereDate('created_at', $c6)->count();
        $c7 = Order::whereDate('created_at', $c7)->count();
        $c8 = Order::whereDate('created_at', $c8)->count();
        $c9 = Order::whereDate('created_at', $c9)->count();
        $c10 = Order::whereDate('created_at', $c10)->count();


        $s1 = Carbon::now()->format('Y-m-d');
        $s2 = Carbon::now()->subDay(1)->format('Y-m-d');
        $s3 = Carbon::now()->subDay(2)->format('Y-m-d');
        $s4 = Carbon::now()->subDay(3)->format('Y-m-d');
        $s5 = Carbon::now()->subDay(4)->format('Y-m-d');
        $s6 = Carbon::now()->subDay(5)->format('Y-m-d');
        $s7 = Carbon::now()->subDay(6)->format('Y-m-d');
        $s8 = Carbon::now()->subDay(7)->format('Y-m-d');
        $s9 = Carbon::now()->subDay(8)->format('Y-m-d');
        $s10 = Carbon::now()->subDay(9)->format('Y-m-d');

        $s1 = Order::whereDate('created_at', $s1)->get()->sum('total');
        $s2 = Order::whereDate('created_at', $s2)->get()->sum('total');
        $s3 = Order::whereDate('created_at', $s3)->get()->sum('total');
        $s4 = Order::whereDate('created_at', $s4)->get()->sum('total');
        $s5 = Order::whereDate('created_at', $s5)->get()->sum('total');
        $s6 = Order::whereDate('created_at', $s6)->get()->sum('total');
        $s7 = Order::whereDate('created_at', $s7)->get()->sum('total');
        $s8 = Order::whereDate('created_at', $s8)->get()->sum('total');
        $s9 = Order::whereDate('created_at', $s9)->get()->sum('total');
        $s10 = Order::whereDate('created_at', $s10)->get()->sum('total');


//        $arr=[$x1,$x2,$x3,$x4,$x5,$x6,$x7,$x8,$x9,$x10,$x11,$x12];
//        dd($arr);
        $order = Order::all();
        $orders = Order::where('status', 0)->get();
        $sumtotal = Order::where('status', 4)->sum('total');
        $user = User::all()->count();
        return view("admin.dashboard",[
            "order"=>$order,
            "user"=>$user,
            "orders"=>$orders,
            "sumtotal"=>$sumtotal,
            "x1"=>$x1,
            "x2"=>$x2,
            "x3"=>$x3,
            "x4"=>$x4,
            "x5"=>$x5,
            "x6"=>$x6,
            "x7"=>$x7,
            "x8"=>$x8,
            "x9"=>$x9,
            "x10"=>$x10,
            "x11"=>$x11,
            "x12"=>$x12,
            "d1"=>$d1,
            "d2"=>$d2,
            "d3"=>$d3,
            "d4"=>$d4,
            "d5"=>$d5,
            "d6"=>$d6,
            "d7"=>$d7,
            "d8"=>$d8,
            "d9"=>$d9,
            "d10"=>$d10,
            "n1"=>$n1,
            "n2"=>$n2,
            "n3"=>$n3,
            "n4"=>$n4,
            "n5"=>$n5,
            "n6"=>$n6,
            "n7"=>$n7,
            "n8"=>$n8,
            "n9"=>$n9,
            "n10"=>$n10,
            "now"=>$now,
            "c1"=>$c1,
            "c2"=>$c2,
            "c3"=>$c3,
            "c4"=>$c4,
            "c5"=>$c5,
            "c6"=>$c6,
            "c7"=>$c7,
            "c8"=>$c8,
            "c9"=>$c9,
            "c10"=>$c10,
            "s1"=>$s1,
            "s2"=>$s2,
            "s3"=>$s3,
            "s4"=>$s4,
            "s5"=>$s5,
            "s6"=>$s6,
            "s7"=>$s7,
            "s8"=>$s8,
            "s9"=>$s9,
            "s10"=>$s10,
        ]);
    }

    public function orders(){
        $orders = Order::orderBy('id', 'desc')->get();
        return view("admin.orders",[
            "orders"=>$orders
        ]);
    }
    public function newOrders(){
        $orders = Order::where('status', 0)->get();
        return view("admin.new_orders",[
            "orders"=>$orders
        ]);
    }

    public function order_1(){
        $orders = Order::where('status', 1)->get();
        return view("admin.orders_1",[
            "orders"=>$orders
        ]);
    }
    public function order_2(){
        $orders = Order::where('status', 2)->get();
        return view("admin.orders_2",[
            "orders"=>$orders
        ]);
    }
    public function order_3(){
        $orders = Order::where('status', 3)->get();
        return view("admin.orders_3",[
            "orders"=>$orders
        ]);
    }
    public function order_4(){
        $orders = Order::where('status', 4)->get();
        return view("admin.orders_4",[
            "orders"=>$orders
        ]);
    }
    public function order_5(){
        $orders = Order::where('status', 5)->get();
        return view("admin.orders_5",[
            "orders"=>$orders
        ]);
    }
    public function order_6(){
        $orders = Order::where('status', 6)->get();
        return view("admin.orders_6",[
            "orders"=>$orders
        ]);
    }
    public function order_7(){
        $orders = Order::where('status', 7)->get();
        return view("admin.orders_7",[
            "orders"=>$orders
        ]);
    }
    public function order_8(){
        $orders = Order::where('status', 8)->get();
        return view("admin.orders_8",[
            "orders"=>$orders
        ]);
    }
    public function order_9(){
        $orders = Order::where('status', 9)->get();
        return view("admin.orders_9",[
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
        $categories = Category::limit(4)->get();
        $products = Product::orderBy("id","desc")->limit(session("length"))->get();
        return view("admin.products",[
            "products"=>$products,
            "categories"=>$categories,
        ]);
    }

    public function products_category(Category $category){
        $categories = Category::limit(4)->get();
        $products = Product::where("category_id",$category->id)->get();
        return view("admin.product_category",[
            "products"=>$products,
            "categories"=>$categories,
            "category"=>$category
        ]);
    }


    //Gửi tới gmail khách hàng
    public function confirm(Order $order,Product $product){
//        foreach ($order->products as $item) {
//            $buy_order = $item->pivot->buy_qty;
//
//            if ($item->qty >= $buy_order) {
//                // Trừ số lượng sản phẩm đã mua khỏi số lượng hiện có
//                $new_quantity = $item->qty - $buy_order;
//
//                // Cập nhật số lượng mới vào cơ sở dữ liệu
//                $item->qty = $new_quantity;
//                $item->save();
//            } else {
//                // Xử lý khi số lượng sản phẩm không đủ để đáp ứng yêu cầu đặt hàng
//            }
//        }

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

    public function returnConfirmed(Order $order){
        $order->update(["status"=>7]);
        //gửi email cho khách báo đơn đã được chuyển trạng thái
        Mail::to($order->email)->send(new OrderMail($order));
        return redirect()->to("/admin/orders/".$order->id);
    }

    public function returnFailed(Order $order){
        $order->update(["status"=>8]);
        $order->update(["is_paid"=>1]);
        //gửi email cho khách báo đơn đã được chuyển trạng thái
        Mail::to($order->email)->send(new OrderMail($order));
        return redirect()->to("/admin/orders/".$order->id);
    }

    public function returnCompleted(Order $order){
        $order->update(["status"=>8]);
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

    public function users(){
        $users = User::all();
        return view("/admin/users",[
           "users"=>$users
        ]);
    }

    public function events()
    {
        $events = Event::orderBy("id", "desc")->limit(session("length"))->get();
        return view("admin.events", [
            "events" => $events
        ]);
    }
    public function eventCreate(){
        $events = Event::all();
        return view('admin.event_form', [
            "events" => $events
        ]);
    }
    public function eventEdit(Event $event){
        return view("admin.event_edit",[
            "event"=>$event
        ]);
    }
    public function eventDelete(Event $event){
        $event->delete();
        return redirect()->to("/admin/events");
    }
    public function blockUser(User $user){
        $user->delete();
        return redirect()->to("/admin/users");
    }
    public function eventUpdate(Request $request,Event $event){

        $request->validate([
            "name" => "required",
            "donor" => "required",
            "contact" => "required",
            "address"=>"required",
            "description"=>"required",
            "begin" => "required",
            "finish" => "required",
            "event" => $event
        ], [

        ]);
        $event = Event::findOrFail($event->id);
        // upload file
        $thumbnail = $event->thumbnail;
        if ($request->hasFile("thumbnail")) {
            $file = $request->file("thumbnail");
            $fileName = time() . $file->getClientOriginalName();
            $path = public_path("uploads");
            $file->move($path, $fileName);
            $thumbnail = "/uploads/" . $fileName;

            // Xóa thumbnail cũ
            if ($event->thumbnail) {
                $oldThumbnail = public_path($event->thumbnail);
                if (file_exists($oldThumbnail)) {
                    unlink($oldThumbnail);
                }
            }
        }
        $event->name = $request->get("name");
        $event->donor = $request->get("donor");
        $event->contact = $request->get("contact");
        $event->address = $request->get("address");
        $event->description = $request->get("description");
        $event->begin = $request->get("begin");
        $event->finish = $request->get("finish");
        $event->thumbnail = $thumbnail;
        $event->save();

        return redirect()->to("/admin/events");
    }
    public function eventSave(Request $request)
    {
        $request->validate([
            "name" => "required",
            "donor" => "required",
            "contact" => "required",
            "address" => "required",
            "begin" => "required",
            "description"=>"required",
            "finish"=>"required"
        ], [
            // thong bao gi thi thong bao
        ]);
        // upload file
        $thumbnail = null;
        if ($request->hasFile("thumbnail")) {
            $file = $request->file("thumbnail");
            $fileName = time() . $file->getClientOriginalName();
            $path = public_path("uploads");
            $file->move($path, $fileName);
            $thumbnail = "/uploads/" . $fileName;
        }
        Event::create([
            "name" => $request->get("name"),
            "donor" => $request->get("donor"),
            "contact" => $request->get("contact"),
            "address" => $request->get("address"),
            "description"=>$request->get("description"),
            "begin" => $request->get("begin"),
            "finish" => $request->get("finish"),
            "thumbnail" => $thumbnail
        ]);
        return redirect()->to("/admin/events");
    }



}


