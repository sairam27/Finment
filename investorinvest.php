<?php

include_once 'session.inc.php';
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
// json response array
$response = array("error" => FALSE);

if (isset($_POST['fid']) && isset($_POST['email'])) {

	   $fid = $_POST['fid'];
        $email=$_POST['email'];
		$sql = "SELECT created_at,totamtinvest,totamtback,interestrate,category
            FROM investorrequest
            INNER JOIN 
            (SELECT access_id, MAX(created_at) as TopDate
            FROM investorrequest
            WHERE access_id='$fid' AND email='$email'
            GROUP BY email,category) AS EachItem ON 
            EachItem.TopDate = investorrequest.created_at 
            AND EachItem.access_id = investorrequest.access_id ORDER by created_at DESC";
		$conn = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		$result =  mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
		$rows=array();
		if($result!= NULL){
			while($users=mysqli_fetch_assoc($result)){
			$rows[]=$users;
			}
			$rows["success"] = TRUE;
            $rows["message"] = "Succcess Retrival";
			echo json_encode($rows);
		
			
		}else{
			// user failed to store
            $response["success"] = FALSE;
            $response["message"] = "Unknown error occurred in retrival!";
            echo json_encode($response);
		}	
}else{
	$response["success"] = FALSE;
    $response["message"] = "Required parameters (name, email or password) is missing!";
    echo json_encode($response);
	}
?>
