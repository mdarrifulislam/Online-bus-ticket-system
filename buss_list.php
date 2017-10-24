<?php

function select_buss_info() {
    require 'db_connect.php';
    $sql = "SELECT category_name , bus_name FROM tbl_admin_ticket_info tat
			left join tbl_category  tc on tat.category_id = tc.category_id
			where tat.publication_status =1 and tc.publication_status =1 order by tat.category_id asc ";
    if (mysqli_query($conn, $sql)) {
        $query_value = mysqli_query($conn, $sql);
        return $query_value;
    }die("Query Problem" . mysqli_error($conn));
}

$get_function = select_buss_info();
?>


<hr>
<div style="padding-left: 100px;">
<?php require './menu.php'; ?>
</div>
<hr>

<head>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="5/ninja-slider.css" rel="stylesheet" type="text/css" />
    <style>
        th, td{
            padding: 20px;
           text-align: center;
        }
        table{
			margin:10px;
            padding: 100px;
            padding-top: 20px;
            
        }
    </style>
</head>
<script type="text/javascript">
    function  deleteAlert() {
        var msg = confirm("Are you sure to delete this !!");
        if (msg) {
            return true;
        } else {
            return false;
        }
    }
</script>
<body style="background-color: #ccffcc;">
<div align="center"> 

	<br/>
	<br/>

    <table border="10" align="center">
        <tr>
            <th>SL</th>
            <th>Category</th>
            <th>Buss</th>
          
        </tr>
        <?php $k=1;
		while ($customer_info = mysqli_fetch_assoc($get_function)) {

		?> 
            <tr>
                <td><?php echo $k; ?></td>
                <td><?php echo $customer_info['category_name']; ?></td>
                <td><?php echo $customer_info['bus_name']; ?></td>
				
				
            </tr>
        <?php  $k++;
		} ?>
    </table>
</div>
</body>