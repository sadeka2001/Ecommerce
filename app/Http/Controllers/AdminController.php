<?php

namespace App\Http\Controllers;

use session;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function index(){
        return view('Backend.login');
    }



    
    public function show(Request $request){

$admin_email= $request->email;
$pass=md5($request->password);

$result=Admin::where('admin_email',$admin_email)->where('admin_password',$pass)->first();


if($result){
    $request->session()->put('admin_id', $result->admin_id);
   // Session::put('admin_id',$result->admin_id);
    //Session::put('admin_name',$result->admin_name);

    $request->session()->put('admin_name', $result->admin_name);
      return redirect('/dashboard');
    }


else{
   session()->put('message','Email or pass Invalid');
    return redirect('/admins');
}

    }


}

