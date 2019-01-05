<?php
/*
    - Lớp Database thực hiện việc kết nối cơ sở dữ liệu MySQL.
	- Lớp cung cấp một số phương thức cơ bản để thao tác với CSDL như:
		+ Kết nối cơ sở dữ liệu
		+ Tạo truy vấn, thực hiện truy vấn
		+ Lấy dữ liệu và trả dữ liệu về dưới dạng mảng hoặc đối tượng
*/

class DB{
    public $servername ='localhost';
    public $username ='root';
    public $password ='';
    public $dbname ='dienthoaididong';
    public $conn ;
    public $table_name_error ='Please check string query';
    public $db_connect_error ='Please chech server info!';

    /*
       -Mô tả:Phương thức khởi tạo , thực hiện kết nối đến cơ sở dữ liệu
       -Tham số:
            + $servername: nhận tên hoặc địa chỉ IP của máy chủ csdl MySQL. Giá trị mặc định là localhost
			+ $dbname: Tên cơ sở dữ liệu cần làm việc. Giá trị mặc định là csdl test có sãn trong MySQL
			+ $username: chứa tên đăng nhập của tài khoản để truy cập vào MySQL
			+ $password: mật khẩu của tài khoản
            + $db_connect_error:thông báo lỗi kết nối tới cơ sở dữ liệu
            + $table_name_error :thông báo sai lỗi câu lệnh
    $
    */
    public function __construct()
    {
        $this->conn = new  mysqli($this->servername,$this->username, $this->password ,$this->dbname);
        mysqli_set_charset($this->conn,'utf8');
        if($this->conn->connect_errno){
            echo $this->db_connect_error; die;
        }
    }
    public function executeQuery($str_sql)
    {
        $result = $this->conn->query($str_sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    public function fetchArray($query){
        $arr = [];
        if($query->num_rows > 0){
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            $arr = $result;
        }
        return $arr;
    }
}
?>
