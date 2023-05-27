<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Email;

class EmailController extends BaseController
{
    public function index()
    {
        $emailModel = model(Email::class);
        $data['emails'] = $emailModel->getAllEmails();
        return view('/email/index', $data);
    }
}