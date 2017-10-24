<?php

class Admin {

    protected $db_connect;

    public function __construct() {

 
        $this->db_connect = mysqli_connect('localhost', 'root', '','id1965681_buss_ticket');
        if (!$this->db_connect) {
            die('Connection Fail' . mysqli_error($this->db_connect));
        }
//        $host_name='localhost';
//        $user_name='root';
//        $password='';
//        $db_name='db_ecomerce';
//        $this->db_connect= mysqli_connect($host_name, $user_name, $password,$db_name);
//      if (!$this->db_connect){
//          die("connection fail".mysqli_error($this->db_connect));
//      }
    }

    public function admin_login_check($data) {
    
        $email_address = $data['email_address'];
        $password = md5($data['password']);
//        echo $password;
//        exit();
        
        $sql = "SELECT * FROM tbl_admin WHERE email_address='$email_address' AND password='$password' ";
        if(mysqli_query($this->db_connect, $sql)) {
           $query_result =  mysqli_query($this->db_connect, $sql);
            $admin_info = mysqli_fetch_assoc($query_result);
//            echo '<pre>';
//            print_r($admin_info);
//            exit();
            if ($admin_info) {
                session_start();
                $_SESSION['admin_name']=$admin_info['admin_name'];
                $_SESSION['admin_id']=$admin_info['admin_id'];
                header("Location: admin_master.php");
            } else {
                $message = "Please, use valid email address and password";
                return $message;
            } 
        } else {
            die('Query Problem' . mysqli_error($this->db_connect));
        }
//        echo '<pre>';
//        print_r($data);
//        exit();
//        $email_address=$data['email_address'];
//        $password=  md5($data['password']);
//        $sql="SELECT * FORM tbl_admin WHERE email_address='$email_address' AND password='$password' ";
//        if (mysqli_query($sql, $this->db_connect)){
//            $query_result=mysqli_query($sql, $this->db_connect);
//            $admin_info= mysqli_fetch_assoc($query_result);
//            if ($admin_info){
//                
//            }  else {
//                $message="Please, use valid email address and password";
//                return $message;
//                
//            }
//        } else {
//            die("Query Problem".mysqli_error($this->db_connect));    
//        }
    }

}