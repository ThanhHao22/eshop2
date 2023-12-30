<?php
class Checkout extends Controller
{

    private $bills;
    function __construct()
    {
        $this->bills = $this->model('BillModel');
    }

    // return ra du lieu de render giao dien
    function index()
    {
        if (isset($_SESSION['cart'])) {
            return $this->view("client", [
                'page' => 'checkout',
                'title' => 'Your Checkout',
                'css' => ['base', 'main', 'responsive'],
                'js' => ['main', 'ajax', 'jquery.validate', 'form_validate', 'checkout']
            ]);
        } else {
            redirectTo();
        }
    }
}
