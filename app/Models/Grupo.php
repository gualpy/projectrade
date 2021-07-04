<?php

namespace App\Models;

use CodeIgniter\Model;

class Grupo extends Model
{
	protected $table                = 'tblGrupo';
	protected $primaryKey           = 'grupo';
	protected $useAutoIncrement     = true;
	protected $returnType           = 'object';
	protected $useSoftDelete        = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['grupo','nombreGrupo'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';


}
