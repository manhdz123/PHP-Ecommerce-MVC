<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 08/05/2017
 * Time: 4:59 PM
 */
require_once  '../configs/config.php';
require_once  '../models/db.php';

class IndexModel extends DB{

    public function checkLogin($data){
        $str_sql = 'SELECT * FROM customer WHERE username = "'. $data['username'] .'" and password = "'. sha1($data['password']) .'"';
        $result = $this->executeQuery($str_sql);
       if($result ->num_rows >0){
           return $result ->fetch_array();
       }else{
           return false;
       }
    }
    public function addNewUser($data){
        $str_sql = 'INSERT INTO customer(username , password,email,phone_number,address,fullname) 
                    VALUES ( "'.$data["username"].'" ,"'.sha1($data["password"]).'" ,"'.$data["email"].'" ,"'.$data["phone"].'" ,"'.$data["address"].'","'.$data["full_name"].'" ) ';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function getAllMobile(){
        $str_sql = 'SELECT * FROM products WHERE category_id = "1" ORDER BY date_created DESC LIMIT 3';
        $result  = $this->executeQuery($str_sql);
        return $result;
    }
    public function getNewsPhone(){
        $str_sql ='SELECT * FROM products WHERE promotion= "new" LIMIT 2 ';
        $result  = $this->executeQuery($str_sql);
        return $result;
    }
    public function getAllLaptop(){
        $str_sql = 'SELECT * FROM products WHERE category_id = "7" ORDER BY date_created DESC LIMIT 3';
        $result  = $this->executeQuery($str_sql);
        return $result;
    }
    public function getAllNews(){
        $str_sql='SELECT * FROM news';
        $result = $this->executeQuery($str_sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getNewsLimit($start){
        $str_sql = "SELECT * FROM news 
                    ORDER BY date_created DESC
                    LIMIT $start ,".LIMIT;
        $result = $this->executeQuery($str_sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getLastNews(){
        $str_sql='SELECT * FROM news WHERE type_news = "hot" ORDER BY date_created DESC LIMIT 4';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function getTipsNews(){
        $str_sql='SELECT * FROM news WHERE type_news = "tip" ORDER BY date_created DESC LIMIT 5';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function getCusNews(){
        $str_sql='SELECT * FROM news WHERE type_news = "cus" ORDER BY date_created DESC LIMIT 5';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function getAllBanner(){
        $str_sql = 'SELECT * FROM banner WhERE status = '.SHOW_BANNER.' ';
        $result = $this->executeQuery($str_sql);
        $data = $this->fetchArray($result);
        return $data;
    }
    public function getAllAccessories(){
        $str_sql = 'SELECT * FROM products WHERE category_id = "12" ORDER BY date_created DESC LIMIT 6';
        $result  = $this->executeQuery($str_sql);
        return $result;
    }
    public function getNewsById($data){
        $str_sql='SELECT * FROM news WHERE id_news= "'.$data['id_news'] .'"';
        $result = $this->executeQuery($str_sql);
        $data = $this->fetchArray($result);
        return $data;
    }
    public function getProductsById($data){
        $str_sql = 'SELECT * FROM products WHERE product_id = "'.$data['product_id'].'"';
        $result = $this->executeQuery($str_sql);
        $data = $this->fetchArray($result);
        return $data;
    }
    public function getAllCategories(){
        $str_sql = 'SELECT * FROM categories WHERE category_id = 0 ';
        $result = $this->executeQuery($str_sql);
        /*$data = $this->fetchArray($result);*/
        /*return $data;*/
        $arr_menu = [];
            foreach ($result as $key =>$value){
                $arr_menu[] = $value;
                $query = 'SELECT * FROM categories WHERE category_id = '.$value['id'].'  ';
                $data =$this->executeQuery($query);
                $result = $this->fetchArray($data);
                $arr_menu[]=$result;
            }
        return $arr_menu;
    }
    public function searchProducts($data){
        $str_sql = 'SELECT * FROM products WHERE title like "%'.$data['search_value'].'%"' ;
        $result = $this->executeQuery($str_sql);
        //$count = count($result);
        if($result->num_rows > 0){
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return false;
        }
    }
    public function searchProductsByKey($data,$start){
        $str_sql = "SELECT * FROM products WHERE title like '%".$data['search_value']."%'
                    LIMIT $start,".LIMIT_PRODUCT ;
        $result = $this->executeQuery($str_sql);
        if($result->num_rows > 0){
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return false;
        }
    }
    public function getMoreImage($data){
        $str_sql = 'SELECT * FROM list_images 
                    WHERE product_id = "'.$data['product_id'].'"';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function getProductsLimitByName($start){
        $str_sql = "SELECT * FROM products 
                    ORDER BY date DESC
                    LIMIT $start ,".LIMIT;
        $result = $this->executeQuery($str_sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getAllSupport(){
        $str_sql = 'SELECT * FROM support_cus ORDER BY date';
        $result = $this->executeQuery($str_sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getLimitCus($start){
        $str_sql = "SELECT * FROM support_cus
                    ORDER BY date DESC 
                    LIMIT $start,".LIMIT;
        $result = $this->executeQuery($str_sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getAllPromotion(){
        $str_sql = 'SELECT * FROM promotion ';
        $result = $this->executeQuery($str_sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getPromotion(){
        $str_sql = 'SELECT * FROM promotion ORDER BY date DESC LIMIT 3';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function getPromotionById($data){
        $str_sql='SELECT * FROM promotion WHERE id= "'.$data['id'] .'"';
        $result = $this->executeQuery($str_sql);
        $data = $this->fetchArray($result);
        return $data;
    }
    public function getPromotionLimit($start){
        $str_sql = "SELECT * FROM promotion 
                    ORDER BY date DESC
                    LIMIT $start ,".LIMIT;
        $result = $this->executeQuery($str_sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function insertNewComment($data){
        $str_sql = 'INSERT INTO comments(fullname , comment_content , email)  VALUE ( "'.$data['username'].'" , "'.$data['comment'].'" , "'.$data['email'].'")';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
}
