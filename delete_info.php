<?php
$customer=$_GET['custumer_id'];
delete_customer_info($customer);
function delete_customer_info($customer){
    require 'db_connect.php'; 
        $sql="DELETE FROM ticket_tbl WHERE custumer_id='$customer' ";
        if(mysqli_query($conn, $sql)){
            header("Location:view_info.php");
        }  else {
            die("SQL PROBLEM".mysqli_error($conn));
        }
}



