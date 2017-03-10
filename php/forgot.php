<?php
 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['email'])) {

	$email = $_POST['email'];
	 
	if ($db->isUserExisted($email)) {
		$sai = $db->getUserPasswordByEmail($email);
		if ($sai != false) {
		$pass  =  $sai;
	    $to = $email;
		$headers  = 'From: bloodaid.ravi@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=utf-8';

		$subject = "Bloodaid Forgot Password";
		$message = "Hi,</br> your Password for bloodaid is : $pass </br> Regards Bloodaid.";
		if(mail($to, $subject, $message, $headers)){
				$response["error"] = FALSE;
				$response["error_msg"] = "Password sent to your mail dude..!";
				echo json_encode($response);
		}
		} else  {
				$response["error"] = TRUE;
				$response["error_msg"] = "user present but cant get password!";
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
