<?php
namespace App\Controllers\Auth;

use App\Controllers\BaseController;


class Login extends BaseController
{

    public function signin(){
        //$validation = service('validation');
        if(!$this->validate([
            'email'=>'required|valid_email',
            'password'=>'required',
            'terms'=>'required'
        ])){
            return redirect()->back()
                ->with('errors',$this->validator->getErrors())
                ->withInput();
        }

        $email 		= trim($this->request->getVar('email'));
        $password 	= trim($this->request->getVar('password'));

        $model = model('Cliente');
        //$cliente = $model->getCLientBy('email',$email);
        //dd($cliente);
        if(!$cliente = $model->getCLientBy('email',$email)){
            return redirect()->back()
                ->with('msg',[
                    'type'=>'warning',
                    'body'=>'Usuario no encontrado'
                ]);
        }
        if(!password_verify($password, $cliente->password)){
            return redirect()->back()
                ->with('msg',[
                    'type'=>'warning',
                    'body'=>'Password incorrecto'
                ]);
        }
        
        session()->set([
            'id_cliente'=>	$cliente->cliente,
            'nombre'	=>	$cliente->nombre,
            'apellido'	=>	$cliente->apellido,
            'is_logged'	=>	true
        ]);
        //dd($cliente->grupo);
        if(($cliente->grupo)==1)
        { 
            return redirect()->route('panelAdmin')->with('msg',[
                'type'=>'Success',
                'body'=>'Bienvenido Admin de nuevo ' . ucfirst($cliente->nombre),
                'saludo' => 'Bienvenido Admin, ' . ucfirst($cliente->nombre)
            ]);
        }else{

            return redirect()->route('panel')->with('msg',[
                'type'=>'Success',
                'body'=>'Bienvenido de nuevo ' . ucfirst($cliente->nombre),
                'saludo' => 'Bienvenido, ' . ucfirst($cliente->nombre)
            ]);
        }
    }

    public function mostrarCuenta()
    {
        $model = model('Cuenta');
        $model->orderby('cuenta','DESC');
        return view('pruebas_view',$model);
    }
    
    public function logout(){

        session()->destroy();
        return redirect()->route('/');
    }

    public function forgot()
    {
        return view("Auth/forgot_view");
    }
}