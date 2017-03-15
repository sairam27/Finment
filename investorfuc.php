<?php

include_once 'session.inc.php';
require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);
if (!empty($_POST['email']) && !empty($_POST['fund']) && !empty($_POST['fid']) && !(empty($_POST['category']))) {
    
    $email=$_POST['email'];
    $fund=$_POST['fund'];
    $fid=$_POST['fid'];
    $category=$_POST['category'];
    if($category=="invest"){
    if($db->isinvestorExisted($email)){
        if($db->investorfundin($fund,$email,$fid,$category)){
            $response["success"] = TRUE;
            $response["messgae"] = "Fund Inserted to DB";
            echo json_encode($response);
        }else{
             $response["success"] = FALSE;
    $response["messgae"] = "Fund cant be Inserted";
    echo json_encode($response);
        } 
    }else{
        $response["success"] = FALSE;
    $response["message"] = "email doesnt exist";
    echo json_encode($response);
    }
    }else if($category=="backamt"){
        if($db->isinvestorExisted($email)){
        if($db->investorfundback($fund,$email,$fid,$category)){
            $response["success"] = TRUE;
            $response["messgae"] = "Fund Inserted to DB";
            echo json_encode($response);
        }else{
             $response["success"] = FALSE;
    $response["messgae"] = "Fund cant be Inserted";
    echo json_encode($response);
        } 
    }else{
        $response["success"] = FALSE;
    $response["message"] = "email doesnt exist";
    echo json_encode($response);
    }
        
    }else{
        $response["success"] = FALSE;
    $response["message"] = "category not specified";
    echo json_encode($response);
    
    }
}else {
    $response["success"] = FALSE;
    $response["message"] = "Required parameters (name, email or password) is missing!";
    echo json_encode($response);
}
?>