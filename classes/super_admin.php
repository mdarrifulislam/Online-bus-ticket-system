<?php

class Super_admin {

    private $db_connect;

    public function __construct() {

        $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'id1965681_buss_ticket'; 
        $this->db_connect = mysqli_connect($host_name, $user_name, $password, $db_name);
        if (!$this->db_connect) {
            die('Connection Fail' . mysqli_error($this->db_connect));
        }
    }

    public function save_category_info($data) {
        $sql = "INSERT INTO tbl_category(category_name,category_description,publication_status) VALUES('$data[category_name]','$data[category_description]','$data[publication_status]')";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "Category info save successfully";
            return $message;
        } else {
            die("Query Problem" . mysqli_error($this->db_connect));
        }
    }

    public function select_all_category() {
        $sql = "SELECT * FROM tbl_category";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die("Query Problem" . mysqli_error($this->db_connect));
        }
    }
     public function unpublish_category_id($category_id){
         $sql = "UPDATE tbl_category SET publication_status=0 WHERE category_id='$category_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $message='Category info unpublish successfully';
            return $message;
        } else {
            die("Query Problem" . mysqli_error($this->db_connect));
        }
     }
     
     public function publish_category_id($category_id){
         $sql = "UPDATE tbl_category SET publication_status=1 WHERE category_id='$category_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $message='Category info publish successfully';
            return $message;
        } else {
            die("Query Problem" . mysqli_error($this->db_connect));
        }
     }
     
     public function select_category_info_by_id($category_id) {
        $sql = "SELECT * FROM tbl_category WHERE category_id='$category_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die("Query Problem" . mysqli_error($this->db_connect));
        } 
     }
     public function update_category_info($data) {
         
         $sql = "UPDATE tbl_category SET category_name='$data[category_name]',category_description='$data[category_description]',  publication_status='$data[publication_status]' WHERE category_id='$data[category_id]' ";
        if (mysqli_query($this->db_connect, $sql)) {
            
            $_SESSION['message']='Category info updated successfully';
            header("Location:manage.php");
        } else {
            die("Query Problem" . mysqli_error($this->db_connect));
        }
     }
     public function delete_category_id($category_id) {
         $sql="DELETE FROM tbl_category WHERE category_id='$category_id' ";
        if(mysqli_query($this->db_connect, $sql)){
            $message="Category info successfully deleted";
            return $message;
        }  else {
            die("Query Problem".mysqli_error($this->db_connect));   
        }
     }
     public function save_ticket_info($data){
         $sql = "INSERT INTO tbl_admin_ticket_info(bus_name,available_seats,start_time,journey_date,ticket_info_description,from_place,to_place,publication_status,category_id) VALUES('$data[bus_name]','$data[available_seats]','$data[start_time]','$data[journey_date]','$data[ticket_info_description]','$data[from_place]','$data[to_place]','$data[publication_status]',$data[category])";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "Ticket info save successfully";
            return $message;
        } else {
            die("Query Problem" . mysqli_error($this->db_connect));
        }
     }
     public function select_all_ticket_info() {
       
          $sql = "SELECT * FROM tbl_admin_ticket_info";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die("Query Problem" . mysqli_error($this->db_connect));
        }
     }
     public function unpublish_ticket_id($ticket_id) {
         $sql = "UPDATE tbl_admin_ticket_info SET publication_status=0 WHERE ticket_id='$ticket_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $message='Ticket info unpublish successfully';
            return $message;
        } else {
            die("Query Problem" . mysqli_error($this->db_connect));
        }                              
     }
     public function publish_ticket_id($ticket_id) {
         $sql = "UPDATE tbl_admin_ticket_info SET publication_status=1 WHERE ticket_id='$ticket_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $message='Ticket info publish successfully';
            return $message;
        } else {
            die("Query Problem" . mysqli_error($this->db_connect));
        }
     }
     public function delete_ticket_id($ticket_id) {
         $sql="DELETE FROM tbl_admin_ticket_info WHERE ticket_id='$ticket_id' ";
        if(mysqli_query($this->db_connect, $sql)){
            $message="Ticket info successfully deleted";
            return $message;
        }  else {
            die("Query Problem".mysqli_error($this->db_connect));   
        }
     }
     public function select_ticket_info_by_id($ticket_id) {
        $sql = "SELECT * FROM tbl_admin_ticket_info WHERE ticket_id='$ticket_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die("Query Problem" . mysqli_error($this->db_connect));
        }  
     }
     
     public function update_ticket_info_by_id($data) {
         $sql = "UPDATE  tbl_admin_ticket_info SET bus_name='$data[bus_name]',available_seats='$data[available_seats]',start_time='$data[start_time]',journey_date='$data[journey_date]',ticket_info_description='$data[ticket_info_description]',from_place='$data[from_place]',to_place='$data[to_place]' ,  publication_status='$data[publication_status]' WHERE ticket_id='$data[ticket_id]' ";
        if (mysqli_query($this->db_connect, $sql)) {
            
            $_SESSION['message']='Category info updated successfully';
            header("Location:manage_ticket_info.php");
        } else {
            die("Query Problem" . mysqli_error($this->db_connect));
        }
         
     }



//     public function select_category_info_by_id($category_id){
//         $sql = "SELECT * FROM tbl_category WHERE category_id='$category_id' ";
//        if (mysqli_query($this->db_connect, $sql)) {
//            $query=mysqli_query($this->db_connect, $sql);
//            return $query;
//        } else {
//            die("Query Problem" . mysqli_error($this->db_connect));
//        }
//     }

public  function logout() {
        unset($_SESSION['admin_name']);
        unset($_SESSION['admin_id']);
        header("Location:index.php");
    }

}