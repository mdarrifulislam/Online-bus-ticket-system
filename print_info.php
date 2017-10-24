<?php
if (isset($_GET['customer_id'])) {
    $customer_id = $_GET['customer_id'];

    require 'db_connect.php';
    $sql = "SELECT * FROM tbl_customer_info Where custumer_id='$customer_id' ";
    if (mysqli_query($conn, $sql)) {
        $query_result = mysqli_query($conn, $sql);
    } else {
        die("Query Problem" . mysql_error($conn));
    }
    $row = mysqli_fetch_assoc($query_result);
}
?>




<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link href="5/ninja-slider.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/mystyle.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div style="">
                    <h3 class="text-center text-justify text-success">Welcome <span class="text-danger"><b><?php echo $row['customer_name'];?></b></span>, your journey information goes here.Click the Print button to print.Thanks.</h3>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-6">
                    <table class="table table-responsive table-bordered table-hover table-condensed">
                        <tr>
                            <th>Customer Name</th>
                            <td><?php echo $row['customer_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Seat No</th>
                            <td><?php echo $row['seat_no']; ?></td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td><?php echo $row['customer_phone_no']; ?></td>
                        </tr>





                        <tr>


                            <th>Price</th>
                            <td><?php echo $row['price']; ?></td>

                        </tr>

                    </table>
                    <button onclick="myFunction()" class="btn btn-default btn-lg">Print</button>
                </div>
            </div>
        </div>
 
        <script>
            function myFunction() {
                window.print();
            }
        </script>
        <script src="js/ajax_jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>

