<?php $username = ($_SESSION['user_info']['username'])?>
<div class="header_top2"><!--header_top-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="contactinfo">
                    <ul class="nav nav-pills">
                        <li>
                            <a class="navbar-brand" href="#">
                                <?php
                                {
                                    echo '<marquee with = "50%" ><b ><span style = "font-size: 20px;color: white" >Xin chào '.$username.'</b ></span ></marquee >';
                                }
                                ?>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-sm-6 header_topright">
                <div class="social-icons pull-right">
                    <ul class="nav navbar-nav">
                        <li><a href="#" > <?php echo $username?></a></li>
                        <li><a  href="index_controller.php?action=logout" >Đăng xuất</a></li>
                        <li><a href="#">Hotline : 04.21092016</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--/header_top-->