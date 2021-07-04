<?php
namespace App\Entities;
use CodeIgniter\Entity;
// use App\Models\Grupo;
class ClienteEntity extends Entity
{
    protected $dates =['created_at','updated_at'];


    protected function setPassword(string $password){
        $this->attributes['password']=password_hash($password,PASSWORD_DEFAULT);
    }
    

    // public function generarUsuario(){
    //     $this->attributes['username'] = explode(" ",$this->nombre)[0] . explode(" ",$this->apellido)[0];
    // }

    public function getRole(){
        $model = model('Grupo');
        return $model->where('grupo',$this->grupo)->first();
    }


   /*public function getCodigo(){
       $model = model('Cliente');
       return $model->where('codigo',$this->codigo)->first();

   }*/

}