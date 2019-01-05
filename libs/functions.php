<?php
require_once '../configs/config.php';
require_once '../models/db.php';
// get data from model after paging
    function pagination(){
        // kiem tra bien page tren url
        if(isset($_GET['page']))
        {
            $current_page = $_GET['page'];
        }else{
            $current_page = 1;
        }
        $start = ($current_page - 1)*LIMIT;
        return array(
            "start"=>$start,
            "page"=>$current_page

        );
    }
    function PaginationProduct(){
        if(isset($_GET['page']))
        {
            $current_page = $_GET['page'];
        }else{
            $current_page = 1;
        }
        $start = ($current_page- 1)*LIMIT_PRODUCT;
        return array(
            "start"=>$start,
            "page"=>$current_page
        );
    }

?>