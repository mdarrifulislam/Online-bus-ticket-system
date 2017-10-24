<?php
//require './classes/application.php'; // class er permission
//$obj_app = new Application();
//$obj_ticket_info = new Application(); // object create 

//
//if (isset($_POST['btn'])) { // jodi button ee click pre
//    get_ticket_info($_POST); // function call & receive
//}
//
//function get_ticket_info($data) {
//        $sql="INSERT INTO ticket_info(ticket_from, ticket_to,ticket_date,return_date) VALUES('$data[ticket_from]','$data[ticket_to]','$data[ticket_date]','$data[return_date]') ";
//        if(mysqli_query($this->db_connect, $sql)){
//            $message="Your Info saved successfully";
//            return $message;
//        }  else {
//            die("Query Problem".mysqli_error($this->db_connect));    
//        }
//        
//    }

//function get_ticket_info($data) {
//    require './db_connect.php';
//    $sql = "SELECT * FROM tbl_admin_ticket_info WHERE from_place='$data[ticket_from]' AND to_place='$data[ticket_to]' AND journey_date='$data[ticket_date]'  ";//(ticket_from, ticket_to,ticket_date,return_date) VALUES('$data[ticket_from]','$data[ticket_to]','$data[ticket_date]','$data[return_date]') ";
//    if (mysqli_query($this->db_connect, $sql)) {
//        header("Location: ticket_info.php");
//    } else {
//        die("Query Problem" . mysqli_error($this->db_connect));
//    }
//}
?>





<head>
    <style>
        #fieldset{
            background-color: #2ecc71;
        } 

    </style>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="5/ninja-slider.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mystyle.css">
</head>

<body style="background-color:#ccffcc; ">
    <div style="margin-left: 180px; margin-bottom: 20px;"><?php require './menu.php'; ?></div>
    <div style="margin: auto; width: 60%; overflow: hidden;">
        <h2><?php
if (isset($message)) {
    echo $message;
}
?></h2>

 

        <form action="ticket_info.php" method="get">


            <fieldset id="fieldset" style="padding-left: 200px; height: 300px; padding-top: 100px;overflow: hidden;">
              
 From:
                <span>
                    <select name="ticket_from">
                        <option value="0">Dhaka</option>
                        <option value="1">Rangpur</option>
                        <option value="2">Mymensingh</option>
                        <option value="3">Bogra</option>
                        <option value="4">Chittagong</option>
                    </select>
                </span>
                To:
                <span>
                        
                    <select name="ticket_to">
                        <option value="0">Dhaka</option>
                        <option value="1">Rangpur</option>
                        <option value="2">Mymensingh</option>
                        <option value="3">Bogra</option>
                        <option value="4">Chittagong</option>
                    </select>
                </span>
                <br><br>
                Date of journey: 
                <span><input type="date" name="ticket_date"></span>
                <br><br>
                Return date:(optional) 
                <span><input type="date" name="return_date"></span><a href="ticket_info.php?id=<?php?>"><input type="submit" name="btn" value="Search" style="color:orange;padding-left: 10px;padding-right: 10px; margin-left: 5px;" ></a>

            </fieldset>
        </form>
    </div>

<div style="padding-left:40px;padding-top:20px;"> 
<img src="img/88.jpg" title="wahid palash sir" width="245" height="100"/>
	<img src="img/v.jpg" title="eshita madam" width="245" height="100"/>
	<img src="img/m.jpg" title="nyan kumar sir" width="245" height="100"/> 
	<img src="img/w.jpg" title="samia madam" width="245" height="100"/>
	<img src="img/e.jpg" title="sumon sir" width="250" height="100"/>
	
</div>
    <!-- Main Body box Start -->
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

    <script src="js/ajax_jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>







<!-- <form class="form-inline">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form> -->