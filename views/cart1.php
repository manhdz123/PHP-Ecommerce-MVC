<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/21/2017
 * Time: 10:35 AM
 */

$id = $_GET['product_id'];

    if(!isset($_SESSION['cart']) or empty($_SESSION['cart'])){
        $data[$id]['soluong'] = 1;
        $_SESSION['cart'][$id] =$data[$id];
    }else{
        //kiem tra san pham da ton tai trong gio hang chua
        if(array_key_exists($id , $_SESSION['cart'])){
            $_SESSION['cart'][$id]['soluong']+=1;

        }else{
            $data[$id]['soluong']=1;
            $_SESSION['cart'][$id] = $data[$id];
            echo "<pre>";
            print_r($_SESSION['cart']);
        }
    }
    header('Location:http://localhost:3030/DO_AN/index.php');