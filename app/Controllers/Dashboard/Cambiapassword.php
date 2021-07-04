<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Entities\ClienteEntity;
use App\Models\Cliente;

class Cambiapassword extends BaseController
{
	public function index()
	{
		return view('access/password_view');
	}

	public function update()
	{
		$validation = service('validation');
		$validation->setRules([
				'v-password'	=>'required|min_length[5]',
				'password'   	=>'required|min_length[8]',
				'c-password'   	=>'required|min_length[8]|matches[password]'
		],
		[//Errores
				'v-password'=>[
					'required'=>'Escriba su password',
				],
				'password'=>[
					'required'=>'Las contraseñas no coinciden',
				],
				'c-password'=>[
					'required'=>'Las contraseñas no coincidennnnnnn',
				],				
		]
	);
		if (!$validation->withRequest($this->request)->run()) {
			//$validation->getErrors();
			return redirect()->back()->withInput()->with('errors', $validation->getErrors());
		}
		
		//$data=$this->request->getPost();
		//dd($data);
		$vpassword=trim($this->request->getPost('v-password'));
		$cpassword=trim($this->request->getPost('c-password'));
		
		$model = model('Cliente');
		$cliente =session('id_cliente');
		
		$cliente=$model->find($cliente);

		
		
		
		if(password_verify($vpassword, $cliente->password))
		{
			//actualiza passowrd
			$cpassword=password_hash($cpassword,PASSWORD_DEFAULT);
			$data=[
				'cliente'=>$cliente->cliente,
				'password'=>$cpassword,
				'email'=> $cliente->email
			];
			//dd($data);
			//$model = model('Cliente');
			$model->save($data);
			$this->emailPassword($data);
			//session()->destroy();
			return redirect()->back()
			->with('msg',[
				'type'=>'success',
				'body'=>'Password actualizado'
			]);
			
		}	
	}
	public function emailPassword($data)
    {
        $email = \Config\Services::email();
        //$to = 'info@projectrade.com';
		$subject = 'Su contraseña ha sido cambiada';

		$message=view('emails/cambiarpassword_view',$data);
		$email->setTo($data['email']);
		$email->setFrom('info@projectrade.com','Info');
		$email->setBCC('info@projectrade.com','Info');
		$email->setSubject($subject);
		$email->setMessage($message);
		if($email->send())
		{
			echo "La contraseña ha sido cambiada satisfactoriamente.";
		}else{

			$data = $email->printDebugger(['headers']);
			print_r($data);
		}
    }
}
