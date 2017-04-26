<?php

include_once 'session.inc.php';
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['fpsw']) && !empty($_POST['mobile']) && !empty($_POST['aadhar']) && !empty($_POST['panid']) && !empty($_POST['fid'])) {
 
    // receiving the post params
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $fpsw = $_POST['fpsw'];
	$mobile = $_POST['mobile'];
	$aadhar = $_POST['aadhar'];
    $panid = $_POST['panid'];
    $fid = $_POST['fid'];
    $category="Investor";
    
    $confirmation=md5(uniqid(rand()));
		$subject="Investor confirmation link here";
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
			        <p> Dear User,<br><br>
			       		 We really appreciate you signing up to Finment. You are among 400+ Users that will soon experience a modern Finance Management System.
			        </p><br>

			        <div id="instructions">
			                <div class="category">
			                        <div class="category-heading" style="font-weight: 500; font-size: 16px;"> CLIENTS </div>
			                        <ul class="category-instructions">
			                                <li> Just Login and start evaluating your Finance.</li>
			                                <li> Appraise a single Investor Completely before moving on to the next.</li>
			                        </ul>
			                </div>
			                <div class="category">
			                        <div class="category-heading" style="font-weight: 500; font-size: 16px;"> investors </div>
			                        <ul class="category-instructions">
			                                <li>You can view statistics of any Investment in your Finance.</li>
			                                <li>Just select the your finacier ,Investor and competency to see details in ur Home page</li>
			                        </ul>
			                </div>
			        </div>
			        <br>
			        <p>Here is your login details : </p>
			        <hr style="  width:80%; color:grey; text-align: center;">

			        <span  style="color:#C0392B;">financierid:</span> '.$fid.' <br>
			        <span  style="color:#C0392B;">Username:</span> '.$email.' <br>
			        <span  style="color:#C0392B;">Password:</span> '.$fpsw.'<br>

			        <hr style="width:80%; color:grey; text-align: center;"><br>
			        <div style="width:100%;background-color:#C0392B;line-height:40px;margin:0px auto;border-radius: .25rem;" >
			        	<a href="http://192.168.225.32:80/Finment/confirm.php?fname='.$fname.'&category='.$category.'&passkey='.$confirmation.'&email='.$email.'" style="color:white;text-align:center;text-decoration:none;display:block;"> Activate My Account </a>
					</div>       
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
 
    // check if user is already existed with the same email
    if ($db->isinvestorExisted($email)) {
        // user already existed
        echo json_encode(array("success" => false, "message" => 'user already existed'));
    } else {
        // create a new user
        $user = $db->storeUserinvestor($fname, $lname, $email, $fpsw, $mobile, $aadhar, $panid, $confirmation, $fid);
        $user2 = $db->updatenoofinvestors($fid);
        if ($user) {
            if($user2){
            // user stored successfully
            $to=$email;
			$sentmail = mail($to,$subject,$message,implode("\r\n",$header)) or die("Error sending mail.");
           echo json_encode(array("success" => true, "message" => 'A confirmation mail is sent to ur email'));
            }else{
                echo json_encode(array("success" => false, "message" => 'inserted but investors not updated')); 
            }
        } else {
            // user failed to store
            echo json_encode(array("success" => false, "message" => 'unknown error in Registration'));
        }
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters (name, email or password) is missing!";
    echo json_encode($response);
}
?>