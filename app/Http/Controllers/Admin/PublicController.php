<?php

namespace App\Http\Controllers\Admin;

use App\Events\LoginSendEvent;
use App\Models\Manager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Mail\Message;
use Validator ,Mail;
class PublicController extends Controller
{
    //登录页面
    public function login()
    {
        if(session()->has('online')){
            return redirect()->route('admin.index.index');
        }
       return view('admin.public.login');
    }
    //登录处理方法
    public function loginsave(Request $request)
    {
        $login_message=$request->except(['_token']);
       $validator=Validator::make($request->all(),[
           'username'=>'required',
           'password'=>'required',

       ]);
       if($validator->fails()){
           return redirect()->route('admin.public.login')->withErrors($validator);
       }else{
           //根据用户名查询密码
           $info=Manager::where(['username'=>$login_message['username']])->first();
           $info['time']=time();
            if($info){
                if(\Hash::check($login_message['password'],$info->password)){
                    //使用时间发送邮件
                    //event(new LoginSendEvent(\Auth::user()));
                    //if(Mail::failures()){
                        //echo "邮件发送失败";
                   // }
                      if($request->has('online')){
                          session(['online'=>1]);
                      }
                      session(['admin_login'=>$info]);
                      return redirect()->route('admin.index.index')->with('success','登录成功');
                }else{
                      return redirect()->route('admin.public.login')->withErrors("用户名密码不匹配");
                }
            }else{
                return redirect()->route('admin.public.login')->withErrors("用户名有误");
            }
       }
    }
}
