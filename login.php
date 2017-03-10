<?php

include_once 'session.inc.php';
require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (!empty($_POST['lemail']) && !empty($_POST['lpassword']) && !empty($_POST['category'])) {

    // receiving the post params
    $category=$_POST['category'];
    $fid=$_POST['fid'];
    $email = $_POST['lemail'];
    $password = $_POST['lpassword'];
	// get the user by email and password
  if($category=="Financier"){
      if($db->isUserExisted($email)){
          $user = $db->getUserByEmailAndPassword($email, $password);
              if($user){
                  $response["success"] = TRUE;
                  $response["uid"] = $user["unique_id"];
                  $response["fid"] = $user["access_id"];
                  $response["fname"] = $user["fname"];
                  $response["email"] = $user["email"];
                  $response["created_at"] = $user["created_at"];
                  $response["updated_at"] = $user["updated_at"];
		          $response["mobile"] = $user["mobile"];
                  echo json_encode($response);
              }else{
                  // user is not found with the credentials
                  $response["success"] = FALSE;
                  $response["error_msg"] = "financier data retrival error";
                    echo json_encode($response);
              }
    }else{
                    $response["success"] = FALSE;
                    $response["error_msg"] = "financier doesnt Exist";
                    echo json_encode($response);
      }
  }else if($category="Client")  {
      if($db->isclientExisted($email)){
          $user = $db->getUserByEmailAndPasswordandfidandclient($email, $password, $fid);
          if($user){
                  $response["error"] = FALSE;
                  $response["uid"] = $user["unique_id"];
                  $response["user"]["name"] = $user["name"];
                  $response["user"]["email"] = $user["email"];
                  $response["user"]["created_at"] = $user["created_at"];
                  $response["user"]["updated_at"] = $user["updated_at"];
		          $response["user"]["mobile"] = $user["mobile"];
                  echo json_encode($response);
      }else{
            $response["error"] = TRUE;
                    $response["error_msg"] = "Client data Retrival error";
                    echo json_encode($response);        
      }
  }else{
                    $response["error"] = TRUE;
                    $response["error_msg"] = "Client Doesnt exist";
                    echo json_encode($response);
      }
}else{
      if($db->isinvestorExisted($email)){
          $user = $db->getUserByEmailAndPasswordandfidandinvestor($email, $password, $fid);
          if($user){
                  $response["error"] = FALSE;
                  $response["uid"] = $user["unique_id"];
                  $response["user"]["name"] = $user["name"];
                  $response["user"]["email"] = $user["email"];
                  $response["user"]["created_at"] = $user["created_at"];
                  $response["user"]["updated_at"] = $user["updated_at"];
		          $response["user"]["mobile"] = $user["mobile"];
                  echo json_encode($response);
      }else{
            $response["error"] = TRUE;
                    $response["error_msg"] = "Investor data Retrival error";
                    echo json_encode($response);        
      }
  }else{
                    $response["error"] = TRUE;
                    $response["error_msg"] = "Investor Doesnt exist";
                    echo json_encode($response);
      }
      
  }  
    
}else{
    // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "required parameters missing!!!";
        echo json_encode($response);
}    
?>

