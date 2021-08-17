<?php
namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        
        $model = model('Cliente');
        $mCuenta = model('Cuenta');
        $mmovimiento = model('Movimiento');
        //dd($model);
        // dd([
        //     'cuenta'=>$model->total(session('id_cliente'))
        // ]);
        // dd(
        //     $mCuenta->listaDepositos('cliente',session('id_cliente'))
        // );
        return view('access/dashboardHome_view',[
            'cuenta'=>$model->total(session('id_cliente')),
            'profits'=>$mmovimiento->listadoDeProfits(session('id_cliente'))
        ]);
    }
} 