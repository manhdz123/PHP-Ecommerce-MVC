<?php

session_start();
require 'configs/config.php';
require '../models/db.php';

header('Location:'.URL_FRONT_END.'controllers/admin_controller.php?action=showPageLogin');

?>