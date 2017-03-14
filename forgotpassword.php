<?php
 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['email'])) {

	$email = $_POST['email']; 
	if ($db->isUserExisted($email)) {
        $pass=$db->getuserPassword($email);
        $subject="Financiers Forgot password here";
        $header= array("From: FINMENT ","Content-type: text/html");
        $message='
		
			<html>
			<head>
			<title>Title of email</title>
			</head>

			<body>

			<div  style=" border:1px solid grey; padding:20px;">
			        <div style="font-size: 35px; margin: 30px;color:#C0392B;">
			        	<strong>Hello, Welcome !</strong> 
			        </div>
			        <p>Here is your Password details : </p>
			        <hr style="  width:80%; color:grey; text-align: center;">

			        <span  style="color:#C0392B;">financierid:</span> '.$pass["access_id"].' <br>
			        <span  style="color:#C0392B;">Password:</span> '.$pass["password1"].'<br>
                            
			        <hr style="width:80%; color:grey; text-align: center;"><br>    
			 		<br><br><br>
	        		<div>
		                 Thanks again, and if you ever have any questions or feedback, just send us an email :<br><br>
		                 <span style="color:#C0392B;"> SAIRAM RAVI  :</span> ravi.sairam27@gmail.com <br>
		                 <span style="color:#C0392B;"> VARUN J SHAH : </span> vjs281095@gmail.com <br>
		                 <br>
		                 We read &amp; respond to every request!
	       			</div>

			</div>

			</body>
			</html>	
		';
        $to=$email;
        $sentmail = mail($to,$subject,$message,implode("\r\n",$header)) or die("Error sending mail.");
        echo json_encode(array("success" => true, "message" => 'A confirmation mail is sent to financiers email'));
             
    }else if($db->isclientExisted($email)){
        $pass=$db->getclientPassword($email);
        $subject="clients Forgot password here";
        $header= array("From: FINMENT ","Content-type: text/html");
        $message='
		
			<html>
			<head>
			<title>Title of email</title>
			</head>

			<body>

			<div  style=" border:1px solid grey; padding:20px;">
			        <div style="font-size: 35px; margin: 30px;color:#C0392B;">
			        	<strong>Hello, Welcome !</strong> 
			        </div>
			        <p>Here is your Password details : </p>
			        <hr style="  width:80%; color:grey; text-align: center;">

			        <span  style="color:#C0392B;">financierid:</span> '.$pass["access_id"].' <br>
			        <span  style="color:#C0392B;">Password:</span> '.$pass["password1"].'<br>
                            
			        <hr style="width:80%; color:grey; text-align: center;"><br>    
			 		<br><br><br>
	        		<div>
		                 Thanks again, and if you ever have any questions or feedback, just send us an email :<br><br>
		                 <span style="color:#C0392B;"> SAIRAM RAVI  :</span> ravi.sairam27@gmail.com <br>
		                 <span style="color:#C0392B;"> VARUN J SHAH : </span> vjs281095@gmail.com <br>
		                 <br>
		                 We read &amp; respond to every request!
	       			</div>

			</div>

			</body>
			</html>	
		';
        $to=$email;
        $sentmail = mail($to,$subject,$message,implode("\r\n",$header)) or die("Error sending mail.");
        echo json_encode(array("success" => true, "message" => 'A confirmation mail is sent to clients email'));
        
    }else if($db->isinvestorExisted($email)){
        $pass=$db->getinvestorPassword($email);
        $subject="Investors Forgot password here";
        $header= array("From: FINMENT ","Content-type: text/html");
        $message='
		
			<html>
			<head>
			<title>Title of email</title>
			</head>

			<body>

			<div  style=" border:1px solid grey; padding:20px;">
			        <div style="font-size: 35px; margin: 30px;color:#C0392B;">
			        	<strong>Hello, Welcome !</strong> 
			        </div>
			        <p>Here is your Password details : </p>
			        <hr style="  width:80%; color:grey; text-align: center;">

			        <span  style="color:#C0392B;">financierid:</span> '.$pass["access_id"].' <br>
			        <span  style="color:#C0392B;">Password:</span> '.$pass["password1"].'<br>
                            
			        <hr style="width:80%; color:grey; text-align: center;"><br>    
			 		<br><br><br>
	        		<div>
		                 Thanks again, and if you ever have any questions or feedback, just send us an email :<br><br>
		                 <span style="color:#C0392B;"> SAIRAM RAVI  :</span> ravi.sairam27@gmail.com <br>
		                 <span style="color:#C0392B;"> VARUN J SHAH : </span> vjs281095@gmail.com <br>
		                 <br>
		                 We read &amp; respond to every request!
	       			</div>

			</div>

			</body>
			</html>	
		';
        $to=$email;
        $sentmail = mail($to,$subject,$message,implode("\r\n",$header)) or die("Error sending mail.");
        echo json_encode(array("success" => true, "message" => 'A confirmation mail is sent to investors email'));
        
    }
} else
	{
	$response["error"] = TRUE;
    $response["error_msg"] = "Cannot send password to your e-mail address.Problem with sending mail...";
    echo json_encode($response);
	}
?>	
