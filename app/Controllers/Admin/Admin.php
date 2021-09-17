<?php

namespace App\Controllers\Admin;
use App\Entities\ClienteEntity;
use App\Controllers\BaseController;
use Config\Servicess;

class Admin extends BaseController
{
	
	
	public function index()
	{
		$model=model('Cliente');
		return view('admin/dadmindHome_view',[
			'cliente'=>$model->orderBy('cliente','ASC')->find(),
			'pager'=>$model->pager
		]);
	}

	// presenta en formulario datosCliente_view los datos del usuario
	public function edit(int $id)
	{	
		
		$mCliente = model('Cliente');
		
        //dd($mCliente->encuentraCliente($id));
		$mPaises= model('Pais');
        //dd($mCliente->encuentraCliente(session('id_cliente')));
        return view('admin/datosCliente_view',[
            'cliente'=>$mCliente->encuentraCliente($id),
			'pais'=>$mPaises->findAll()
        ]);

	}

	//Edita, guarda cambios de los datos del usuario
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
		return redirect()->route('panelAdmin');
	}

	public function detalleCuentas(int $id)
	{
		$mCliente=model('Cliente');
		$mCuenta=model('Cuenta');

		return view('admin/detalleCuentas_view',[
			'cliente'=>$mCliente->clientePorCuentas($id),
			'clientePorCuentas'=>$mCuenta->Where('cliente',$id)->Where('codigo',"tode")->find()
		]);

	}

	//Update one item
	public function profits()
	{
		$validation = service('validation');
		$validation->setRules([
				'fecha'       =>'required',
				'ganancia'	  =>'required'
		]);
		if (!$validation->withRequest($this->request)->run()) {
			
			return redirect()->back()->withInput()->with('errors', $validation->getErrors());
		}
		 $data=$this->request->getVar();
		  $id=$data['cuenta'];
		  //$model= model('Profit');
		return redirect()->route('presenta_Interes',[$id])->
		with('msg',[
			'type'=>'success',
			'body'=>'Profit guardado a fuego']);
	}

	public function presentaInteres(int $idCuenta)
	{
		//Ecuentro el id de cliente para obtener el id de la cuenta puede tener 1 o más
		
		$mCliente=model('Cliente');
		$mCuenta= model('Cuenta');
		$mProfit = model('Profit');
		//dd($mProfit->select('ganancia, cuenta, created_at')->Where('cuenta',$idCuenta)->orderBy('created_at','ASC')->find());
		return view('admin/agregarFondos_view',[
			'presentaInteres'=>$mCliente->presentaInteres($idCuenta),
			'profit'=>$mProfit->select('ganancia, cuenta, created_at')->Where('cuenta',$idCuenta)->orderBy('created_at','ASC')->find()
		]);
	}

	public function totalDepositos(){
		view('admin/deposito_view');
	}

	//Delete one item
	public function delete( )
	{
		Service('saludar');

	}	
	
}
