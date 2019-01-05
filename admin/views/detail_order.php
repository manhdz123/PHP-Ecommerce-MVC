<?php require_once 'header.php'?>
<?php require_once 'left_siderbar.php'?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- --><?php /*include 'index.php'*/?>
                <div class="panel-heading">
                    Chi tiết đơn hàng
                    <!--                    -->
                    <div class="panel-body">
                        <div class="canvas-wrapper">
                            <div class="main-chart" id="line-chart">
                                <div class ="form-add">
                                    <div class="modal-body">
                                        <div class ="col-md-12 modal_body_left">
                                            <h3 class ="form_signup">Chi tiết đơn hàng</h3>
                                            <?php foreach ($_SESSION['info_customer'] as $value){?>
                                            <h4 style="font-weight: 300" name ="date_created" value =" ">Thời gian :<?php echo $value['date_order']?> </h4>
                                            <table border="1" align = "center" style="margin: 0px" >
                                                <div class="content">
                                                    <div class ="cart_content">

                                                        <p>Tên khách hàng: <input type ="text" name ="title" value="<?php echo $value['name_customer'] ?>"></p>
                                                        <p>Số điện thoại: <input type ="text" name ="short_title" value="<?php echo $value['phone_number']?>"></p>
                                                        <p>Email: <input type ="text" name ="author"  value="<?php echo $value['email']?>"></p>
                                                        <p>Địa chỉ:<input type ="text" name ="date_created" value="<?php echo $value['adress']?>" ></p>
                                                        <p>Tổng giá trị đơn hàng:<input type ="text" name ="date_created" value="<?php echo number_format($value['total_price'] ,3,'.','.')?> đ" ></p>
                                                    </div>
                                                    <div class ="note">
                                                        <textarea rows ="5" cols="55" name ="content_news" ><?php echo $value['note']?></textarea>
                                                    </div>
                                                    <?php }?>
                                                </div>
                                                <h3 class ="form_signup">Thông tin sản phẩm</h3>
                                                <tr>
                                                    <td>ID</td>
                                                    <td>Tên sản phẩm</td>
                                                    <td>Giá tiền</td>
                                                    <td>Số lượng</td>
                                                    <td>Tổng tiền</td>
                                                    <td>Ảnh sản phẩm</td>
                                                </tr>
                                                </thead>
                                                <?php foreach ( $_SESSION['list_product'] as $value){?>
                                                    <tr>
                                                        <td><?php echo $value['id']?></td>
                                                        <td><?php echo $value['name_products']?></td>
                                                        <td><?php echo number_format($value['price'] ,0,'.','.')?> đ</td>
                                                        <td><?php echo $value['quantity']?></td>
                                                        <td><?php echo number_format($value['price'] * $value['quantity'] ,0,'.','.')?> đ</td>
                                                        <td><img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['images']?>" width="100" height="100"></td>
                                                    </tr>
                                                <?php }?>
                                            </table>
                                        </div>
                                        <div class ="clearfix"></div>
                                    </div>
                                </div>


                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>	<!--/.main-->
</div>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>
</body>
</html>