<?php
require_once '../configs/config.php';

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