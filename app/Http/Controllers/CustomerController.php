<?php

namespace App\Http\Controllers;


use App\Models\customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Session;
class CustomerController extends Controller
{
    public function login(Request $request){
$email=$request->email;
$password=$request->password;
$result=customer::where('email',$email)->where('password',$password)->first();

if($result){
    Session::put('id',$result->id);
    return Redirect::to('/checkout');
}
else{
    return Redirect::to('/login_check');
}
    }

    public function registration(Request $request){
     $data=array();
     $data['name'] = $request->name;
     $data['email'] = $request->email;
     $data['password'] = $request->password;
     $data['mobile'] = $request->mobile;
     $id=customer::insertGetId($data);
     Session::put('id',$id);
     Session::put('name',$request->name);
     return Redirect::to('/checkout');

    }

    public function logout(){
        Session::flush();
        return Redirect::to('/');
    }
}
