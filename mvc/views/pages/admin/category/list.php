<div class="mb-3">
    <a class="px-4 py-2 rounded-lg  btn btn-primary mb-4" href="<?php echo _WEB_ROOT_PATH . '/category/add_category' ?>">Thêm danh mục</a>
    <div class="form-inline">
        <form class="form_category" action="" method="POST">
            <div class="">
                <input type="text" class="input_category form-control py-2  form-control " id="exampleFormControlInput1" placeholder="Tìm kiếm" name="keyword_category">
                <input type="hidden" name="search" value="Tìm kiếm">
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
<table class="table table-striped table_category">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col">Thời gian</th>
            <th class="text-center" scope="col">Sửa</th>
            <th class="text-center" scope="col">Xoá</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($data['categories'])) {
            foreach ($data['categories'] as $category) {
        ?>
                <tr>
                    <th scope="row"><?php echo $category['id'] ?></th>
                    <td><?php echo $category['name'] ?></td>
                    <td><?php echo $category['created_at'] ?></td>
                    <td class="text-center"><a class="btn btn-info" href="<?php echo _WEB_ROOT_PATH . '/category/update_category/' . $category['id'] ?>"><i class="far fa-edit"></i></a></td>
                    <td class="text-center"><a class="btn btn-danger handle_delete" href="<?php echo _WEB_ROOT_PATH . '/category/delete_category/' . $category['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
        <?php
            }
        } else {
            echo '<tr>
            <td colspan="5" class="text-center text-[#000] text-lg">
                Không có dữ liệu
            </td>
        </tr>';
        }
        ?>
    </tbody>
</table>