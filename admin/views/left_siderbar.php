<?php
    $image = $_SESSION['user_info']['image'];
    $username = $_SESSION['user_info']['username'];
?>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="<?php echo URL_FRONT_END_IMAGES?>/<?php echo $image ?>" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name"><?php echo $username ?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <!--<form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>-->

    <ul class="nav menu" id ="left_menu">
        <li><a href="admin_controller.php?action=users"><em class="fa fa-user-circle-o">&nbsp;</em> User Management</a></li>
        <li><a href="admin_controller.php?action=customer"><em class="fa fa-user">&nbsp;</em> List Customers</a></li>
        <li><a href="admin_controller.php?action=dashboard"><em class="fa fa-clone">&nbsp;</em> Dashboard</a></li>
        <li class=""><a href="admin_controller.php?action=index&cat_id=1"><em class="fa fa-mobile">&nbsp;</em> Mobile</a></li>
        <li><a href="admin_controller.php?action=index&cat_id=7"><em class="fa fa-laptop">&nbsp;</em> Laptop</a></li>
        <li><a href="admin_controller.php?action=index&cat_id=12"><em class="fa fa-bar-chart">&nbsp;</em> Accessories</a></li>
        <li><a href="admin_controller.php?action=banner"><em class="fa fa-toggle-off">&nbsp;</em> Banner</a></li>
        <li><a href="admin_controller.php?action=news"><em class="fa fa-clone">&nbsp;</em> News</a></li>
        <li><a href="admin_controller.php?action=logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>

</div><!--/.sidebar-->