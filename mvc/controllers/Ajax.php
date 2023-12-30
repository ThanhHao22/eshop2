<?php
class Ajax extends Controller
{
    private $product;
    function __construct()
    {
        $this->product = $this->model('ProductModel');
    }

    //Them san pham vao gio hang
    function addCart()
    {
        $id = $_POST['id'];
        $number = $_POST['number'];

        print_r($this->product->addProductCart($id, $number));
    }

    //Xoa san pham ra khoi gio hang
    function removeCart()
    {
        $id = $_POST['id'];
        print_r($this->product->removeItem($id));
    }
}
