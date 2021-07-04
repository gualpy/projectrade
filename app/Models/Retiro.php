<?php

namespace App\Models;
use CodeIgniter\Model;

class Retiro extends Model
{
	protected $table                = 'tblRetiro';
	protected $primaryKey           = 'retiro';
	protected $useAutoIncrement     = true;
	
	protected $returnType           = 'object';
	protected $useSoftDelete        = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['retiro','observacion','cantidad','monedero','fechaRetiro','cuenta'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';
}