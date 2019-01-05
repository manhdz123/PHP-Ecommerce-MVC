<!-- HEADER -->

<?php  require 'header.php' ?>
<!-- END HEADER-->
<!-- CONTAINER-->
<!-- slider banner -->
<?php require 'slider_banner.php'?>
<!-- end slider banner -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2><span style="color: red;">Sản phẩm mới</span></h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <div class="panel panel-default">
                            <div class="bt-l-ct">

                                <?php foreach ($_SESSION['data_sanphammoi'] as $key =>$value){?>
                                <div class="online1">
                                    <a href="index_controller.php?action=detail_products&product_id=<?php echo $value['product_id']?>">
                                        <div class="img-ol">
                                            <img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['image']?>" width="205" height="200" alt="Hỗ trợ kĩ thuật.">
                                        </div>
                                    </a>
                                    <div class="kd"><a href="?action=detail_products&product_id=<?php echo $value['product_id']?>"><?php echo $value['title']?></a></div>
                                    <div class="sdt">Giá :<?php echo number_format($value['price'] ,0,'.','.')?> đ</div><br>
                                </div>
                                <?php }?>
                                <!--end sp ban chay 1-->
                            </div>
                        </div>
                    </div><!--/category-products-->
                    <div class="brands_products"><!--brands_products-->
                        <h2><span style="color: green;">Tin tức nổi bật</span></h2>
                        <div class="brands-name">
                            <div class="bt-l-ct">
                                <?php foreach ($_SESSION['data_tintucmoi'] as $key=>$value){?>
                                <div class="new-1">
                                    <a href="index_controller.php?action=detail_news&id_news=<?php echo $value['id_news']?>">
                                        <img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['images']?>" width="130px" height="80px">
                                        <p><?php echo $value['title']?></p>
                                    </a>
                                </div><!--end tin tuc-l-1-->
                                <?php }?>
                            </div>
                        </div>
                    </div><!--/brands_products-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="<?php echo URL_FRONT_END_IMAGES ?>/b79e609b49f3ae70226f96d588660696.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <!-- san pham dien thoai-->
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"><span style="color: red">Điện thoại bán chạy</span></h2>
                    <?php
                    foreach($_SESSION['data_dienthoai'] as $key=>$value){
                    ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="?action=detail_products&product_id=<?php echo $value['product_id']?>">
                                        <img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['image'] ?>" alt="" />
                                    </a>
                                    <h4><?php echo number_format($value['price'] ,0,'.','.')?> đ</h4>
                                    <a href ="?action=detail_products&product_id=<?php echo $value['product_id']?>">
                                        <p><?php echo $value['title']?></p>
                                    </a>
                                    <a href="product_controller.php?action=cart&product_id=<?php echo $value['product_id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua hàng</a>
                                    <span class="promotion"><?php echo $value['promotion']?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <!-- end san pham dien thoai-->

                <!-- san pham may tinh -->
                <div class="features_items">
                    <h2 class="title text-center"><span style="color: red">Máy tính bán chạy</span></h2>
                    <?php
                    foreach($_SESSION['data_laptop'] as $key=>$value){
                    ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="?action=detail_products&product_id=<?php echo $value['product_id']?>">
                                        <img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['image'] ?>" alt="" />
                                    </a>
                                    <h4><?php echo number_format($value['price'] ,0,'.','.')?> đ</h4>
                                    <a href ="?action=detail_products&product_id=<?php echo $value['product_id']?>">
                                        <p><?php echo $value['title']?></p>
                                    </a>
                                    <a href="product_controller.php?action=cart&product_id=<?php echo $value['product_id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua hàng</a>
                                    <span class="promotion"><?php echo $value['promotion']?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                <!-- end san pham may tinh -->
                </div><!--features_items-->

                <div class="features_items">
                    <img src="<?php echo URL_FRONT_END_IMAGES ?>/banner_careone.jpg">
                </div>

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center"><span style="color: blue">Phụ kiện điện thoại và máy tính bán chạy</span></h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <?php
                                foreach($_SESSION['data_phukien'] as $key => $value){
                                ?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['image']?>" alt="" />
                                                <h2><?php echo number_format($value['price'] ,0,'.','.')?> đ</h2>
                                                <p><?php echo $value['title']?></p>
                                                <a href="product_controller.php?action=cart&product_id=<?php echo $value['product_id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div><!--/recommended_items-->
            </div>
        </div>
    </div>
</section>
<!-- END CONTAINER-->

<!-- FOOTER-->
<?php require 'footer.php'?>
<!-- END FOOTER -->