<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
 
    
    public function index(){

        // $user=Session::get('user');
        // // if(Session::has('user'))
        // // {
        //     if($user->usertype=='0')
        //     {
                $data=Product::paginate(6);
        
                return view('user.index',compact('data'));

            // }
            // else
            // {
            //     return redirect()->back();
            // }

        // }
        // else
        // {
        //     return redirect('/login');

        // }
    }

    public function view($req)
    {
        $user=Session::get('user');
        if(Session::has('user'))
        {
            if($user->usertype=='0')
            {
                $info=Product::paginate(3);

                $data=Product::find($req);
                return view('user.products',compact('data','info'));
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect('/login');
        }


       
    }

    public function Add_To_Cart(Request $req, $id)
    {

        if($req->session()->has('user')){

            $user=Session::get('user')['id'];

            $product=Product::find($id);
            
            $product_id_exist=Cart::where('product_id','=',$id)->where('user_id','=',$user)->get('id')->first();

            if($product_id_exist)
                {


                    $cart=Cart::find($product_id_exist)->first();
                   
                    $quantity=$cart->quantity;
                    $cart->quantity=$quantity + $req->quantity;
                  
                    $total_amount=$cart->total_amount;
                    $cart->total_amount=($req->quantity * $product->price)+$total_amount;

                    $cart->save();
                    return redirect()->back();

                }
            else
                {

                    $data=new Cart;
                    $data->user_id=$req->session()->get('user')['id'];
                    $data->product_id=$req->product_id; 
                    $data->total_amount=$product->price * $req->quantity;
                    $data->quantity=$req->quantity;
        
                    $data->save();
        
                    return redirect()->back();
                }


         
        }
        else 
            return redirect('/login');
    }

    public function CartList()
    {
        $user=Session::get('user');

        if(Session::has('user'))
        {
            if($user->usertype=='0')
            {

            $user=Session::get('user')['id'];
            $data=DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$user)
            ->select('products.*','carts.id as cart_id','carts.total_amount as cartitem','carts.quantity as cartquantity')
            ->get();

            // dd($data);
        
            $totalitems=DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$user)
            ->select('products.*','carts.id as cart_id')
            ->sum('carts.total_amount');
        
            // dd($totalitems);
        
            return view('user.cartlist',compact('data','totalitems'));
            }
            else
            {
                return redirect()->back();
            }
        }
        else
            return redirect('/login');
        
    }

    public function RemoveItem($req){

        Cart::destroy($req);

        
        Session::flash('message','item has been removed!!');
        return redirect('/cartlist');
    }

    static public function CartItem(){
        
        $user=Session::get('user')['id'];
        return Cart::where('user_id',$user)->count();
    }
    
    public function Search(Request $request){
        
       
        $req=$request->input('name');
        
       
        $data=Product::where('name','like','%'.$req.'%')
        ->select('products.*')
        ->paginate(6);
        
            return view('user.index',compact('data'));
     
    }
    
    
    public function Order_now(Request $req)
    {
        
        $user=Session::get('user')['id'];
        
        $carts=Cart::where('user_id',$user)->get();

        foreach($carts as $cart){

            $order= new Order;
            $order->user_id=$cart->user_id;
            $order->product_id=$cart->product_id;
            $order->total_amount=$cart->total_amount;
            $order->quantity=$cart->quantity;
            $order->payment_status='pending';
            $order->payment_method='cash';
            $order->address=$req->address;

            $order->save();
           
            
            $cart_id=$cart->id;
            
            $data=Cart::find($cart_id);
            $data->delete();
            
        }
        
        return redirect('payment_by_cash');
    }
    
    public function OrderByCard()
    
    {

        $user=Session::get('user');
        if(Session::has('user'))
        {
            if($user->usertype=='0')
            {

                $user=Session::get('user')['id'];
                $data=DB::table('carts')
                ->join('products','carts.product_id','=','products.id')
                ->where('carts.user_id',$user)
                ->select('products.*','carts.id as cart_id','carts.total_amount as cartprice')
                ->get();
            
                $user=Session::get('user')['id'];
                $total=DB::table('carts')
                ->join('products','carts.product_id','=','products.id')
                ->where('carts.user_id',$user)
                ->select('products.*','carts.id as cart_id')
                ->sum('carts.total_amount');
            
                return view('user.orders',compact('total','data'));
            }
            else
            {
                return redirect()->back();
            }
        }else
        {
        return redirect('login');
        }
}

    public function OrderByCash()
    {

        $user=Session::get('user');
        if(Session::has('user'))
        {
            if($user->usertype=='0')
            {

        $user=Session::get('user')['id'];
        $order=DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$user)
        ->select('products.*','orders.*')
        ->get();

        // dd($order);

        $totalitems=DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$user)
        ->select('products.*','orders.*')
        ->sum('orders.total_amount');

        return view('user.orderbycash',compact('order','totalitems'));

        }
        else
        {
            return redirect()->back();
        }
    }else
    {
    return redirect('login');
    }


}
    public function cancel_order($req)
   
    {

        $item=Order::find($req);
        $item->payment_status='order has been canceled';
        $item->save();

        return redirect()->back();
    }

}