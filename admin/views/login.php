<?php
    require_once '../configs/config.php'
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lumino - Login</title>
    <link href="../views/css/bootstrap.min.css" rel="stylesheet">
    <link href="../views/css/datepicker3.css" rel="stylesheet">
    <link href="../views/css/styles.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="../views/js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Log in</div>
            <div class="panel-body ">
                <form  method = "POST" action ="<?php echo URL_FRONT_END.'controllers/admin_controller.php?action=login'?>" class="form-login">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="User Name" name="username" type="text" autofocus="" REQUIRED>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                        </div>
                        <div class="checkbox">
                            <input class="btn btn-primary" type ="submit" value ="Login " name ="btnSubmit" id="btnLogin">
                            <input class="btn btn-primary" type ="reset" value ="Resert" name ="btnSubmit">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
