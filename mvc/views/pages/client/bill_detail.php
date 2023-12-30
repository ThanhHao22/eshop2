<div class="wp-content">
	<div class="container-fluid">


		<h1 class="text-center text-uppercase mt-4">thông tin đơn hàng</h1>
		<h2 class="text-center text-uppercase ">Cảm ơn bạn đã tin tưởng và đặt hàng tại Eshop2</h2>
		<div class="row">
			<div class="d-flex flex-column col-6">
				<div class="display-4 m-3">Thông tin khách hàng</div>
				<hr>
				<div>
					<p>Họ và tên: <span class="font-weight-bold"><?= $data['bill']['fullname'] ?></span></p>
					<p>Số điện thoại: <span class="font-weight-bold"><?= $data['bill']['phone'] ?></span> </p>
				</div>
				<p>Email: <span class="font-weight-bold"><?= $data['bill']['email'] ?></span> </p>
				<p>Địa chỉ nhận hàng: <span class="font-weight-bold"><?= $data['bill']['address'] ?></span> </p>
				<p>Ghi chú: <?= $data['bill']['note'] ?: '...' ?></p>

				<h1 class="mt-5">
					<a class="btn bg-light" href="<?= _WEB_ROOT_PATH . '/bill' ?>">ĐƠN HÀNG CỦA TÔI</a>

				</h1>

			</div>
			<div class="col-6">
				<div class="display-4 m-3">Thông tin đơn hàng</div>
				<hr>
				<?php
				if (isset($data['bill']['bill_detail']) && $data['bill']['bill_detail']) {

					foreach ($data['bill']['bill_detail'] as $item) {
				?>
						<li class="row checkout-item-pro">
							<p class="col-2 m-0"><img width="60px" src="<?= _IMG_PRODUCT_PATH . $item['image'] ?>" alt=""></p>
							<div class="col-7">

								<p class="checkout-item-name"><?= $item['name_pro'] ?></p>
								<strong> x <?= $item['number'] ?></strong>
							</div>
							<p class="m-0 col-3 d-flex justify-content-end align-items-center  font-weight-bold"><?= format_money($item['total']) ?></p>
						</li>
				<?php
					}
				}
				?>
				<hr>
				<div class="row mt-3">
					<div class="col">
						Thời gian tạo: <span class=""><?= $data['bill']['created_at'] ?></span>
					</div>
					<div class="col fs-2 text-end ">
						<span>Tổng giá:</span>
						<span class=" font-weight-bold">
							<?php if ($data['bill']) {
								echo format_money($data['bill']['total']);
							}
							?>
						</span>
					</div>
				</div>
				<div class="row my-3">
					<div class="col">Trạng thái đơn hàng: <span class="font-weight-bold"><?= getStatusBill($data['bill']['status']) ?></div>
					<div class="col text-end">
						<p>Phương thức thanh toán: <span class="font-weight-bold"><?= $data['bill']['method'] ?></span></p>
					</div>

				</div>
				


			</div>

		</div>


	</div>
</div>