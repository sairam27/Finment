<?php

include_once 'session.inc.php';
require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (!empty($_POST['prevfpsw']) && !empty($_POST['newfpsw']) && !empty($_POST['email']) && !empty($_POST['category'])) {
$prevfpsw = $_POST['prevfpsw'];
$newfpsw = $_POST['newfpsw'];
$category = $_POST['category'];    
$email = $_POST['email'];  
    
        if($category=="Financier"){
        $sql = "SELECT password1 FROM financiers WHERE email='$email'";
		$conn = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		$result =  mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
        $users=mysqli_fetch_assoc($result);
        if($users["password1"]==$prevfpsw){
            $user = $db->changePassword($email, $newfpsw);
            if($user){
                $rows["success"] = TRUE;
                $rows["message"] = "Succcess Storing";
			     echo json_encode($rows);
            }else{
                $response["success"] = FALSE;
                $response["message"] = "Unknown error occurred in saving data!";
                echo json_encode($response);
            }
        }else{
            $response["success"] = FALSE;
            $response["message"] = "previous password Doesnt match";
            echo json_encode($response);
            }
        }else if($category=="Client"){
        $sql = "SELECT password1 FROM clients WHERE email='$email'";
		$conn = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		$result =  mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
        $users=mysqli_fetch_assoc($result);
        if($users["password1"]==$prevfpsw){
            $user = $db->changePasswordclient($email, $newfpsw);
        if($user){
            $rows["success"] = TRUE;
            $rows["message"] = "Succcess Storing";
			echo json_encode($rows);
        }else{
            $response["success"] = FALSE;
            $response["message"] = "Unknown error occurred in saving data!";
            echo json_encode($response);
        }
        }else{
            $response["success"] = FALSE;
            $response["message"] = "previous password Doesnt match";
            echo json_encode($response);
        }   
        }else if($category=="Investor"){
            $sql = "SELECT password1 FROM investors WHERE email='$email'";
		$conn = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		$result =  mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
        $users=mysqli_fetch_assoc($result);
        if($users["password1"]==$prevfpsw){
        $user = $db->changePasswordinvestor($email, $newfpsw);
        if($user){
            $rows["success"] = TRUE;
            $rows["message"] = "Succcess Storing";
			echo json_encode($rows);
        }else{
            $response["success"] = FALSE;
            $response["message"] = "Unknown error occurred in saving data!";
            echo json_encode($response);
        }
        }else{
            $response["success"] = FALSE;
            $response["message"] = "previous password Doesnt match";
            echo json_encode($response);
        }
        }else{
            $response["success"] = FALSE;
        $response["message"] = "category not specified!!!";
        echo json_encode($response);
        }
}else{
    // user is not found with the credentials
        $response["success"] = FALSE;
        $response["message"] = "required parameters missing!!!";
        echo json_encode($response);
}
?>