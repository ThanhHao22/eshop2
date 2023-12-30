<main class="wp-content">
         <div class="breadcrumb_content">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <nav>
                        <ol class="breadcrumb-list breadcrumb">
                           <li class="breadcrumb-item"><a href="<?= _WEB_ROOT_PATH . '/' ?>">Trang chủ</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Tạo tài khoản</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
         </div>

         <div class="login_wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="login_form_container" data-aos="flip-left">
                        <form id="form" action="<?php echo _WEB_ROOT_PATH.'/auth/handleRegister' ?>" method="post">
                           <div class="login_text register_text">
                              <h2>Tạo tài khoản</h2>
                              <p>Vui lòng đăng ký sử dụng chi tiết tài khoản dưới đây.</p>
                           </div>
                           <?php
                              if(isset($_SESSION['msg']) && $_SESSION['msg'] != ""){
                                 ?>
                                    <div id="message" class="alert alert-danger"><?php echo $_SESSION['msg'] ?></div>
                                 <?php
                                 $_SESSION['msg'] = '';
                              }
                           ?>
                           <div class="login_form">
                              <div class="form-group mb-5">
                                 <input id="firstname" placeholder="Họ" class="form-control" type="text" name="firstname">
                              </div>
                              <div class="form-group mb-5">
                                 <input id="lastname" placeholder="Tên" class="form-control" type="text" name="lastname">
                              </div>
                              <div class="form-group mb-5">
                                 <input id="email" class="form-control" placeholder="Email" type="email" name="email">
                              </div>
                              <div class="form-group mb-5">
                                 <input id="password" class="form-control" placeholder="Mật khẩu" type="password"
                                    name="password">
                              </div>
                              <input type="hidden" name="register" value="register">
                              <div class="toggle-btn">
                                 <div class="form-action-button">
                                    <button type="submit" class="btn btn_login" type="submit">Tạo</button>
                                 </div>
                                 <div class="account-option">
                                    <a href="<?= _WEB_ROOT_PATH . '/Auth/login' ?>">Quay lại đăng nhập</a>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </main>