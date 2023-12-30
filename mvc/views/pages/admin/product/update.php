<?php
if (!empty($data['msg'])) {
  echo '<div class="alert alert-' . $data['type'] . '">' . $data['msg'] . '</div>';
}
?>
<form method="POST" action="" enctype="multipart/form-data">
  <div class="grid-cols-12 grid gap-4">
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
      <input type="text" class="form-control" name="productname" placeholder="Tên sản phẩm" value="<?php echo $data['product']['name'] ?>">
    </div>
    <?php
    $mb = 'mb-3';
    if ($data['product'] != '') {
      $mb = 'mb-5';
    }
    ?>
    <div class="<?php echo $mb ?> col-span-6 h-[70px]" id="imgae-upload">
      <label for="image" class="form-label flex flex-col justify-center" id="upload-img">
        <span>Ảnh sản phẩm</span>
        <div class="flex items-center gap-3 bg-[#fff] mt-2 px-2 py-1 rounded border border-[#99a1a8] w-[483px]">
          <img src="<?php echo _PUBLIC_PATH . '/client/assets/image/image_upload.png' ?>" alt="" class="w-7">
          <span>
            Tải ảnh lên
          </span>
        </div>
        <?php
        if (!empty($data['product'])) {
        ?>
          <img src="<?php echo _IMG_PRODUCT_PATH . $data['product']['image'] ?>" alt="" style="width: 50px; height: 50px; margin-top: 5px; max-width: 100%; object-fit: cover; object-position: center;" id="img-preview">
        <?php
        }
        ?>
      </label>
      <input type="file" id="image" class="form-control hidden" name="product" onchange="readURL(this);"><br>
    </div>
    <?php
    $mb = 'mb-3';
    if ($data['productImg'] != '') {
      $mb = 'mb-5';
    }
    ?>
    <div class="<?php echo $mb ?> col-span-6 h-[70px]" id="images-upload">
      <label for="multiple-image" class="form-label flex flex-col justify-center" id="upload-imgs">
        <span>Các ảnh khác</span>
        <div class="flex items-center gap-3 bg-[#fff] mt-2 px-2 py-1 rounded border border-[#99a1a8] w-[483px]">
          <img src="<?php echo _PUBLIC_PATH . '/client/assets/image/image_upload.png' ?>" alt="" class="w-7">
          <span>
            Tải ảnh lên
          </span>
        </div>

        <?php
        if (!empty($data['productImg'])) {
        ?>
          <div class="flex gap-2">
            <?php
            foreach ($data['productImg'] as $productImg) {
            ?>
              <img src="<?php echo _IMG_PRODUCT_PATH . $productImg['image'] ?>" alt="" style="width: 50px; height: 50px; margin-top: 5px; max-width: 100%; object-fit: cover; object-position: center;" id="imgs-preview" class="flex gap-2">
            <?php
            }
            ?>
          </div>
        <?php
        }
        ?>
      </label>
      <input type="file" id="multiple-image" multiple class="form-control hidden" name="detail_image[]"><br>
    </div>
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Danh mục</label><br>
      <select name="category" id="category" class="custom-select" required>
        <option>Select....</option>
        <?php
        foreach ($data['categories'] as $category) {
        ?>
          <option <?php echo $category['id'] == $data['product']['cate_id'] ? 'selected' : ''
                  ?> value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
        <?php
        }
        ?>
      </select>
    </div>
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Giá</label>
      <input type="text" class="form-control" name="price" placeholder="Example: 205" value="<?php echo $data['product']['price'] ?>">
    </div>
    <div class="mb-3 col-span-6">
            <label for="exampleInputEmail1" class="form-label">Khuyến mãi</label>
            <input type="number" class="form-control" name="promotion" placeholder="%" value="<?php echo $data['product']['promotion'] ?>">
        </div>
        <div class="mb-3 col-span-6">
            <label for="exampleInputEmail1" class="form-label">Số lượng</label>
            <input type="number" class="form-control" name="quantity" min="1" value="<?php echo $data['product']['quantity'] ?>">
        </div>
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Mô tả</label>
      <textarea rows="4" type="text" class="form-control" name="description" placeholder="Description"><?php echo $data['product']['description'] ?></textarea>
    </div>
  </div>
  <input type="hidden" name="update_product" value="update_product">
  <button type="submit" class="btn btn-primary mb-4">Cập nhật</button>
</form>