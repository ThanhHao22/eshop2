<main class="wp-content">
   <div class="slider-banner">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-8">
               <div id="home-slide" class="slider carousel slide carousel-fade" data-ride="carousel" data-aos="fade-right">
                  <ol class="carousel-indicators">
                     <li data-target="#home-slide" data-slide-to="0" class="active"></li>
                     <li data-target="#home-slide" data-slide-to="1"></li>
                     <li data-target="#home-slide" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                     <div class="carousel-item active" data-interval="3000">
                        <img src="<?= _PUBLIC_PATH . '/client/assets/img/slider_1.jpg' ?>" class="carousel-img w-100 h-100 d-block" alt="slider">
                        
                     </div>
                     <div class="carousel-item" data-interval="3000">
                        <img src="<?= _PUBLIC_PATH . '/client/assets/img/slider_2.jpg' ?>" class="carousel-img w-100 h-100 d-block" alt="slider">
                        
                     </div>
                     <div class="carousel-item" data-interval="3000">
                        <img src="<?= _PUBLIC_PATH . '/client/assets/img/slider_3.jpg' ?>" class="carousel-img w-100 h-100 d-block" alt="slider">
                        
                     </div>
                  </div>
                  <!-- End carousel inner -->
                  <a href="#home-slide" class="carousel-control-prev" data-slide="prev">
                     <span class="carousel-control-prev-icon"></span>
                  </a>
                  <a href="#home-slide" class="carousel-control-next" data-slide="next">
                     <span class="carousel-control-next-icon"></span>
                  </a>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="row">
                  <div class="col-12">
                     <div class="banner banner-sale banner-sneaker" data-aos="fade-left">
                        <a href="#" class="banner-sneaker d-block">
                           <img class="banner-sneaker-img d-block w-100 " src="<?= _PUBLIC_PATH . '/client/assets/img/banner-right.jpg' ?>" alt="banner-sneaker">
                        </a>
                     </div>
                  </div>
                  <div class="col-6" data-aos="fade-up">
                     <div class="banner banner-sale banner-clothing">
                        <a href="#" class="banner-clothing-link">
                           <img class="banner-clothing-img d-block w-100 h-100" src="<?= _PUBLIC_PATH . '/client/assets/img/banner-bottom-left.jpg' ?>" alt="banner-clothing">
                        </a>
                     </div>
                  </div>
                  <div class="col-6" data-aos="fade-up">
                     <div class="banner banner-sale banner-bag banner-clothing">
                        <a href="#" class="banner-bag-link">
                           <img class="banner-bag-img d-block w-100 h-100" src="<?= _PUBLIC_PATH . '/client/assets/img/banner-bottom-right.jpg' ?>" alt="banner-bag">
                        </a>
                        <!-- <div class="banner-content">
                           <h1>Bag No.18</h1>
                           <h3>Sale Off 20% All Store</h3>
                        </div> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="new_product">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="product-title text-center">
                  <h2>Sản phẩm mới</h2>
                  <p>Các thiết kế hiện đại, tối giản và hiện đại</p>
               </div>
            </div>
         </div>
         <div class="wp-new-arrivals">
            <div class="product-area owl-carousel owl-theme" id="owl">
               <?php
               for ($i = 0; $i < count($data['new_product']) - 1; $i++) {
               ?>
                  <div class="item">
                     <div class="row">
                        <div class="col-12">
                           <div class="product_section" data-aos="fade-up">
                              <div class="section-img">
                                 <a href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $data['new_product'][$i]['id'] ?>" class="product-img">
                                    <img src="<?php echo _IMG_PRODUCT_PATH . $data['new_product'][$i]['image'] ?>" alt="hinh1">
                                 </a>
                                 <div>
                                    <div class="product_add">
                                       <span data-path="<?= _IMG_PRODUCT_PATH ?>" data-id="<?= $data['new_product'][$i]['id'] ?>" data-url="<?= _WEB_ROOT_PATH . '/ajax' ?>" class="add-link" data-user="<?php echo isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>">
                                          <i class="fa-solid fa-cart-plus"></i>
                                       </span>
                                    </div>
                                    <div class="product_view">
                                       <a href="#" class="view-link">+ Quick View</a>
                                    </div>
                                 </div>
                              </div>

                              <div class="product_content text-left">
                                 <div class="product_content_title">
                                 <h3 class="product_name">
                                    <a href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $data['new_product'][$i]['id'] ?>"><?php echo $data['new_product'][$i]['name'] ?></a>
                                 </h3>
                                 </div>
                                 <div class="d-flex justify-content-between">
                                    <?php
                                       if($data['new_product'][$i]['promotion'] > 0){
                                    ?>
                                    <div class="price-box">
                                       <span class="current-price text-danger"><del><?php echo format_money($data['new_product'][$i]['price']) ?></del></span>
                                    </div>
                                    <?php
                                       }
                                    ?>
                                    <div class="current-price-box">
                                       <span class="current-current-price"><?php echo format_money($data['new_product'][$i]['price'] - ($data['new_product'][$i]['price'] * $data['new_product'][$i]['promotion']/100)) ?></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- <div class="row">
                        <div class="col-12">
                           <div class="product_section" data-aos="fade-up">
                              <div class="section-img">
                                 <a href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $data['new_product'][++$i]['id'] ?>" class="product-img">
                                    <img src="<?php echo _IMG_PRODUCT_PATH . $data['new_product'][$i]['image'] ?>" alt="hinh2">
                                 </a>
                                 <div>
                                    <div class="product_add">
                                       <span data-path="<?= _IMG_PRODUCT_PATH ?>" data-id="<?= $data['new_product'][$i]['id'] ?>" data-url="<?= _WEB_ROOT_PATH . '/ajax' ?>" class="add-link" data-user="<?php echo isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>">
                                          <i class="fa-solid fa-cart-plus"></i>
                                       </span>
                                    </div>
                                    <div class="product_view">
                                       <a href="#" class="view-link">+ Quick View</a>
                                    </div>
                                 </div>
                              </div>

                              <div class="product_content text-left">
                                 <h3 class="product_name">
                                    <a href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $data['new_product'][$i]['id'] ?>"><?php echo $data['new_product'][$i]['name'] ?></a>
                                 </h3>
                                 <div class="price-box">
                                    <span class="current-price"><?php echo format_money($data['new_product'][$i]['price']) ?></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div> -->
                  </div>
               <?php
               }
               ?>

               <?php
            foreach ($data['trend_products'] as  $trend_product) {
            ?>
               <div class="item">
                  <div class="row">
                     <div class="col-12">
                        <div class="product_section">
                           <div class="section-img">
                              <a href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $trend_product['id'] ?>" class="product-img">
                                 <img src="<?= _IMG_PRODUCT_PATH . $trend_product['image'] ?>" alt="hinh1">
                              </a>
                              <div>
                                 <div class="product_add">
                                    <span data-path="<?= _IMG_PRODUCT_PATH ?>" data-id="<?= $trend_product['id'] ?>" data-url="<?= _WEB_ROOT_PATH . '/ajax' ?>" class="add-link" data-user="<?php echo  isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>">
                                       <i class="fa-solid fa-cart-plus"></i>
                                    </span>
                                 </div>
                                 <div class="product_view">
                                    <a href="#" class="view-link">+ Quick View</a>
                                 </div>
                              </div>
                           </div>
                           <div class="product_content text-left">
                              <h3 class="product_name">
                                 <a href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $trend_product['id'] ?>"><?= $trend_product['name'] ?></a>
                              </h3>
                              <div class="price-box">
                                 <span class="current-price"><?= format_money($trend_product['price']) ?></span>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
            <?php
            }
            ?>

            </div>
         </div>

      </div>
   </div>

   <div class="banner_thumb" data-aos="fade-up">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               
            </div>
         </div>
      </div>
   </div>

   <div class="trend_product">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="product-title text-center">
                  <h2>Sản phẩm thịnh hành</h2>
                  <p>Các thiết kế hiện đại, tối giản và hiện đại</p>
               </div>
            </div>
         </div>
         <div class="product-area owl-carousel owl-theme" id="owl" data-aos="fade-up">
            <?php
            foreach ($data['trend_products'] as  $trend_product) {
            ?>
               <div class="item">
                  <div class="row">
                     <div class="col-12">
                        <div class="product_section">
                           <div class="section-img">
                              <a href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $trend_product['id'] ?>" class="product-img">
                                 <img src="<?= _IMG_PRODUCT_PATH . $trend_product['image'] ?>" alt="hinh1">
                              </a>
                              <div>
                                 <div class="product_add">
                                    <span data-path="<?= _IMG_PRODUCT_PATH ?>" data-id="<?= $trend_product['id'] ?>" data-url="<?= _WEB_ROOT_PATH . '/ajax' ?>" class="add-link" data-user="<?php echo  isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>">
                                       <i class="fa-solid fa-cart-plus"></i>
                                    </span>
                                 </div>
                                 <div class="product_view">
                                    <a href="#" class="view-link">+ Quick View</a>
                                 </div>
                              </div>
                           </div>
                           <div class="product_content text-left">
                              <h3 class="product_name">
                                 <a href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $trend_product['id'] ?>"><?= $trend_product['name'] ?></a>
                              </h3>
                              <div class="d-flex justify-content-between">
                                    <?php
                                       if($trend_product['promotion'] > 0){
                                    ?>
                                    <div class="price-box">
                                       <span class="current-price text-danger"><del><?php echo format_money($trend_product['price']) ?></del></span>
                                    </div>
                                    <?php
                                       }
                                    ?>
                                    <div class="current-price-box">
                                       <span class="current-current-price"><?php echo format_money($trend_product['price'] - ($trend_product['price'] * $trend_product['promotion']/100)) ?></span>
                                    </div>
                                 </div>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
            <?php
            }
            ?>
         </div>
      </div>
   </div>
</main>