<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session as SessionSession;
use session;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function dashboard(){
        $this->adminAuthCheck();
        return view('Backend.dashboard');
    }

    public function logout(){
     Session()->flush();

        return redirect('/admins');
    }

    public function adminAuthCheck(){
        $admin_id=Session()->get('admin_id');
        if($admin_id){
        return;

        }

        else{
            return redirect('/admins')->send();
        }

    }
}
