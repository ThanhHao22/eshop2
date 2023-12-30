<a class="px-4 py-2 rounded-lg  btn btn-primary mb-4" href="<?= _WEB_ROOT_PATH . '/user/add_user' ?>">
    Thêm người dùng
</a>
<div class="mb-3">
    <form class="form_user form-inline " action="" method="POST">
        <div class="">
            <select name="group" id="groupuser" class="custom-select select-group" required>
                <option>Chọn....</option>
                <?php
                foreach ($data['groups'] as $group) {
                ?>
                    <option value="<?php echo $group['id'] ?>"><?php echo $group['name'] ?></option>
                <?php
                }
                ?>
            </select>
            <input type="text" class="input_user form-control" id="exampleFormControlInput1" placeholder="Tìm kiếm" name="keyword_user">
            <input type="hidden" name="search" value="search">
            <button type="submit" class="btn btn-primary px-4">
                <i class="fas fa-search "></i>
            </button>
        </div>
    </form>
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
if (isset($_SESSION['msg']) && $_SESSION['msg'] != '') {
?>
    <div id="toast-success" class="alert alert-success" role="alert">
        <?php echo $_SESSION['msg'] ?>
    </div>
<?php
    $_SESSION['msg'] = '';
}
?>
<div class="text-center d-flex justify-content-center">
    <div class="loader"></div>
</div>
<table class="table table_user table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col">Ảnh đại diện</th>
            <th scope="col">Nhóm người dùng</th>
            <th scope="col">Thông tin</th>
            <th scope="col">Created at</th>
            <th class="text-center" scope="col">Sửa</th>
            <th class="text-center" scope="col">Xoá</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($data['users'])) {
            foreach ($data['users'] as $user) {
        ?>
                <tr>
                    <td class="" scope="row"><?php echo $user['id'] ?></td>
                    <td class=""><?php echo $user['name'] ?></td>
                    <td class=""><img src="<?= _AVATAR_PATH . $user['avatar'] ?>" class="img-thumbnail" width="100px"></td>
                    <td class=""><?php echo getNameUserGroup($user['gr_id']) ?></td>
                    <td class=""><?php echo '<p>' . $user['phone'] . '</p>' . '<p>' . $user['email'] . '</p>' . '<p>' . $user['address'] . '</p>' ?></td>
                    <td class=""><?php echo $user['created_at'] ?></td>
                    <td class="text-center"><a class="btn btn-info" href="<?php echo _WEB_ROOT_PATH . '/user/update_user/' . $user['id'] ?>"><i class="far fa-edit"></i></a></td>
                    <td class=" text-center"><a class="handle_delete btn btn-danger" href="<?php echo _WEB_ROOT_PATH . '/user/delete_user/' . $user['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="8" class="text-center">Không có dữ liệu...</td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>