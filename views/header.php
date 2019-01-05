<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>LAN-LỤA-LY</title>
    <link href="<?php echo URL_FRONT_END ?>views/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL_FRONT_END ?>views/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo URL_FRONT_END?>views/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo URL_FRONT_END?>views/css/price-range.css" rel="stylesheet">
    <link href="<?php echo URL_FRONT_END?>views/css/animate.css" rel="stylesheet">
    <link href="<?php echo URL_FRONT_END?>views/css/main.css" rel="stylesheet">
    <link href="<?php echo URL_FRONT_END?>views/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?php echo URL_FRONT_END?>views/js/html5shiv.js"></script>
    <script src="<?php echo URL_FRONT_END?>views/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--head-->

<body>
<header id="header">
    <!-- header-top-->
    <?php
        if(isset($_SESSION['user_info']))
            {
                include 'header_top2.php';
            }
        else
            {
                include 'header_top.php';
            }

    ?>
    <!--header-middle -->
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index_controller.php?action=index"><img src="<?php echo URL_FRONT_END?>views/imager/logo.png" alt="" width="250" height="150" /></a>
                    </div>

                </div>
                <!-- search products -->
                <div class="col-sm-8">
                    <div class="search_box pull-right">
                        <form action =" <?php echo 'index_controller.php?action=search'?>" method="post">
                            <input type ="hidden" name ="action" value ="search">
                            <input type="text" name ="search_value" placeholder="Nhập thông tin cần tìm" value="<?php echo $key_search =(isset($_REQUEST['search_value']))?$_REQUEST['search_value']: ''; ?>"/>
                            <button type="submit" name ="btn_search" id="searchsubmit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="cart-info">
                        <?php
                            if(!isset($_SESSION['cart']) or empty($_SESSION['cart'])){
                                echo '<h4>Bạn có 0 sản phẩm trong giỏ hàng  <i class="fa fa-shopping-cart" aria-hidden="true"></i></h4>';
                            }else{
                                $total =0;
                                foreach ($_SESSION['cart'] as $value){
                                    $total +=$value['soluong'];
                                }
                                echo "<h4>Bạn có <a href ='product_controller.php?action=show_cart'><span> $total </span> </a>sản phẩm trong giỏ hàng <a href ='product_controller.php?action=show_cart'>
                                        <i class='fa fa-shopping-cart' aria-hidden='true'></i></a></h4>";
                            }
                        ?>
                    </div>
                </div>
                <!-- end search products -->
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index_controller.php?action=index" class="active">Home</a></li>
                            <?php
                                foreach ($_SESSION['menu'] as $key =>$value) {
                                    if(isset($value[0]))
                                    {
                                        echo '<ul role="menu" class="sub-menu">';
                                        foreach($value as $key => $value)
                                        {
                                            echo ' <li><a href="product_controller.php?action=products&cat_id='.$value['category_id'].'&name_product='.$value['category_name'].'">'.$value['category_name'].'</a></li>';
                                        }
                                        echo '</ul>';
                                    }
                                    else
                                    {
                                        echo '<li class="dropdown"><a href="product_controller.php?action=list_products&cat_id='.$value['id'].'">'.$value['category_name'].'<i class="fa fa-angle-down"></i></a>';
                                    }
                                }
                            ?>
                            <li><a href="index_controller.php?action=news">Tin tức</a></li>
                            <li><a href="index_controller.php?action=promote">Khuyến mại</a></li>
                            <li><a href="index_controller.php?action=support_customers">Hỗ trợ khách hàng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">

                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
    <div class ="modal fade" id ="myModal" role="dialog" tabindex="-1">
        <div class ="modal-dialog">
            <!-- Modal content -->
            <div class ="modal-content">
                <div class="modal-header">
                    <button type ="button" class ="close" data-dismiss="modal">x</button>
                </div>
                <div class ="modal-body">
                    <div class ="col-md-8 modal_body_left">
                        <h3 class ="form_signin">Sign In <span>Now</span></h3>
                        <form action ="<?php echo URL_FRONT_END.'controllers/index_controller.php?action=login' ?>" method="post">
                            <div class ="style_input">
                                <input type ="text" name ="username" required ="">
                                <label>Name</label>
                                <span></span>
                            </div>
                            <div class ="style_input">
                                <input type="password" name ="password" required ="">
                                <label>Password</label>
                                <span></span>
                            </div>
                            <input type ="submit" value ="Sign In" name ="btnSubmit">
                        </form>
                        <p><a href ="#" data-toggle="modal" data-target ="#myModal2">Don't have an account?</a> </p>
                    </div>
                    <div class ="col-md-4 modal_body_right">
                        <img src ="<?php echo URL_FRONT_END_IMAGES ?>/log_pic.jpg" alt ="">
                    </div>
                    <div class ="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal login -->
    <!-- Modal Sign Up -->
    <div class ="modal fade" id ="myModal2" tabindex="-1" role ="dialog">
        <div class ="modal-dialog">
            <!-- modal content-->
            <div class ="modal-content">
                <div class ="modal-header">
                    <button type ="button" class ="close" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    <div class ="col-md-8 modal_body_left">
                        <h3 class ="form_signup">Sign Up Now</h3>
                        <form action ="index_controller.php?action=addUser" method ="post">
                            <div class ="style_input">
                                <input type="text" name ="username" required="">
                                <label>Name</label>
                                <span></span>
                            </div>
                            <div class ="style_input">
                                <input type="text" name ="full_name" required="">
                                <label>Full Name</label>
                                <span></span>
                            </div>
                            <div class="style_input">
                                <input type="email" name="email" required="">
                                <label>Email</label>
                                <span></span>
                            </div>
                            <div class="style_input">
                                <input type="text" name="phone" required="">
                                <label>Phone Number</label>
                                <span></span>
                            </div>
                            <div class="style_input">
                                <input type="text" name="address" required="">
                                <label>Address</label>
                                <span></span>
                            </div>
                            <div class="style_input">
                                <input type="password" name="password" required="">
                                <label>Password</label>
                                <span></span>
                            </div>
                            <div class="style_input">
                                <input type="password" name="Confirm Password" required="">
                                <label>Confirm Password</label>
                                <span></span>
                            </div>
                            <input type="submit" value="Sign Up" name = "add">
                        </form>
                        <p><a href ="#">By clicking register, I agree to your terms</a> </p>
                    </div>
                    <div class ="col-md-4 modal_body_right">
                        <img src ="<?php echo URL_FRONT_END_IMAGES ?>/log_pic.jpg" alt ="">
                    </div>
                    <div class ="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Sign Up -->
</header><!--/header-->