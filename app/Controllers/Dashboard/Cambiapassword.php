<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use Firebase\JWT\JWT;

use Exception;

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
	
	public function emailTemplate($data, $subject, $templateEmail)
	{
		//dd($data['email'], $data['token_key'], $subject, $templateEmail);
		$email = service('email');
		$message=view($templateEmail,$data);
		try {   
			
			$email->setTo("ca80dd06eb-67304c@inbox.mailtrap.io");
			$email->setFrom($data['email'],'Info');
			$email->setBCC($data['email'],'Info');
			$email->setSubject($subject);
			$message=view($templateEmail,$data);
			$email->setMessage($message);
			$email->send();
		} catch (Exception $ex) {
			echo "Alguno de los parámetros está vacío ".$ex->getMessage();
		}
	}

	public function forgotPassword()
	{
		$forgotmail 	= trim($this->request->getVar('forgotmail'));
		$mCliente=model('Cliente');
		$data=$mCliente->Select('*')->getWhere(['email'=>$forgotmail])->getRowArray();
		$subject="Restablecer contraseña";
		$templateEmail="emails/forgotPassword_view";

		$validation = service('validation');
		$validation->setRules([
				'forgotmail'	=>'required|min_length[5]',
		],
		[//Errores
				'forgotmail'=>[
					'required'=>'Escriba su email',
				]
		]
	);
		
		if ($data['email'] == $forgotmail)
		{
			$time = time();
			$key = Service('getSecretKey');
			$payload = [
				'iat' => $time,
				'exp' => $time + 60*120,
				'data' => ['email'=>$data['email'],'name'=>$data['nombre'],'idCliente'=>$data['cliente']]
			];
			$linkjwt=JWT::encode($payload, $key);
			//array_push($data,$linkjwt);
			$data['token_key']=$linkjwt;
			//dd($data);
			$this->emailTemplate($data,$subject,$templateEmail);
			return redirect()->back()->with('msg',[
				'type'=>'success',
				'body'=>'Revise su correo'
			]);;
		}
		
		//$data=array('nombre'=>$query->nombre,'email'=>$email,'password'=>$query->password);
		return redirect()->back()->with('msg',[
			'type'=>'warning',
			'body'=>'Usuario no encontrado'
		]);
	}

	public function validaHash()
	{
		$uri = service('uri');
		$hash=$uri->getSegment(2);
		$key = Service('getSecretKey');
		$decode = JWT::decode($hash, $key, array('HS256'));
		//dd($decode);		
		if($decode->exp >=time())
		{
			return view('recoveryPassword_view');

		}else{
			return ("<h1>Ha caducado su tiempo para renovar su contraseña<h1>");
		}
		
	}
	
	public function recovery()
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
		$uri = service('uri');
		$hash=$uri->getSegment(2);
		$key = Service('getSecretKey');
		$decode = JWT::decode($hash, $key, array('HS256'));
		
		$cliente=$model->find($decode->data->idCliente);
		
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

}
