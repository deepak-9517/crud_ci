<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class StudentController extends BaseController
{
    public function index()
    {
      return view('index'); 
    }
    public function register()
    {
      return view( 'register' );
    }
}
