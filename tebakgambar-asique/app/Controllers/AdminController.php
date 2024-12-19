<?php

namespace App\Controllers;

use App\Filters\AdminMiddleware;
use CodeIgniter\Controller;

class AdminController extends BaseController
{
    public function homeAdmin()
    {
        return view('admin/home_admin');
    }
}
