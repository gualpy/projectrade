<?php

namespace App\Entities;

use CodeIgniter\Entity;

class CuentaEntity extends Entity
{
	protected $dates   = ['created_at','updated_at','deleted_at',];
	
	
	 protected function getMovimientosCuentaProfit(int $idCuenta,int $interes, int $deposito)
	 {
		$mcuenta = model('Cuenta');
		$mProfit = model('Profit');
		//para encontrar los depósitos por cliente
		$cliente=$mcuenta->from('cuenta','deposito','created_at')->Where('cliente',$idCuenta)->orderBy('created_at','ASC')->find();
		
	 }
	 
	 public function setInteresCompuesto(int $id)
	 {
		
		$mCuenta= model('Cuenta');
		$mProfit = model('Profit');
		$cuenta=$mCuenta->select('cuenta as idCuenta,cliente as idCliente, deposito')->Where('cliente',$id)->orderBy('created_at','ASC')->find();
		//$cuenta=$mCuenta->select('cuenta as idCuenta ,deposito')->Where('cliente',$id)->Where('codigo', 'tode')->orderBy('created_at','ASC')->find();
		$idCuenta=$cuenta[0]->idCuenta;
		$deposito=$cuenta[0]->deposito;
		
		$profit=$mProfit->select('ganancia, created_at')->Where('cuenta',$idCuenta[0])->orderBy('created_at','ASC')->find();
		
		d($profit);
		$array = [
			['id' => 1, 'title' => 'tree'],
    		['id' => 2, 'title' => 'sun'],
    		['id' => 3, 'title' => 'cloud'],
			
		];
		
		$result=[];
		foreach($profit as $i)
		{
			$deposito=($deposito * $i['ganancia']/100)+$deposito;
			
			
					//'fecha'=>$i['created_at'], 'interes'=>$i['ganancia'];
					
					//['profit'	=>$i['deposito']]
			
			//$result[]=$deposito=($deposito * $i['ganancia']/100)+$deposito;
		}
		dd($result);
		return $result;
	 }
}
