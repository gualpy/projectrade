<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Entities\ClienteEntity;
use Firebase\JWT\JWT;
class Register extends BaseController
{
	protected $configs;

	public function __construct()
	{
		$this->configs=config('MyConfig');
	}
	public function index()
	{
		
	}

	public function store()
	{
		$validation = service('validation');
		$validation->setRules([
				'nombre'       =>'required|string|min_length[3]',
				'apellido'     =>'required|string|min_length[3]',
				'email'		   =>'required|valid_email|is_unique[tblCliente.email]',
				'c-password'   =>'required|min_length[5]|matches[password]',
				'terms'		   =>'required'
		]);
		if (!$validation->withRequest($this->request)->run()) {
			//$validation->getErrors();
			return redirect()->back()->withInput()->with('errors', $validation->getErrors());
		}
		
		$data=$this->request->getPost();
		$cliente = new ClienteEntity($this->request->getPost());//instancio de la entidad
		$model = model('Cliente');//instancio el modelo Cliente
		$model->asignaGrupo($this->configs->defaultGroupClients);
		//$model->generateCodigo(); 
		$model->save($cliente);
		$this->emailRegister($data);
		return redirect()->route('/')->
		with('msg',[
			'type'=>'success',
			'body'=>'Usuaario registrado, revise su email']);
	}

	public function emailRegister($data)
    {
	
        $email = \Config\Services::email();
        //$to = 'info@projectrade.com';
		$subject = 'Su cuenta Projectrade esta casi lista';

		$message=view('emails/bienvenido_view',$data);
		$email->setTo($data['email']);
		$email->setFrom('info@projectrade.com','Info');
		$email->setBCC('info@projectrade.com','Info');
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

	public function updatePassword($token, array $options = null)
    {
		
		//$token = $this->request->getGet($token);
		//dd($token);
		try{
			$key = service('getSecretKey');
			$jwt=JWT::decode($token,$key,array('HS256'));
			dd($jwt);
			//return 
		} catch(\Throwable $th){
			return view('session/changePassword_view');
		}
	
    }
	
}
