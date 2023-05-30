<?php
namespace App\Controllers;

use App\Models\Creditinfo;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function lucky_number() {
        $data = [
            'number' => rand(222, 456),
        ];
        return view('/lucky_number', $data);
    }

    public function table_alternative_row_bg() {
        $data = [
            'values' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
        ];
        return view('table_alternative_row_bg', $data);
    }

    public function credit_card() {
        helper('html');

        $monthArray = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $yearArray = range(2023, 2063);

        $data = [
            'monthArray' => $monthArray,
            'yearArray' => $yearArray
        ];
        return view('credit_card', $data);
    }

    public function credit_store() {
        $postRequestData = $this->request->getPost(['credit-card', 'months', 'years']);
        $creditModel = model(Creditinfo::class);
        $creditModel->save([
            'credit-info' => serialize($postRequestData)
        ]);
        return view('/success_credit');
    }
}
