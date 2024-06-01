<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthAPIController extends BaseController
{
    public function index()
    {
        // asdasd
        return $this->response->setJSON(["API AUTH endpoint success"]);
    }

    public function login()
    {
        return $this->response->setJSON(["Login failed"]);
    }
}
