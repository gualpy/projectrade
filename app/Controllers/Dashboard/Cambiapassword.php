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

	//$data is array [cliente, password, email]
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

	public function email(array $data, $subject, $pahtTemplateView, $emailFrom)
	{
		$email = Service('email');
		try {   
			$message=view($pahtTemplateView,$data);
			$email->setTo($data['email']);
			$email->setFrom($emailFrom,'Info');
			$email->setBCC($emailFrom,'Info');
			$email->setSubject($subject);
			$email->setMessage($message);
		} catch (\Throwable $th) {
			echo "Alguno de los parámetros está vacío ".$th;
		}
	}

	public function forgotPassword()
	{	$encriptador=service('encrypter');
		//$hoy = date("H:i:s");
		//$email 	= trim($this->request->getVar('forgotmail'));
		$encriptado=$encriptador->encrypt(20210304210009);
		echo ($encriptado."\n");
		$desencriptado = $encriptador->decrypt($encriptado);
		echo $desencriptado."\n";






		$mCliente=model('Cliente');
		$query=$mCliente->Select('*')->getWhere(['email'=>$email])->getRow();
		$data=array('nombre'=>$query->nombre,'email'=>$email,'password'=>$query->password);
		$data=[$email];
		if($query == null)
		{
			echo "envia email de cambio de password";
		}else{
			echo "nada";
			//$this->email($data, $subject='Cambio de contraseña', $pahtTemplateView='',$emailFrom='info@projectrade.com');
		}
	}
}
