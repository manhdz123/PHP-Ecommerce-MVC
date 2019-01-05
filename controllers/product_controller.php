<?php

session_start();
require_once '../configs/config.php';
require_once '../models/index_model.php';
require_once '../libs/functions.php';
require_once '../models/db.php';
require_once '../models/product_model.php';
class ProductController{
    public $product_model;
    public $index_model;

    public function __construct()
    {
        $this->product_model = new ProductModel();

    }
    //Hiển thị danh sách sản phẩm
    function productsAction($data){
        if(isset($_GET['name_product']))
        {
            $name_product = $_GET['name_product'];
        }
        if(isset($_GET['cat_id'])) {
            $cat_id = $_GET['cat_id'];
        }
        $_SESSION['data_sanpham'] =$this->product_model->getProductsByName($data);
        // Phân trang sản phẩm
        $count =count($_SESSION['data_sanpham']);
        $pager = PaginationProduct($_SESSION['data_sanpham']);
        $total_page = ceil($count/LIMIT_PRODUCT);
        $page = $pager['page'];
        $start = $pager['start'];
        $dataProductsLimitByName = $this->product_model->getProductsLimitByName($start,$data);
        require_once '../views/products.php';
    }
    // Hiển thị danh sách sản phẩm theo loại/nhà sản xuất
    function listProductsAction($data){
        if(isset($_GET['cat_id'])){
            $cat_id=$_GET['cat_id'];
        }
        $_SESSION['data_sanpham']=$this->product_model->getAllProducts($data);

        $count =count($_SESSION['data_sanpham']);
        // Phân trang sản phẩm
        $pager = PaginationProduct($_SESSION['data_sanpham']);
        $total_page = ceil($count/LIMIT_PRODUCT);
        $page = $pager['page'];
        $start = $pager['start'];
        $dataProductsLimit = $this->product_model->getProductsLimit($start,$data);
        require_once '../views/list_product.php';
    }
    // Hàm xử lý giỏ hàng
    public function CartAction(){
        $_SESSION['products'] = $this->product_model->getProductsForCart();
        $data=array();
        foreach ($_SESSION['products'] as $value){
            $data[$value['product_id']] = $value;
        }
        require '../views/cart1.php';
    }
    //Hiển thị đơn hàng
    public function ShowCartAction(){
        require '../views/cart.php';
    }
    //Xóa đơn hàng theo id
    public function DeleteCartAction(){
        $id = $_GET['id'];
        // Xóa session data sản phẩm
        unset($_SESSION['cart'][$id]);
        require '../views/cart.php';
    }
    //Cập nhật đơn hàng
    public function UpdateCartAction(){
        if(isset($_POST['ok'])){
            unset($_POST['ok']);
            foreach ($_POST as $key =>$value){
                $_SESSION['cart'][$key]['soluong'] = $value;
                $id_product =($_SESSION['cart'][$key]['product_id']);
                $result = $this->product_model->updateNumberProducts($value,$id_product);
            }
        }
        // Thêm danh sách sản phẩm vào bảng carts
        require '../views/cart.php';
    }
    public function thankAction($data){
        // Lấy thời gian hiện tại tạo hóa đơn
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $time_now = getdate();
        $show_day =    $time_now['mday']. ' / ' .$time_now['mon']. ' / '.$time_now['year'].' - '.$time_now['hours']. 'giờ / '.$time_now['minutes']. 'phút / '.$time_now['seconds'].'giây' ;

        // Tạo mã hóa đơn ngẫu nhiên
        $id_order = $this->rand_string(8);

        $result = $this->product_model->insertNewOrder($data,$show_day,$id_order);
        foreach ($_SESSION['cart'] as $data)
            $cart = $this->product_model->insertProductsToCart($data,$id_order);

        unset($_SESSION['cart']);
        require '../views/thank.php';
    }
    // Hàm tạo mã ngẫu nhiên
    public function rand_string( $length ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $size = strlen( $chars );
        for( $i = 0; $i < $length; $i++ ) {
            $str = substr( str_shuffle( $chars ), 4, $length );
        }
        return $str;
    }
    //Hàm hủy đơn hàng
    public function deleteCart(){
        unset($_SESSION['cart']);
        require '../views/thank.php';
    }
}
$product= new ProductController();

if(isset($_REQUEST['action'])){
    $action = $_REQUEST['action'];
}else{
    $action = 'index';
}

switch ($action){
    case 'products':
        $product->productsAction($_REQUEST);
        break;
    case 'list_products':
        $product->listProductsAction($_REQUEST);
        break;
    case 'cart';
        $product->CartAction();
        break;
    case 'show_cart':
        $product->ShowCartAction();
        break;
    case 'delete':
        $product->DeleteCartAction();
        break;
    case 'update':
        $product->UpdateCartAction();
        break;
    case 'del_cart':
        $product->deleteCart();
        break;
    case 'thank':
        $product->thankAction($_REQUEST);
        break;

}