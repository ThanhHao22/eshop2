<div class="wp-content">
	<div class="breadcrumb_content">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav>
						<ol class="breadcrumb-list breadcrumb">
							<li class="breadcrumb-item"><a href="<?= _WEB_ROOT_PATH . '/' ?>">Trang chủ</a></li>
							<li class="breadcrumb-item active" aria-current="page">Thông tin cá nhân</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div class="container rounded bg-white mt-2 mb-5">
	<?php
	if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) {
	?>
		<div id="message" class="alert alert-success mt-3" role="alert">
			<?= $_SESSION['msg'] ?>
		</div>
	<?php
		$_SESSION['msg'] = '';
	}
	?>
		<form action="<?= _WEB_ROOT_PATH . '/user/update_profile' ?>" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-4" data-aos="fade-right">
					<div class="d-flex flex-column align-items-center text-center p-3"><img class="avatar rounded-pill" width="300px" src="
				<?php if (isset($data['user']['avatar'])) {
					echo _AVATAR_PATH . $data['user']['avatar'];
				} else echo 'https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg'; ?>">
					</div>
					<div class="col text-center">
						<label for="avatar">Cập nhật ảnh đại diện</label>
						<input type="file" name="avatar" id="avatar" class="file-upload">
					</div>
				</div>
				<div class="col-8" data-aos="fade-left">
					<div class="p-3 py-5">
						<div class="d-flex justify-content-between align-items-center mb-3">
							<h1 class="text-right">HỒ SƠ</h1>
						</div>
						<div class="form-row mt-2">
							<div class="col">
								<label class="labels">Tên</label>
								<input name="name" type="text" class="form-control" placeholder="first name" value="<?= $data['user']['name'] ?? '' ?>">
							</div>
							<div class="col"><label class="labels">Số điện thoại</label><input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="<?= $_SESSION['user']['phone'] ?? '' ?>"></div>
						</div>
						<div class="row mt-3">
							<div class="col mb-3"><label class="labels">Email</label><input type="text" name="email" class="form-control" placeholder="" value="<?= $data['user']['email'] ?? '' ?>"></div>
						</div>
						<div class=""><label class="labels">Địa chỉ</label><input name="address" type="text" class="form-control" placeholder="Nhập địa chỉ" value="<?= $data['user']['address'] ?? '' ?>"></div>
						<div class="mt-3"><label class="labels">Mô tả</label><input name="desc" type="text" class="form-control" placeholder="Mô tả ngắn" value="<?= $data['user']['description'] ?? '' ?>"></div>
						<?php
							if($data['user']['gr_id'] == 2){
						?>
						<div class="row mt-3">
							<div class="col mb-3"><label class="labels">Mật khẩu</label><input type="password" name="password" class="form-control" placeholder=""></div>
						</div>
						<?php } ?>
						<input type="hidden" name="id" value="<?= $data['user']['id'] ?? '' ?>">

						<div class="mt-5">
							<button class="btn btn-primary p-3" type="submit" name="update_profile" value="update_profile">Cập nhật hồ sơ</button>
						</div>
					</div>
				</div>

			</div>
		</form>
	</div>
</div>