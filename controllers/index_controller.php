<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 08/05/2017
 * Time: 4:55 PM
 */
session_start();
require_once '../configs/config.php';
require_once '../models/index_model.php';
require_once '../libs/functions.php';
require_once '../models/db.php';


/* B1:Tạo class IndexController điều hướng thao tác người dùng*/
class IndexController{
    public $index_model;            // khởi tạo biến index_model

    public function __construct()   // hàm khởi tạo
    {
        $this->index_model = new IndexModel();
        $_SESSION['data_banner'] = $this->index_model->getAllBanner();

    }
    /* B5 tạo các function điều hướng action gọi function trong index_model */
    //Trang Index
    function indexAction(){

       $_SESSION['data_dienthoai']= $this->index_model->getAllMobile();

       $_SESSION['data_laptop'] = $this->index_model->getAllLaptop();
       $_SESSION['data_phukien'] = $this->index_model->getAllAccessories();
       $_SESSION['data_sanphammoi'] = $this->index_model->getNewsPhone();
       $_SESSION['data_tintucmoi']= $this->index_model->getLastNews();
       $_SESSION['menu'] = $this->index_model->getAllCategories();
       require_once '../views/index.php';
    }
    //Hiển thị tin tức
    function newsAction($dataNews){
       $_SESSION['thuthuat_tintuc']=$this->index_model->getTipsNews();
       $_SESSION['khachhang_tintuc']=$this->index_model->getCusNews();

        $dataNews = $this->index_model->getAllNews();
        $count = count($dataNews); // đếm số bản ghi trong bảng news

        // Hàm phân trang
       $pager = pagination($dataNews);
       $total_page = ceil($count/LIMIT);
       $page = $pager['page'];
       $start = $pager['start'];
       $dataNewsLimit = $this->index_model->getNewsLimit($start);
       require_once '../views/news.php';
    }
    //Hiển thị khuyến mãi
    function promoteAction($data){
        $_SESSION['thuthuat_tintuc']=$this->index_model->getTipsNews();
        $_SESSION['khachhang_tintuc']=$this->index_model->getCusNews();
        $_SESSION['tintuc_khuyenmai'] = $this->index_model->getPromotion();
        
        $data= $this->index_model->getAllPromotion();

        $count = count($data); // đếm số bản ghi trong bảng news
        // Hàm phân trang
        $pager = pagination($data);
        $total_page = ceil($count/LIMIT);
        $page = $pager['page'];
        $start = $pager['start'];
        $dataPromotionLimit = $this->index_model->getPromotionLimit($start);
        require_once '../views/promote.php';
    }
    //Trang hỗ trợ khách hàng
    function supportAction($data){
        $_SESSION['hotro_khachhang']=$this->index_model->getAllSupport();
        $_SESSION['data_tintucmoi']= $this->index_model->getLastNews();
        // Hàm phân trang
        $data = $_SESSION['hotro_khachhang'];
        $count = count($data);
        $pager = pagination($data);
        $total_page = ceil($count/LIMIT);
        $page = $pager['page'];
        $start = $pager['start'];
        $dataCusLimit = $this->index_model->getLimitCus($start);
        require_once '../views/support_customers.php';
    }
    //Chi tiết sản phẩm
    function detailProductsAction($data){
        $_SESSION['data_products'] = $this->index_model->getProductsById($data);
        $_SESSION['list_anh'] =$this->index_model->getMoreImage($data);
        require_once '../views/detail_products.php';
    }
    //Chi tiết tin tức
    function detailNewsAction($data){
        $_SESSION['data_news'] = $this->index_model->getNewsById($data);
        $_SESSION['thuthuat_tintuc']=$this->index_model->getTipsNews();
        $_SESSION['khachhang_tintuc']=$this->index_model->getCusNews();
        require_once '../views/detail_news.php';
    }
    //Chi tiết khuyến mại
    function detailPromoteAction($data){
        $_SESSION['thuthuat_tintuc']=$this->index_model->getTipsNews();
        $_SESSION['khachhang_tintuc']=$this->index_model->getCusNews();
        $_SESSION['chitiet_khuyenmai']=$this->index_model->getPromotionById($data);
        require_once '../views/detail_promotion.php';
    }
    //Xử lý tìm kiếm sản phẩm
    function searchAction($data){
        $_SESSION['data_sanphammoi'] = $this->index_model->getNewsPhone();
        $_SESSION['data_tintucmoi']= $this->index_model->getLastNews();

        if(isset($_REQUEST['btn_search']) || (isset($_REQUEST['search_value']) && $_REQUEST['search_value']!= '')){
            $search_value = $_REQUEST['search_value'];
            $_SESSION['timkiem_sanpham'] = $this->index_model->searchProducts($data);

           //Phân trang sản phẩm tìm kiếm
            $count=count($_SESSION['timkiem_sanpham']);
            $pager = PaginationProduct($_SESSION['timkiem_sanpham']);
            $total_page = ceil($count/LIMIT_PRODUCT);
            $page = $pager['page'];
            $start = $pager['start'];
            $_SESSION['timkiem_sp_name'] = $this->index_model->searchProductsByKey($data,$start);
            require_once '../views/search_products.php';
        }
    }
    //Hiển thị trang giỏ hàng
    function cartAction(){
        require_once '../views/cart.php';
    }
    // Xử lý đăng nhập
    function loginAction($data){
        $_SESSION['data_dienthoai']= $this->index_model->getAllMobile();
        $_SESSION['data_laptop'] = $this->index_model->getAllLaptop();
        $_SESSION['data_phukien'] = $this->index_model->getAllAccessories();
        $_SESSION['data_sanphammoi'] = $this->index_model->getNewsPhone();
        $_SESSION['data_tintucmoi']= $this->index_model->getLastNews();
        $user_info = $this->index_model->checkLogin($data);
        if($user_info ){
            $_SESSION['user_info'] = $user_info;
            require '../views/index.php';
        }
        else{
            echo '<script>';
                echo 'alert("Sai tên đăng nhập hoặc mật khẩu");';
            echo '</script>';

            require  '../views/index.php';
        }
    }
    // Logout tài khoản
    function logoutAction(){
        unset($_SESSION['user_info']);
        $this->indexAction();
    }
    //Thêm tài khoản
    function addAction($data){
        $result = $this->index_model->addNewUser($data);
        $this->indexAction();
    }
    //Lưu comment của khách hàng
    function commentUser($data){
        $result = $this->index_model->insertNewComment($data);
        header('Location:http://localhost:3030/DO_AN/controllers/index_controller.php?action=index');
    }

}
/* B2:Tạo new Object UserController */
$index = new IndexController();
/* B3: Kiểm tra biến action của người dùng*/
if(isset($_REQUEST['action']))
{
    $action =$_REQUEST['action'];
}else{
    $action = 'index';
}
/* B4: Kiểm tra biến action truyền về */
switch ($action){
    case 'index':
        $index->indexAction();
        break;
    case 'news':
        $index->newsAction($_REQUEST);
        break;
    case 'promote':
        $index->promoteAction($_REQUEST);
        break;
    case 'detail_promte':
        $index->detailPromoteAction($_REQUEST);
        break;
    case 'support_customers':
        $index->supportAction($_REQUEST);
        break;
    case 'detail_products':
        $index->detailProductsAction($_REQUEST);
        break;
    case 'detail_news':
        $index->detailNewsAction($_REQUEST);
        break;
    case 'search':
        $index->searchAction($_REQUEST);
        break;
    case 'cart':
        $index->cartAction();
        break;
    case 'login':
        $index->loginAction($_REQUEST);
        break;
    case 'logout':
        $index->logoutAction();
        break;
    case 'addUser':
        $index->addAction($_REQUEST);
        break;
    case 'comment':
        $index->commentUser($_REQUEST);
        break;
    default:
        $index->indexAction();
        break;
}
?>