<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Mail;
class MailController extends Controller {

	/**
	 * send email
	 *
	 * @return Response
	 */
	public function send()
	{
		$name = 'jaywenaakk888';
        $flag = Mail::send('emails.activemail',['name'=>$name],function($message){
            $to = 'jaywenaakk888@163.com';
            $message ->to($to)->subject('测试邮件');
		});
	
        if($flag){
            echo '发送邮件成功，请查收！';
        }else{
            echo '发送邮件失败，请重试！';
		}
		
		// $data = ['email'=>$email, 'name'=>$name, 'uid'=>$uid, 'activationcode'=>$code];
		// $flag = Mail::send('activemail', $data, function($message) use($data)
		// {
		// 	$message->to($data['email'], $data['name'])->subject('欢迎注册我们的网站，请激活您的账号！');
		// });
		
	}



}
