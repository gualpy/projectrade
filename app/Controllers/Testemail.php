<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Testemail extends BaseController
{
	public function index()
	{
		$data=[
			'nombre'	=>	'Elias Moretta',
		];
		$email = \Config\Services::email();
		$to = 'elianosft82@gmail.com';
		$subject = 'Su cuenta Projectrade esta casi lista';
		$message=view('emails/bienvenido_view',$data);
		//$email = config('email');
		$email->setTo($to);
		$email->setFrom('info@projectrade.com','Info');
		$email->setSubject($subject);
		$email->setMessage($message);
		if($email->send())
		{
			echo "La cuenta ha sido creada satisfactoriamente.";
		}else{

			$data = $email->printDebugger(['headers']);
			print_r($data);
		}

	}
	public function email()
	{
		return view('emails/password_view');
	}  
}
