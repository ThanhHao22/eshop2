<div class="wp-content">
	<div class="container-fluid">
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a class="primary_color" href="<?= _WEB_ROOT_PATH . '/home' ?>">Trang chủ</a></li>
				<li class="breadcrumb-item active"><?= $data['title'] ?></li>
			</ol>
		</nav>


		<div class="row">
			<div class="col-3">
				<div class=" p-4">
					<span class="font-weight-bold text-center">Status</span>
				</div>
				<ul class="border border-info rounded-lg p-4 primary_color list-unstyled">
					<li><a class="text-body text-decoration-none <?php if (!isset($_GET['type'])) echo "font-weight-bold" ?>" href="<?= _WEB_ROOT_PATH . '/bill' ?>">All</a> </li>

					<li class="align-items-center">
						<a class="text-body text-decoration-none
					<?php
					if (isset($_GET['type']) && $_GET['type'] == 0) {
						echo "font-weight-bold";
					}
					?>" href="<?= _WEB_ROOT_PATH . '/bill?type=0' ?>">Processing</a>
					</li>

					<li class="bill-name-type  align-items-center">
						<a class="text-body text-decoration-none <?php
											if (isset($_GET['type']) && $_GET['type'] == 1) {
												echo "font-weight-bold";
											}
											?>" href="<?= _WEB_ROOT_PATH . '/bill?type=1' ?>">In transit</a>
					</li>

					<li class="bill-name-type  align-items-center 
				">

						<a class="text-body text-decoration-none <?php
											if (isset($_GET['type']) && $_GET['type'] == 2) {
												echo "font-weight-bold";
											}
											?>" href="<?= _WEB_ROOT_PATH . '/bill?type=2' ?>">Delivered</a>
					</li>
				</ul>
			</div>
			<div class="col-9">
				<div class="intro-heading p-4 pt-0">
					<span class="font-weight-bold text-center"><?= $data['title'] ?></span>
				</div>

				<?php
				if (isset($data['getAllBill']) && !empty($data['getAllBill'])) {
					foreach ($data['getAllBill'] as $bill) {
						$sum = 0;
						// show_array($bill);
				?>
						<div class="bill-section mb-5 rounded-lg border border-info">
							<div class="d-flex justify-content-end p-3">
								<span class="fs-3"><?php if (getStatusBill($bill['status'])) ?></span>
							</div>

							<ul class=" bill-list-pro">
								<?php

								foreach ($bill['detail'] as $item) {
									$sum += $item['total'];
								?>
									<a class="text-decoration-none text-body" href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $item['id_pro']  ?>">
										<li class="row mx-3 mt-3 p-3 border bg-light rounded-lg">
											<!-- <td><?= $item['id'] ?></td> -->
											<div class="col">
												<img width="100px" class="img-thumbnail" src="<?= _IMG_PRODUCT_PATH . $item['image'] ?>" alt="">
											</div>
											<div class="col">
												<b class="primary_color"><?= $item['name_pro'] ?></b>
												<span class="d-block">x <?= $item['number'] ?></span>
											</div>
											<div class="col-2 d-flex justify-content-end ">
												<?= format_money($item['price']) ?>
											</div>
											<div>
											</div>
											<!-- <div class="text-color-main"><?= format_money($item['total']) ?></div> -->
										</li>
									</a>

								<?php
								}
								?>
							</ul>
							<div class="d-flex justify-content-between  p-3  bill-total">
								<div class="d-flex">
								<a href="<?= _WEB_ROOT_PATH . '/bill/bill_detail/' . $bill['id']  ?>">
									<button class="p-3 ml-5 btn bg-light">Chi tiết đơn hàng</button>

								</a>
								<?php 
									if($bill['status'] == 0){
										if(isset($_GET['type'])){
								?>
								<a href="<?= _WEB_ROOT_PATH.'/bill/delete_bill/'.$bill['id'].'?type='.$_GET['type'] ?>">
									<button class="p-3 ml-5 btn bg-light">Hủy đơn hàng</button>
								</a>
								<?php 
										}else{
											?>
											<a href="<?= _WEB_ROOT_PATH.'/bill/delete_bill/'.$bill['id'] ?>">
									<button class="p-3 ml-5 btn bg-light">Hủy đơn hàng</button>
								</a>
											<?php
										}
									}
								?>
									<?php 
									if($bill['status']==2){ ?>
										<a href="<?= _WEB_ROOT_PATH.'/bill/rate_bill/'.$bill['id'] ?>">
										<button class="p-3 ml-2 btn bg-light">Đánh giá</button>
										</a>
										<?php
									}
									?>
								</div>
								
								<div>
									<b class="text-danger">SubTotal: </b>
									<span class="text-color-main fw-bold fs-2"><?= format_money($sum) ?></span>
								</div>
							</div>
						</div>
					<?php
					}
				} else {
					?>
					<p class=" ps-5">No Order!</p>
				<?php
				}
				?>
			</div>

		</div>


	</div>
</div>