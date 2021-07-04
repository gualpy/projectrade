<?php

namespace App\Models;
use CodeIgniter\Model;
use App\Entities\ClienteEntity;

class Cuenta extends Model
{
	protected $table                = 'tblCuenta';
	protected $primaryKey           = 'cuenta';
	protected $useAutoIncrement     = true;
	
	protected $returnType           = 'object';
	protected $useSoftDelete        = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['codigo','deposito','observacion','fechaDeposito','profit','monedero','cliente'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	//query que busque el deposito por cliente
    //select * from tblCuenta where cliente=1;

	public function deposito($id)
	{
		
		return $this->save([
            'cliente'=>session('id_cliente'),
            'deposito'=> trim($this->request->getVar('deposito'))
            
        ]);
	}

	public function listaDepositos($value)
	{
		
		return $this->query('select created_at as Fecha,
		 							observacion as tipo,
		 							deposito as valor
		 							from tblCuenta
		 							WHERE cliente='.$value)->getResultArray();	
	}
	
}
