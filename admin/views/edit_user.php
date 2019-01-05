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
                                    <form action ="admin_controller.php?action=updateUsers&user_id=<?php echo $_SESSION['data']['id']?>" method = "post">
                                        <div class="content">
                                            <div class ="left-column">
                                                <p>Username: <input type ="text" name ="username" value="<?php echo $_SESSION['data']['username'] ?>"></p>
                                                <p>Password: <input type ="password" name ="password" value="<?php echo $_SESSION['data']['password'] ?>"></p>
                                                <p>Name: <input type ="text" name ="name" value="<?php echo $_SESSION['data']['fullname'] ?>"></p>
                                                <p>Email: <input type ="text" name ="email" value="<?php echo $_SESSION['data']['email'] ?>"></p>
                                                <p>Image: <img id="image" src ="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $_SESSION['data']['image'] ?>" style="width: 150px; height: 150px;margin-left: 60px"></p>
                                            </div>
                                            <div class ="submit">
                                                <input type ="submit" value="Cập nhật">
                                                <input type ="file" name ="user_image" value="<?php echo $_SESSION['data']['image'] ?>">
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