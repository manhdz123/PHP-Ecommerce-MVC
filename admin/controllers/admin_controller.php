<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/27/2017
 * Time: 4:49 PM
 */
session_start();
require_once '../models/admin_model.php';
require_once '../../models/db.php';
require_once '../function/function.php';


class AdminController{

    public $admin_model;
    public function __construct()   // hàm khởi tạo
    {
        $this->admin_model = new AdminModel();
    }
    //Hiển thị trang login
    function showPageLoginAction(){
        require '../views/login.php';
    }
    //Xử lý đăng nhập
    function loginAction($data){
        $user_info = $this->admin_model->checkLogin($data);
        if($user_info ){
            $_SESSION['user_info'] = $user_info;
            header('Location:admin_controller.php?action=index&cat_id=1');
        }
        else{
            require '../views/login.php';
        }
    }
    function indexAction($data){
        if(isset($cat_id)){
            $cat_id = $_GET['cat_id'];
        }else{
            $cat_id = 'mobile';
        }
        //Đếm số lượng sản phẩm
        $count_mobile = $this->admin_model->getNumbersMobile();
        $count_laptop=$this->admin_model->getNumbersLaptop();
        $count_accessories=$this->admin_model->getNumbersAccessories();
        // phan trang
        $_SESSION['data'] = $this->admin_model->getAllData($data);
        $count = count($_SESSION['data']);
        $paging = PaginationProduct($_SESSION['data']);
        $total_page = ceil($count/LIMIT_PRODUCT);
        $page = $paging['page'];
        $start = $paging['start'];
        $limitData = $this->admin_model->getLimitData($start,$data);
        require_once '../views/index.php';
    }
    //Hiển thị trang thêm mới sản phẩm
    function showPageAdd(){
        require_once '../views/add_product.php';
    }
    //Xử lý thêm sản phẩm
    function addAction($data){
        $result = $this->admin_model->insertNewProduct($data);
        if($result){
            header('Location:admin_controller.php?action=index&cat_id='.$data['category_id'].' ');
        }
    }
    //Xóa sản phẩm theo id
    function deleteAction(){
        $id=$_GET['id'];
        $cat_id = $_GET['cat_id'];
        $result = $this->admin_model->deleteUserById($id);
        header('Location:admin_controller.php?action=index&cat_id='.$cat_id.' ');
    }
    //Chỉnh sửa sản phẩm
    function showEditPage($data){
        $id = $_GET['id'];
        $cat_id = $_GET['cat_id'];
        $result = $this->admin_model->getInfoById($data);
        if($result){
            $_SESSION['data'] = $result;
            require_once '../views/edit_product.php';
        }
    }
    //Cập nhật mới sản phẩm theo id
    function updateAction($data){
        $id = $_GET['id'];
        $cat_id = $_GET['cat_id'];
        $result= $this->admin_model->updateProductById($data);
        if($result){
            header('Location:admin_controller.php?action=index&cat_id='.$cat_id.'');
        }
    }
    //Hiển thị trang Banner
    function showPageBanner(){
        // Đếm số lượng sản phẩm
        $count_mobile = $this->admin_model->getNumbersMobile();
        $count_laptop=$this->admin_model->getNumbersLaptop();
        $count_accessories=$this->admin_model->getNumbersAccessories();
        $result= $this->admin_model->getAllBanner();
        require_once '../views/banner.php';
    }
    //Thêm mới banner
    function showPageAddBanner(){
        require_once '../views/add_banner.php';
    }
    //Xử lý thêm mới banner
    function addBannerAction($data){
        $result =$this->admin_model->insertNewBanner($data);
        if($result){
            header('Location:admin_controller.php?action=banner');
        }
    }
    //Xóa banner
    function deleteBanner(){
        $id =$_GET['id'];
        $result = $this->admin_model->deleteBanner($id);
        header('Location:admin_controller.php?action=banner');
    }
    //Chỉnh sửa banner
    function editBanner($data){
        $id = $_GET['id'];
        $result = $this->admin_model->getBannerById($data);
        if($result){
            $_SESSION['data'] = $result;
            require_once '../views/edit_banner.php';
        }
    }
    //Cập nhật banner
    function updateBanner($data){
        $id = $_GET['id'];
        $result= $this->admin_model->updateBannerById($data);
        if($result){
            header('Location:admin_controller.php?action=banner');
        }
    }
    //Hiển thị danh sách tin tức
    function showPageNews(){
        $_SESSION['news'] = $this->admin_model->getAllNews();
        // Đếm số lượng sản phẩm
        $count_mobile = $this->admin_model->getNumbersMobile();
        $count_laptop=$this->admin_model->getNumbersLaptop();
        $count_accessories=$this->admin_model->getNumbersAccessories();
        //Phân trang
        $count = count($_SESSION['news']);
        $paging = PaginationProduct($_SESSION['news']);
        $total_page = ceil($count/LIMIT_PRODUCT);
        $page = $paging['page'];
        $start = $paging['start'];
        $limitNews =$this->admin_model->getLimitNews($start);
        require '../views/news.php';
    }
    //Trang thêm mới tin tức
    function showPageAddNews(){
        require_once '../views/add_news.php';
    }
    //Xử lý thêm mới
    function addNewsAction($data){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $time_now = getdate();
        $show_day =  $time_now['hours']. '/ '.$time_now['minutes']. ' / '.$time_now['seconds']. ' - '.  $time_now['mday']. ' / '
                    .$time_now['mon']. ' / '.$time_now['year'];

        $result =$this->admin_model->insertNews($data,$show_day);
        if($result){
            header('Location:admin_controller.php?action=news');
        }
    }
    //Xóa tin tức
    function deleteNews($data){
        $id =$_GET['id'];
        $result = $this->admin_model->deleteNews($id);
        header('Location:admin_controller.php?action=news');
    }
    //Chỉnh sủa tin tức
    function editNews($data){
        $id = $_GET['id'];
        $result = $this->admin_model->getNewsById($data);
        if($result){
            $_SESSION['data'] = $result;
            require_once '../views/edit_new.php';
        }
    }
    //Cập nhật tin tức
    function updateNewsAction($data){
        $id = $_GET['id'];
        $result= $this->admin_model->updateNewsById($data);
        if($result){
            header('Location:admin_controller.php?action=news');
        }
    }
    //Hiển thị danh sách đơn hàng
    function showPageDashboard($data){
        // Đếm số lượng sản phẩm
        $count_mobile = $this->admin_model->getNumbersMobile();
        $count_laptop=$this->admin_model->getNumbersLaptop();
        $count_accessories=$this->admin_model->getNumbersAccessories();
        // Danh sách đơn hàng
        $_SESSION['dashboard'] = $this->admin_model->listDashBoard();
        require_once '../views/dashboard.php';
    }
    //Chi tiết đơn hàng
    function showDetailOrder(){
        // Chi tiết đơn hàng
        $cart_id=$_GET['cart_id'];
        $_SESSION['info_customer'] = $this->admin_model->getInfoCustomer($cart_id);
        $_SESSION['list_product'] = $this->admin_model->getListProducts($cart_id);
        require_once '../views/detail_order.php';
    }
    //Đăng xuất
    function logoutAction(){
        header('Location:admin_controller.php?action=showPageLogin');
    }
    //====================================================================
    //Danh sách user
    function showUsers($data){
        //Đếm số lượng sản phẩm
        $count_mobile = $this->admin_model->getNumbersMobile();
        $count_laptop=$this->admin_model->getNumbersLaptop();
        $count_accessories=$this->admin_model->getNumbersAccessories();

        $_SESSION['users'] = $this->admin_model->getAllUsers($data);
        require_once '../views/users.php';
    }
    //Thêm mới quản trị
    function showPageAddUser(){
        require_once '../views/add_user.php';
    }
    //Xóa quản trị
    function deleteUserAction(){
        $user_id = $_GET['user_id'];
        $status = $_GET['status'];
        $result = $this->admin_model->deleteUser($user_id);
        header('Location:admin_controller.php?action=users&user_id='.$user_id.'_deleted');
    }
    //Xử lý thêm mới
    function addUserAction($data){
        $result = $this->admin_model->insertNewUser($data);
        var_dump($result);
        if($result){
            header('Location:admin_controller.php?action=users');
        }
    }
    //Trang chỉnh sửa thông tin user
    function showUserEditPage($data){
        $id = $_GET['user_id'];
        $result = $this->admin_model->getUserById($data);
        if($result){
            $_SESSION['data'] = $result;
            require_once '../views/edit_user.php';
        }
    }
    //Cập nhật tài khoản
    function updateUser($data){
        $id = $_GET['user_id'];
        $result= $this->admin_model->updateUserById($data);
        var_dump($result);
        if($result){
            header('Location:admin_controller.php?action=users');
        }
    }
    // Danh sách khách hàng
    function listCustomer(){
        //Đếm số lượng sản phẩm
        $count_mobile = $this->admin_model->getNumbersMobile();
        $count_laptop=$this->admin_model->getNumbersLaptop();
        $count_accessories=$this->admin_model->getNumbersAccessories();

        $result = $this->admin_model->listCustomer();
        require_once '../views/list_customer.php';
    }

}

$admin = new AdminController();

if(isset($_REQUEST['action'])){
    $action = $_REQUEST['action'];
}else{
    $action = 'index';
}

switch ($action){
    case 'users' :
        $admin-> showUsers($_REQUEST);
        break;
    case 'addUser':
        $admin ->showPageAddUser();
        break;
    case 'insertUsers':
        $admin->addUserAction($_REQUEST);
        break;
    case 'editUsers':
        $admin -> showUserEditPage($_REQUEST);
        break;
    case 'updateUsers':
        $admin -> updateUser($_REQUEST);
        break;
    case 'deleteUser':
        $admin->deleteUserAction($_REQUEST['id']);
        break;
    case 'showPageLogin':
        $admin-> showPageLoginAction();
        break;
    case 'index':
        $admin-> indexAction($_REQUEST);
        break;
    case 'login':
        $admin-> loginAction($_REQUEST);
        break;
    case 'add':
        $admin-> showPageAdd();
        break;
    case 'addAction':
        $admin ->addAction($_REQUEST);
        break;
    case 'delete':
        $admin->deleteAction($_REQUEST['id']);
        break;
    case 'edit':
        $admin ->showEditPage($_REQUEST);
        break;
    case 'update':
        $admin->updateAction($_REQUEST);
        break;
    case 'banner':
        $admin->showPageBanner();
        break;
    case 'addBanner':
        $admin->showPageAddBanner();
        break;
    case 'addBannerAction':
        $admin->addBannerAction($_REQUEST);
        break;
    case 'deleteBanner':
        $admin ->deleteBanner($_REQUEST['id']);
        break;
    case'editBanner':
        $admin->editBanner($_REQUEST);
        break;
    case 'updateBanner':
        $admin->updateBanner($_REQUEST);
        break;
    case 'editStatusBanner':
        $admin->editStatusBanner($_REQUEST);
        break;
    case 'news':
        $admin->showPageNews();
        break;
    case 'addNews':
        $admin->showPageAddNews();
        break;
    case 'addNewsAction':
        $admin->addNewsAction($_REQUEST);
        break;
    case 'deleteNews':
        $admin->deleteNews($_REQUEST);
        break;
    case 'editNews':
        $admin->editNews($_REQUEST);
        break;
    case 'updateNews':
        $admin->updateNewsAction($_REQUEST);
        break;
    case 'dashboard':
        $admin->showPageDashboard($_REQUEST);
        break;
    case 'show_detail':
        $admin->showDetailOrder();
        break;
    case 'customer':
        $admin->listCustomer();
        break;
    case 'logout':
        $admin->logoutAction();
        break;
}