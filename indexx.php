<?php
//   require './classes/application.php';
//   $obj_app=new Application();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>LICT 2017</title>

<link href="style.css" rel="stylesheet" type="text/css">
 <link href="5/ninja-slider.css" rel="stylesheet" type="text/css" />
   <script src="5/ninja-slider.js" type="text/javascript"></script>
    <script type="text/javascript">
 </script>
 
</head>
<body style="background-color: #ccffcc;">
<div id="wrap">
<!-- Header box start -->
 <div class="header">

  <?php require_once "menu.php"; ?>
 
 <!-- Header box End -->
 </div>
 <div class="well-sm text-center" style="background-color:gray; margin-bottom: 0px;">
	 <center> <h1 style="color:#C06;">  ONLINE BUY BUS TICKET </h1></center>
 <!--  box start -->
 <?php require_once "box.php"; ?>
 
 <!-- Main Body box Start -->
  <div class="main">
     <marquee behaviour="scroll" direction="left" scrollamount="4">
    <h2 style="color: #008000;">
     <span style="color: #000000;">Routes : </span>
    Dhaka->Rajshahi<span style="color:black;margin-right:5px;">,</span>Dhaka->Chapainababganj<span style="color:black;margin-right:5px;">,</span>Dhaka->Kansat<span style="color:black;margin-right:5px;">,</span>Rajshahi->Dhaka<span style="color:black;margin-right:5px;">,</span>Chapainababganj->Dhaka<span style="color:black;margin-right:5px;">,</span>Kansat->Dhaka<span style="color:black;margin-right:5px;">,</span>Kansat->Dhaka( By Pass )<span style="color:black;margin-right:5px;">,</span>Mohakhali->Chapainababganj<span style="color:black;margin-right:5px;">,</span>Chapainababganj->Mohakhali<span style="color:black;margin-right:5px;">,</span>Dhaka->Cox's Bazar<span style="color:black;margin-right:5px;">,</span>Cox's Bazar->Dhaka<span style="color:black;margin-right:5px;">,</span>Dhaka->Chittagong<span style="color:black;margin-right:5px;">,</span>Chittagong->Dhaka<span style="color:black;margin-right:5px;">,</span>Chapainababganj->Chittagong<span style="color:black;margin-right:5px;">,</span>Chittagong->Cox's Bazar<span style="color:black;margin-right:5px;">,</span>Chittagong->Chapainababganj<span style="color:black;margin-right:5px;">,</span>Chapainababganj->Cox's Bazar<span style="color:black;margin-right:5px;">,</span>Cox's Bazar->Chapainababganj<span style="color:black;margin-right:5px;">,</span>Dhaka->Kolkata<span style="color:black;margin-right:5px;">,</span>Benapole->Dhaka<span style="color:black;margin-right:5px;">,</span>Chittagong->Kolkata<span style="color:black;margin-right:5px;">,</span>Benapole->Chittagong<span style="color:black;margin-right:5px;">,</span>Kolkata->Dhaka (BD)<span style="color:black;margin-right:5px;">,</span>Petrapole->Kolkata<span style="color:black;margin-right:5px;">,</span>Chapainababganj->Kolkata<span style="color:black;margin-right:5px;">,</span>Benapole->Chapainababganj                        </h2>
   </marquee>
  
  <!-- Main Body box End -->
  </div>
   <!-- Footer box Start -->
<?php require_once"footer.php"; ?>