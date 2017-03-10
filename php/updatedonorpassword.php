<?php
 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['preemail']) && isset($_POST['prepass']) && isset($_POST['newpass'])) {

	$email = $_POST['preemail'];
	$prepass = $_POST['prepass'];
	$newpass = $_POST['newpass'];
	if($db->isUserExisted($email)){
		if($db->isUserPasswordCorrect($email,$prepass)){
			if(!($prepass==$newpass)){
				$user = $db->changePassword($email,$newpass);
					if ($user) {
						// user stored successfully
						$response["error"] = FALSE;
						$response["uid"] = $user["unique_id"];
						$response["user"]["name"] = $user["name"];
						$response["user"]["email"] = $user["email"];
						$response["user"]["created_at"] = $user["created_at"];
						$response["user"]["updated_at"] = $user["updated_at"];
						$response["user"]["mobile"] = $user["mobile"];
						echo json_encode($response);
					}else {
							// user failed to store
							$response["error"] = TRUE;
							$response["error_msg"] = "Unknown error occurred in password change";
								echo json_encode($response);
						}
		
			}else  {
				$response["error"] = TRUE;
				$response["error_msg"] = "previous password and new password arre same";
				echo json_encode($response);
				}
		}else{
				$response["error"] = TRUE;
				$response["error_msg"] = "previous password is wrong ";
				echo json_encode($response);
				}
	}else  {
				$response["error"] = TRUE;
				$response["error_msg"] = "user not present in database";
				echo json_encode($response);
				}
}else
	{
	$response["error"] = TRUE;
    $response["error_msg"] = "Cannot cahnge password dude...!";
    echo json_encode($response);
	}
?>	