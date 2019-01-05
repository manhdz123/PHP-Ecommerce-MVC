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

    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-laptop" aria-hidden="true"></em>
                        <div class="large"><?php echo $count_mobile?></div>
                        <div class="text-muted">Laptop</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-blue panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-mobile" aria-hidden="true"></em>
                        <div class="large"><?php echo $count_laptop ?></div>
                        <div class="text-muted">Mobile</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-orange panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-archive" aria-hidden="true"></em>
                        <div class="large"><?php echo $count_accessories ?></div>
                        <div class="text-muted">Accessories</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-red panel-widget ">
                    <div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
                        <div class="large">25.2k</div>
                        <div class="text-muted">Page Views</div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- --><?php /*include 'index.php'*/?>
                <div class="panel-heading">
                    Danh sách tài khoản khách hàng
                    <!--                    -->
                    <div class="add-product"><a href ="admin_controller.php?action=addUser"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></div>
                    <div class="panel-body">
                        <div class="canvas-wrapper">

                            <table border="1" align = "center" style="margin: 15px">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Tên đăng nhập</td>
                                    <td>Họ và tên</td>
                                    <td>Email</td>
                                    <td>Số điện thoại</td>
                                    <td>Địa Chỉ</td>
                                </tr>
                                </thead>
                                <?php foreach ($result as $value){?>
                                    <tr>
                                        <td><?php echo $value['user_id']?></td>
                                        <td><?php echo $value['username']?></td>
                                       <!-- <td><input type="password" readonly style="border: 0" value="<?php /*echo $value['password']*/?>"</td>-->
                                        <td><?php echo $value['fullname']?></td>
                                        <td><?php echo $value['email']?></td>
                                        <td><?php echo $value['phone_number']?></td>
                                        <td><?php echo $value['address']?></td>
                                    </tr>
                                <?php }?>
                                <!--<!-- Phân Trang -->
                                <div class="pagination-area">
                                    <?php
                                    /*
                                                                            */?>
                                </div>
                            </table>
                        </div>
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