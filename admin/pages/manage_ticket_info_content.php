<?php
if (isset($_GET['status'])) {
    $ticket_id = $_GET['id'];
    if ($_GET['status'] == 'unpublish') {

        $message = $obj_super_admin->unpublish_ticket_id($ticket_id);
    } else if ($_GET['status'] == 'publish') {

        $message = $obj_super_admin->publish_ticket_id($ticket_id);
    } else if ($_GET['status'] == 'delete') {

        $message = $obj_super_admin->delete_ticket_id($ticket_id);
    }
}



$query_result = $obj_super_admin->select_all_ticket_info();
?>


<!--   <ul class="breadcrumb">
       <li>
           <i class="icon-home"></i>
           <a href="admin_master.php">Home</a> 
           <i class="icon-angle-right"></i>
       </li>
       <li><a href="#">Tables</a></li>
   </ul>-->





<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Ticket Info</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>




        <h2>
<?php
if (isset($message)) {
    echo $message;
}
unset($message);
?>
        </h2>
        <h2>
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>
        </h2>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Ticket Id</th>
                        <th>Bus Name</th>
                        <th>Available Seats</th>
                        <th>Start Time</th>
                        <th>Journey Date</th>
                        <th>Ticket Info Description</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Publication Status</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
<?php while ($ticket_info = mysqli_fetch_assoc($query_result)) { ?>
                        <tr>
                            <td><?php echo $ticket_info['ticket_id']; ?></td>
                            <td class="center"><?php echo $ticket_info['bus_name']; ?></td>
                            <td class="center"><?php echo $ticket_info['available_seats']; ?></td>
                            <td class="center"><?php echo $ticket_info['start_time']; ?></td>
                            <td class="center"><?php echo $ticket_info['journey_date']; ?></td>
                            <td class="center"><?php echo $ticket_info['ticket_info_description']; ?></td>
                            <td class="center"><?php
                    if ($ticket_info['from_place'] == 0) {
                        echo 'Dkaka';
                    } elseif ($ticket_info['from_place'] == 1) {
                        echo 'Rangpur';
                    } elseif ($ticket_info['from_place'] == 2) {
                        echo 'Mymensingh';
                    } elseif ($ticket_info['from_place'] == 3) {
                        echo 'Bogra';
                    } elseif ($ticket_info['from_place'] == 4) {
                        echo 'Chittagong';
                    }
    ?>
                            </td>
                            <td class="center">
                                
                                <?php
                    if ($ticket_info['to_place'] == 0) {
                        echo 'Dkaka';
                    } elseif ($ticket_info['to_place'] == 1) {
                        echo 'Rangpur';
                    } elseif ($ticket_info['to_place'] == 2) {
                        echo 'Mymensingh';
                    } elseif ($ticket_info['to_place'] == 3) {
                        echo 'Bogra';
                    } elseif ($ticket_info['to_place'] == 4) {
                        echo 'Chittagong';
                    }
    ?>
                                
                            </td>
                            <td class="center"><?php
                            if ($ticket_info['publication_status'] == 1) {
                                echo 'Publish';
                            } else {
                                echo 'Unpublish';
                            }
    ?>
                            </td>
							<td class="center"><?php
                            if ($ticket_info['category_id'] == 3) {
                                echo 'Ac';
                            } else {
                                echo 'None Ac';
                            }
    ?>
                            </td>
                            <td class="center">

    <?php if ($ticket_info['publication_status'] == 1) { ?>
                                    <a class="btn btn-success" href="?status=unpublish&&id=<?php echo $ticket_info['ticket_id']; ?>" title="unpublish">
                                        <i class="halflings-icon white arrow-down"></i>  
                                    </a>
    <?php } else { ?>
                                    <a class="btn btn-danger" href="?status=publish&&id=<?php echo $ticket_info['ticket_id']; ?>" title="publish">
                                        <i class="halflings-icon white arrow-up"></i>  
                                    </a>
    <?php } ?>
                                <a class="btn btn-info" href="edit_ticket_info.php?id=<?php echo $ticket_info['ticket_id']; ?>" title="Edit">
                                    <i class="halflings-icon white edit"></i>  
                                </a>
                                <a class="btn btn-danger" href="?status=delete&&id=<?php echo $ticket_info['ticket_id']; ?>" title="Delete" onclick="return check_delete_info();">
                                    <i class="halflings-icon white trash"></i> 
                                </a>
                            </td>
                        </tr>
<?php } ?>
                </tbody>
            </table>            
        </div>
    </div>
</div>