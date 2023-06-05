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

    public function creditView() {
        $creditModel = model(Creditinfo::class);
        $creditData = $creditModel->getAllCreditInfo();
        $data = [
            'credit-info' => unserialize($creditData['credit-info'])
        ];
        return view('creditView', $data);
    }

    public function credit_card() {
        helper('html');

        $monthArray = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $yearArray = range(2023, 2063);

        $data = [
            'title' => "Add Credit Card",
            'monthArray' => $monthArray,
            'yearArray' => $yearArray
        ];
        return (View('templates/header', $data) . View('credit_card') . View('templates/footer'));
    }

    public function credit_store() {
        $postRequestData = $this->request->getPost(['credit-card', 'months', 'years']);
        $creditModel = model(Creditinfo::class);
        $creditModel->save([
            'credit-info' => serialize($postRequestData)
        ]);
        return view('/success_credit');
    }

    public function toto_bet_slip() {
        $data = ['title' => "Toto Bet Slip"];
        return (View('templates/header', $data) . View('toto/bet_slip') . View('templates/footer'));
    }

    public function toto_result() {
        // Randomly generate 


        $data = ['title' => "Toto Results"];
        return (View('templates/header', $data) . View('toto/results') . View('templates/footer'));
    }
}
