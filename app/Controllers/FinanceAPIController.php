<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FinanceAPIController extends BaseController
{
    public function index()
    {
        return $this->response->setJSON(["API endpoint success"]);
    }
}
