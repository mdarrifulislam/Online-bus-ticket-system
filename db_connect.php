<?php

 $conn = mysqli_connect('localhost', 'root', '',''); //host_name,user_name,password
        if ($conn) {
            // echo 'Database Connected';
            mysqli_select_db($conn, 'id1965681_buss_ticket'); //conection_variable,database_name
        } else {
            die('Conection Fail' . mysqli_error($conn)); //conection_variable
        }

?>