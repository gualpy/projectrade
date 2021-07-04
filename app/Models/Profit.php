<?php

namespace App\Models;

use CodeIgniter\Model;

class Profit extends Model
{
	protected $table                = 'tblProfit';
	protected $primaryKey           = 'profit';
	protected $useAutoIncrement     = true;
	
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['codigo','concepto','fecha','ganancia','bono'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;
}
