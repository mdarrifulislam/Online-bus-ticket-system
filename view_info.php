<?php

function select_customer_info() {
    require 'db_connect.php';
    $sql = "SELECT * FROM tbl_customer_info  tc where tc.status =1 ORDER BY custumer_id DESC";
    if (mysqli_query($conn, $sql)) {
        $query_value = mysqli_query($conn, $sql);
        return $query_value;
    }die("Query Problem" . mysqli_error($conn));
}

function select_customer_seat_tbl($cust_id) {
    require 'db_connect.php';
    $sql = "SELECT * FROM ticket_tbl tt where tt.status =1 and custumer_id = $cust_id";
    if (mysqli_query($conn, $sql)) {
        $query_value = mysqli_query($conn, $sql);
        return $query_value;
    }die("Query Problem" . mysqli_error($conn));
}

$get_function = select_customer_info();
?>






<head>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="5/ninja-slider.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        th, td{
            padding: 10px;
            text-align: center;
        }
        table{
            padding-left: 100px;
            padding-top: 20px;

        }
    </style>
</head>
<!--<script type="text/javascript">
    function  deleteAlert() {
        var msg = confirm("Are you sure to delete this !!");
        if (msg) {
            return true;
        } else {
            return false;
        }
    }
</script>-->
<body style="">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="padding-left: 100px;">
                <?php require './menu.php'; ?>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form>
                    <table  width="80%" class="table table-hover table-responsive table-striped table-condensed table-bordered">
                        <tr>
                            <th>Customer ID</th>
                            <th>Customer Name</th>

                            <th>Customer Phone</th>
                            <th>Price</th>
                            <th>Seat No</th>
                            <th>Action</th>
            <!--                <th>Seat Number</th>-->
                           <!-- <th>Price</th>
                                                <th>Action</th> -->
                        </tr>
                        <?php while ($customer_info = mysqli_fetch_assoc($get_function)) { ?> 

                            <tr>
                                <td><?php echo $customer_info['custumer_id']; ?></td>
                                <td><?php echo $customer_info['customer_name']; ?></td>

                                <td><?php echo $customer_info['customer_phone_no']; ?></td>
                                <td><?php echo $customer_info['price']; ?></td>
                                <td><?php echo $customer_info['seat_no']; ?></td> 

                                <!--//                        $get_function_price_data = select_customer_seat_tbl($customer_info['custumer_id']);
                                //                        while ($customer_seat_tbl = mysqli_fetch_assoc($get_function_price_data)) {
                                //                            echo $customer_seat_tbl['seat_no'] . ' &nbsp ';-->

    <!--//<a href="edit.php?student_id=<?php // echo $student_info['student_id'];  ?>">Edit Info</a>                   -->
                                <td><a href="print_info.php?customer_id=<?php echo $customer_info['custumer_id']; ?>" class="btn btn-success" >Invoice</a></td>


                            </tr>
                        <?php } ?>
                    </table>
                </form>            
            </div>
        </div>
    </div>

    <script src="js/ajax_jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>