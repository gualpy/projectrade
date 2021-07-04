<?php

namespace App\Models;
use CodeIgniter\Model;
use App\Entities\ClienteEntity;


class Cliente extends Model
{
	protected $table                = 'tblCliente';
	protected $primaryKey           = 'cliente';
	protected $useAutoIncrement     = true;
	
	protected $returnType           = ClienteEntity::class;
	protected $useSoftDelete        = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['codigo','nombre','apellido','password','email','telefono','estado','pais','grupo'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	protected $beforeInsert			= ['agregaIdGrupo']; 

	protected $tipoGrupo;
	protected $clienteInfo;

	protected function agregaIdGrupo($data){
		$data['data']['grupo'] = $this->tipoGrupo;
		return $data;
	}

	protected function lastIdCuenta()
	{
		$codCuenta=$this->db->table('tblCliente')
					->orderBy('codigo','DESC')
					->limit(1)
					->get();
				
	}

	public function asignaGrupo(string $grupo)
	{
		$row=$this->db->table('tblGrupo')
				->where('nombreGrupo',$grupo)
				->get()->getFirstRow();
			
		if($row !== null){
			$this->tipoGrupo = $row->grupo;
		}
		return $row;
	}

	public function getClientBy(string $column, string $value)
	{
		return $this->where($column,$value)->first();

	}

	public function cuentaClienta(){
		$model = model('Cuenta');
		return $this->db->table($model)->get();
	}
	public function encuentraCliente($data){
		$result=$this->db->query('select tblCliente.cliente,
								tblCliente.nombre as nombreCliente,
								tblCliente.apellido,
								tblCliente.password,
								tblCliente.email,
								tblCliente.pais,
								tblCliente.telefono,
								tblPais.codigo,
								tblPais.nombre as nombrePais
								FROM tblCliente, tblPais
								WHERE tblCliente.pais=tblPais.pais
								and tblCliente.cliente='.$data)->getResultArray();
		return $result;
	}
	 public function todos()
     {
        // $result =$this->db->query("Select * from tblCliente")->freeResult();
         //Query Builder

        return $this->table('tblCliente')->selectSum('cliente')->get();

     }

     public function total(int $valor)
     {
         return $this->query('SELECT tblCliente.nombre, tblCliente.apellido, tblCliente.estado, tblPais.nombre as Pais, tblPais.codigo, sum(deposito) as deposito, tblCliente.created_at
								FROM tblCliente, tblCuenta, tblPais
								WHERE tblPais.pais=tblCliente.pais
								and tblCliente.cliente=tblCuenta.cliente
								and tblCliente.cliente='.$valor)->getResult(ClienteEntity::class);
     }
	 public function getcliente($idCliente)
	 {
		 $this->table('tblPais');
		 $this->from('tblCliente  c');
		 $this->join("tblPais p","c.pais=p.pais");
		 $this->where("c.cliente",$idCliente);
		 $result = $this->get();
		 return $result;
	 }
	 // listado de clientes idCliente, nombre, apellido, observacion, deposito, id cuenta 
	 // Usado en Controlador Admin->agregarFondos
	 public function clientePocCuentas (int $id)
	 {
		return $this->query("SELECT tblCliente.cliente as idCliente,
							tblCliente.nombre,
							tblCliente.apellido,
							tblCuenta.observacion,
							tblCuenta.created_at,
							tblCuenta.deposito,
							tblCuenta.cuenta as idCuenta
							from tblCliente, tblCuenta
							WHERE tblCliente.cliente=tblCuenta.cliente
							and tblCliente.cliente=".$id)->getResultArray();
		  
	 }
	 
	 public function movimientos(int $data)
	 {
		return $this->db->query('SELECT tblCliente.nombre,
										tblCliente.apellido,
										tblCuenta.deposito,
										observacion,profit,(tblCuenta.deposito*tblCuenta.profit/100) as Ganancia,
										tblCuenta.deposito*tblCuenta.profit/100 +deposito as total,
										tblCuenta.created_at as fechaDeDeposito,
										DATE(tblCuenta.created_at, INTERVAL 7 DAY) as FechaDePago
										FROM tblCliente, tblCuenta
										WHERE tblCliente.cliente=tblCuenta.cliente
										and tblCliente.cliente='.$data)->getResultArray();
	 }
	 
}
