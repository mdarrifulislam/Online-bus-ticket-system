<?php
//require './classes/application.php';
//$obj_app = new Application();

if (isset($_POST['btn'])) {
    save_customer_info($_POST);
}

function save_customer_info($data) {

    require 'db_connect.php';

    $sql = "INSERT INTO ticket_tbl(customer_name,customer_phone_no,seat_no,price) VALUES ('$data[customer_name]', '$data[customer_phone_no]','$data[seat_no]','$data[price]')";
    if (mysqli_query($conn, $sql)) {
        ///return mysqli_query($conn, $sql);
        header('Location: view_info.php');
    } else {
        die("Query Problem" . mysqli_error($conn));
    }
}

function select_customer_info() {
    require 'db_connect.php';
    $sql = "SELECT * FROM ticket_tbl";
    if (mysqli_query($conn, $sql)) {
        $query_value = mysqli_query($conn, $sql);
        return $query_value;
    }die("Query Problem" . mysqli_error($conn));
}

$get_value = select_customer_info();
?>

<head>
    <style>
        /*        #tbl{
                     
                    width: 400px;
                }
                #form{
                    display: inline-block;
                }
                #bookd_seat{
                    
                }*/
        /*        button{
                    display: inline-block;
                    font-size: 16px;
                    margin: 4px 2px;
                }*/
    </style>    
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="5/ninja-slider.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mystyle.css">
    <style>
        td{
            padding:20px;
        }
    </style>
</head>
<body style="background-color: #ccffcc;">
    <div style="padding-bottom:50px; margin-bottom: 50px;margin-left: 180px;"><?php include './menu.php'; ?></div>
    <div id="bookd_seat" style="float:left;width:250px; padding-left: 50px; margin-left: 10px; margin-right: 100px;" >
<!--        <h3 style="padding-bottom: 30px;padding-left: 50px;">Check Booked Seat</h3>-->
        <?php while ($row = mysqli_fetch_assoc($get_value)) { ?> 
<!--           <span style="border: 1px solid black; padding: 5px; background-color: orange;margin-bottom: 30px;text-align: center;">//<?php echo $row['seat_no']; ?></span> -->

        <?php } ?>
    </div>

    <div style="padding-top:50px; padding-left: 100px; margin-left: 300px; ">
        <form action="" method="post" >
            <table align="center">
                <tr>
                    <td>Customer Name</td>
                    <td>
                        <input type="text" name="customer_name">
                    </td>
                </tr>
                <tr>
                    <td>Customer phone No</td>
                    <td>
                        <input type="number" name="customer_phone_no">
                    </td>
                </tr>

                <tr>
                    <td>Seat No</td>
                    <td>
                        <input type="text" name="seat_no" id="seat">
                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>
                        <input type="number" name="price" id="seat">
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input style="color: #ff9933" type="submit" name="btn" value="Submit">
                    </td>

                </tr>
            </table>
        </form>
    </div>

</div>



<script>
    var count = 1;
    var total_price = 0;
    /*
     $("#add").click(function(){
     getValues();
     });
     */
    //function getValues(id,value){
    function getValues(id) {

        var seat = id;
        //var price = $('#B1').val();
        var price = $('#' + id).val();

        total_price = parseInt(total_price) + parseInt(price);


        var row = $('<tr id="r-' + count + '-' + price + '">' +
                '<td>' + seat + '</td>' +
                '<td>' + price + '</td>' +
                '<td class="remove"><span title="Remove this" class="glyphicon glyphicon-remove" onclick="removeRow(\'r-' + count + '-' + price + '\')"></span> </td>' +
                '</tr>');

        $("#list").append(row);

        $("#total_final_price").html(total_price);

        count++;
    }

    function removeRow(id) {
        $("#" + id).remove();

        var id_value_array = id.split('-');

        var price = id_value_array[2];

        total_price = parseInt(total_price) - parseInt(price);
        $("#total_final_price").html(total_price);
    }
</script>

<script src="js/ajax_jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>



