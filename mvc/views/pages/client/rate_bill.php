<div class="wp-content">
	<div class="container-fluid">
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a class="primary_color" href="<?= _WEB_ROOT_PATH . '/home' ?>">Trang chủ</a></li>
				<li class="breadcrumb-item active"><?= $data['title'] ?></li>
			</ol>
		</nav>


		<div class="row">
			<div class="col-6">
				<div class="intro-heading p-4 pt-0">
					<span class="font-weight-bold text-center"><?= $data['title'] ?></span>
				</div>

				<form action="" method="POST">
                <div class="mb-3 form-check">
                        <input type="radio" value="Tốt" class="form-check-input" name="exampleCheck1" id="exampleCheck1" checked>
                        <label class="form-check-label" for="exampleCheck1"> Tốt</label>
                        <br>
                        <input type="radio" value="Bình thường" class="form-check-input" name="exampleCheck1" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2"> Bình thường</label>
                        <br>
                        <input type="radio" value="Tệ" class="form-check-input" name="exampleCheck1" id="exampleCheck3">
                        <label class="form-check-label" for="exampleCheck3"> Tệ</label>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nhập đánh giá của bạn</label>
                        <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a review here" id="floatingTextarea2" style="height: 100px" required name="floatingTextarea2"></textarea>
                        </div>
                    </div>
                    <button type="submit" name="rate_btn1" class="btn btn-primary">Đánh giá</button>
                </form>
			</div>

		</div>


	</div>
</div>