<?php 


//class Application {
//    private $db_connect; 
//    public function __construct() {
//        $host_name = 'localhost';
//        $user_name = 'id1965681_root';
//        $password = 'root123';
//        $db_name = 'id1965681_buss_ticket';
//        $this->db_connect = mysqli_connect($host_name, $user_name, $password, $db_name);
//        if (!$this->db_connect) {
//            die('Connection Fail' . mysqli_error($this->db_connect));
//        }
//    }
//
//    public function get_ticket_info($data) {
//        $sql="INSERT INTO ticket_info(ticket_from, ticket_to,ticket_date,return_date) VALUES('$data[ticket_from]','$data[ticket_to]','$data[ticket_date]','$data[return_date]') ";
//        if(mysqli_query($this->db_connect, $sql)){
//            $message="Your Info saved successfully";
//            return $message;
//        }  else {
//            die("Query Problem".mysqli_error($this->db_connect));    
//        }
//        
//    }
//}