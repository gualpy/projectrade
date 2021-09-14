<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ApiChart extends ResourceController
{
    protected $modelName = 'App\Models\Profit';
    protected $format    = 'json';

    public function index()
    {
        
        return $this->respond($this->model->findAll());
    }

    
}