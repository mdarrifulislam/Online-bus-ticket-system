<?php

  function select_all_category() {
      require './db_connect.php';
        $sql="SELECT * FROM tbl_category WHERE publication_status=1";
        if(mysqli_query($conn, $sql)){
            $query_result=mysqli_query($conn, $sql);
            return $query_result;
        }  else {
            die("Query Problem".mysqli_error($conn));
        }
    }


$query_result = select_all_category();
?>

<div ID="menu">
    <ul>
        <li><a href="indexx.php">HOME</a></li>
        
            <li><a href="index.php">Buy Ticket</a></li>
            <li><a href="process.php">Process</a></li>
            <li><a href="contact.php">Contact us</a></li>
            <li><a href="service.php">TEAM MEMBERS</a></li>
			<li><a href="buss_list.php">Buss List</a></li>
            <!--
			<li><a href="view_info.php">Info</a></li>
			-->
    </ul>

</div>