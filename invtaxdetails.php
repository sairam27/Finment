<?php

include_once 'session.inc.php';
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
// json response array
$response = array("error" => FALSE);

if (isset($_POST['fid']) && isset($_POST["profit"]) && isset($_POST["email"])) {

        $fid = $_POST['fid'];
        $profit=$_POST['profit'];
        $email=$_POST['email'];
        if($profit<=250000){
        $sql1 = "insert into investtax(access_id,email,created_at,interestearned) VALUES('$fid','$email',NOW(),'$profit')";
		$conn1 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn1));
		$result1 =  mysqli_query($conn1, $sql1) or die("Error in Selecting " . mysqli_error($conn1));
        }else if($profit>250000 && $profit<=500000){
            $taxupt=($profit/10);
        $sql1 = "insert into investtax(access_id,email,created_at,interestearned,taxutp) VALUES('$fid','$email',NOW(),'$profit','$taxupt')";
		$conn1 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn1));
		$result1 =  mysqli_query($conn1, $sql1) or die("Error in Selecting " . mysqli_error($conn1));   
        }else if($profit>500000 && $profit<=1000000){
            $taxupt=($profit/5);
        $sql1 = "insert into investtax(access_id,email,created_at,interestearned,taxutp) VALUES('$fid','$email',NOW(),'$profit','$taxupt')";
		$conn1 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		$result1 =  mysqli_query($conn1, $sql1) or die("Error in Selecting " . mysqli_error($conn1));  
        }else{
            $taxupt=((3/10)*$profit);
        $sql1 = "insert into investtax(access_id,email,created_at,interestearned,taxutp) VALUES('$fid','$email',NOW(),'$profit','$taxupt')";
		$conn1 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		$result1 =  mysqli_query($conn1, $sql1) or die("Error in Selecting " . mysqli_error($conn1)); 
            
        }
         if($result1){
		$sql = "SELECT access_id,email,created_at,interestearned,taxutp FROM investtax WHERE access_id='$fid' and email='$email'";
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
		          $sql2 = "delete from investtax where access_id='$fid' AND email='$email'";
		          $conn2 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn2));
		          $result2 =  mysqli_query($conn2, $sql2) or die("Error in Selecting " . mysqli_error($conn2));
		          $rows=array();
			
		}else{
			// user failed to store
            $response["success"] = FALSE;
            $response["message"] = "Unknown error occurred in retrival!";
            echo json_encode($response);
		}
    }else{
           $response["success"] = FALSE;
            $response["message"] = "table insert error";
            echo json_encode($response);  
         }
}else{
	$response["success"] = FALSE;
    $response["message"] = "Required parameters (name, email or password) is missing!";
    echo json_encode($response);
	}
?>
