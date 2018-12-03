<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //后台首页展示
    public function index()
    {


        $info=session('admin_login');
        return view('admin.index.index',compact(['info']));
    }
    public function welcome(){
        return view('admin.index.welcome');
    }
    //切换，退出用户
    public function change()
    {
        session()->forget('admin_login');
        return redirect()->route('admin.public.login');
    }

}
