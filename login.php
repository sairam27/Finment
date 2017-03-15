<?php

include_once 'session.inc.php';
require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (!empty($_POST['lemail']) && !empty($_POST['lpassword']) && !empty($_POST['category'])) {

    // receiving the post params
    $category=$_POST['category'];
    $email = $_POST['lemail'];
    $fid=$_POST['fid'];
    $fid1=$db->getuserfid($email);
    $password = $_POST['lpassword'];
    $loan="loan";
    $repay="repay";
    $invest ="invest";
    $backamt = "backamt";
	// get the user by email and password
    $sql = "SELECT balance
            FROM finbalance
            INNER JOIN 
            (SELECT access_id, MAX(created_at) as TopDate
            FROM finbalance
            WHERE access_id = '$fid1'
            GROUP BY access_id) AS EachItem ON 
            EachItem.TopDate = finbalance.created_at 
            AND EachItem.access_id = finbalance.access_id";
    $conn = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
    $result =  mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
    $users1=mysqli_fetch_assoc($result);
    
    $sql2 = "SELECT totrequested,bapproval
            FROM clientrequest
            INNER JOIN 
            (SELECT access_id, MAX(created_at) as TopDate,category
            FROM clientrequest
            WHERE access_id = '$fid'
            AND category='$loan'
            GROUP BY access_id) AS EachItem ON 
            EachItem.TopDate = clientrequest.created_at 
            AND EachItem.access_id = clientrequest.access_id
            AND EachItem.category = clientrequest.category";
    $conn2 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
    $result2 = mysqli_query($conn2, $sql2) or die("Error in Selecting " . mysqli_error($conn));
    $users2=mysqli_fetch_assoc($result2);
    
     $sql3 = "SELECT totrepay,rapproval
            FROM clientrequest
            INNER JOIN 
            (SELECT access_id, MAX(created_at) as TopDate,category
            FROM clientrequest
            WHERE access_id = '$fid' AND
            category='$repay'
            GROUP BY access_id) AS EachItem ON 
            EachItem.TopDate = clientrequest.created_at 
            AND EachItem.access_id = clientrequest.access_id
            AND EachItem.category = clientrequest.category";
    $conn3 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
    $result3 = mysqli_query($conn3, $sql3) or die("Error in Selecting " . mysqli_error($conn));
    $users3=mysqli_fetch_assoc($result3);
    
    $sql4 = "SELECT totamtinvest,iapproval
            FROM investorrequest
            INNER JOIN 
            (SELECT access_id, MAX(created_at) as TopDate,category
            FROM investorrequest
            WHERE access_id = '$fid'
            AND category='$invest'
            GROUP BY access_id) AS EachItem ON 
            EachItem.TopDate = investorrequest.created_at 
            AND EachItem.access_id = investorrequest.access_id
            AND EachItem.category = investorrequest.category";
    $conn4 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
    $result4 = mysqli_query($conn4, $sql4) or die("Error in Selecting " . mysqli_error($conn));
    $users4=mysqli_fetch_assoc($result4);
    
    $sql5 = "SELECT totamtback,baapproval
            FROM investorrequest
            INNER JOIN 
            (SELECT access_id, MAX(created_at) as TopDate,category
            FROM investorrequest
            WHERE access_id = '$fid' AND
            category='$backamt'
            GROUP BY access_id) AS EachItem ON 
            EachItem.TopDate = investorrequest.created_at 
            AND EachItem.access_id = investorrequest.access_id
            AND EachItem.category = investorrequest.category";
    $conn5 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
    $result5 = mysqli_query($conn5, $sql5) or die("Error in Selecting " . mysqli_error($conn));
    $users5=mysqli_fetch_assoc($result5);
    
    
    if($category=="Financier"){
      if($db->isUserExisted($email)){
          if($db->isuseractivated($email)){
          $user = $db->getUserByEmailAndPassword($email, $password);
              if($user){
                  $response["success"] = TRUE;
                  $response["message"] = "Financier Loggin in";
                  $response["uid"] = $user["unique_id"];
                  $response["fid"] = $user["access_id"];
                  $response["fname"] = $user["fname"];
                  $response["lname"] = $user["lname"];
                  $response["email"] = $user["email"];
                  $response["created_at"] = $user["created_at"];
                  $response["updated_at"] = $user["updated_at"];
		          $response["mobile"] = $user["mobile"];
                  $response["clients"] = $user["clients"];
                  $response["investors"] =$user["Investors"];
                  $response["balance"] =$users1["balance"];
                  echo json_encode($response);
              }else{
                  // user is not found with the credentials
                  $response["success"] = FALSE;
                  $response["message"] = "financier data retrival error";
                    echo json_encode($response);
              }
    }else{
            $response["success"] = FALSE;
                    $response["message"] = "financier Activation Pending";
                    echo json_encode($response);  
          }
  }else{
                    $response["success"] = FALSE;
                    $response["message"] = "financier doesnt Exist";
                    echo json_encode($response);
      }
  }else if($category=="Client")  {
                    if($db->isclientExisted($email)){
                            if($db->isclientactivated($email)){
                                    $user = $db->getUserByEmailAndPasswordandfidandclient($email, $password, $fid);
                                    if($user){
                                            $response["success"] = TRUE;
                                            $response["message"] = "Client Loggin in";
                                            $response["uid"] = $user["unique_id"];
                                            $response["fid"] = $user["access_id"];
                                            $response["fname"] = $user["fname"];
                                            $response["lname"] = $user["lname"];
                                            $response["email"] = $user["email"];
                                            $response["created_at"] = $user["created_at"];
                                            $response["updated_at"] = $user["updated_at"];
                                            $response["mobile"] = $user["mobile"];
                                            $response["totrequested"] = $users2["totrequested"];
                                            $response["bapproval"] = $users2["bapproval"];
                                            $response["totrepay"] = $users3["totrepay"];
                                            $response["rapproval"] = $users3["rapproval"];
                                            echo json_encode($response);
                                    }else{
                                            $response["success"] = FALSE;
                                            $response["messaage"] = "Client data Retrival error";
                                            echo json_encode($response);        
                                        } 
                                    }else{
                                       $response["success"] = FALSE;
                                       $response["message"] = "Client Activation Pending";
                                       echo json_encode($response);   
              
                            }
                    }else{
                            $response["success"] = FALSE;
                            $response["message"] = "Client Doesnt exist";
                            echo json_encode($response);
      }
}else{
      if($db->isinvestorExisted($email)){
          if($db->isinvestorActivated($email)){
          $user = $db->getUserByEmailAndPasswordandfidandinvestor($email, $password, $fid);
          if($user){
                  $response["success"] = TRUE;
                  $response["message"] = "Investor Loggin in";
                  $response["uid"] = $user["unique_id"];
                  $response["fid"] = $user["access_id"];
                  $response["fname"] = $user["fname"];
                  $response["lname"] = $user["lname"];
                  $response["email"] = $user["email"];
                  $response["created_at"] = $user["created_at"];
                  $response["updated_at"] = $user["updated_at"];
		          $response["mobile"] = $user["mobile"];
                  $response["totamtinvest"] = $users4["totamtinvest"];
                  $response["iapproval"] = $users4["iapproval"];
                  $response["totamtback"] = $users5["totamtback"];
                  $response["baapproval"] = $users5["baapproval"];
                  echo json_encode($response);
      }else{
                    $response["success"] = FALSE;
                    $response["message"] = "Investor data Retrival error";
                    echo json_encode($response);        
      }
  }else{
           $response["success"] = FALSE;
                    $response["message"] = "Investor Activation pending";
                    echo json_encode($response);
      }
  }else{
                    $response["success"] = FALSE;
                    $response["message"] = "Investor Doesnt exist";
                    echo json_encode($response);
      }
  }
      
  }else{
    // user is not found with the credentials
        $response["success"] = FALSE;
        $response["message"] = "required parameters missing!!!";
        echo json_encode($response);
}    
?>

