<?php
class Product extends Controller
{

    private $products;
    private $categories;

    function __construct()
    {
        $this->products = $this->model('ProductModel');
        $this->categories = $this->model('CategoryModel');
    }
    function index()
    {
        $keyword = '';
        $cate_id = 0;

        if (isset($_POST['search']) && ($_POST['search'] != '')) {
            $keyword = $_POST['keyword_product'];
            $_POST['search'] = '';

            if (!empty($_POST['category']))
                $cate_id = $_POST['category'];
        }

        $products = $this->products->getAll($keyword, 0, (int)$cate_id, 0, 1000);
        $categories = $this->categories->getAll();

        return $this->view('admin', [
            'page' => 'product/list',
            'products' => $products,
            'categories' => $categories,
            'js' => ['deletedata', 'search'],
            'title' => 'Sản phẩm'
        ]);
    }

    //Xu li return ra du lieu ra view de render giao dien trang san pham
    function show_product()
    {
        $keyword = '';
        $cate = 0;
        $min = 0;
        $max = 99999999;

        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            // $cate = 0;
        } else if (isset($_GET['cate'])) {
            $cate = $_GET['cate'];
            // $keyword = '';
        }

        if (isset($_GET['min'])) {
            $min = $_GET['min'];
        }

        if (isset($_GET['max'])) {
            $max = $_GET['max'];
        }

        //Tinh tong cac ban ghi
        $total_product = $this->products->countPro($keyword, 0, $cate, $min, $max);
        $limit = 8;
        //Lay trang hien tai
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

        $start = ($current_page - 1) * $limit;
        //Tong so trang
        $total_page = ceil($total_product / $limit);

        $products = $this->products->getAll($keyword, 0, $cate, $start, $limit, $min, $max);
        $categories = $this->categories->getAllCl();
        $productNew = [];
        foreach ($products as $item) {
            $item['detail_img'] = $this->products->getProImg($item['id'])['image'];
            array_push($productNew, $item);
        }
        // show_array($keyword);
        return $this->view('client', [
            'page' => 'product',
            'css' => ['base', 'main', 'responsive', 'product'],
            'js' => ['main', 'ajax'],
            'title' => 'Sản phẩm',
            'products' => $productNew,
            'categories' => $categories,
            'total_page' => $total_page,
            'current_page' => $current_page,
            'cate' => $cate
        ]);
    }

    // Return ra du lieu de render giao dien trang them san pham
    function add_product()
    {
        $msg = '';
        $type = '';

        $categories = $this->categories->getAll();

        if (isset($_POST['add_product']) && ($_POST['add_product'])) {
            $image = $this->processImg($_FILES['product']['name'], $_FILES['product']['tmp_name']);
            $name = $_POST['productname'];
            $price = $_POST['price'];
            $promotion = $_POST['promotion'];
            $quantity = $_POST['quantity'];

            $category = $_POST['category'];
            $desc = $_POST['description'];
            $detail_img = $_FILES['detail_image'];

            $create_at = date('Y-m-d H:i:s');
            $image_array = array();

            for ($i = 0; $i < count($detail_img['name']); $i++) {
                $img = $this->processImg($detail_img['name'][$i], $detail_img['tmp_name'][$i]);
                array_push($image_array, $img);
            }

            $idProduct = $this->products->insertPro($name, $image, $category, $price, $promotion, $quantity, $desc, $create_at);

            if (!empty($image_array) && $image_array[0] != '') {
                foreach ($image_array as $name)
                    $this->products->addImageProduct($idProduct, $name, $create_at);
            }

            if ($idProduct) {
                $type = 'success';
                $msg = 'Thêm sản phẩm thành công!';
                $_SESSION['msg'] = $msg;
                header('Location: ' . _WEB_ROOT_PATH . '/product/list_product');
            } else {
                $type = 'danger';
                $msg = 'Lối hệ thống!';
            }

            unset($_POST['add_product']);
        }
        return $this->view('admin', [
            'page' => 'product/add',
            'title' => 'Thêm sản phẩm',
            'categories' => $categories,
            'msg' => $msg,
            'type' => $type,
            'title' => 'Sản phẩm',
            'js' => ['uploadImg']
        ]);
    }

    // Return re du lieu de render ra giao dien trang cap nhat san pham
    function update_product($id)
    {
        $msg = [];
        $type = [];

        $product = $this->products->SelectProduct($id);
        $productImg = $this->products->SelectProductImg($id);
        $categories = $this->categories->getAll();

        if (isset($_POST['update_product']) && ($_POST['update_product'])) {
            $image = "";
            $updated_at = date('Y-m-d H:i:s');
            $image_array = array();

            $name = $_POST['productname'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $desc = $_POST['description'];
            $promotion = $_POST['promotion'];
            $quantity = $_POST['quantity'];

            $detail_img = $_FILES['detail_image'];

            if (!empty($detail_img))
                for ($i = 0; $i < count($detail_img['name']); $i++) {
                    $img = $this->processImg($detail_img['name'][$i], $detail_img['tmp_name'][$i]);
                    array_push($image_array, $img);
                }

            if (isset($_FILES['product']['name']))
                $image = $this->processImg($_FILES['product']['name'], $_FILES['product']['tmp_name']);

            $status = $this->products->updateProduct($id, $name, $image, $category, $price, $promotion, $quantity, $desc, $updated_at);

            if (count($image_array) > 0) {
                $this->products->deleteImgPro($id);
                foreach ($image_array as $name) {
                    $this->products->addImageProduct($id, $name, $updated_at);
                }
            }

            if ($status) {
                $type = 'success';
                $msg = 'Cập nhật sản phẩm thành công';
                $_SESSION['msg'] = $msg;
                header('Location: ' . _WEB_ROOT_PATH . '/product/list_product');
            } else {
                $type = 'danger';
                $msg = 'Lối hệ thống!';
            }

            unset($_POST['update_product']);
        }

        return $this->view('admin', [
            'page' => 'product/update',
            'product' => $product,
            'categories' => $categories,
            'productImg' => $productImg,
            'msg' => $msg,
            'type' => $type,
            'title' => 'Cập nhật sản phẩm',
            'js' => ['uploadImg']
        ]);
    }

    // Xu li xoa  san pham
    function delete_product($id)
    {
        $this->products->deleteImgPro($id);
        $status = $this->products->deletePro($id);
        if ($status) echo -1;
        else echo -2;
    }



    function processImg($filesName, $tmpName)
    {
        if (isset($filesName) && !empty($filesName)) {
            $date = new DateTimeImmutable();
            $fileNameArr = explode(".", $filesName);
            $name = $date->getTimestamp() . rand();
            $target_file = _UPLOAD_PATH . '/product/' .  basename($name . "." . $fileNameArr[1]);

            if (move_uploaded_file($tmpName, $target_file)) {
                return $name . "." . $fileNameArr[1];
            }
        }
    }
}
