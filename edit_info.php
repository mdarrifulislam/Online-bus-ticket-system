<?php
$customer = $_GET['my_custumer'];
$function_result = take_value_from_view($customer);
$result = mysqli_fetch_assoc($function_result);

function take_value_from_view($customer) {
    require 'db_connect.php';
    $my_sql = "SELECT * FROM ticket_tbl Where custumer_id='$customer' ";
    if (mysqli_query($conn, $my_sql)) {
        return mysqli_query($conn, $my_sql);
    } else {
        mysqli_error($conn);
    }
}

if (isset($_POST['update_btn'])) {
    update_customer_info($_POST);
}

function update_customer_info($data) {
    $customer_id = $data['custumer_id'];
    $customer_name = $data['customer_name'];
    $customer_phone_no = $data['customer_phone_no'];
    $customer_seat_no = $data['seat_no'];

    require 'db_connect.php';


    $my_sql = "UPDATE ticket_tbl SET customer_name='$customer_name', customer_phone_no='$customer_phone_no', seat_no='$customer_seat_no' WHERE custumer_id='$customer_id' ";
    if (mysqli_query($conn, $my_sql)) {
        header("Location: view_info.php");
    } else {
        die("Query Problem" . mysqli_error($conn));
    }
}
?>


<table border="1" cellpadding="10">
    <tr>
        <td>A1</td>
        <td>A2</td>
        <td>A3</td>
        <td>A4</td>
    <tr>

    <tr>
        <td>B1</td>
        <td>B2</td>
        <td>B3</td>
        <td>B4</td>
    </tr>


    <tr>
        <td>C1</td>
        <td>C2</td>
        <td>C3</td>
        <td>C4</td>
    </tr>
    <tr>
        <td>D1</td>
        <td>D2</td>
        <td>D3</td>
        <td>D4</td>
    </tr>

    <tr>
        <td>E1</td>
        <td>E2</td>
        <td>E3</td>
        <td>E4</td>
    </tr>
    <tr>
        <td>F1</td>
        <td>F2</td>
        <td>F3</td>
        <td>F4</td>
    </tr>
    <tr>
        <td>G1</td>
        <td>G2</td>
        <td>G3</td>
        <td>G4</td>
    </tr>
    <tr>
        <td>H1</td>
        <td>H2</td>
        <td>H3</td>
        <td>H4</td>
    </tr>
    <tr>
        <td>I1</td>
        <td>I2</td>
        <td>I3</td>
        <td>I4</td>
    </tr>

    <table>




        <form action="" method = "post">
            <table align="center" cellpadding="10">
                <tr>
                    <td>Customer Name</td>
                    <td>
                        <input type="text" name="customer_name" value="<?php echo $result['customer_name']; ?>">
                        <input type="hidden" name="custumer_id" value="<?php echo $result['custumer_id']; ?>">  
                    </td>
                </tr>

                <tr>
                    <td>Customer Phone NO</td>
                    <td>
                        <input type="number" name="customer_phone_no" value="<?php echo $result['customer_phone_no']; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Seat NO</td>
                    <td>
                        <input type="text" name="seat_no" value="<?php echo $result['seat_no']; ?>">
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="update_btn" value="Update ">
                    </td>

                </tr>

                <table>

                    </form>