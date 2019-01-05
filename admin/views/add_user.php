<?php require_once 'header.php';
require_once 'left_siderbar.php';
date_default_timezone_set("Asia/Ho_Chi_Minh");
$time_now = getdate();
$show_day =  $time_now['hours']. '/ '.$time_now['minutes']. ' / '.$time_now['seconds']. '  '.  $time_now['mday']. ' / ' .$time_now['mon']. ' / '.$time_now['year'];
?>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- --><?php /*include 'index.php'*/?>
                <div class="panel-heading">
                    Thêm mới Tin tức
                    <!--                    -->
                    <div class="panel-body">
                        <div class="canvas-wrapper">
                            <div class="main-chart" id="line-chart">
                                <div class ="form-add">
                                    <form action ="admin_controller.php?action=insertUsers" method = "post">
                                        <div class="content">
                                            <div class ="left-column title">
                                                <p>Username: <input type ="text" name ="username"></p>
                                                <p>Password: <input type ="password" name ="password"></p>
                                                <p>Name: <input type ="text" name ="name"></p>
                                                <p>Phone: <input type ="text" name ="phone"></p>
                                                <p>Email:<input type ="email" name ="email" ></p>
                                                Status:
                                                    <select name="status">
                                                        <option>Quản trị</option>
                                                        <option>Thành viên</option>
                                                    </select>
                                                <p>Image:  <input style="border: 0" readonly type="text" name=""></p>
                                            </div>
                                            <div class ="submit">
                                                <input type ="submit" value="Thêm mới">
                                                <input type ="file" name ="user_image" >
                                            </div>
                                        </div>
                                    </form>

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