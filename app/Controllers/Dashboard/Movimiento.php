<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Movimiento extends BaseController
{
    public  function index()
    {
        $model = model('Movimiento');
        
        //dd($model->listadoDeProfits(session('id_cliente')));

        return view('access/movimiento_view',[
            'profits'=>$model->listadoDeProfits(session('id_cliente'))
        ]);
    }

	public function store()
    {
        if(!$this->validate([
            'deposito'=>'required|numeric'

        ])){
            return redirect()->back()
                ->with('errors',$this->validator->getErrors())
                ->withInput();
        }

        $deposito = trim($this->request->getPost('deposito'));
        dd($deposito);
        $model = model('Cuenta');
    }
}
