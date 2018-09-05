<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\TypeProduct;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use Session;
use DB;
use Hash;
use App\User;
use Auth;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
        $new_product = Product::where('new',1)->paginate(4);
        $product_sale = Product::where('promotion_price','<>',0)->paginate(8);
        // dd($product_sale);
        // dd($new_product);
        $slide = Slide::all();
        // dd($slider);
        // return view('page.home',['slide' => $slide]);
    	return view('page.home',compact('slide','new_product','product_sale'));
    } 
    public function getProductType($type)
    {
        //lấy tên danh mục
        $cate_name = TypeProduct::where('id',$type)->first();
        //lấy sản phẩm theo danh mục
        $type = Product::where('id_type',$type)->get();
        //láy sản phẩm khác
        $other_product = Product::where('id_type','<>',$type)->paginate(3);
        // lấy tất cả danh mục
        $cate = TypeProduct::all();
        // dd($cate);
       
    	return view('page.product_type',compact('type','other_product','cate','cate_name'));
    }
    public function getProductDetail(Request $req)
    {
        // lấy chi tiết sản phẩm
        $sanpham  = Product::where('id',$req->id)->first();
        $sanphamlienquan = Product::where('id_type',$sanpham->id_type)->orderByRaw("RAND()")->get()->take(6);
        // dd($sanphamlienquan);
    	return view('page.product_detail',compact('sanpham','sanphamlienquan'));
    }
    public function getContact()
    {
    	return view('page.contact');
    }
    public function getAbout()
    {
    	return view('page.about');
    }
    public function getCart(Request $req , $id)
    {
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req ->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getDelItemCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items) > 0){
         Session::put('cart',$cart);

        }else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckOut()
    {
        if(Session::has('cart'))
        {
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            // dd($cart);
            $check_cart = Session::get('cart');
            // dd($check_cart);
             return view('page.checkout',['cart'=> $check_cart,'product_cart'=>$check_cart->items,'totalPrice'=>$check_cart->totalPrice,'totalQty'=>$check_cart->totalQty]);
        }
       
    }
    public function postCheckout(Request $req)
    {
      
        $cart = Session::get('cart');
        //insert vào customer
        $cum = new Customer;
        $cum->name = $req->name;
        $cum->gender = $req->gender;
        $cum->email = $req->email;
        $cum->address = $req->address;
        $cum->phone_number = $req->phone;
        $cum->note = $req->note;
        $cum->save();
        $cum_id = $cum->id;
        //insert vào bill
        $bill = new Bill;
        $bill->id_customer = $cum_id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment;
        $bill->note = $req->note;
        $bill->save();
         //insert vài bill detail
        $bill_detail = new BillDetail;
        foreach ($cart->items as $key => $value) {
            $bill_detail->id_bill = $bill->id;    
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
        
    }
    public function getLogin()
    {
        return view('page.login');
    }
    public function getSignup()
    {
        return view('page.signup');
    }
    public function postSignup(Request $req)
    {
        $this->validate($req,
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:16',
                're_password' => 'required|same:password'
            ],
            [
                'email.required'    => 'Vui lòng nhập email!',
                'email.email'       => 'Không đúng địng dạng!',
                'email.unique'      => 'Email đã tồn tại!',
                'password.required' => 'Vui lòng nhập mật khẩu!',
                're_password.same'      => 'Mật khẩu không trùng khớp',
                'password.min'      => 'Mật khẩu ít nhất phải 6 kí tự',
                'password.max'      => 'Mật khẩu phải nhỏ hơn 16 kí tự'
            ]);
        $user = new User(); 
        $user->full_name  = $req->full_name;
        $user->email      = $req->email;
        $user->address    = $req->address;
        $user->phone      = $req->phone;
        $user->password   = Hash::make($req->pass);
        $user->save();
         return redirect()->back()->with('success','Đăng kí thành công');
    }

    public function postLogin(Request $request){
        $this->validate($request,
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:16',
                're_password' => 'required|same:password'
            ],
            [
                'email.required'    => 'Vui lòng nhập email!',
                'email.email'       => 'Không đúng địng dạng!',
                'email.unique'      => 'Email đã tồn tại!',
                'password.required' => 'Vui lòng nhập mật khẩu!',
                're_password.same'      => 'Mật khẩu không trùng khớp',
                'password.min'      => 'Mật khẩu ít nhất phải 6 kí tự',
                'password.max'      => 'Mật khẩu phải nhỏ hơn 16 kí tự'
            ]);
        $credentials = array('email' => $request->email , 'password' => $request->password);
        if(Auth::attempt($credentials)){
        return redirect()->back()->with(['flag'=>'success','thongbao','Đăng nhập thành công']);
        }else{
        return redirect()->back()->with(['flag'=>'danger','thongbao','Đăng nhập thất bại']);
        }
    }
}
