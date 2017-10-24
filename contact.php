<?php 
//if (isset($_POST['btn'])) {
//    save_customer_info($_POST);
//}
//
//function save_customer_info($data) {
//
//    require 'db_connect.php';
//
//    $sql = "INSERT INTO ticket_tbl(customer_name,customer_phone_no,seat_no,price) VALUES ('$data[customer_name]', '$data[customer_phone_no]','$data[seat_no]','$data[price]')";
//    if (mysqli_query($conn, $sql)) {
//        ///return mysqli_query($conn, $sql);
////        header('Location: view_info.php');
//        
//    } else {
//        die("Query Problem" . mysqli_error($conn));
//    }
//}




if (isset($_POST['btn'])) {
    contact_info($_POST);
}

function contact_info($data) {
    require './db_connect.php';
    $sql = "INSERT INTO tbl_contact (your_name,your_email_address, your_message) VALUES ('$data[your_name]','$data[your_email_address]','$data[your_message]')";
    if (mysqli_query($conn, $sql)) {
//        $message = " Thanks for contact ";
//        return $message;
        header("Location:indexx.php");
    } else {
        die("Query Problem" . mysqli_error($conn));
    }
}
?>





<head>
    <style>
        #fieldset{
            background-color: #2ecc71;
            
                
            }
         

        @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
            -o-font-smoothing: antialiased;
            font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        body {
            font-family: "Roboto", Helvetica, Arial, sans-serif;
            font-weight: 100;
            font-size: 12px;
            line-height: 30px;
            color: #777;
            background: #4CAF50;
           
           
        }

        .container {
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
            position: relative;
        }

        #contact input[type="text"],
        #contact input[type="email"],
        #contact input[type="tel"],
        #contact input[type="url"],
        #contact textarea,
        #contact button[type="submit"] {
            font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
        }

        #contact {
            background: #F9F9F9;
            padding: 25px;
            margin: 150px 0;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        #contact h3 {
            display: block;
            font-size: 30px;
            font-weight: 300;
            margin-bottom: 10px;
        }

        #contact h4 {
            margin: 5px 0 15px;
            display: block;
            font-size: 13px;
            font-weight: 400;
        }

        fieldset {
            border: medium none !important;
            margin: 0 0 10px;
            min-width: 100%;
            padding: 0;
            width: 100%;
        }

        #contact input[type="text"],
        #contact input[type="email"],
        #contact input[type="tel"],
        #contact input[type="url"],
        #contact textarea {
            width: 100%;
            border: 1px solid #ccc;
            background: #FFF;
            margin: 0 0 5px;
            padding: 10px;
        }

        #contact input[type="text"]:hover,
        #contact input[type="email"]:hover,
        #contact input[type="tel"]:hover,
        #contact input[type="url"]:hover,
        #contact textarea:hover {
            -webkit-transition: border-color 0.3s ease-in-out;
            -moz-transition: border-color 0.3s ease-in-out;
            transition: border-color 0.3s ease-in-out;
            border: 1px solid #aaa;
        }

        #contact textarea {
            height: 100px;
            max-width: 100%;
            resize: none;
        }

        #contact button[type="submit"] {
            cursor: pointer;
            width: 100%;
            border: none;
            background: #4CAF50;
            color: #FFF;
            margin: 0 0 5px;
            padding: 10px;
            font-size: 15px;
        }

        #contact button[type="submit"]:hover {
            background: #43A047;
            -webkit-transition: background 0.3s ease-in-out;
            -moz-transition: background 0.3s ease-in-out;
            transition: background-color 0.3s ease-in-out;
        }

        #contact button[type="submit"]:active {
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
        }

        .copyright {
            text-align: center;
        }

        #contact input:focus,
        #contact textarea:focus {
            outline: 0;
            border: 1px solid #aaa;
        }

        ::-webkit-input-placeholder {
            color: #888;
        }

        :-moz-placeholder {
            color: #888;
        }

        ::-moz-placeholder {
            color: #888;
        }

        :-ms-input-placeholder {
            color: #888;
        }
		<style>
div.desc {
    padding: 15px;
    text-align: center;
}

    </style>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="5/ninja-slider.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mystyle.css">
</head>

<body style="background-color: #ccffcc;">
    <div style="margin-left: 180px; margin-bottom: 20px;"><?php require './menu.php'; ?></div>

    <div>
        <div class="container">  
            <form id="contact" action="" method="post">
                <h3>Contact Form</h3>
                <h4>Contact us for custom quote</h4>
                
                <fieldset>
                    <input placeholder="Your name" type="text" tabindex="1" name="your_name" required autofocus>
                </fieldset>
                <fieldset>
                    <input placeholder="Your Email Address" name="your_email_address" type="email" tabindex="2" required>
                </fieldset>


                <fieldset>
                    <textarea placeholder="Type your message here...." tabindex="5" name="your_message" required></textarea>
                </fieldset>
                <fieldset>
                    <button name="btn" type="submit" id="contact-submit">Submit</button>
                </fieldset>

            </form>
        </div>

    </div>


     
            <!-- Main Body box End -->
        </div>
        

 


    <script src="js/ajax_jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>