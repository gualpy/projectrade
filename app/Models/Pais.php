<?php

namespace App\Models;
use CodeIgniter\Model;


class Pais extends Model
{
	protected $table                = 'tblPais';
	protected $primaryKey           = 'pais';
	protected $useAutoIncrement     = true;
	
	protected $returnType           = 'object';
	protected $useSoftDelete        = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['pais','codigo','nombre'];
	
}
