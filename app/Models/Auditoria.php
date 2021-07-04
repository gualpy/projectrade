<?php

namespace App\Models;
use CodeIgniter\Model;
use App\Entities\ClienteEntity;

class Auditoria extends Model
{
	protected $table                = 'tblAuditoria';
	protected $primaryKey           = 'auditoria';
	protected $useAutoIncrement     = true;
	
	protected $returnType           = 'object';
	protected $useSoftDelete        = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['ip'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

}
