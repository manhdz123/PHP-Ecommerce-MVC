<!-- HEADER -->
<?php  require 'header.php'?>
<!-- END HEADER-->

<!-- CONTAINER-->
<?php require 'slider_banner.php'?>
<!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 padding-right">
                <div class="features_items"><!--features_items-->

                    <h2 class="title text-center">CÁC MẪU SẢN PHẨM </h2>
                    <?php foreach ($dataProductsLimit as $value){?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="index_controller.php?action=detail_products&product_id=<?php echo $value['product_id']?>">
                                            <img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['image'] ?>" alt="" />
                                        </a>
                                        <h4><?php echo number_format($value['price'] ,0,'.','.')?> đ</h4>
                                        <a href ="index_controller.php?action=detail_products&product_id=<?php echo $value['product_id']?>">
                                            <p><?php echo $value['title']?></p>
                                        </a>
                                        <a href="product_controller.php?action=cart&product_id=<?php echo $value['product_id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua hàng</a>
                                        <span class="promotion"><?php echo $value['promotion']?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>

                </div><!--features_items-->
            </div>
            <!-- Phân Trang -->
            <div class="pagination-area">
                <?php
                if($total_page >1 && $page >1){
                    echo '<a href ="product_controller.php?action=list_products&cat_id='.$value['category_id'].'&page='.($page-1).'">Prev</a> ';
                }
                //lap khoang giua
                for($i=1 ;$i<=$total_page; $i++) {
                    // neu la trang hien tai thi hien thi the span
                    // nguoc lai hien thi the a
                    if ($i == $page) {
                        echo '<span>' .$i. '</span> ';
                    } else {
                        echo '<a href="product_controller.php?action=list_products&cat_id='.$value['category_id'].'&page='.$i.'">'.$i.'</a>  ';
                    }
                }if($page <$total_page && $total_page >1){
                    echo '<a href="product_controller.php?action=list_products&cat_id='.$value['category_id'].'&page='.($page+1).'">Next</a>  ';
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- END CONTAINER-->

<!-- FOOTER-->
<?php require 'footer.php'?>
<!-- END FOOTER -->