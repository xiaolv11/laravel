<?php

namespace App\Listeners;

use App\Events\LoginSendEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use Illuminate\Mail\Message;

class LoginSendEventListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LoginSendEvent  $event
     * @return void
     */
    public function handle(LoginSendEvent $event)
    {
        //进行发送邮件
        Mail::raw("<h3>登录成功</h3>",function(Message $message){
            $message->to('1421361617@qq.com');
            $message->subject("进行测试");
        });
    }
}
