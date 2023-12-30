<?php
class Cart extends Controller
{
    // Return ra du lieu de render giao dien 
    function index()
    {
        return $this->view("client", [
            'page' => 'cart',
            'title' => 'Giỏ hàng',
            'css' => ['base', 'main', 'responsive'],
            'js' => ['main', 'ajax']
        ]);
    }
}
