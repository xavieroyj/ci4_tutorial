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

    public function show($emailId) {
        $emailModel = model(Email::class);
        $data['email'] = $emailModel->getEmailById($emailId);
        return view('/email/view', $data);
    }
}