<?php

include_once 'session.inc.php';
require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (!empty($_POST['fid']) && !empty($_POST['email']) && !empty($_POST['category'])) {
$fid = $_POST['fid'];
$email = $_POST['email'];
$category= $_POST['category']; 
    
if($category=="Client"){
        $sql = "UPDATE clients set span='closed' WHERE access_id='$fid' and email='$email'";
		$conn = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		$result =  mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
        if($result!=NULL){
            $rows["success"] = TRUE;
            $rows["message"] = "Succcess deleting";
			echo json_encode($rows);
        }else{
            $response["success"] = FALSE;
            $response["message"] = "Unknown error occurred in saving data!";
            echo json_encode($response);
        }
}else if($category=="Investor"){
        $sql = "UPDATE investors set span='closed' WHERE access_id='$fid' and email='$email'";
		$conn = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		$result =  mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
        if($result!=NULL){
            $rows["success"] = TRUE;
            $rows["message"] = "Succcess deleting";
			echo json_encode($rows);
        }else{
            $response["success"] = FALSE;
            $response["message"] = "Unknown error occurred in saving data!";
            echo json_encode($response);
        }
    
}else{
        $response["success"] = FALSE;
        $response["message"] = "category not specified";
        echo json_encode($response);  
}
}else{
    // user is not found with the credentials
        $response["success"] = FALSE;
        $response["message"] = "required parameters missing!!!";
        echo json_encode($response);
}
?>