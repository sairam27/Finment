<?php
	include_once 'session.inc.php';
    require_once 'include/DB_Functions.php';
    $db = new DB_Functions();
	
	if(!empty($_GET['fname']) && !empty($_GET['email']) && !empty($_GET['passkey']))
	{
		
		$fname=$_GET['fname'];
		$passkey=$_GET['passkey'];
		$email=$_GET['email'];
        
        if($db->isUserExisted($email)){
        $user = $db->activateuser($email,$passkey);
            if($user){
                echo "<h2> user activated </h2";
            }else{
                echo "<h2>Your account has already been activated.</h2>";
            }
                 
        }else{
            echo "<h2> User doesnt exist in database </h2>";
        }
        
	}else
        echo "<h2> INVALID data </h2>";
?>