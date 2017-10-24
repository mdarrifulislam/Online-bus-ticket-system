<?php

function select_search_result() {
    require './db_connect.php';
    $ticket_from = $_GET['ticket_from'];
    $ticket_to = $_GET['ticket_to'];
    $ticket_date = $_GET['ticket_date'];
    $ticket_return_date = $_GET['return_date'];


    $sql = "SELECT * FROM tbl_admin_ticket_info WHERE from_place='$ticket_from' 
	AND to_place='$ticket_to' AND journey_date between '$ticket_date' AND '$ticket_return_date' ";

    if (mysqli_query($conn, $sql)) {
        $query_result = mysqli_query($conn, $sql);
        return $query_result;
    } else {
        die("Query Problem" . mysqli_error($conn));
    }
}

$result = select_search_result();

function get_db_to_check_ticket(){
    require 'db_connect.php';
    $sql = "SELECT * FROM ticket_tbl";
    if (mysqli_query($conn, $sql)) {
        $query_value = mysqli_query($conn, $sql);
        return $query_value;
    }die("Query Problem" . mysqli_error($conn));
}
$get_result= get_db_to_check_ticket();

function already_selected_seat($arrData,$seat=null){
		 require 'db_connect.php';
		 
		 for ($i = 1; $i <= 4; $i++) {
			 
			$seatNo = $seat.$i;
			
			if (in_array($seatNo, $arrData))
			  {
				echo '<button style="width:4em; color:red;" class="btn btn-sm" type="button" id="'.$seatNo.'" value="500">'.$seatNo.'</button>';
			  }
			else
			  {
			  echo '<button style="width:4em;" class="btn btn-sm" type="button" id="'.$seatNo.'" value="500" onclick="getValues(this.id);" >'.$seatNo.'</button>';
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
		
    </style>
</head>
<body>

    <div style="margin-left: 180px;"><?php require './menu.php'; ?></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="customer_value.php." method="get">
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
                        <?php while($ticket_info = mysqli_fetch_assoc($result)) { ?> 
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
                                       <button  style="margin: 10px;" class="btn-success" type="button"  data-toggle="modal" data-target="#myModal">View Seat</button>
                                       

									   <?php 
									    require 'db_connect.php';
									    $ticket_id = $ticket_info['ticket_id'];
										$checkSql = "Select * from ticket_tbl t where status =1 and ticket_buss_id = $ticket_id";
										$checkResultData = mysqli_query($conn, $checkSql);
										$i =1;
										$already_purchased_seat = array();
										
										while($checkData = mysqli_fetch_array($checkResultData))
										{
											$already_purchased_seat[$i] = $checkData['seat_no']; 
											$i++;
										}
										
									   ?>
                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content"style="min-height: 700px;">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4>Check seat and price</h4>
                                                        <h4 style="color:Blue;">Price : <span class="show_total_final_price"  style="color:Black;">0</span> BDT</h4>
                                                    </div>
                                                    <div class="modal-body" style="padding-left:100px; padding-top: 50px; ">
                                                        <div style="overflow:auto; width: 90%;" >
                                                            <div style="width:800px;" >
                                                                 
                                                            <!--
                                                            <input type="text" id="A1" value="A1" onclick="getValues(this.id);" readonly> 
                                                            <button type="button" id="B1" value="500" onclick="getValues(this.id,this.value);" >B1</button>-->
                                                            <div  style=" width: 300px; float:left;">
                                                                
																<?php 
																	already_selected_seat($already_purchased_seat,'A');
																  ?> <br>
																<?php for ($i = 1; $i <= 4; $i++) { 	
																	already_selected_seat($already_purchased_seat,'B',$i);
																 } ?> <br>
																<?php for ($i = 1; $i <= 4; $i++) { 	
																	already_selected_seat($already_purchased_seat,'C',$i);
																   } ?> <br>
																<?php for ($i = 1; $i <= 4; $i++) { 	
																	already_selected_seat($already_purchased_seat,'D',$i);
																	} ?> <br>
																<?php for ($i = 1; $i <= 4; $i++) { 	
																	already_selected_seat($already_purchased_seat,'E',$i);
																	} ?> <br>
																<?php for ($i = 1; $i <= 4; $i++) { 	
																	already_selected_seat($already_purchased_seat,'F',$i);
																	}?> <br>
																<?php for ($i = 1; $i <= 4; $i++) { 	
																	already_selected_seat($already_purchased_seat,'G',$i);
																	}?> <br>
																<?php for ($i = 1; $i <= 4; $i++) { 	
																	already_selected_seat($already_purchased_seat,'H',$i);
																	}?> <br> <br>
															 </div>
															 
															  <table class="table col-sm-4" id="list" style=" width:300px; float:left;">
																  
															  </table>
															  <br/>
                                                            <div accesskey="" style="display: inline-block; width: 600px;">
                                                                 <table align="center" border="1" style="float:left;" class="table col-sm-8">
																			<tr>
																				<td style="float:left; width: 200px;">Customer Name</td>
																				<td>
																					<input type="text" name="customer_name" style="width: 100%;">
																				</td>
																			</tr>
																			<tr>
																				<td>Customer phone No</td>
																				<td>
																					<input type="number" name="customer_phone_no" style="width: 100%;">
																				</td>
																			</tr>

																			<tr>
																				<td>Seat No</td>
																				<td>
																					<input type="text" name="seat_no" id="seat_no" style="width: 100%;">
																				</td>
																			</tr>
																			<tr>
																				<td>Price</td>
																				<td class="show_total_final_price" style="width: 100%;">
																					
																				</td>
																			</tr>

																			<tr>
																				<td></td>
																				<td>
																					<input style="color: #ff9933" type="submit" name="btn" value="Submit">
																				</td>

																			</tr>
																		</table>
																		
                                                                   

<!--                                                                    <tr>
                                                                        <th>Seat</th>
                                                                        <th>Price</th>
                                                                        <th></th>
                                                                    </tr>-->
																
                                                            </div>
<!--                                                                <div id="total_final_price">0</div>-->
                                                           
                                                               <input type="hidden" name="price" id="total_final_price" readonly>
                                                         </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="customer_value.php"> <a href="customer_value.php"><input type="submit" class="btn btn-default btn-lg"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    
                                </td>
                            <br>
                            </tr>
                        <?php } ?>
						</tbody>
                    </table>
                </form>
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
		var seat_no ='';
		var seat_no_ar = array();
        /*
         $("#add").click(function(){
         getValues();
         });
         */
        //function getValues(id,value){
        function getValues(id) {

            var seat = id;
            var price = $('#' + id).val();
			
            total_price = parseInt(total_price) + parseInt(price);


            var row = $('<tr id="r-' + seat + '-' + price + '">' +
                    '<td>' + seat + '</td>' +
                    '<td>' + price + '</td>' +
                    '<td class="remove"><span title="Remove this" class="glyphicon glyphicon-remove" onclick="removeRow(\'r-' + seat + '-' + price + '\')"></span> </td>' +
                    '</tr>');

            $("#list").append(row);			
			
			
			if(seat_no){
				seat_no = seat_no +','+seat;
			}else{
				seat_no = seat;
			}
			$("#seat_no").val(seat_no);
			

            $("#total_final_price").val(total_price);
            $(".show_total_final_price").html(total_price);

            count++;
        }

        function removeRow(id) {
            $("#" + id).remove();

            var id_value_array = id.split('-');
            var price = id_value_array[2];
            var seat = id_value_array[1];
			
			var seat_list = $("#seat_no").val();
			var seat_arr = seat_list.split(',');
			seat_no = '';
			
			if(1<seat_arr.length){
				for(var c=0;c<seat_arr.length;c++){
					if(seat != seat_arr[c]){
						if(seat_no){
							seat_no = seat_no+','+seat_arr[c];
						}else{
							seat_no = seat_arr[c];
						}
						
					}
				}
			}else{
				seat_no = '';
			}
			$("#seat_no").val(seat_no);
			
			
            total_price = parseInt(total_price) - parseInt(price);
            $("#total_final_price").val(total_price);
			$(".show_total_final_price").html(total_price);
        }
    </script>



    <script src="js/ajax_jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
