<!-- HEADER -->
<?php  require 'header.php'?>
<!-- END HEADER-->

<!-- CONTAINER-->
<!-- slider -->
<?php require 'slider_banner.php' ?>
<!-- end slider -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Các sản phẩm điện thoại</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php
                                foreach ($_SESSION['menu'] as $key =>$value) {
                                    if(isset($value[0]))
                                    {
                                        foreach ($value as $key => $value) {
                                            if($value['category_id'] ==1)
                                                echo ' <h4 class="panel-title"><a href="product_controller.php?action=products&cat_id=' . $value['category_id'] . '&name_product=' . $value['category_name'] . '">' . $value['category_name'] . '</a></h4>';
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div><!--/category-products-->
                    <div class="shipping text-center"><!--shipping-->
                        <img src="<?php echo URL_FRONT_END ?>views/imager/b79e609b49f3ae70226f96d588660696.jpg" alt="" />
                    </div>
                </div>
                <div class="left-sidebar">
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

                </div>
            </div>
            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">Một số câu hỏi nổi bật</h2>
                    <?php foreach ($dataCusLimit as $value){?>
                    <div class="single-blog-post">
                        <h3><?php echo $value['title']?></h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-user"></i> <?php echo $value['name_user']?></li>
                                <li><i class="fa fa-clock-o"></i> <?php echo $value['time']?></li>
                                <li><i class="fa fa-calendar"></i> <?php echo $value['date']?></li>
                            </ul>
                            <span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
                        </div>
                        <a href="">
                            <img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['images']?>" alt="">
                        </a>
                        <p><?php echo $value['content']?> </p>
                    </div>
                    <?php }?>
                    <!-- phan trang -->
                    <div class="pagination-area">
                        <?php
                        if($total_page >1 && $page >1){
                            echo '<a href ="?action=support_customers&page='.($page-1).'">Prev</a> ';
                        }
                        // lap khoang giua
                        for($i=1 ;$i<=$total_page; $i++) {
                            // neu la trang hien tai thi hien thi the span
                            // nguoc lai hien thi the a
                            if ($i == $page) {
                                echo '<span>' .$i. '</span> ';
                            } else {
                                echo '<a href="?action=support_customers&page='.$i.'">'.$i.'</a>  ';
                            }
                        }if($page <$total_page && $total_page >1){
                            echo '<a href="?action=support_customers&page='.($page+1).'">Next</a>  ';
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- END CONTAINER-->
<!-- FOOTER-->
<?php require 'footer.php'?>
<!-- END FOOTER -->