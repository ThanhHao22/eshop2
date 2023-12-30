<?php
class Product_detail extends Controller
{

    private $products;
    private $categories;
    function __construct()
    {
        $this->products = $this->model('ProductModel');
        $this->categories = $this->model('CategoryModel');
    }
    // Return du lieu ra view de render giao dien trang chi tiet san pham
    function product($id)
    {
        $product = $this->products->SelectProduct($id);
        $image_product = $this->products->SelectProductImg($id);
        $related_products = $this->products->getProInCate($id, $product['cate_id']);
        // show_array($related_product);
        return $this->view("client", [
            'page' => 'product_detail',
            'css' => ['base', 'main', 'responsive', 'product_detail'],
            'js' => ['main', 'ajax'],
            'title' => 'Chi tiết sản phẩm',
            'product' => $product,
            'image_product' => $image_product,
            'related_products' => $related_products
        ]);
    }
}
