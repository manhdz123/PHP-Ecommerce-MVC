<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 08/05/2017
 * Time: 4:59 PM
 */
require_once  '../configs/config.php';
require_once  '../models/db.php';

class ProductModel extends DB{
    public function getProductsByName($data){
        $str_sql= 'SELECT * FROM products WHERE name_product = "'.$data['name_product'].' " AND category_id = "'.$data['cat_id'].'" ';
        $result = $this->executeQuery($str_sql);
        $data = $this->fetchArray($result);
        return $data;
    }
    public function getProductsLimitByName($start ,$data){
        $str_sql = "SELECT * FROM products 
                    WHERE category_id =  ".$data['cat_id']." AND name_product = '".$data['name_product']."'
                    ORDER BY date_created DESC
                    LIMIT $start ,".LIMIT_PRODUCT;
        $datanew = $this->executeQuery($str_sql);
        $result = $this->fetchArray($datanew);
        return $result;
    }
    public function getAllProducts($data){
        $str_sql= 'SELECT * FROM products WHERE category_id = "'.$data['cat_id'].'" ';
        $result = $this->executeQuery($str_sql);
        $data = $this->fetchArray($result);
        return $data;
    }
    public function getProductsLimit($start ,$data){
        $str_sql = "SELECT * FROM products 
                    WHERE category_id =  ".$data['cat_id']." 
                    ORDER BY date_created DESC
                    LIMIT $start ,".LIMIT_PRODUCT;
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function getProductsForCart(){
        $str_sql = 'SELECT product_id,title,image, price FROM products ';
        $result = $this->executeQuery($str_sql);
        $data = $this->fetchArray($result);
        return $data;
    }
    public function insertNewOrder($data,$show_day,$id_order){
        $str_sql = 'INSERT INTO ordered (name_customer , total_price,note,phone_number,adress,date_order,cart_id,email ) 
                    VALUE ( "'.$data['name'].'" , "'.$data['total_money'].'" , "'.$data['note'].'", "'.$data['phone'].'" , "'.$data['adress'].'" ,"'.$show_day.'","'.$id_order.'","'.$data['email'].'")';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function insertProductsToCart($data,$id_order){
        $str_sql = 'INSERT INTO carts (product_id , name_products,price,quantity ,images,cart_id) 
                    VALUE ( "'.$data['product_id'].'" , "'.$data['title'].'" , "'.$data['price'].'", "'.$data['soluong'].'" , "'.$data['image'].'","'.$id_order.'")';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function updateNumberProducts($value,$id_product){
        $str_sql= 'UPDATE carts SET quantity ="'.$value.'" 
                    WHERE product_id ="'.$id_product.'"';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    
}