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
            <?php
            foreach($_SESSION['chitiet_khuyenmai'] as $key=>$value){
                ?>
                <div class="col-sm-9">
                    <div class="blog-post-area">

                        <h3><?php echo $value['short_title']?></h3>
                        <p><span style="color: red;"><?php $newDate = date("d-m-Y H:i:s",strtotime($value['date']));echo $newDate?></span><br>
                            <!--<img src="<?php /*echo URL_FRONT_END_IMAGES */?>/<?php /*echo $value['images']*/?>" alt=""><br>-->
                            <?php echo $value['content']?>
                        <p><em>Tham Khảo:<?php echo $value['author']?></em></p>

                    </div>
                </div>
            <?php }?>
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

<!-- FOOTER-->
<?php require 'footer.php'?>
<!-- END FOOTER -->