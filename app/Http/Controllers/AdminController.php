<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Notification;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $user=Session::get('user');
        if(Session::has('user'))
        {
            if($user->usertype=='1')
            {
                return view('admin.index');

            }
            else
            {
            return Redirect()->back();
                
            }

        }
        else
        {
            return Redirect('/login');
        }
    }

    public function ViewProducts()
    {
        $user=Session::get('user');
        
        
        if(Session::has('user')){


            if($user->usertype=='1'){
             
                $data=product::all();

                $totalproducts=product::select('products.id')->count();
        
                return view('admin.viewproducts',compact('data','totalproducts'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return Redirect('/login');

        }

    }

    public function ViewUsers()
    {

        $user=Session::get('user');
        
        if(Session::has('user'))
        {
            if($user->usertype=='1')
            {
                $data=user::all();
                

                $total_users=User::select('users.id')->count();
        
                return view('admin.viewusers',compact('data','total_users'));
            }
            else
            {
                return Redirect()->back();
            }
        }
        else
        {
            return Redirect('/login');

        }

    }

    public function ViewOrders()
    {

        $user=Session::get('user');

        if(Session::has('user'))
        {
        if($user->usertype=='1')
            {

            $total_orders=Order::select('orders.id')->count();

            // dd($total_orders);
    
            $data=DB::table('orders')
            ->join('products','orders.product_id','=','products.id')
            ->join('users','orders.user_id','=','users.id')
            ->orderby('orders.id','desc')
            ->select('products.*','products.name as product_name','orders.id as orders_id','products.price as products_price','orders.*','users.*','orders.quantity as ordersquantity', 'orders.total_amount as orders_total_amount','users.name as user_name')
            ->get();
            
            // dd($data);
    
            return view('admin.vieworders',compact('data','total_orders'));            
            }
            else
            {
            return Redirect()->back();
            }
    }
    else
    {
        return Redirect('/login');

    }

    }

    public function ViewCartList()
    {

        $user=Session::get('user');

        if(Session::has('user'))
        {
            if($user->usertype=='1')
            {
                $total_cart=Cart::select('carts.id')->count();

                $data=DB::table('carts')
                ->join('products','carts.product_id','=','products.id')
                ->join('users','carts.user_id','=','users.id')
                ->orderby('carts.id','desc')
                ->select('products.*','products.name as product_name','products.price as products_price','users.*','carts.quantity as cartquantity', 'carts.total_amount as cart_total_amount','users.name as user_name','carts.id as cart_id')
                ->get();
        
                // dd($data);
        
                return view('admin.viewcartlist',compact('data','total_cart'));        
            }
            else
            {
                return Redirect()->back();
            }
        }
        else 
        {
            return Redirect('/login');

        }
        
    }

    public function ApprovePayment($req)
    {

        $data=Order::find($req);

        $data->payment_status='delivered';
        $data->save();

        return redirect()->back();
    }

    public function Products()
    {
        $user=Session::get('user');
        
        
        if(Session::has('user'))
        {

            if($user->usertype=='1')
            {

            return view('admin.add_product');
            }
            else
            {
                return Redirect()->back();
            }

        }
        else
        {
            return Redirect('/login');

        }
    }

    public function AddProducts(Request $req)
    {
        $data=new Product;

        $image=$req->gallery;
        
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $req->gallery->move('uploads',$imagename);
        $data->gallery=$imagename;
        
        $data->name=$req->name;
        $data->price=$req->price;
        $data->description=$req->description;
   
        $data->save();
        return redirect('view_products');

    }

    public function DeleteProduct($req)
    {
        $data=Product::find($req);
        
        $data->destroy($req);
        
        return redirect()->back();
    }

    public function EditProduct($req)
    {
        $user=Session::get('user');

        if(Session::has('user'))
        {
            if($user->usertype=='1')
            {
                $data=Product::find($req);
                return view('admin.edit_product',compact('data'));
            }
            else
            {
                return Redirect()->back();

            }
        }
        else
        {
            return Redirect('/login');
        }



    }
    
    public function UpdateProduct(Request $req, $id)
    {
        $data=Product::find($id);
        $data->name=$req->name;
        $data->price=$req->price;
        $data->description=$req->description;

        $image=$req->gallery;
        
        if($image){
        
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $req->gallery->move('uploads',$imagename);
        $data->gallery=$imagename;
        }

        $data->save();

        return redirect('view_products');

    }

    public function SearchProducts(Request $req)
    {
        $data=$req->input('name');

        if($data){

        $data=Product::where('name','like','%'.$data.'%')
        ->select('products.*')
        ->get();
        
        // dd($data);
        
        return view('admin.searchproducts',compact('data'));
    }
    else
    return view('admin.blank');
  
    }

    public function Redirect()
    {
        $user=Session::get('user');
        if(Session::has('user'))
        {
            if($user->usertype=='1')
            {
                $data=Product::get();
        
                return view('admin.index',compact('data'));
            }
            else
            {
                $data=Product::paginate(6);
                return view('user.index',compact('data'));

            }
        }
        else
        {
            $data=Product::paginate(6);
            return view('user.index',compact('data'));

        }
    }

    public function send_email($req)
    {


        $order=Order::find($req);

        $data=DB::table('users')
        ->join('orders','orders.user_id','=','users.id')
        ->where('orders.id',$req)
        ->select('users.email as user_email','orders.id as order_id')
        ->get();
    
        // dd($data);

        return view('admin.send_email',compact('data'));

    }

    public function send_user_email(Request $req, $id)

    {
      $order=Order::find($id);

        $details=[

            'greeting'=>$req->greeting,
            'firstline'=>$req->firstline,
            'body'=>$req->body,
            'button'=>$req->button,
            'url'=>$req->url,
            'lastline'=>$req->lastline
        ];

        Notification::send($order, new SendEmailNotification($details));

        return Redirect()->back();
    }

    public function search_orders(Request $req)
    {
        $info=$req->input('name');


        $data=DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->join('users','orders.user_id','=','users.id')
        ->where('address','LIKE',"%$info%")->orWhere('products.name','LIKE',"%$info%")->orWhere('users.name','LIKE',"%$info%")->orWhere('users.email','LIKE',"%$info%")
        ->select('products.*','products.name as product_name','orders.id as orders_id','products.price as products_price','orders.*','users.*','orders.quantity as ordersquantity', 'orders.total_amount as orders_total_amount','users.name as user_name')
        ->get();
        

        return view('admin.vieworders',compact('data'));  
        
        
    
   
    
    }

   static public function total()
    {
         return Cart::all()->count('id');

     
    }

    public function notification()
    {


        $user=Session::get('user');

        return DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->join('users','carts.user_id','=','users.id')
        ->orderby('carts.id','desc')
        ->select('products.*','products.name as product_name','products.price as products_price','users.*','carts.quantity as cartquantity', 'carts.total_amount as cart_total_amount','users.name as user_name','carts.id as cart_id')
        ->paginate(3);
        
    }

    public function total_order(){

        return Order::all()->count('id');
    }

    public function orders()
    {


        $user=Session::get('user');

        return DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->join('users','orders.user_id','=','users.id')
        ->orderby('orders.id','desc')
        ->select('products.*','products.name as product_name','orders.id as orders_id','products.price as products_price','orders.*','users.*','orders.quantity as ordersquantity', 'orders.total_amount as orders_total_amount','users.name as user_name')
        ->paginate(3);

        
    }

   public function view_id_order($req)
   {

    $info=Order::find($req);

    $data= DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->join('users','orders.user_id','=','users.id')
        ->where('orders.id',$req)
        ->select('products.*','products.name as product_name','orders.id as orders_id','products.price as products_price','orders.*','users.*','orders.quantity as ordersquantity', 'orders.total_amount as orders_total_amount','users.name as user_name')
        ->get();

    return view('admin.view_id_orders',compact('data'));
   }


   public function view_id_cart($req)
    {

        // $info=Cart::find($req);

        $data= DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->join('users','carts.user_id','=','users.id')
        ->where('carts.id',$req)
        ->select('products.*','products.name as product_name','products.price as products_price','users.*','carts.quantity as cartquantity', 'carts.total_amount as cart_total_amount','users.name as user_name','carts.id as cart_id')
        ->get();



        return view('admin.view_id_cart',compact('data'));

    }



}
