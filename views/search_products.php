<!-- HEADER -->
<?php  require 'header.php'?>
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
                    <h2 class="title text-center"><span style="color: red">Danh sách sản phẩm</span></h2>
                    <p><?php
                        $count = count($_SESSION['timkiem_sanpham']);
                        if($count > 1 && $search_value != ''){
                            echo "Tìm thấy <b>$count</b> kết quả trả về với từ khóa <b>$search_value </b>";

                        }else {
                            echo "Không tìm thấy kết quả";

                        }?>
                    </p>
                    <div>
                    <?php
                    if($count > 1 && $search_value != '')
                    {
                        foreach ($_SESSION['timkiem_sp_name'] as $value) {

                            echo '<div class="col-sm-4">';
                                echo '<div class="product-image-wrapper">';
                                    echo '<div class="single-products">';
                                            echo '<div class="productinfo text-center">';
                                                echo '<a href="?action=detail_products&product_id='.$value['product_id'].'">';
                                                    echo '<img src="'.URL_FRONT_END_IMAGES.'/'.$value['image'].' " alt="" />';
                                                echo '</a>';
                                                echo '<h4>'.number_format($value['price'] ,0,'.','.').' đ</h4>';
                                                echo '<a href="?action=detail_products&product_id='.$value['product_id'].'">';
                                                    echo '<p>'.$value['title'].'</p>';
                                                echo '</a>';
                                                echo '<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua hàng</a>';
                                                echo '<span class="promotion">'.$value['promotion'].'</span>';
                                            echo '</div>';

                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        }
                    }
                    ?>
                    </div>
                </div>
                <!-- end san pham dien thoai-->
                <!-- phan trang -->
                <div class="pagination-area">
                    <?php
                    if($total_page >1 && $page >1){
                        echo '<a href ="index_controller.php?action=search&search_value='.$search_value.'&page='.($page-1).'">Prev</a> ';
                    }
                    // lap khoang giua
                    if($total_page  == 1) {
                        echo '<span></span> ';
                    }
                    else {
                        for($i=1 ;$i<=$total_page; $i++) {
                            // neu la trang hien tai thi hien thi the span
                            // nguoc lai hien thi the a
                            if ($i == $page) {
                                echo '<span>' .$i. '</span> ';
                            } else {
                                echo '<a href="index_controller.php?action=search&search_value='.$search_value.'&page='.$i.'">'.$i.'</a>  ';
                            }
                        }
                    }
                    if($page <$total_page && $total_page >1){
                        echo '<a href="index_controller.php?action=search&search_value='.$search_value.'&page='.($page+1).'">Next</a>  ';
                    }
                    ?>
                </div>
            </div>


        </div>
    </div>
</section>
<!-- END CONTAINER-->

<!-- FOOTER-->
<?php require 'footer.php'?>
<!-- END FOOTER -->