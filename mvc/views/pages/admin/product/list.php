<div class="mb-3">
    <a class="px-4 py-2 rounded-lg  btn btn-primary mb-4" href="<?php echo _WEB_ROOT_PATH . '/product/add_product' ?>">Thêm sản phẩm</a>
    <div class="">
        <form class="form-inline form_product" action="" method="POST">
            <div class="">
                <select name="category" id="category" class="custom-select select-category" required>
                    <option>Chọn....</option>
                    <?php
                    foreach ($data['categories'] as $category) {
                    ?>
                        <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>

                <input type="text" class="input_product form-control" id="exampleFormControlInput1" placeholder="Tìm kiếm" name="keyword_product">
                <input type="hidden" name="search" value="search">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="fas fa-search"></i>
                </button>

            </div>
        </form>
    </div>
</div>
<style>
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 50px;
        height: 50px;
        -webkit-animation: spin 2s linear infinite;
        /* Safari */
        animation: spin 0.7s linear infinite;
        display: none;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<?php
if (!empty($_SESSION['msg'])) {
    echo '<div class="alert alert-success" id="toast-success">' . $_SESSION['msg'] . '</div>';
    $_SESSION['msg'] = '';
}
?>
<div class="text-center d-flex justify-content-center">
    <div class="loader"></div>
</div>
<table class="table table-striped table_product">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Danh mục</th>
            <th scope="col">Giá</th>
            <th scope="col">Khuyến mãi</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Thời gian tạo</th>
            <th class="text-center" scope="col">Sửa</th>
            <th class="text-center" scope="col">Xoá</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($data['products'])) {
            foreach ($data['products'] as $product) {
        ?>
                <tr>
                    <td class="" scope="row"><?php echo $product['id'] ?></td>
                    <td class=""><?php echo $product['name'] ?></td>
                    <td class=""><img style="object-fit: cover; object-position: center;" width="100px" height="100px" src="<?php echo _IMG_PRODUCT_PATH . $product['image'] ?>"></td>
                    <td class=""><?php echo getNameCate($product['cate_id'])['name'] ?></td>
                    <td class=""><?php echo $product['price'] ?></td>
                    <td class=""><?php echo $product['promotion'] ?> %</td>
                    <td class=""><?php echo $product['quantity'] ?></td>
                    <td class=""><?php echo $product['created_at'] ?></td>
                    <td class="text-center"><a class="btn btn-info" href="<?php echo _WEB_ROOT_PATH . '/product/update_product/' . $product['id'] ?>"><i class="far fa-edit"></i></a></td>
                    <td class=" text-center"><a class="btn btn-danger handle_delete" href="<?php echo _WEB_ROOT_PATH . '/product/delete_product/' . $product['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>