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
                                    <form action ="admin_controller.php?action=addNewsAction" method = "post">
                                        <div class="content">
                                            <div class ="left-column title">
                                                <p>Tiêu đề: <input type ="text" name ="title"></p>
                                                <p>Mô tả ngắn: <input type ="text" name ="short_title"></p>
                                                <p>Tác giả: <input type ="text" name ="author"></p>
                                                <p>Ngày tạo:<input type ="datetime-local" name ="date_created" ></p>
                                                <p>Loại tin:   <select name ="type_news">
                                                        <option  value="hot">Tin mới</option>
                                                        <option  value="tip">Thủ thuật</option>
                                                        <option  value="cus">Khách hàng</option>
                                                    </select></p>
                                            </div>
                                            <div class ="note">
                                                <textarea rows ="5" cols="90" name ="content_news">Nội dung tin tức</textarea>
                                            </div>
                                            <div class ="submit">
                                                <input type ="submit" value="Thêm mới">
                                                <input type ="file" name ="image" >
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