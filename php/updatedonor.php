<?php
 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
if (isset($_POST['preemail']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile'])) {
 
    // receiving the post params
	$preemail = $_POST['preemail'];
    $name = $_POST['name'];
    $email = $_POST['email'];
	$mobile = $_POST['mobile'];
	if ($db->isUserExisted($preemail)) {
	$user = $db->updateUser($preemail, $name, $email, $mobile);
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
        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in Updating!";
            echo json_encode($response);
        }
	}else{
		$response["error"] = TRUE;
            $response["error_msg"] = "user already existing!";
            echo json_encode($response);
	}
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters (name, email, mobile) is missing!";
    echo json_encode($response);
}
?>