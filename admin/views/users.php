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
                    Danh sách User
                    <!--                    -->
                    <div class="add-product"><a href ="admin_controller.php?action=addUser"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></div>
                    <div class="panel-body">
                        <div class="canvas-wrapper">
                           <!-- <div class="main-chart news" id="line-chart">-->
                                <table border="1" align = "center" style="margin: 15px">
                                    <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Username</td>
                                        <!--<td>Password</td>-->
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Image</td>
                                        <td>Status</td>
                                        <td>Phone</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <?php foreach ($_SESSION['users'] as $value){?>
                                        <tr>
                                            <td><?php echo $value['id']?></td>
                                            <td><?php echo $value['username']?></td>
                                            <!--<td><input type="password" readonly style="border: 0" value="<?php /*echo $value['password']*/?>"</td>-->
                                            <td><?php echo $value['fullname']?></td>
                                            <td><?php echo $value['email']?></td>
                                            <td><img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['image']?>" width="100" height="100"></td>
                                            <td><?php echo $value['status']?></td>
                                            <td><?php echo $value['phone_number']?></td>
                                            <td colspan="3">
                                                <a href = "admin_controller.php?action=editUsers&user_id=<?php echo $value['id'] ?>&status=<?php echo $value['status']?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>|</a>
                                                <a href = "admin_controller.php?action=deleteUser&user_id=<?php echo $value['id'] ?>&status=<?php echo $value['status']?>" onclick="return confirm_query()"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    <?php }?>
                                    <!--<!-- Phân Trang -->
                                    <div class="pagination-area">
                                        <?php
/*
                                        */?>
                                    </div>
                                </table>
                            <!--</div>-->
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