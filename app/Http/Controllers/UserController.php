<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;
use Session;

class UserController extends Controller
{


    public function index(){

        return view('auth.login');
    }
    public function login(Request $req){

    $user=User::find('usertype');
    $data= User::where(['email'=>$req->email])->first();
    if(!$data || !Hash::check($req->password,$data->password)){
        return redirect ('/login');
    }

    $req->session()->put('user',$data);
    return redirect('/');


    }

    public function register(Request $req){
        $data=new User;

        $data->name=$req->name;
        $data->email=$req->email;
        $data->password=Hash::make($req->password);
        $data->save();
        return redirect('login');

    }

    public function reg(){
    return view('auth.register');
}
}
