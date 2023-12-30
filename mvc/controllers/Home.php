<?php
class Home extends Controller
{

    private $product;
    public function __construct()
    {
        $this->product = $this->model('ProductModel');
    }

    // return du lieu ra view de render giao dien trang chu
    function index()
    {
        $new_product = $this->product->getNewArrivals();
        $trend_products = $this->product->getTrendPro();
        // show_array($_SESSION );
        $this->view("client", [
            'title' => 'Trang chủ',
            'page' => 'home',
            'new_product' => $new_product,
            'trend_products' => $trend_products,
            'css' => ['base', 'main', 'responsive'],
            'js' => ['main', 'ajax']
        ]);
    }
}
