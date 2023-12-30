<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light fixed-top">
                    <a href="<?= _WEB_ROOT_PATH . "/" ?>" class="navbar-brand">
                        
                    </a>
                    <form action="#" class="form-search-respon form-inline ml-lg-auto">
                        <input type="text" name="search" id="search" placeholder="Nhập từ khoá..." class="search-input form-control rounded-pill">
                        <button class="btn btn-search m-sm-2"><i class="search-icon fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <?php
                    $totalLenght = 0;
                    $sum = 0;
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $cart) {
                            $totalLenght += (int)$cart['number'];
                            $sum += (int)$cart['total'];
                        }
                    }

                    ?>
                    <div class="cart-box ml-auto d-lg-none m-2">
                        <a class="cart-link btn">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="cart-notice"><?= $totalLenght ?></span>
                        </a>
                        <div class="mini_cart">
                            <div class="mini_cart_items">
                                <ul class="cart_list">
                                    <?php
                                    $checkout = 'd-none';
                                    $empty = '';
                                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $cart) { ?>
                                            <li class="cart_item" data-id="<?php echo $cart['id'] ?>">
                                                <div class="cart_img_section">
                                                    <a href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $cart['id'] ?>" class="cart_img_link">
                                                        <img src="<?= _IMG_PRODUCT_PATH . $cart['image'] ?>" alt="cart_img_1" class="cart_img">
                                                    </a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $cart['id'] ?>" class="cart_title"><?= $cart['name'] ?></a>
                                                    <span class="mini_cart_qty"><?= $cart['number'] ?> X <span class="mini_cart_price"><?= format_money($cart['price']) ?></span></span>
                                                </div>

                                                <div class="cart_remove">
                                                    <span data-id="<?= $cart['id'] ?>" data-url="<?= _WEB_ROOT_PATH . '/ajax' ?>" class="cart_remove_link">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </span>
                                                </div>
                                            </li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                                <div class="checkout_abc <?php echo $checkout ?>">
                                    <p class="cart_total">
                                        <span class="cart_total_text">Total:
                                            <span class="cart_total_price"><?= format_money($sum) ?></span>
                                        </span>
                                    </p>
                                    <p class="view_cart cart_button">
                                        <a href="<?= _WEB_ROOT_PATH . 'cart' ?>">Xem giỏ hàng</a>
                                    </p>
                                    <p class="checkout cart_button">
                                        <a href="<?= _WEB_ROOT_PATH . '/checkout/' ?>">Thanh toán</a>
                                    </p>
                                </div>
                            </div>

                            <div class="<?php echo $empty ?> mini_cart_empty">
                                <h5>Giỏ hàng của bạn hiện đang trống.</h5>
                            </div>
                        </div>
                    </div>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#main-nav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="main-nav" class="navbar-collapse collapse">
                        <ul class="navbar-nav">
                            <li class="nav-item ">
                                <a href="<?= _WEB_ROOT_PATH . '/' ?>" class="nav-link ml-4 <?php if ($data['page'] === 'home') echo "active" ?>">Trang chủ</a>
                            </li>
                            <li class="nav-item ">
                                <a href="<?= _WEB_ROOT_PATH . '/product/show_product' ?>" class="nav-link ml-4 <?php if ($data['page'] === 'product') echo "active" ?>">Sản phẩm</a>
                            </li>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link ml-4 dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    Tài khoản
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right mb-2">
                                    <?php
                                    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                                    ?>
                                        <?php
                                        if ($_SESSION['user']['gr_id'] == 1) {
                                        ?>
                                            <li><a class="dropdown-item" href="<?= _WEB_ROOT_PATH . '/admin' ?>">Admin</a></li>
                                        <?php
                                        }
                                        ?>
                                        <li><a class="dropdown-item" href="<?= _WEB_ROOT_PATH . '/user/profile' ?>"><?= $_SESSION['user']['name'] ?></a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item <?php if ($data['page'] === 'register') echo "active" ?>" href="<?= _WEB_ROOT_PATH . '/Auth/logout' ?>">Đăng xuất</a></li>
                                    <?php
                                    } else {
                                    ?>
                                        <li><a class="dropdown-item <?php if ($data['page'] === 'login') echo "active" ?>" href="<?= _WEB_ROOT_PATH . '/Auth/login' ?>">Đăng nhập</a></li>
                                        <li><a class="dropdown-item <?php if ($data['page'] === 'register') echo "active" ?>" href="<?= _WEB_ROOT_PATH . '/Auth/register' ?>">Đăng ký</a></li>
                                    <?php
                                    }
                                    ?>

                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link ml-4 text-warning" > HOTLINE: 0383825812</a>
                            </li>
                        </ul>
                        <form action="<?= _WEB_ROOT_PATH . '/product/show_product' ?>" method="GET" class="form-search form-inline ml-lg-auto">
                            <input type="text" name="search" id="search" placeholder="Tìm kiếm..." class="search-input form-control bg-warning">
                            <button type="submit" class="btn btn-search"><i class="search-icon fa-solid fa-magnifying-glass"></i></button>
                        </form>
                        <div class="cart-box d-none d-lg-block m-2">
                            <a class="cart-link btn">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span class="cart-notice"><?= $totalLenght ?></span>
                            </a>
                            <div class="mini_cart">
                                <div class="mini_cart_items">
                                    <ul class="cart_list">
                                        <?php
                                        $checkout = 'd-none';
                                        $empty = '';
                                        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                            $checkout = '';
                                            $empty = 'd-none';
                                        ?>
                                            <?php
                                            foreach ($_SESSION['cart'] as $cart) { ?>
                                                <li class="cart_item" data-id="<?= $cart['id'] ?>">
                                                    <div class="cart_img_section">
                                                        <a href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $cart['id'] ?>" class="cart_img_link">
                                                            <img src="<?= _IMG_PRODUCT_PATH . $cart['image'] ?>" alt="cart_img_1" class="cart_img">
                                                        </a>
                                                    </div>
                                                    <div class="cart_info">
                                                        <a href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $cart['id'] ?>" class="cart_title"><?= $cart['name'] ?></a>
                                                        <span class="mini_cart_qty"><?= $cart['number'] ?> X <span class="mini_cart_price"><?= format_money($cart['price']) ?></span></span>
                                                    </div>

                                                    <div class="cart_remove">
                                                        <span data-id="<?= $cart['id'] ?>" data-url="<?= _WEB_ROOT_PATH . '/ajax' ?>" class="cart_remove_link">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </span>
                                                    </div>
                                                </li>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                    <div class="checkout_abc <?php echo  $checkout ?>">
                                        <div class="cart_total">
                                            <span class="cart_total_text">Tổng cộng:
                                                <span class="cart_total_price"><?= format_money($sum) ?></span>
                                            </span>
                                        </div>

                                        <div class="view_cart cart_button">
                                            <a href="<?= _WEB_ROOT_PATH . '/cart' ?>">Xem giỏ hàng</a>
                                        </div>
                                        <div class="checkout cart_button">
                                            <a href="<?= _WEB_ROOT_PATH . '/checkout' ?>">Thanh toán</a>
                                        </div>

                                    </div>
                                </div>
                                <div class="<?php echo $empty ?> mini_cart_empty">
                                    <h5>Giỏ hàng của bạn hiện đang trống.</h5>
                                </div>
                                <?php
                                if (!empty($_SESSION['user']['gr_id'])) {
                                ?>
                                    <div class="view_cart cart_button" style="padding-top: 25px;">
                                        <a href="<?= _WEB_ROOT_PATH . '/bill' ?>">Đơn hàng của tôi</a>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</header>


<style>

.header {
  background-color: while; /* Màu nền đen */
  height: 15px;
  color: white; 

}
/*   <div class="container-fluid">
        <div class="row"> */
.navbar{

background-color: #ffffe0;
  color: white;
  height: 70px;
  font-size: 18px;
}



</style>