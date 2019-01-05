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

    <!-- daboard -->
    <?php include 'top_content.php'?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- --><?php /*include 'index.php'*/?>
                <div class="panel-heading">
                    Quản lý Banner
                    <!--                    -->
                    <div class="add-product"><a href ="admin_controller.php?action=addBanner"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></div>
                    <div class="panel-body">
                        <form action ="admin_controller.php?action=editStatusBanner" method ="post" class="form-banner">
                            <table border="1" align = "center">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Tiêu đề</td>
                                    <td>Nội dung</td>
                                    <td>Hình ảnh</td>
                                    <td>Trạng thái</td>
                                    <td>Action</td>
                                </tr>
                                </thead>
                                <?php foreach ( $result as $value){?>
                                    <tr>
                                        <td><?php echo $value['id']?></td>
                                        <td><?php echo $value['title2']?></td>
                                        <td><?php echo $value['content']?></td>
                                        <td><img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['image']?>" width="100" height="100"></td>
                                        <td>
                                            <select>
                                                <?php
                                                    $status_banner = $value['status'];
                                                    if($status_banner == 1){
                                                        echo '<option value="1" >SHOW </option>';
                                                        echo '<option value="0" name="status_banner"> HIDE</option>';
                                                    }else{
                                                        echo '<option value="0">HIDE</option>';
                                                        echo '<option value="1"> SHOW</option>';
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                        <td colspan="3">
                                            <a href = "admin_controller.php?action=editBanner&id=<?php echo $value['id'] ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>|</a>
                                            <a href = "admin_controller.php?action=deleteBanner&id=<?php echo $value['id'] ?>" onclick="return confirm_query()"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php }?>
                            </table>
                            <input type ="submit" value="Cập nhật" name="btnOk">
                        </form>

                        </div>
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