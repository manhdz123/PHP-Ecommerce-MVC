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
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div><!--/.row-->

    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-laptop" aria-hidden="true"></em>
                        <div class="large">120</div>
                        <div class="text-muted">Laptop</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-blue panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-mobile" aria-hidden="true"></em>
                        <div class="large">52</div>
                        <div class="text-muted">Mobile</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-orange panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-archive" aria-hidden="true"></em>
                        <div class="large">24</div>
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
                    Sửa thông tin sản phẩm
                    <!--                    -->
                    <div class="add-product"><a href ="#"></a></div>
                    <div class="panel-body">
                        <div class="canvas-wrapper">
                            <div class="main-chart" id="line-chart">
                                <div class ="form-add">
                                    <form action ="admin_controller.php?action=update&cat_id=<?php echo $_SESSION['data']['category_id']?>&id=<?php echo $_SESSION['data']['product_id']?>" method = "post">
                                        <div class="content">
                                            <div class ="left-column">
                                                <p>Tên sản phẩm: <input type ="text" name ="name" value="<?php echo $_SESSION['data']['title'] ?>"></p>
                                                <p>Nhà sản xuất: <input type ="text" name ="product_name" value="<?php echo $_SESSION['data']['name_product'] ?>"></p>
                                                <p>Giá sản phẩm: <input type ="text" name ="price" value="<?php echo $_SESSION['data']['price'] ?>"></p>
                                                <p>Giá khuyến mãi: <input type ="text" name ="sale_price" value="<?php echo $_SESSION['data']['promotion_price'] ?>"></p>
                                                <p>Màn hình: <input type ="text" name ="screen" value="<?php echo $_SESSION['data']['screen'] ?>"></p>
                                                <p>Kích thước: <input type ="text" name ="size" value="<?php echo $_SESSION['data']['size'] ?>"></p>
                                                <p>Bộ nhớ: <input type ="text" name ="memory" value="<?php echo $_SESSION['data']['memory'] ?>"></p>
                                                <p>Khuyến mãi: <input type ="text" name ="promotion" value="<?php echo $_SESSION['data']['promotion'] ?>"></p>
                                            </div>
                                            <div class ="right-column">
                                                <p>Hệ điều hành: <input type ="text" name ="os" value="<?php echo $_SESSION['data']['os'] ?>"></p>
                                                <p>Chip xử lý: <input type ="text" name ="chip" value="<?php echo $_SESSION['data']['cpu_speed'] ?>"></p>
                                                <p>Pin: <input type ="text" name ="battery" value="<?php echo $_SESSION['data']['battery'] ?>"></p>
                                                <p>Camera: <input type ="text" name ="camera" value="<?php echo $_SESSION['data']['camera_primary'] ?>"></p>
                                                <p>Loại sản phẩm:   <select name ="category_id" value="<?php echo $_SESSION['data']['category_id'] ?>">
                                                        <option title="Điện thoại">1</option>
                                                        <option title ="Máy tính">7</option>
                                                        <option title ="Phụ kiện">12</option>
                                                    </select></p>
                                                <p>Ngày tạo:<input type ="date" name ="date_created" value="<?php echo $_SESSION['data']['date_created'] ?>"></p>
                                                <p>Khuyến mãi từ:<input type ="date" name ="date_sale" value="<?php echo $_SESSION['data']['start_promotion'] ?>"></p>
                                                <p>Hạn Khuyến mãi:<input type ="date" name ="date_due" value="<?php echo $_SESSION['data']['end_promotion'] ?>"></p>
                                            </div>
                                            <div class ="note">
                                                <textarea rows ="5" cols="90" name ="note" ><?php echo $_SESSION['data']['description'] ?></textarea>
                                            </div>
                                            <div class ="submit">
                                                <input type ="submit" value="Cập nhật">
                                                <input type ="file" name ="image" value="<?php echo $_SESSION['data']['image'] ?>">
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
<script>
    window.onload = function () {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
    };
</script>
</body>
</html>