<?php

namespace App\Models;
use CodeIgniter\Model;


class Movimiento extends Model
{
	protected $table                = 'tblProfit';
	protected $primaryKey           = 'profit';
	protected $useAutoIncrement     = true;
	
	protected $returnType           = 'object';
	protected $useSoftDelete        = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['codigo','concepto','fecha','ganancia','bono','referido'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	//query que busque el deposito por cliente
    //select * from tblCuenta where cliente=1;

	public function listadoDeProfits(int $data)
	{
		return $this->query('
			select 
			tblProfit.fecha,
			tblCuenta.deposito,
			tblProfit.concepto,
			tblProfit.ganancia as rendimiento,
			round((tblCuenta.deposito*tblProfit.ganancia)/100) as BalanceDeposito
			from tblCuenta, tblCliente, tblProfit
			where tblCliente.cliente=tblCuenta.cliente
			and tblCuenta.cuenta=tblProfit.cuenta
			and tblCuenta.cliente='.$data)->getResultArray();
	}
}
