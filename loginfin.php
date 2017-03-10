
<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
// json response array
$response = array("error" => FALSE);
if (!empty($_POST['lemail']) && !empty($_POST['lpassword']) && !empty($_POST['category'])) {
   
    echo "great";
    
    
}else{
    // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "required parameters missing!!!";
        echo json_encode($response);
    }    


?>