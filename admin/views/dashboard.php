<?php
require_once 'header.php';

require_once 'left_siderbar.php';
?>
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
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div><!--/.row-->
    <!-- dasboard -->
    <?php include 'top_content.php'?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách đơn hàng
                    <!--                    -->
                    <div class="add-product"><a href ="admin_controller.php?action=add"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></div>
                    <div class="panel-body">
                        <table border="1" align = "center" style="margin: 25px ;text-align: center">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Tên khách hàng</td>
                                <td>Mã đơn hàng</td>
                                <td>Số điện thoại</td>
                                <td>Ngày tạo </td>
                                <!--<td>Địa chỉ</td>-->
                                <td>Tổng tiền đơn hàng</td>
                                <!--<td>Status</td>-->
                                <td>Xem chi tiết</td>
                            </tr>
                            </thead>
                            <?php foreach ($_SESSION['dashboard'] as $value){?>
                                <tr>
                                    <td><?php echo $value['id_order']?></td>
                                    <td><?php echo $value['name_customer']?></td>
                                    <td><?php echo $value['cart_id']?></td>
                                    <td><?php echo $value['phone_number']?></td>
                                    <td><?php echo $value['date_order']?></td>
                                    <!--<td><?php /*echo $value['adress']*/?></td>-->
                                    <td><?php echo number_format($value['total_price'] ,3,'.','.')?> đ</td>
                                    <!--<td>Đã giao hàng</td>-->
                                    <td><a href="admin_controller.php?action=show_detail&cart_id=<?php echo $value['cart_id']?>"><i class="fa fa-folder-open" aria-hidden="true"></i></a></td>
                                </tr>
                            <?php }?>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>	<!--/.main-->
</div>

<script type="text/javascript">
    function confirm_query() {
        if(window.confirm('Bạn có muốn thực hiện hành động này không ?')){
            return true;
        }else{
            return false;
        }
    }
</script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#left_menu li").click(function () {
            $("#left_menu li").removeClass("active");
            $(this).addClass("active");
        });
    });
</script>
</body>
</html>