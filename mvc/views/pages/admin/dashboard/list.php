<div class="container-fluid">
    <div class="row">
        <a href="<?= _WEB_ROOT_PATH . '/user' ?>" class="col-lg-3 col-sm-6 col-12 col-md-4 text-center m-3 py-5 rounded-lg bg-success">
            <i class="fas fa-users display-3 pb-3 font-weight-bold"></i>

            <h5 class="display-5 m-0"><?= $data['countUser'] ?> NGƯỜI DÙNG</h5>
        </a>
        <a href="<?= _WEB_ROOT_PATH . '/category' ?>" class="col-lg-3 col-sm-6 col-12 col-md-4 text-center m-3 py-5 rounded-lg bg-info">
            <i class="fab fa-elementor font-weight-bold display-3 pd-3"></i>
            <h5 class="display-5 m-0"><?= $data['countCate'] ?> DANH MỤC</h5>
        </a>
        <a href="<?= _WEB_ROOT_PATH . '/product' ?>" class="col-lg-3 col-sm-6 col-12 col-md-4 text-center m-3 py-5 rounded-lg bg-secondary">
            <i class=" fa-solid fa-boxes-stacked"></i>
            <i class="fas fa-boxes display-3 pb-3 font-weight-bold"></i>
            <h5 class="display-5 m-0"><?= $data['countPro'] ?> SẢN PHẨM</h5>
        </a>
        <a href="<?= _WEB_ROOT_PATH . '/bill/show_bill' ?>" class="col-lg-3 col-sm-6 col-12 col-md-4 text-center m-3 py-5 rounded-lg bg-danger">
            <i class="fas fa-tasks nav-icon font-weight-bold display-3 pb-3"></i>
            <h5 class="display-5 m-0"><?= $data['countBill'] ?> ĐƠN HÀNG</h5>
        </a>
        <a href="<?= _WEB_ROOT_PATH . '/bill/show_bill' ?>" class="col-lg-3 col-sm-6 col-12 col-md-4 text-center m-3 py-5 rounded-lg bg-warning">
            <i class="fas fa-hand-holding-usd nav-icon font-weight-bold display-3 pb-3"></i>
            <h5 class="display-5 m-0">TỔNG DOANH THU: <?= format_money($data['sum_bill']) ?> </h5>
        </a>
        <a href="<?= _WEB_ROOT_PATH . '/bill/show_bill' ?>" class="col-lg-3 col-sm-6 col-12 col-md-4 text-center m-3 py-5 rounded-lg bg-primary">
            <i class="fas fa-medal nav-icon font-weight-bold display-3 pb-3"></i>
            <h3>Best Seller</h3>
            <h5 class="display-5 m-0"><?= $data['bestSeller']['name_pro'] ?>: <?= $data['bestSeller']['tong'] ?> </h5>
        </a>
    </div>
</div>