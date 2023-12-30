<div class="mb-3">
    <form class="form_bill form-inline " action="" method="POST">
        <div class="">
            <select name="status" id="bill" class="custom-select select-status" required>
                <option selected="selected" value="-1">Lựa chọn....</option>
                <option value="0">Xác nhận</option>
                <option value="1">Đang vận chuyển</option>
                <option value="2">Đã giao hàng</option>
            </select>
            <input type="text" class="input_bill form-control" id="exampleFormControlInput1" placeholder="Tìm kiếm" name="keyword_bill">
            <input type="hidden" name="search" value="Tìm kiếm">
            <button type="submit" class="btn btn-primary px-4">
                <i class="fas fa-search "></i>
            </button>
        </div>
    </form>
    <br>
    <br>
    <form action="" class="form_bill form-inline " method="post">
    <div class="">
            From:
            <input type="date" class="input_bill form-control" id=""  name="from">
            To:
            <input type="date" class="input_bill form-control" id=""  name="to">
            <button type="submit" name="date_btn" class="btn btn-primary px-4">
                Tìm
            </button>
        </div>
    </form>
    <br>
    <?php
    if(isset($_POST['date_btn'])){
        ?>
    <h3>Chi tiết đơn hàng từ <?php echo $_POST['from']; ?> đến <?php echo $_POST['to']; ?></h3>
    <br>
    <h3>Doanh thu :<?php  if (!empty($data['getAllTotal'])) { echo $data['getAllTotal'];} ?></h3>
        <?php
    }
    ?>
    
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
<table class="table table_bill table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Thông tin khách hàng</th>
            <th scope="col">Thông tin đơn hàng</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Phương thức</th>
            <th scope="col">Thời gian tạo</th>
            <th class="text-center" scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($data['billsNew'])) {
            foreach ($data['billsNew'] as $guest) {
                // show_array($guest);
                $sum = 0;
        ?>
                <tr>
                    <td class="" scope="row"><?php echo $guest['id'] ?></td>
                    <td class="">
                        <?= $guest['fullname'] ?> <br>
                        <?= $guest['phone'] ?> <br>
                        <?= $guest['email'] ?> <br>
                        <?= $guest['address'] ?> <br>
                    </td>
                    <td class="">
                        <?php
                        // show_array($guest['detail']);
                        foreach ($guest['detail'] as $bill) {
                            $sum += $bill['total'];
                        ?>
                            <?= $bill['name_pro'] ?> x <?= $bill['number'] ?><br>

                        <?php
                        }

                        ?>
                        <?= 'Total:' . format_money($sum) ?>
                    </td>
                    <td><?= getStatusBill($guest['status']) ?></td>
                    <td><?= $guest['method'] ?></td>
                    <td><?php echo $guest['created_at'] ?></td>
                    <td class="text-center d-flex flex-wrap">

                        <a class="btn btn-primary w-100 mb-3" href="<?php echo _WEB_ROOT_PATH . '/Bill/bill_detail_admin/' . $guest['id'] ?>">Xem</a>
                        <div class="d-flex justify-content-between w-100">
                            <a class="btn btn-info <?php if ($guest['status'] >= 2) echo "disabled" ?>" href="<?php echo _WEB_ROOT_PATH . '/Bill/update_bill/' . $guest['id'] ?>"><i class="fas fa-shipping-fast"></i></a>
                            <a class="handle_delete btn btn-danger" href="<?php echo _WEB_ROOT_PATH . '/Bill/delete_bill/' . $guest['id'] ?>"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="8" class="text-center">NO DATA...</td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 75%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">ĐƠN HÀNG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row" style="font-size: 1rem;">
                <div class="d-flex flex-column col-5 bill-info-user">
                </div>

                <div class="col-7 bill-info-product">
                    <div class="checkout-heading mb-3 text-primary font-weight-bold" style="font-size: 1.6rem;">Thông tin đơn hàng</div>
                    <div class="bill-info-pro-list" style=" max-height: 40vh; overflow-y: auto;">

                    </div>
                    <div class="bill-info-bill row border-top border-primary pt-3 pr-3">

                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>