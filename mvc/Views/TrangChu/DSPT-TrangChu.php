    <!-- //banner-->
    <!--/banner-bottom -->
        <link rel="stylesheet" href="public/css/style.css" type="text/css" media="all" />

<?php 
    $class = isset($_SESSION["user_id"]) ? 'col-md-9' : 'col-md-12';
 ?>
<div class="<?php echo $class; ?>">
    
    <section class="banner-bottom py-5">
        <h2 class="text-center mt-4">Danh sách phòng trọ</h2>
        <div class="container py-5" style="width: 100%; height: auto;">
            
            <!--/row-->
            <div class="row shop-wthree-info text-center">
                <?php
                     foreach ($data['data'] as $r) {
                    
                ?>
                
                <div class="col-lg-3 shop-info-grid text-center mt-4">
                    <div class="product-shoe-info shoe">
                        <div class="men-thumb-item" >
                            <img src="public/img/<?php echo $r->anh; ?>"  alt="" height="250px" width="200px">
                        </div>
                        <div class="item-info-product">
                            <h4>
                                <a href="TrangChu/XemChiTiet/<?php echo $r->maphong; ?>"><?php echo $r->tieude; ?></a>
                            </h4>

                            <div class="product_price">
                                <div class="grid-price">
                                    <span class="money"><?php echo $r->gia; ?>đ/tháng</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <?php
            }
                ?>

                <!--//row-->
            </div>
            
        </div>
    </section>
    <!-- /banner-bottom -->
    <!--/newsletter -->
    <!--//newsletter -->
    <!--/shipping-->
    <section class="shipping-wthree">
        <div class="shiopping-grids d-lg-flex">
            <div class="col-lg-4 shiopping-w3pvt-gd text-center">
                <div class="icon-gd"><span class="fa fa-truck" aria-hidden="true"></span>
                </div>
                <div class="icon-gd-info">
                    <h3>TIỆN LỢI</h3>
                </div>
            </div>
            <div class="col-lg-4 shiopping-w3pvt-gd sec text-center">
                <div class="icon-gd"><span class="fa fa-bullhorn" aria-hidden="true"></span></div>
                <div class="icon-gd-info">
                    <h3>MIỄN PHÍ</h3>
                </div>
            </div>
            <div class="col-lg-4 shiopping-w3pvt-gd text-center">
                <div class="icon-gd"> <span class="fa fa-gift" aria-hidden="true"></span></div>
                <div class="icon-gd-info">
                    <h3>MỌI LÚC MỌI NƠI</h3>
                </div>

            </div>
        </div>

    </section>
    <!--//shipping-->
    <!-- footer -->
</div>
   