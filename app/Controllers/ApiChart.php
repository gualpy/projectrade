<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ApiChart extends ResourceController
{
    
    protected $format    = 'json';
    
    public function index()
    {
    
    }

    public function profits($id)
    {
        $model= model('Profit');
        
        //$this->respond($model->findAll());
        return $this->respond($model->select('*')->Where('cuenta',$id)->orderBy('created_at','ASC')->find());
    }
    
}