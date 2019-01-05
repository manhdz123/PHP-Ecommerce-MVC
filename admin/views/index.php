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
                    Danh sách sản phẩm
                    <!--                    -->
                    <div class="add-product"><a href ="admin_controller.php?action=add"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></div>
                    <div class="panel-body">
                        <table border="1" align = "center" >
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Product_Name</td>
                                <td>Price</td>
                                <td>Image</td>
                                <td>Date_created</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <?php foreach ( $limitData as $value){?>
                                <tr>
                                    <td><?php echo $value['product_id']?></td>
                                    <td><?php echo $value['title']?></td>
                                    <td><?php echo $value['name_product']?></td>
                                    <td><?php echo number_format($value['price'] ,0,'.','.')?> đ</td>
                                    <td><img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['image']?>" width="100" height="100"></td>
                                    <td><?php $newDate = date("d-m-Y",strtotime($value['date_created']));echo $newDate?></td>
                                    <td colspan="3">
                                        <a href = "admin_controller.php?action=edit&cat_id=<?php echo $value['category_id'] ?>&id=<?php echo $value['product_id'] ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>|</a>
                                        <a href = "admin_controller.php?action=delete&cat_id=<?php echo $value['category_id'] ?>&id=<?php echo $value['product_id'] ?>" onclick="return confirm_query()"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php }?>
                        </table>
                        <!-- Phân Trang -->
                        <div class="pagination-area">
                            <?php
                            if($total_page >1 && $page >1){
                                echo '<a href ="admin_controller.php?action=index&cat_id='.$value['category_id'].'&page='.($page-1).'">Prev</a> ';
                            }
                            // lap khoang giua
                            for($i=1 ;$i<=$total_page; $i++) {
                                // neu la trang hien tai thi hien thi the span
                                // nguoc lai hien thi the a
                                if ($i == $page) {
                                    echo '<span>' .$i. '</span> ';
                                } else {
                                    echo '<a href="admin_controller.php?action=index&cat_id='.$value['category_id'].'&page='.$i.'">'.$i.'</a>  ';
                                }
                            }if($page <$total_page && $total_page >1){
                                echo '<a href="admin_controller.php?action=index&cat_id='.$value['category_id'].'&page='.($page+1).'">Next</a>  ';
                            }
                            ?>
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