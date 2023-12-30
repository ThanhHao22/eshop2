<main class="wp-content">
   <div class="breadcrumb_content">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <nav>
                  <ol class="breadcrumb-list breadcrumb">
                     <li class="breadcrumb-item"><a href="<?= _WEB_ROOT_PATH ?>">Trang chủ</a></li>
                     <li class="breadcrumb-item"><a href="<?= _WEB_ROOT_PATH . '/product/show_product' ?>">Sản Phẩm</a></li>
                     <li class="breadcrumb-item"><a href="<?= _WEB_ROOT_PATH . '/product/show_product/cate=' . $data['product']['cate_id'] ?>"><?= getNameCate($data['product']['cate_id'])['name'] ?></a></li>
                     <li class="breadcrumb-item active" aria-current="page"><?= $data['product']['name'] ?></li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>
   <div class="wp-product-details">
      <div class="container">
         <div class="row">
            <div class="col-md-5">
               <div class="product-details-img rounded-lg img-thumbnail shadow-sm" data-aos="fade-right">
                  <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <img src="<?= _IMG_PRODUCT_PATH . $data['product']['image'] ?>" />
                        </div>

                        <?php
                        foreach ($data['image_product'] as $img_product) {
                        ?>
                           <div class="swiper-slide">
                              <img src="<?= _IMG_PRODUCT_PATH . $img_product['image'] ?>" />
                           </div>
                        <?php
                        }
                        ?>
                     </div>
                     <div class="swiper-button-next"></div>
                     <div class="swiper-button-prev"></div>
                  </div>
                  <div thumbsSlider="" class="swiper mySwiper">
                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <img src="<?= _IMG_PRODUCT_PATH . $data['product']['image'] ?>" />
                        </div>
                        <?php
                        foreach ($data['image_product'] as $img_product) {
                        ?>
                           <div class="swiper-slide">
                              <img src="<?= _IMG_PRODUCT_PATH . $img_product['image'] ?>" />
                           </div>
                        <?php
                        }
                        ?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-7">
               <div class="product-content" data-aos="fade-left">
                  <form action="" method="post" class="product-content-form">
                     <h1 class="product-title mt-5"><?= $data['product']['name'] ?></h1>
                     <div class="rating-box">
                        <span class="rating-star mb-3">
                           <i class="fa-solid fa-star"></i>
                           <i class="fa-solid fa-star"></i>
                           <i class="fa-solid fa-star"></i>
                           <i class="fa-solid fa-star"></i>
                           <i class="fa-solid fa-star"></i>
                        </span>
                     </div>
                     <div class="d-flex">
                                    <?php
                                       if($data['product']['promotion'] > 0){
                                    ?>
                                    <div class="price-box mr-3">
                                       <span class="current-price text-danger"><del><?php echo format_money($data['product']['price']) ?></del></span>
                                    </div>
                                    <?php
                                       }
                                    ?>
                                    <div class="current-price-box">
                                       <span class="current-current-price"><?php echo format_money($data['product']['price'] - ($data['product']['price'] * $data['product']['promotion']/100)) ?></span>
                                    </div>
                                 </div>
                     <div class="product-quantity">
                        <label for="quantity">Số lượng: </label>
                        <input type="number" min="1" value="1" id="quantity" name="quantity" class="quantity-input text-center w-25 ">
                     </div>
                     <div class="btn-submit">
                        <button data-user="<?php echo  isset($_SESSION['user']) ? $_SESSION['user']['id']: 0 ?>" data-id="<?= $data['product']['id']?>" data-url="<?= _WEB_ROOT_PATH . '/ajax'?>" data-path="<?= _IMG_PRODUCT_PATH ?>" class="btn btn-add-cart" type="submit">Thêm vào giỏ hàng</button>
                     </div>
                  </form>
                  <div class="product_desc">
                     <p><?= $data['product']['description'] ?></p>
                  </div>
               </div>
            </div>
         </div>
         <div class="row mt-5">
            <div class="col-12 mt-5">
               <div class="product-title text-center">
                  <h2>Những sản phẩm tương tự</h2>
               </div>
            </div>
         </div>
         <div class="product-area owl-carousel owl-theme" id="owl" data-aos="fade-left">
            <?php
            if (!empty($data['related_products'])) {
               foreach ($data['related_products'] as  $related_product) {
            ?>
                  <div class="item">
                     <div class="row">
                        <div class="col-12">
                           <div class="product_section">
                              <div class="section-img">
                                 <a href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $related_product['id'] ?>" class="product-img">
                                    <img src="<?= _IMG_PRODUCT_PATH . $related_product['image'] ?>" alt="hinh1">
                                 </a>
                                 <div>
                                    <div class="product_add">
                                       <a href="#" class="add-link">
                                          <i class="fa-solid fa-cart-plus"></i>
                                       </a>
                                    </div>
                                    <div class="product_view">
                                       <a href="#" class="view-link">+ Quick View</a>
                                    </div>
                                 </div>
                              </div>

                              <div class="product_content text-left">
                                 <h3 class="product_name">
                                    <a href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $related_product['id'] ?>"><?= $related_product['name'] ?></a>
                                 </h3>
                                 <div class="d-flex justify-content-between">
                                    <?php
                                       if($related_product['promotion'] > 0){
                                    ?>
                                    <div class="price-box">
                                       <span class="current-price text-danger"><del><?php echo format_money($related_product['price']) ?></del></span>
                                    </div>
                                    <?php
                                       }
                                    ?>
                                    <div class="current-price-box">
                                       <span class="current-current-price"><?php echo format_money($related_product['price'] - ($related_product['price'] * $related_product['promotion']/100)) ?></span>
                                    </div>
                                 </div>
                              </div>
                           </div>

                        </div>
                     </div>
                  </div>
            <?php
               }
            }
            ?>
         </div>
      </div>
   </div>
   
</main>