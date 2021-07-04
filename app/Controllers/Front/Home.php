<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;

class Home extends BaseController
{

    public function index(){

        return view('login_view');
    }

    public function register(){
        return view("session/register_view");
    }

}
