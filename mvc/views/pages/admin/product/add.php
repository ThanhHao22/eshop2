<?php
if (!empty($data['msg'])) {
    echo '<div class="alert alert-' . $data['type'] . '">' . $data['msg'] . '</div>';
}
?>

<form method="POST" action="<?php echo _WEB_ROOT_PATH . '/product/add_product' ?>" enctype="multipart/form-data">
    <div class="grid-cols-12 grid gap-4">
        <div class="mb-3 col-span-6">
            <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" name="productname" placeholder="Tên sản phẩm">
        </div>
        <div class="mb-3 col-span-6 h-[70px]" id="image-upload">
            <label for="image" class="form-label flex flex-col justify-center" id="upload-img">
                <span>Ảnh sản phẩm chính</span>
                <div class="flex items-center gap-3 bg-[#fff] mt-2 px-2 py-1 rounded border border-[#99a1a8] w-[483px]">
                    <img src="<?php echo _PUBLIC_PATH . '/client/assets/image/image_upload.png' ?>" alt="" class="w-7">
                    <span>
                        Cập nhật ảnh
                    </span>
                </div>
            </label>
            <input type="file" id="image" class="form-control hidden" name="product" onchange="readURL(this);"><br>
        </div>
        <div class="mb-3 col-span-6 h-[70px]" id="images-upload">
            <label for="image-multiple" class="form-label flex flex-col justify-center" id="upload-imgs">
                <span>Các ảnh khác</span>
                <div class="flex items-center gap-3 bg-[#fff] mt-2 px-2 py-1 rounded border border-[#99a1a8] w-[483px]">
                    <img src="<?php echo _PUBLIC_PATH . '/client/assets/image/image_upload.png' ?>" alt="" class="w-7">
                    <span>
                        Cập nhật ảnh
                    </span>
                </div>
            </label>
            <input type="file" id="image-multiple" multiple class="form-control hidden" name="detail_image[]"><br>
        </div>
        <div class="mb-3 col-span-6">
            <label for="exampleInputEmail1" class="form-label">Danh mục</label><br>
            <select name="category" id="category" class="custom-select" required>
                <option>Chọn....</option>
                <?php
                foreach ($data['categories'] as $category) {
                ?>
                    <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="mb-3 col-span-6">
            <label for="exampleInputEmail1" class="form-label">Giá</label>
            <input type="text" class="form-control" name="price" placeholder="Ví dụ: 205">
        </div>
        <div class="mb-3 col-span-6">
            <label for="exampleInputEmail1" class="form-label">Khuyến mãi</label>
            <input type="number" class="form-control" name="promotion" placeholder="%">
        </div>
        <div class="mb-3 col-span-6">
            <label for="exampleInputEmail1" class="form-label">Số lượng</label>
            <input type="number" class="form-control" name="quantity" min="1">
        </div>
        <div class="mb-3 col-span-6">
            <label for="exampleInputEmail1" class="form-label">Mô tả</label>
            <textarea rows="4" type="text" class="form-control" name="description" placeholder="Mô tả"></textarea>
        </div>
    </div>
    <input type="hidden" name="add_product" value="add_product">
    <button type="submit" class="btn btn-primary px-4 mb-4">Thêm</button>
</form>