<?php

namespace App\Controllers\Dashboard;
use App\Entities\ClienteEntity;
use App\Controllers\BaseController;

class Config extends BaseController
{
	public function index()
	{
		$model = model('cliente');
        //dd($model->encuentraCliente());
		$paisesModel= model('Pais');
        //dd($model->encuentraCliente(session('id_cliente')));
        return view('access/config_view',[
            'cliente'=>$model->encuentraCliente(session('id_cliente')),
			'pais'=>$paisesModel->findAll()
        ]);
	}

	public function store()
	{
		
		$validation = service('validation');
		$validation->setRules([
				'nombre'       =>'required|string|min_length[3]',
				'apellido'     =>'required|string|min_length[3]',
				'email'		   =>'required|valid_email',
				'pais'		   =>'required',
				'telefono'     =>'required|numeric|min_length[10]'
		]);
		if (!$validation->withRequest($this->request)->run()) {
			//$validation->getErrors();
			return redirect()->back()->withInput()->with('errors', $validation->getErrors());
		}
		$data=$this->request->getPost();
		$data['cliente'] =session('id_cliente'); 
		$cliente = new ClienteEntity($data);//instancio de la entidad
		$model = model('Cliente');//instancio el modelo Cliente
		$model->save($cliente);
		return redirect()->route('config')->
		with('msg',[
			'type'=>'success',
			'body'=>'Sus información ha sido actualizado']);
	}
	public function cambiaPassword()
	{
		$model = model('cliente');
		return view('access/password_view',[
			'cliente'=>$model->encuentraCliente(session('id_cliente')),
		]);
	}
}
