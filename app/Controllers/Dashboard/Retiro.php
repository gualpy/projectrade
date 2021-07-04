<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Retiro extends BaseController
{
    public  function index()
    {
        return view ('access/retiro_view');
    }

	public function store()
    {
        /*if(!$this->validate([
            'deposito'=>'required|numeric'

        ])){
            return redirect()->back()
                ->with('errors',$this->validator->getErrors())
                ->withInput();
        }*/
        
        $data=[
            'cantidad' => trim($this->request->getVar('cantidad')),
            'observacion'=>'Retiro solicitado',
            'monedero' => trim($this->request->getVar('monedero')),
            'cuenta'=>session('id_cliente')
        ];
    
        $model=model('Retiro');
        $model->save($data);
        return redirect('retiro')->with('msg',[
            'type'=>'success',
            'body'=>'El retiro está proceso uno de nuestros asesores se comunicara con usted. Gracias'
        ]);
    }
}
