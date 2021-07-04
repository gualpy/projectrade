<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Filters\Auth;

class Deposito extends BaseController
{
    public  function index()
    {
        return view('access/deposito_view');
    }

	public function store()
    {
        
        if(!$this->validate([
            'deposito'=>'required|numeric',
            'motivo'=>'required'

        ])){
            return redirect()->back()
                ->with('errors',$this->validator->getErrors())
                ->withInput();
        }
        $id=session('id_cliente');
        
        // $data2=[
        //     'deposito' => trim($this->request->getVar('deposito')),
        //     'observacion' => $this->request->getVar('motivo')
        // ];
        
        $model = model('Cuenta');
        $model->save([
            'deposito'=> trim($this->request->getVar('deposito')),
            'observacion' => $this->request->getVar('motivo'),
            'cliente'=>session('id_cliente')
        ]);
        
        $datos=$this->request->getPost();
        
        $model = model('Cliente');
        $data= $model->encuentraCliente(session('id_cliente'));
        array_push($data,$datos);
        //dd($data);
        $this->emailDeposito($data);
        return redirect('deposito')->with('msg',[
            'type'=>'success',
            'body'=>'Registro del deposito está en proceso uno de nuestros asesores se comunicará con usted. Gracias'
    ]);

    }

    public function emailDeposito($data)
    {
        
        $email = \Config\Services::email();
        //$to = 'info@projectrade.com';
		$subject = 'Su '.$data[1]['motivo'].' de '.$data[1]['deposito'].'se ha realizado con éxito';
		$message=view('emails/deposito_view',$data);
		$email->setTo($data[0]['email']);
		$email->setFrom('info@projectrade.com','Info');
		$email->setBCC('info@projectrade.com','Info');
		$email->setSubject($subject);
		$email->setMessage($message);
		if($email->send())
		{
			echo "Su depósito se ha realizado satisfactoriamente.";
		}else{

			$data = $email->printDebugger(['headers']);
			print_r($data);
		}
     
    }

    public function muestraCuenta()
    {
        $data = [
            'username' => 'darth',
            'email'    => 'd.vader@theempire.com'
        ];

        return view('../pruebas_view',$data);

        
    }
}
