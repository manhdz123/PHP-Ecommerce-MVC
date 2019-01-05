<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/27/2017
 * Time: 4:49 PM
 */
 require_once '../../models/db.php';
 require_once '../function/function.php';


class AdminModel extends DB{
    public function checkLogin($data){
        $str_sql = 'SELECT * FROM users WHERE username = "'. $data['username'] .'" and password = "'. sha1($data['password']) .'"';
        $result = $this->executeQuery($str_sql);
        if($result ->num_rows >0){
            return $result ->fetch_array();
        }else{
            return false;
        }
    }
    public function getAllData($data){
        $str_sql= 'SELECT * FROM products WHERE category_id = "'.$data['cat_id'].'" ';
        $result = $this->executeQuery($str_sql);
        $data = $this->fetchArray($result);
        return $data;
    }
    public function getLimitData($start,$data){
        $str_sql = "SELECT * FROM products 
                    WHERE category_id =  ".$data['cat_id']." 
                    ORDER BY date_created DESC
                    LIMIT $start ,".LIMIT_PRODUCT;
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function insertNewProduct($data){
        $str_sql = 'INSERT INTO products(category_id,name_product,title,description,price,screen
                    ,size,memory,promotion,os,cpu_speed ,camera_primary,battery,promotion_price,start_promotion,
                     end_promotion , date_created,image)
                     VALUE ( "'.$data["category_id"].'","'.$data["product_name"].'" , "'.$data["name"].'" ,"'.$data["note"].'",
                     "'.$data["price"].'","'.$data["screen"].'","'.$data["size"].'" ,
                     "'.$data["memory"].'" ,"'.$data["os"].'","'.$data["promotion"].'" ,"'.$data["chip"].'" ,"'.$data["camera"].'"
                      ,"'.$data["batery"].'","'.$data["sale_price"].'","'.$data["date_sale"].'","'.$data["date_due"].'"
                      ,"'.$data["date_created"].'" ,"'.$data["image"].'")';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function deleteUserById($id){
        $str_sql = 'DELETE FROM products WHERE product_id= "'.$id.'"';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function getInfoById($data){
        $str_sql ='SELECT * FROM products WHERE product_id= "'.$data["id"].'" ';
        $result= $this->executeQuery($str_sql);
        if($result){
            return $result ->fetch_assoc();
        }
    }
    public function updateProductById($data){
        $str_sql = 'UPDATE products SET category_id = "'.$data['category_id'].'" ,name_product= "'.$data['product_name'].'",title = "'.$data['name'].'",description = "'.$data['note'].'",
                    price = "'.$data['price'].'", screen = "'.$data['screen'].'", size = "'.$data['size'].'", memory = "'.$data['memory'].'", 
                    promotion = "'.$data['promotion'].'", os = "'.$data['os'].'", cpu_speed = "'.$data['chip'].'", camera_primary = "'.$data['camera'].'",
                    battery = "'.$data['battery'].'",promotion_price = "'.$data['sale_price'].'",start_promotion = "'.$data['date_sale'].'", end_promotion = "'.$data['date_due'].'", 
                    date_created = "'.$data['date_created'].'",image = "'.$data['image'].'"
                    WHERE product_id="'.$data['id'].'" ';
        $result= $this->executeQuery($str_sql);
        return $result;
    }
    public function getAllBanner(){
        $str_sql = 'SELECT * FROM banner';
        $data =$this->executeQuery($str_sql);
        $result= $this->fetchArray($data);
        return $result ;
    }
    public function insertNewBanner($data){
        $str_sql = 'INSERT INTO banner(title2 , content , image)  VALUE ( "'.$data['title'].'" , "'.$data['note'].'" , "'.$data['image'].'")';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function deleteBanner($id){
        $str_sql = 'DELETE FROM banner WHERE id= "'.$id.'"';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function getBannerById($data){
        $str_sql ='SELECT * FROM banner WHERE id= "'.$data["id"].'" ';
        $result= $this->executeQuery($str_sql);
        if($result){
            return $result ->fetch_assoc();
        }
    }
    public function updateBannerById($data){
        $str_sql= 'UPDATE banner SET title2 ="'.$data['title'].'" , content = "'.$data['note'].'" , image= "'.$data['image'].'"
                    WHERE id ="'.$data['id'].'"';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function updateStatusBanner($data){
        $str_sql = 'UPDATE banner SET status = "'.$data.'"';
        $result = $this->executeQuery($str_sql);
        $data = $this->fetchArray($result);
        return $data;
    }
    public function getAllNews(){
        $str_sql='SELECT * FROM news ';
        $data = $this->executeQuery($str_sql);
        $result =$this->fetchArray($data);
        return $result;
    }
    public function insertNews($data){
        $str_sql = 'INSERT INTO news(type_news , short_title , title,content,author,date_created,images)  
                    VALUE ( "'.$data['type_news'].'" , "'.$data['short_title'].'" , "'.$data['title'].'" , "'.$data['content_news'].'" ,
                     "'.$data['author'].'","'.$data['date_created'].'" , "'.$data['image'].'")';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function getNewsById($data){
        $str_sql ='SELECT * FROM news WHERE id_news= "'.$data["id"].'" ';
        $result= $this->executeQuery($str_sql);
        if($result){
            return $result ->fetch_assoc();
        }
    }
    public function updateNewsById($data){
        $str_sql= 'UPDATE news SET title ="'.$data['title'].'" , content = "'.$data['content_news'].'" , 
                            type_news = "'.$data['type_news'].'" ,short_title = "'.$data['short_title'].'" ,
                            author = "'.$data['author'].'" ,date_created = "'.$data['date_created'].'" ,images= "'.$data['image'].'"
                    WHERE id_news ="'.$data['id'].'"';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function getLimitNews($start){
        $str_sql = "SELECT * FROM news ORDER BY date_created DESC
                    LIMIT $start ,".LIMIT_PRODUCT;
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function getNumbersMobile(){
        $str_sql  = 'SELECT product_id FROM products WHERE category_id = 1';
        $result = $this->executeQuery($str_sql);
        return mysqli_num_rows($result);
    }
    public function getNumbersLaptop(){
        $str_sql  = 'SELECT product_id FROM products WHERE category_id = 7';
        $result = $this->executeQuery($str_sql);
        return mysqli_num_rows($result);
    }
    public function getNumbersAccessories(){
        $str_sql  = 'SELECT product_id FROM products WHERE category_id = 12';
        $result = $this->executeQuery($str_sql);
        return mysqli_num_rows($result);
    }
    public function deleteNews($id){
        $str_sql = 'DELETE FROM news WHERE id_news= "'.$id.'"';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function listDashBoard(){
        $str_sql='SELECT * FROM ordered ORDER BY date_order ASC';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function getInfoCustomer($cart_id){
        $str_sql = 'SELECT * FROM ordered WHERE cart_id ="'.$cart_id.'"';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function getListProducts($cart_id){
        $str_sql = 'SELECT * FROM carts WHERE cart_id ="'.$cart_id.'"';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function getAllUsers($data){
        $usr_sql = 'SELECT * FROM users';
        $result = $this->executeQuery($usr_sql);
        $data = $this->fetchArray($result);
        return $result;
    }
    public function deleteUser($user_id){
        $str_sql = 'DELETE FROM users WHERE id = '.$user_id.' and status ="Thành viên"';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function insertNewUser($data){
        $str_sql = 'INSERT INTO users(username , fullname , password,email,image,status,phone_number)  
                    VALUE ( "'.$data['username'].'" , "'.$data['name'].'" , "'. sha1($data['password']) .'" , "'.$data['email'].'" , "'.$data['user_image'].'", "'.$data['status'].'", "'.$data['phone'].'")';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function getUserById($data){
        $usr_sql = 'SELECT * FROM users WHERE id = "'.$data['user_id'].'"';
        $result = $this->executeQuery($usr_sql);
        if($result){
            return $result ->fetch_assoc();
        }
    }
    public function updateUserById($data){
        $str_sql = 'UPDATE users SET username = "'.$data["username"].'", password = "'. sha1($data['password']) .'" ,fullname =  "'.$data["name"].'" ,email = "'.$data["email"].'",
                     image = "'.$data["user_image"].'" WHERE id = '.$data['user_id'].'';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    //banner
    public function updateNumberProducts($id,$status){
        $str_sql= 'UPDATE banner SET status ="'.$status.'" 
                    WHERE id ="'.$id.'"';
        $result = $this->executeQuery($str_sql);
        return $result;
    }
    public function listCustomer(){
        $str_sql='SELECT * FROM customer ';
        $result = $this->executeQuery($str_sql);
        return $result;
    }

}