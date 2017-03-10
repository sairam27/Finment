<?php

require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['email']) && isset($_POST['spinner']) && isset($_POST['username']) && isset($_POST['useremail']) && isset($_POST['usermobile'])) {

	$email = $_POST['email'];
	$spinner = $_POST['spinner'];
	$username = $_POST['username'];
	$useremail = $_POST['useremail'];
	$usermobile = $_POST['usermobile'];
	
	if ($db->isUserExisted($email)) {

		$headers  = 'From: bloodaid.ravi@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=utf-8';
	
		$to = $email;
		$subject = "Bloodaid Notification";
		$message = "Hi,</br> Hello boss , $username with $useremail and $usermobile is requesting $spinner blood from you </br> Regards Bloodaid.";
 
		if(mail($to, $subject, $message, $headers)){
		
				$response["error"] = FALSE;
				$response["error_msg"] = "Notification sent to email";
				echo json_encode($response);
		} else  {
				$response["error"] = TRUE;
				$response["error_msg"] = "Error in sending mail! dude";
				echo json_encode($response);
				}
	} else {
	    $response["error"] = TRUE;
        $response["error_msg"] = "Login credentials are wrong. Please try again!";
        echo json_encode($response);
		}	
} else
	{
	$response["error"] = TRUE;
    $response["error_msg"] = "Cannot send password to your e-mail address.Problem with sending mail...";
    echo json_encode($response);
	}
?>	
