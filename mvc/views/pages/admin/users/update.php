<?php
if (!empty($data['msg'])) {
  echo '<div class="alert alert-' . $data['type'] . '">' . $data['msg'] . '</div>';
}
?>

<form method="POST" action="" enctype="multipart/form-data">
  <div class="grid-cols-12 grid gap-4">
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Tên người dùng</label>
      <input type="text" class="form-control" name="username" placeholder="Tên người dùng" value="<?php echo $data['user']['name'] ?>">
    </div>

    <div class="mb-3 col-span-6 h-[70px]" id="avatar-upload">
      <label for="image" class="form-label flex flex-col justify-center" id="upload-img">
        <span>Avatar</span>
        <div class="flex items-center gap-3 bg-[#fff] mt-2 px-2 py-1 rounded border border-[#99a1a8] w-[483px]">
          <img src="<?php echo _PUBLIC_PATH . '/client/assets/image/image_upload.png' ?>" alt="" >
          <span>
            Tải ảnh lên
          </span>
        </div>
      </label>

      <input type="file" id="image" class="form-control hidden" name="avatar" onchange="readURL(this);">

      <?php if (!empty($data['user']['avatar'])) { ?>
        <img class="img-thumbnail mt-2" width="100px" src="<?php echo _AVATAR_PATH . $data['user']['avatar'] ?>" alt="" id="img-preview">
      <?php } ?>

    </div>
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Tên nhóm người dùng</label><br>
      <select name="group" id="groupuser" class="custom-select" required>
        <option>Select....</option>
        <?php
        foreach ($data['groups'] as $group) {
        ?>
          <option <?php
                  echo $group['id'] == $data['user']['gr_id'] ? 'selected' : ''
                  ?> value="<?php echo $group['id'] ?>"><?php echo $group['name'] ?></option>
        <?php
        }
        ?>
      </select>
    </div>
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" placeholder="example@gmail.com" value="<?php echo $data['user']['email'] ?>">
    </div>
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Mật khẩu</label>
      <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
      <input type="text" class="form-control" name="phone" placeholder="Số điện thoại" value="<?php echo $data['user']['phone'] ?>">
    </div>
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
      <textarea rows="4" type="text" class="form-control" name="address" placeholder="Địa chỉ"><?php echo $data['user']['address'] ?></textarea>
    </div>
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Mô tả</label>
      <textarea rows="4" type="text" class="form-control" name="description" placeholder="Mô tả"><?php echo $data['user']['description'] ?></textarea>
    </div>
  </div>
  <input type="hidden" name="update_user" value="update_user">
  <button type="submit" class="btn btn-primary mb-4">Cập nhật</button>
</form>