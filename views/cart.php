<?php
    require '../configs/config.php';
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $time_now = getdate();
    $show_day =    $time_now['mday']. ' / ' .$time_now['mon']. ' / '.$time_now['year'].' - '.$time_now['hours']. 'giờ / '.$time_now['minutes']. 'phút / '.$time_now['seconds'].'giây' ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | E-Shopper</title>
    <link href="<?php echo URL_FRONT_END?>/views/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL_FRONT_END?>/views/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo URL_FRONT_END?>/views/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo URL_FRONT_END?>/views/css/price-range.css" rel="stylesheet">
    <link href="<?php echo URL_FRONT_END?>/views/css/animate.css" rel="stylesheet">
    <link href="<?php echo URL_FRONT_END?>/views/css/main.css" rel="stylesheet">
    <link href="<?php echo URL_FRONT_END?>/views/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?php echo URL_FRONT_END?>/views/js/html5shiv.js"></script>
    <script src="<?php echo URL_FRONT_END?>/views/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<?php require 'header.php'?>

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <form action ="product_controller.php?action=update" method = 'post' id ="form_cart">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $value) {
                    ?>
                        <tr>
                            <td class="cart_product">
                                <img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['image'] ?>" alt="" style="width: 110px ;height: 110px">
                            </td>
                            <td class="cart_description">
                                <h4><a href=""><?php echo $value['title'] ?></a></h4>
                            </td>
                            <td class="cart_price">
                                <p><?php echo number_format($value['price'], 0, '.', '.') ?> đ</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <input type="text" name ="<?php echo $value['product_id']?>" value="<?php echo $value['soluong']?>" required/>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"><?php $total = $value['price'] * $value['soluong'] ;echo number_format($total, 0, '.', '.') ?>đ</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="product_controller.php?action=delete&id=<?php echo $value['product_id']?>"
                                   onclick="return confirm_query()"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
                <input type ='submit' name ='ok' value ='UPDATE' onclick="return confirm_query()">
            </form>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>Hướng dẫn thanh toán</h3>
            <p>Cảm ơn quý khách đã ghé thăm website và mua hàng!</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="total_area">
                    <form action ="product_controller.php?action=update" method = 'post'>
                        <ul>
                            <?php
                            $total_money = 0;
                                foreach ($_SESSION['cart'] as $value){
                                    $total = $value['price'] * $value['soluong'];
                                    for($i=0;$i<count($total) ;$i++){
                                        $total_money += $total;
                                    }
                                }
                            ?>
                            <li>Tổng giá trị sản phẩm <span><?php echo number_format($total_money, 0, '.', '.') ?> đ</span></li>
                            <li>Giảm giá <span>10%</span></li>
                            <li>Phí ship <span>2%</span></li>
                            <li>Tổng tiền phải trả <span><?php $total_pay = ($total_money * 90)/100 + ($total_money * 2)/100 ;echo number_format($total_pay, 0, '.', '.') ?> đ</span></li>
                        </ul>
                        <a class="btn btn-default update" href="#" data-toggle="modal" data-target ="#myModal3">Tiếp tục mua hàng</a>
                        <a class="btn btn-default check_out" href="product_controller.php?action=del_cart">Hủy đơn hàng</a>
                    </form>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area" style="padding-left:20px">
                    <b><h4>VỀ CHÚNG TÔI</h4></b><br>
                    <b>Giám đốc điều hành:</b> Phan Bá Giang <br>
                    <b>Thành lập:</b> 2017 <br>
                    <b>Nhà sáng lập:</b> Tạ Thị Văn Tèo,Tấn Văn Tôm <br>
                    <b>Trụ sở:</b> 144 E3 Xuân Thủy, Cầu Giấy, Hà Nội<br>
                    Giao hàng nhanh chóng - Tận tình chu đáo - Uy tín hàng đầu<br><br>
                    Hộp thư nhận góp ý và phản hồi trực tiếp đến Tổng giám đốc ITshop.vn deptraicogisai@itshop.vn<br>
                    Chân thành cảm ơn!!<br>
                </div>
            </div>
        </div>
    </div>
</section>

  <!-- modal PAY -->
<div class ="modal fade" id ="myModal3" tabindex="-1" role ="dialog">
    <div class ="modal-dialog">
        <!-- modal content-->
<div class ="modal-content">
    <div class ="modal-header">
        <button type ="button" class ="close" data-dismiss="modal3">x</button>
    </div>
    <div class="modal-body">
        <div class ="col-md-12 modal_body_left">
            <h3 class ="form_signup">Hóa đơn</h3>
            <form action ="product_controller.php?action=thank" method ="post">
                Thời gian :<input name="date_created" value="<?php echo $show_day ?>" style="font-weight: 300;border: none;width:70%">
                <div class ="style_input">
                    <input type="text" name ="name" required="">
                    <label>Họ và tên</label>
                    <span></span>
                </div>
                <div class="style_input">
                    <input type="email" name="email" required="">
                    <label>Email</label>
                    <span></span>
                </div>
                <div class="style_input">
                    <input type="text" name="total_money" value="<?php echo number_format($total_pay,0,  '.', '.') ?> đ" required="">
                    <label>Tổng giá trị đơn hàng</label>
                    <span></span>
                </div>
                <div class="style_input">
                    <input type="text" name="phone" required="">
                    <label>Số điện thoại</label>
                    <span></span>
                </div>
                <div class="style_input">
                    <input type="text" name="adress" required="">
                    <label>Địa chỉ</label>
                    <span></span>
                </div>
                <div class="style_input">
                    <textarea rows ="5" cols="90" name ="note" placeholder="Ghi chú khi chuyển hàng"></textarea>
                    <label></label>
                    <span></span>
                </div>
                <input type="submit" value="Agree">
            </form>
            <p><a href ="#">Bạn đồng ý mua hàng!</a> </p>
        </div>
        <div class ="clearfix"></div>
    </div>
</div>
</div>
</div>

<?php require 'footer.php'?>
<script type="text/javascript">
    function confirm_query() {
        if(window.confirm('Bạn có muốn thực hiện hành động này không ?')){
            return true;
        }else{
            return false;
        }
    }
</script>
<!-- validate form -->
<script type ="text/javascript">
    $(document).ready(function(){
       $("#form_cart").validate({
          rules:{
              <?php echo $value['product_id']?> :{
                    required :'Vui lòng nhập số nguyên dương',
              }
          }
       });
    });
</script>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>