<h3 class="text-center text-uppercase mt-4 text-danger">thông tin đơn hàng eShop</h3>
		<div class="row">
			<div class="d-flex flex-column col-6">
				<h3 class="font-weight-bold m-3">Thông tin khách hàng</h3>
				<hr>
				<div>
					<p>Họ và tên: <span class="font-weight-bold"><?= $data['bill']['fullname'] ?></span></p>
					<p>Số điện thoại: <span class="font-weight-bold"><?= $data['bill']['phone'] ?></span> </p>
				</div>
				<p>Email: <span class="font-weight-bold"><?= $data['bill']['email'] ?></span> </p>
				<p>Địa chỉ nhận hàng: <span class="font-weight-bold"><?= $data['bill']['address'] ?></span> </p>
				<p>Ghi chú: <?= $data['bill']['note'] ?: '...' ?></p>


			</div>
			<div class="col-6">
				<h3 class="font-weight-bold m-3">Thông tin đơn hàng</h3>
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
					<div class="col text-right">
						<span>Tổng giá:</span>
						<span style="font-size: 24px" class=" font-weight-bold">
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