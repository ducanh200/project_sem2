<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Category;
use App\Models\Event;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Carbon\Carbon;

class WebController extends Controller
{
    public function home(){
        $categories = Category::limit(4)->get();
        $products = Product::paginate(8);
        return view("main",[
            "categories"=>$categories,
            "products"=>$products
        ]);
    }
    public function success(){
        return view("home");
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
        $categories = Category::limit(4)->get();
        return view("about",[
            "categories"=>$categories
        ]);
    }

    public function contact(){
        $categories = Category::limit(4)->get();
        return view("contact",[
            "categories"=>$categories
        ]);
    }


    public function should(){
        $categories = Category::limit(4)->get();
        return view("should",[
            "categories"=>$categories
        ]);
    }

    public function event(Event $event)
    {
        $categories = Category::limit(4)->get();
        $events = Event::all();
        $event = Event::find($event->id);




            return view('event', [
                "event"=>$event,
                "events" => $events,
                "categories" => $categories,
            ]);
        }

    public function ordered(){
        $categories = Category::limit(4)->get();
        // Kiểm tra người dùng đã đăng nhập chưa
        if (Auth::check()) {
            // Lấy người dùng hiện tại
            $user = Auth::user();

            // Lấy thông tin đơn hàng của người dùng hiện tại
            $orders = Order::where('email', $user->email)->get();

            // Truyền dữ liệu đơn hàng vào view và hiển thị
            return view('ordered', [
                'orders' => $orders,
                "categories"=>$categories
            ]);
        }
            // Trường hợp người dùng chưa đăng nhập, xử lý tương ứng
            // ...
        return view("should",[
            "categories"=>$categories
        ]);
    }
    public function cancelOrder(Order $order){
        //cập nhật status của order thành 1 (cancel)
        $order->update(["status"=>5]);
                foreach ($order->products as $item) {
            $buy_order = $item->pivot->buy_qty;

            if ($item->qty >= $buy_order) {
                // Trừ số lượng sản phẩm đã mua khỏi số lượng hiện có
                $new_quantity = $item->qty + $buy_order;

                // Cập nhật số lượng mới vào cơ sở dữ liệu
                $item->qty = $new_quantity;
                $item->save();
            } else {
                // Xử lý khi số lượng sản phẩm không đủ để đáp ứng yêu cầu đặt hàng
            }
        }
        Mail::to("anguyenduc075@gmail.com")->send(new OrderMail($order));
        Mail::to($order->email)->send(new OrderMail($order));
        return redirect()->to("/ordered");
    }
    public function receivedOrder(Order $order){
        //cập nhật status của order thành 1 (cancel)
        $order->update(["status"=>4]);

        Mail::to("anguyenduc075@gmail.com")->send(new OrderMail($order));
        Mail::to($order->email)->send(new OrderMail($order));
        return redirect()->to("/ordered");
    }
    public function returns(Order $order){
        $order->update(["status"=>6]);

        Mail::to("anguyenduc075@gmail.com")->send(new OrderMail($order));
        Mail::to($order->email)->send(new OrderMail($order));
        return redirect()->to("/ordered");
    }

    public function returnCompleted(Order $order){
        $order->update(["status"=>9]);

        //gửi email cho khách báo đơn đã được chuyển trạng thái
        Mail::to($order->email)->send(new OrderMail($order));
        return redirect()->to("/ordered/".$order->id);
    }

    public function cart(){
        $products = session()->has("cart")?session()->get("cart"):[];
        $categories = Category::limit(4)->get();
        $total = 0;
        foreach ($products as $item){
            $total+= ($item->price-($item->price*$item->discount/100)) * $item->buy_qty;
        }
        if (Auth::check()) {
            // Lấy người dùng hiện tại
            $user = Auth::user();
        return view("cart",[
            "products"=>$products,
            "categories"=>$categories,
            "total"=>$total
        ]);
        }else{
            return view("should",[
                "categories"=>$categories
            ]);
        }
    }

    public function addToCart(Product $product,Request $request){
        $cart = session()->has("cart") ? session()->get("cart") : [];
        $qty = $request->has("qty") ? $request->get("qty") : 1;
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
    public function removeFromCart(Product $product){
        $cart = session()->get("cart");

        if ($cart) {
            foreach ($cart as $key => $item) {
                if ($item->id == $product->id) {
                    unset($cart[$key]);
                    session(["cart" => $cart]);
                    break;
                }
            }
        }

        return redirect()->to("/cart");
    }


    public function wishlist(){
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
    public function removeFromWishlist(Product $product){
        $favorite = session()->get("wishlist");

        if ($favorite) {
            foreach ($favorite as $key => $item) {
                if ($item->id == $product->id) {
                    unset($favorite[$key]);
                    session(["wishlist" => $favorite]);
                    break;
                }
            }
        }

        return redirect()->to("/wishlist");
    }

    public function detail(Product $product){
        $cart = session()->has("cart") ? session()->get("cart") : [];
        $favorite = session()->has("wishlist") ? session()->get("wishlist") : [];
        $categories = Category::limit(4)->get();
        return view("detail",[
            "categories"=>$categories,
            "product"=>$product,
            "favorite"=>$favorite,
            "cart"=>$cart,

        ]);
    }

    public function detailEvent(Event $event)
    {
        $events = Event::all();
        $favorite = session()->has("wishlist") ? session()->get("wishlist") : [];
        $categories = Category::limit(4)->get();


            return view("detail_event", [
                "categories" => $categories,
                "event" => $event,
                "favorite" => $favorite,
                "events" => $events,

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
    public function placeOrder(Request $request,Order $order)
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
            $total += ($item->price-($item->price*$item->discount/100)) * $item->buy_qty;
            if ($total>=100){
                $total = $total+0;
            }else{
                $total = $total+5;
            }
        }

        //cập nhật số lượng sản phẩm
        foreach ($products as $item) {
            $buy_qty = $item->buy_qty;
            $product = Product::find($item->id);

            if ($product->qty >= $buy_qty) {
                // Trừ số lượng sản phẩm đã mua khỏi số lượng hiện có
                $new_quantity = $product->qty - $buy_qty;

                // Cập nhật số lượng mới vào cơ sở dữ liệu
                $product->qty = $new_quantity;
                $product->save();
            } else {
                // Xử lý khi số lượng sản phẩm không đủ để đáp ứng yêu cầu đặt hàng
            }
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

        ]);
        foreach ($products as $item) {
            DB::table("order_products")->insert([
                "order_id" => $order->id,
                "product_id" => $item->id,
                "buy_qty" => $item->buy_qty,
                "price" => $item->price
            ]);
        }


        Session::forget('cart');


        if($order->payment_method == "PAYPAL") {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();

            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('successTransaction', ["order" => $order->id]),
                    "cancel_url" => route('cancelTransaction', ["order" => $order->id]),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => number_format($total, 2,".","")
                        ]
                    ]
                ]
            ]);

            $order->update(["status"=>1]);
            $order->update(["is_paid"=>1]);
            Mail::to("anguyenduc075@gmail.com")->send(new OrderMail($order));
            Mail::to($order->email)->send(new OrderMail($order));

            if (isset($response['id']) && $response['id'] != null) {

                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }

            }

        }else if($order->payment_method == "VNPAY"){
            // thanh toan = vnpay
        }
        // end

        Mail::to("anguyenduc075@gmail.com")->send(new OrderMail($order));
        Mail::to($order->email)->send(new OrderMail($order));
        return redirect()->to("/thank-you/".$order->id);
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
    public function invoice(Order $order){
        $categories = Category::limit(10)->get();
        return view("invoice",[
            'order'=>$order,
            "categories"=>$categories
        ]);
    }

    public function savePassword(Request $request)
    {
        $user = Auth::user();

        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Mật khẩu hiện tại không đúng.');
        }

        // Kiểm tra tính hợp lệ của mật khẩu mới và xác nhận mật khẩu mới
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Cập nhật mật khẩu mới
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/')->with('success', 'Mật khẩu đã được thay đổi thành công.');
    }
    public function changePassword(){
        $user = Auth::user();
        return view("change_password",[
            "user"=>$user
        ]);
    }

}
