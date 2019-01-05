<!-- HEADER -->
<?php  require 'header.php'?>
<!-- END HEADER-->
<!-- CONTAINER-->
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
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <?php foreach($_SESSION['data_products'] as $key=>$value){?>
                            <img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['image'] ?>" alt="" />
                            <?php }?>
                        </div>
                        <h2><span style="color: red;">Một số hình ảnh khác</span></h2>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <?php foreach ($_SESSION['list_anh']as $key=>$value){?>
                                <div class="item active">
                                    <a href=""><img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['image1']?>" alt=""></a>
                                </div>
                                <?php }?>

                                <?php foreach ($_SESSION['list_anh']as $key=>$value){?>
                                <div class="item">
                                    <a href=""><img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['image2']?>" alt=""></a>
                                </div>
                                <?php }?>

                                <?php foreach ($_SESSION['list_anh']as $key=>$value){?>
                                <div class="item">
                                    <a href=""><img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['image3']?>" alt=""></a>
                                </div>
                                <?php }?>
                            </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <?php
                        foreach($_SESSION['data_products'] as $key=>$value){
                        ?>
                        <div class="product-information"><!--/product-information-->

                            <h2><?php echo $value['title']?></h2>
                            <p><?php echo number_format($value['price'] ,0,'.','.')?> đ</p>

                            <span>
                                <a href="product_controller.php?action=cart&product_id=<?php echo $value['product_id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua hàng</a>
                                <!--<button type="button" class="btn btn-fefault cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Mua hàng
                                </button>-->
								</span>
                            <p><b>GIÁ ĐẶC BIỆT ĐẾN <?php $newDate = date("d-m-Y",strtotime($value['end_promotion']));echo $newDate?>: <?php echo number_format($value['promotion_price'] ,0,'.','.')?> đ</b>
                                <br>- Mỗi số điện thoại chỉ được mua tối đa 2 sản phẩm
                                <br>- Trả thẳng và không kèm Khuyến mại nào khác</p>
                            <p><b>HOẶC MUA GIÁ THƯỜNG:<?php echo number_format($value['price'] ,0,'.','.')?> đ:</b>
                                <br>- Trả góp 0%, trả trước 6 triệu
                                <br>- Tặng Voucher 500,000đ mua Apple Watch/Mac</p>
                            <p>Gọi <b>04.21092016</b> để được tư vấn miễn phí</p>
                            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>

                        </div><!--/product-information-->
                    </div>
                    <?php } ?>
                </div><!--/product-details-->

                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab">Thông số kĩ thuật</a></li>
                            <li><a href="#companyprofile" data-toggle="tab">Phụ kiện đi kèm</a></li>

                            <li class="active"><a href="#reviews" data-toggle="tab">Câu hỏi</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details" >
                            <div class="col-sm-6" style="width: 100%;">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <p><span style="color: blue; font-size: 20px;">Thông số cơ bản</span></p>
                                            <table align="center" style="font-size: 17px;">
                                                <?php
                                                    foreach ($_SESSION['data_products'] as $key => $value)
                                                {?>
                                                <tr>
                                                    <td>Màn hình :	</td>
                                                    <td><?php echo $value['screen']?></td><br>
                                                </tr>
                                                <tr>
                                                    <td>Camera :</td>
                                                    <td><?php echo $value['camera_primary']?></td><br>
                                                </tr>
                                                <tr>
                                                    <td>Bộ nhớ trong :</td>
                                                    <td><?php echo $value['memory']?></td>
                                                </tr>
                                                <tr>
                                                    <td>Hệ điều hành :</td>
                                                    <td><?php echo $value['os']?></td>
                                                </tr>
                                                <tr>
                                                    <td>Chipset :</td>
                                                    <td><?php echo $value['cpu_speed']?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kích thước :</td>
                                                    <td><?php echo $value['size']?></td>
                                                </tr>
                                                <?php }?>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="companyprofile" >
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo URL_FRONT_END ?>views/imager\avatar-cap-iphone-5.jpg" alt="" />
                                            <h2>Sạc</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo URL_FRONT_END ?>views/imager\iphone-6-3.jpg" alt="" />
                                            <h2>Tai nghe</h2>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo URL_FRONT_END ?>views/imager\usr_avatar_6360668.png" alt="" />
                                            <h2>Sách HDSD</h2>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="tab-pane fade active in" id="reviews" >
                            <div class="col-sm-12">
                            <?php foreach ($_SESSION['data_products'] as $key=>$value){?>
                                <p> <?php echo $value['description']?></p>
                            <?php }?>
                                <p><b>Hãy viết câu hỏi của bạn tại đây. Cửa hàng chúng tôi sẽ giải đáp câu hỏi của bạn. Thank you!!!</b></p>

                                <form action="index_controller.php?action=comment" method="post">
										<span>
											<input type="text" name="username" placeholder="Your Name" />
											<input type="email" name ="email" placeholder="Email Address" />
										</span>
                                    <textarea name="comment" placeholder="Câu hỏi của bạn dành cho chúng tôi"></textarea>

                                    <input type="submit" value ="SUBMIT" class="btn btn-default pull-right" onclick="show_alert()">
                                </form>
                            </div>
                        </div>

                    </div>
                </div><!--/category-tab-->


            </div>
        </div>
    </div>
</section>
<!-- END CONTAINER-->
<!-- FOOTER-->
<?php require 'footer.php'?>
<!-- END FOOTER -->