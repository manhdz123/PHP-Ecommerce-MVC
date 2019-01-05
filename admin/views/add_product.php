<?php require_once 'header.php';
 require_once 'left_siderbar.php';
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $time_now = getdate();
    $show_day = $time_now['mday']. ' / ' .$time_now['mon']. ' / '.$time_now['year'];
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
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- --><?php /*include 'index.php'*/?>
                <div class="panel-heading">
                    Thêm mới sản phẩm
                    <!--                    -->
                    <div class="add-product"><a href ="#">Them moi</a></div>
                    <div class="panel-body">
                        <div class="canvas-wrapper">
                            <div class="main-chart" id="line-chart">
                                <div class ="form-add">
                                    <form action ="admin_controller.php?action=addAction" method = "post">
                                        <div class="content">
                                            <div class ="left-column">
                                                <p>Tên sản phẩm: <input type ="text" name ="name"></p>
                                                <p>Nhà sản xuất: <select name ="product_name" style="padding: 12px">
                                                                    <option title ="APPLE" value ="APPLE">APPLE</option>
                                                                    <option title ="SAMSUNG" value ="SAMSUNG">SAMSUNG</option>
                                                                    <option title ="SONNY" value ="SONNY">SONNY</option>
                                                                    <option title ="OPPO" value ="OPPO">OPPO</option>
                                                                    <option title ="MOBISTAR" value ="MOBISTAR">MOBISTAR</option>
                                                                    <option title ="ASUS" value ="ASUS">ASUS</option>
                                                                    <option title ="DELL" value ="DELL">DELL</option>
                                                                    <option title ="HP" value ="HP">HP</option>
                                                                </select><!--<input type ="text" name ="product_name">-->

                                                </p>
                                                <p>Giá sản phẩm: <input type ="text" name ="price"></p>
                                                <p>Giá khuyến mãi: <input type ="text" name ="sale_price"></p>
                                                <p>Màn hình: <input type ="text" name ="screen"></p>
                                                <p>Kích thước: <input type ="text" name ="size"></p>
                                                <p>Bộ nhớ: <input type ="text" name ="memory"></p>
                                                <p>Khuyến mãi: <input type ="text" name ="promotion"></p>
                                            </div>
                                            <div class ="right-column">
                                                <p>Hệ điều hành: <input type ="text" name ="os"></p>
                                                <p>Chip xử lý: <input type ="text" name ="chip"></p>
                                                <p>Pin: <input type ="text" name ="batery"></p>
                                                <p>Camera: <input type ="text" name ="camera"></p>
                                                <p>Loại sản phẩm:   <select name ="category_id" style="padding: 12px">
                                                                        <option title="Điện thoại" value ="1">Điện thoại</option>
                                                                        <option title ="Máy tính" value="7">Laptop</option>
                                                                        <option title ="Phụ kiện" value="12">Phụ kiện</option>
                                                                    </select></p>
                                                <p>Ngày tạo:<input type ="date" name ="date_created" <!--value='--><?php /*echo $show_day */?>' ></p>
                                                <p>Khuyến mãi từ:<input type ="date" name ="date_sale"></p>
                                                <p>Hạn Khuyến mãi:<input type ="date" name ="date_due"></p>
                                            </div>
                                            <div class ="note">
                                                <textarea rows ="5" cols="90" name ="note">Mô tả sản phẩm</textarea>
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