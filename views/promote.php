<!-- HEADER -->
<?php  require 'header.php'?>
<!-- END HEADER-->

<!-- CONTAINER-->
<!-- slide banner -->
<?php require 'slider_banner.php'?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">Sản phẩm khuyến mại đang hot</h2>

                       <?php foreach ($_SESSION['tintuc_khuyenmai'] as $key =>$value){?>
                        <div class="single-blog-post-big col-sm-4">
                            <a href="index_controller.php?action=detail_promte&id=<?php echo $value['id']?>">
                                <img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['image']?>" alt="">
                            </a>
                            <h4><?php echo $value['short_title']?></h4>
                            <p><span style="color: red;"><?php echo $value['short_content']?></span></p>
                        </div>
                        <?php }?>

                    <h3 class="title text-center"><span style="color: red;">Một số khuyến mại khác</span></h3>

                    <?php
                    foreach($dataPromotionLimit as $value){
                        ?>
                        <div class="single-blog-post">
                            <input type ="hidden" name ="id" value =" <?php echo $value['id']?> ">
                            <a href="index_controller.php?action=detail_promte&id=<?php echo $value['id']?>">
                                <img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['image']?>" alt="">
                            </a>
                            <h3><?php echo $value['short_title']?></h3>
                            <p><span style="color: red;"><?php $newDate = date("d-m-Y H:i:s",strtotime($value['date']));echo $newDate?></span><br>
                                <?php echo $value['short_content']?>
                            </p>

                        </div>
                    <?php }?>

                    <div class="pagination-area">
                        <?php
                        if($total_page >1 && $page >1){
                            echo '<a href ="?action=promote&page='.($page-1).'">Prev</a> ';
                        }
                        // lap khoang giua
                        for($i=1 ;$i<=$total_page; $i++) {
                            // neu la trang hien tai thi hien thi the span
                            // nguoc lai hien thi the a
                            if ($i == $page) {
                                echo '<span>' .$i. '</span> ';
                            } else {
                                echo '<a href="?action=promote&page='.$i.'">'.$i.'</a>  ';
                            }
                        }if($page <$total_page && $total_page >1){
                            echo '<a href="?action=promote&page='.($page+1).'">Next</a>  ';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Thủ thuật mới nhất</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php foreach ($_SESSION['thuthuat_tintuc'] as $key=>$value){?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a href="index_controller.php?action=detail_news&id_news=<?php echo $value['id_news']?>">
                                        <img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['images']?>" width="70px" height="60px">
                                    </a>
                                    <a href="index_controller.php?action=detail_news&id_news=<?php echo $value['id_news']?>"><?php echo $value['short_title']?></a>
                                </div>
                            </div>
                        <?php }?>
                    </div><!--/category-products-->

                    <h2>Góc khách hàng</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php foreach ($_SESSION['khachhang_tintuc'] as $key=>$value){?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a href="index_controller.php?action=detail_news&id_news=<?php echo $value['id_news']?>">
                                        <img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['images']?>" width="70px" height="60px">
                                    </a>
                                    <a href="index_controller.php?action=detail_news&id_news=<?php echo $value['id_news']?>"><?php echo $value['short_title']?></a>
                                </div>
                            </div>
                        <?php }?>

                    </div><!--/category-products-->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END CONTAINER-->
<!-- FOOTER-->
<?php require 'footer.php'?>
<!-- END FOOTER -->