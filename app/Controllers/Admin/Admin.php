<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

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

	// edit a new item
	public function edit(int $id)
	{
		$model=model('Cliente');
		$cliente=$model->where('cliente',$id)->first();
				 
		dd($cliente);

		// return view('admin/dashboardHome_view',[
		// 	'cliente'=>$model->getWhere(['cliente' => $id]),
		// ]);

	}

	public function detalleCuentas(int $id)
	{
		$model=model('Cliente');
		return view('admin/detalleCuentas_view',[
			'cliente'=>$model->clientePocCuentas($id)
		]);

	}

	//Update one item
	public function agrearFondos( int $id )
	{
		
		$model = model('Profit');
		return view('admin/agregarFondos_view',[
			'profit'=>$model->Where('cuenta',$id)->find()
		]);
	}

	public function totalDepositos(){
		view('admin/deposito_view');
	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}	
	
}
