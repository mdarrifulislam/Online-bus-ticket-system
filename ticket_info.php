<?php
if (isset($_POST['btn'])) {
    save_customer_info($_POST);
}

function save_customer_info($data) {

    require 'db_connect.php';
    $leave_status = 0;
    $seat_no_string = $data['seat_no'];
    $seat_no_arr = explode(',', $seat_no_string);

    $queryForNextId = "select max(custumer_id)+1 next_custumer_id from tbl_customer_info where status =1 ";
    $resultForNextId = mysqli_query($conn, $queryForNextId);
    $optionResultForNextId = mysqli_fetch_array($resultForNextId);
    if ($optionResultForNextId['next_custumer_id'] == null) {

        $next_custumer_id = 1;
    } else {
        $next_custumer_id = $optionResultForNextId['next_custumer_id'];
    }

    mysqli_query($conn, 'START TRANSACTION');
    $sqlCustomer = "INSERT INTO tbl_customer_info(custumer_id,customer_name,seat_no,customer_phone_no,price) VALUES ($next_custumer_id, '$data[customer_name]','$data[seat_no]', '$data[customer_phone_no]','$data[price]')";
    if (mysqli_query($conn, $sqlCustomer)) {
        $k = 0;
        while ($k < count($seat_no_arr)) {
            $seat_no = $seat_no_arr[$k];
            $sql = "INSERT INTO ticket_tbl(custumer_id,seat_no,ticket_buss_id) VALUES ($next_custumer_id, '$seat_no', '$data[ticket_buss_id]')";
            if (mysqli_query($conn, $sql)) {

                $leave_status = 1;
            } else {
                $leave_status = 0;
            }
            $k++;
        }
    }

    if ($leave_status == 1) {

        mysqli_query($conn, 'COMMIT');
        $msg = "Successful , Please pay the bill within 1 hour unless it will be open again to others";
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
        echo ("<script>location.href='view_info.php'</script>");
    } else {
        $msg = "Faild";
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
        mysqli_query($conn, 'ROLLBACK');
    }
}

function select_search_result() {
    require './db_connect.php';
    $ticket_from = $_GET['ticket_from'];
    $ticket_to = $_GET['ticket_to'];
    $ticket_date = $_GET['ticket_date'];
    $ticket_return_date = $_GET['return_date'];


    $sql = "SELECT * FROM tbl_admin_ticket_info WHERE from_place='$ticket_from' 
	AND to_place='$ticket_to' AND journey_date='$ticket_date'  ";

    if (mysqli_query($conn, $sql)) {
        $query_result = mysqli_query($conn, $sql);
        return $query_result;
    } else {
        die("Query Problem" . mysqli_error($conn));
    }
}

$result = select_search_result();

function get_db_to_check_ticket() {
    require 'db_connect.php';
    $sql = "SELECT * FROM ticket_tbl";
    if (mysqli_query($conn, $sql)) {
        $query_value = mysqli_query($conn, $sql);
        return $query_value;
    }die("Query Problem" . mysqli_error($conn));
}

$get_result = get_db_to_check_ticket();

function already_selected_seat($arrData, $seat = null, $whichDiv) {
    require 'db_connect.php';

    for ($i = 1; $i <= 4; $i++) {

        $seatNo = $seat . $i;

        if (in_array($seatNo, $arrData)) {
            echo '<button style="width:4em; color:red; margin:2px;" class="btn btn-sm" type="button" id=" ' . $seatNo . ' " value="500">' . $seatNo . '</button>';
        } else {
            echo '<button style="width:4em; margin:2px;" class="btn btn-sm" type="button" id="' . $seatNo . '" value="500" onclick="getValues(this.id,' . $whichDiv . ');" >' . $seatNo . '</button>';
        }
    }
}
?>


<head> 
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="5/ninja-slider.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mystyle.css">
    <style>

        table{
            width: 900px;
        }

        #tbl{

            padding-left: 100px;
        }

        #id{
            display: none;
        }

        .blue{
            color:blue;
        }
    </style>
</head>
<body>

    <div style="margin-left: 180px;"><?php require './menu.php'; ?></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <table class="table">

                    <thead>
                        <tr>
                            <th style="display:none;">Ticket Id</th>
                            <th>Ticket Info Description</th>
                            <th>Bus Name</th>
                            <th>Available Seats</th>
                            <th>Journey Date</th>
                            <th>Strat Time</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($ticket_info = mysqli_fetch_assoc($result)) { ?> 
                            <tr>
                                <td id="id"><?php echo $ticket_info['ticket_id']; ?></td>
                                <td><?php echo $ticket_info['ticket_info_description']; ?></td>
                                <td><?php echo $ticket_info['bus_name']; ?></td>
                                <td><?php echo $ticket_info['available_seats']; ?></td>
                                <td><?php echo $ticket_info['journey_date']; ?></td>
                                <td><?php echo $ticket_info['start_time']; ?>
        <!--                           <input type="hidden" value="" name="ticket_id">-->
                                </td>
                                <td>
                                    <button  style="margin: 10px;" class="btn-success" id="modal2-<?php echo $ticket_info['ticket_id']; ?>" type="button" onclick="resetModal(this.id);" data-toggle="modal" data-target="#myModal-<?php echo $ticket_info['ticket_id']; ?>">View Seat</button>

                                    <?php
                                    require 'db_connect.php';
                                    $ticket_id = $ticket_info['ticket_id'];
                                    $checkSql = "Select * from ticket_tbl t where status =1 and ticket_buss_id = $ticket_id";
                                    $checkResultData = mysqli_query($conn, $checkSql);
                                    $i = 1;
                                    $already_purchased_seat = array();

                                    while ($checkData = mysqli_fetch_array($checkResultData)) {
                                        $already_purchased_seat[$i] = $checkData['seat_no'];
                                        $i++;
                                    }
                                    ?>
                                    <form action="" method="post">
                                        <div class="modal fade" id="myModal-<?php echo $ticket_info['ticket_id']; ?>" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content"style="min-height: 700px;">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4>Check seat and price</h4>
                                                        <h4 style="color:Blue;">Price : <span class="show_total_final_price-<?php echo $ticket_id; ?>"  style="color:Black;">0</span> BDT</h4>
                                                    </div>
                                                    <div class="modal-body" style="padding-left:100px; padding-top: 50px; ">
                                                        <div style="overflow:auto; width: 90%;" >
                                                            <div style="width:800px;" >

                                                                <div  style=" width: 300px; float:left;">

                                                                    <?php
                                                                    already_selected_seat($already_purchased_seat, 'A', $ticket_id);
                                                                    ?> <br>
                                                                    <?php
                                                                    already_selected_seat($already_purchased_seat, 'B', $ticket_id);
                                                                    ?> <br>
                                                                    <?php
                                                                    already_selected_seat($already_purchased_seat, 'C', $ticket_id);
                                                                    ?> <br>
                                                                    <?php
                                                                    already_selected_seat($already_purchased_seat, 'D', $ticket_id);
                                                                    ?> <br>
                                                                    <?php
                                                                    already_selected_seat($already_purchased_seat, 'E', $ticket_id);
                                                                    ?> <br>
                                                                    <?php
                                                                    already_selected_seat($already_purchased_seat, 'F', $ticket_id);
                                                                    ?> <br>
                                                                    <?php
                                                                    already_selected_seat($already_purchased_seat, 'G', $ticket_id);
                                                                    ?> <br>
                                                                    <?php
                                                                    already_selected_seat($already_purchased_seat, 'H', $ticket_id);
                                                                    ?> <br>  <br>
                                                                </div>

                                                                <table class="table col-sm-4" id="list-<?php echo $ticket_info['ticket_id']; ?>" style=" width:300px; float:left;">

                                                                </table>
                                                                <br/>
                                                                <div accesskey="" style="display: inline-block; width: 600px;">
                                                                    <table align="center" border="1" style="float:left;" class="table col-sm-8">
                                                                        <tr>
                                                                            <td style="float:left; width: 200px;">Customer Name</td>
                                                                            <td>
                                                                                <input type="text" name="customer_name" style="width: 100%;" required >
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Customer phone No</td>
                                                                            <td>
                                                                                <input type="number" name="customer_phone_no" style="width: 100%;" required>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Seat No</td>
                                                                            <td>

                                                                                <span class="seat_no-<?php echo $ticket_id; ?>"></span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Price</td>
                                                                            <td class="show_total_final_price-<?php echo $ticket_id; ?>" style="width: 100%;">

                                                                            </td>
                                                                        </tr>

                                                                    </table>

                                                                </div>
                                                                <!--                                                                <div id="total_final_price">0</div>-->
                                                                <input type="hidden" name="seat_no" class="seat_no-<?php echo $ticket_id; ?>" style="width: 100%;" required>
                                                                <input type="hidden" name="price" class="total_final_price-<?php echo $ticket_id; ?>" required>
                                                                <input type="hidden" name="ticket_buss_id" class="ticket_buss_id-<?php echo $ticket_id; ?>" value="<?php echo $ticket_id; ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-default btn-lg" name="btn"  value="Submit">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </td>
                        <br>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div> 
        <div class="main" style="overflow: hidden; margin-top: 20px;">
            <marquee behaviour="scroll" direction="left" scrollamount="4">
                <h4 style="color: #008000;">
                    <span style="color: #000000;">Routes : </span>
                    Dhaka->Rajshahi<span style="color:black;margin-right:5px;">,</span>Dhaka->Chapainababganj<span style="color:black;margin-right:5px;">,</span>Dhaka->Kansat<span style="color:black;margin-right:5px;">,</span>Rajshahi->Dhaka<span style="color:black;margin-right:5px;">,</span>Chapainababganj->Dhaka<span style="color:black;margin-right:5px;">,</span>Kansat->Dhaka<span style="color:black;margin-right:5px;">,</span>Kansat->Dhaka( By Pass )<span style="color:black;margin-right:5px;">,</span>Mohakhali->Chapainababganj<span style="color:black;margin-right:5px;">,</span>Chapainababganj->Mohakhali<span style="color:black;margin-right:5px;">,</span>Dhaka->Cox's Bazar<span style="color:black;margin-right:5px;">,</span>Cox's Bazar->Dhaka<span style="color:black;margin-right:5px;">,</span>Dhaka->Chittagong<span style="color:black;margin-right:5px;">,</span>Chittagong->Dhaka<span style="color:black;margin-right:5px;">,</span>Chapainababganj->Chittagong<span style="color:black;margin-right:5px;">,</span>Chittagong->Cox's Bazar<span style="color:black;margin-right:5px;">,</span>Chittagong->Chapainababganj<span style="color:black;margin-right:5px;">,</span>Chapainababganj->Cox's Bazar<span style="color:black;margin-right:5px;">,</span>Cox's Bazar->Chapainababganj<span style="color:black;margin-right:5px;">,</span>Dhaka->Kolkata<span style="color:black;margin-right:5px;">,</span>Benapole->Dhaka<span style="color:black;margin-right:5px;">,</span>Chittagong->Kolkata<span style="color:black;margin-right:5px;">,</span>Benapole->Chittagong<span style="color:black;margin-right:5px;">,</span>Kolkata->Dhaka (BD)<span style="color:black;margin-right:5px;">,</span>Petrapole->Kolkata<span style="color:black;margin-right:5px;">,</span>Chapainababganj->Kolkata<span style="color:black;margin-right:5px;">,</span>Benapole->Chapainababganj                        </h4>
            </marquee>

            <!-- Main Body box End -->
        </div>
        <!-- Footer box Start -->
        <div style="overflow: hidden;"><?php require_once"footer.php"; ?></div>
    </div>



    <script>
        var count = 1;
        var total_price = 0;
        var seat_no = null;
        var seat_no_ar = [];

        function getValues(id, whichDiv) {

            var seat = id;
            var price = $('#' + id).val();
            total_price = parseInt(total_price) + parseInt(price);

            var row = $('<tr id="r-' + seat + '-' + price + '">' +
                    '<td>' + seat + '</td>' +
                    '<td>' + price + '</td>' +
                    '<td class="remove"><span title="Remove this" class="glyphicon glyphicon-remove" onclick="removeRow(\'r-' + seat + '-' + price + '\',' + whichDiv + ')"></span> </td>' +
                    '</tr>');

            $("#list-" + whichDiv).append(row);


            if (seat_no) {
                seat_no = seat_no + ',' + seat;
            } else {
                seat_no = seat;
            }
            $(".seat_no-" + whichDiv).val(seat_no);
            $(".seat_no-" + whichDiv).html(seat_no);
            $('#' + id).addClass("blue"); // show color as selected


            $(".total_final_price-" + whichDiv).val(total_price);
            $(".show_total_final_price-" + whichDiv).html(total_price);

            count++;
        }

        function removeRow(id, whichDiv) {
            $("#" + id).remove();

            var id_value_array = id.split('-');
            var price = id_value_array[2];
            var seat = id_value_array[1];

            var seat_list = $(".seat_no-" + whichDiv).val();
            var seat_arr = seat_list.split(',');
            seat_no = '';

            if (1 < seat_arr.length) {
                for (var c = 0; c < seat_arr.length; c++) {
                    if (seat != seat_arr[c]) {
                        if (seat_no) {
                            seat_no = seat_no + ',' + seat_arr[c];
                        } else {
                            seat_no = seat_arr[c];
                        }

                    }
                }
            } else {
                seat_no = '';
            }

            $(".seat_no-" + whichDiv).val(seat_no);
            $(".seat_no-" + whichDiv).html(seat_no);

            total_price = parseInt(total_price) - parseInt(price);
            $('#' + seat).removeClass("blue"); // Remove color as selected
            $(".total_final_price-" + whichDiv).val(total_price);
            $(".show_total_final_price-" + whichDiv).html(total_price);
        }

        function resetModal(whichDiv) {

            count = 1;
            total_price = 0;
            seat_no = null;
            seat_no_ar = [];
            return true;
        }
    </script>



    <script src="js/ajax_jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>