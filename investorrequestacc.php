<?php

include_once 'session.inc.php';
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
// json response array
$response = array("error" => FALSE);

if (isset($_POST['fid']) && isset($_POST['email']) && isset($_POST['category']) && (isset($_POST['amountinvest']) || isset($_POST['amountback'])) ) {
	   $fid = $_POST['fid'];
       $email = $_POST['email'];
       $category = $_POST['category'];
        $subject="Investor request confirmation";
		$header= array("From: FINMENT ","Content-type: text/html");
    
    if($category=="invest"){
        $amountinvest=$_POST['amountinvest'];
        $sql = "SELECT balance
            FROM finbalance
            INNER JOIN 
            (SELECT access_id, MAX(created_at) as TopDate
            FROM finbalance                                     
            WHERE access_id = '$fid'
            GROUP BY access_id) AS EachItem ON 
            EachItem.TopDate = finbalance.created_at 
            AND EachItem.access_id = finbalance.access_id"; /*** get financier balance */
		$conn = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		$result =  mysqli_query($conn, $sql) or die("Error in Selecting bal " . mysqli_error($conn));
        $users=mysqli_fetch_assoc($result);
        
        $sql1 = "SELECT MAX(totalinvest)as totalinvest FROM investorapproved WHERE access_id='$fid' AND email='$email'";
		$conn1 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		$result1 =  mysqli_query($conn1, $sql1) or die("Error in Selecting maxtot or maxpay " . mysqli_error($conn1));
        $users1=mysqli_fetch_assoc($result1); /*** get previous investment */
        
        if($users1["totalinvest"]==null){
            $newinvest=$amountinvest;
        }else{
            $newinvest=($users1["totalinvest"]+$amountinvest);
        }
        
            if($users1["totalinvest"]==null){
            $sql2 = "Insert INTO investorapproved(access_id,email,created_at,totalinvest,category) VALUES('$fid','$email',NOW(),'$newinvest','$category')";
		    $conn2 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn2));
		    $result2 =  mysqli_query($conn2, $sql2) or die("Error in investorapproved " . mysqli_error($conn2));   
            }else{
            $sql2 = "UPDATE investorapproved set totalinvest='$newinvest' WHERE access_id='$fid' AND email='$email' AND category='$category'";
		    $conn2 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn2));
		    $result2 =  mysqli_query($conn2, $sql2) or die("Error in investorapproved " . mysqli_error($conn2));   
            }
        if($result2){/*** investor investment approved */
            $newfinbal=($users["balance"]+$amountinvest);
        
            $sql3 = "INSERT into finbalance(access_id,created_at,amountadded,balance) VALUES('$fid',NOW(),'$amountinvest','$newfinbal')";
		    $conn3 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn3));
		    $result3 =  mysqli_query($conn3, $sql3) or die("Error in financierbalance " . mysqli_error($conn3)); 
            if($result3){
                        $sql4 = "UPDATE investorrequest set iapproval='1' where access_id='$fid' AND email='$email' AND amountinvest='$amountinvest' AND category='$category' ";
                        $conn4 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		                $result4 =  mysqli_query($conn4, $sql4) or die("Error in investorrequest " . mysqli_error($conn));
                        if($result4){
                               $to=$email;
                            $message1='
		
			<html>
			<head>
			<title>Title of email</title>
			</head>

			<body>

			<div  style=" border:1px solid grey; padding:20px;">
			        <div style="font-size: 35px; margin: 30px;color:#C0392B;">
			        	<strong>Hello, Welcome !</strong> 
			        </div>
			        <p> Dear User,<br><br>
			       		Your request is apporved
			        </p><br>

			        <div id="instructions">
			                <div class="category">
			                        <div class="category-heading" style="font-weight: 500; font-size: 16px;"> Investor REQUEST </div>
			                        <ul class="category-instructions">
                                       
                                            <li>your requested amount '.$amountinvest.' is approved </li> 
			                                <li> Just Login and start evaluating your Finance.</li>
			                        </ul>
			                </div>
			                
			        </div>
			 		<br><br><br>
	        		<div>
		                 Thanks again, and if you ever have any questions or feedback, just send us an email :<br><br>
		                 <span style="color:#C0392B;"> SAIRAM RAVI  :</span> ravi.sairam27@gmail.com <br>
		                 <span style="color:#C0392B;"> VARUN J SHAH : </span> vjs281095@gmail.com <br>
		                 <br>
		                 We read &amp; respond to every request!
	       			</div>

			</div>

			</body>
			</html>	
		';
			                 $sentmail = mail($to,$subject,$message1,implode("\r\n",$header)) or die("Error sending mail.");
                            
                            $response["success"] = TRUE;
                            $response["message"]= "Fund accepted Successfully";
                            echo json_encode($response); 
                        }else{
                            $response["success"] = FALSE;
                            $response["message"] = "investorrequest table not updated";
                            echo json_encode($response);
                        }
            }else{
                $response["success"] = FALSE;
                $response["message"] = "financier balance not updated";
                echo json_encode($response);
            }
        }else{
            $response["success"] = FALSE;
            $response["message"] = "investorapproved table not updated";
            echo json_encode($response);
        }
    }else if($category=="backamt"){
        $amountback=$_POST['amountback'];
        $sql = "SELECT balance
            FROM finbalance
            INNER JOIN 
            (SELECT access_id, MAX(created_at) as TopDate
            FROM finbalance                                     
            WHERE access_id = '$fid'
            GROUP BY access_id) AS EachItem ON 
            EachItem.TopDate = finbalance.created_at 
            AND EachItem.access_id = finbalance.access_id"; /*** get financier balance */
		$conn = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		$result =  mysqli_query($conn, $sql) or die("Error in Selecting bal " . mysqli_error($conn));
        $users=mysqli_fetch_assoc($result);
        
        if($users["balance"]>=$amountback){ /*** check financier balance */
            $sql1 = "SELECT max(totalinvest)as totalinvest,max(totalback)as totalback from investorapproved where access_id='$fid' AND email='$email'";
		    $conn1 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		    $result1 =  mysqli_query($conn1, $sql1) or die("Error in Selecting totalinvest " . mysqli_error($conn));
            $users1=mysqli_fetch_assoc($result1);
            
            if($users1["totalback"]==null){
                $newback=$amountback; 
            } 
            else{
                $newback=($users1["totalback"]+$amountback);
            }
            if(($users1["totalinvest"]!==null) && ($amountback<=$users1["totalinvest"])){/*** investor investment checking */
                $newinvest=($users1["totalinvest"]-$amountback);
                
                      $sql2 = "Update investorapproved set totalback='$newback',totalinvest='$newinvest' where access_id='$fid' AND email='$email'";
		              $conn2 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn2));
		              $result2 =  mysqli_query($conn2, $sql2) or die("Error in Selecting totalinvest " . mysqli_error($conn2));
                        if($result2){
                            $newfinbal1=($users["balance"]-$amountback);
                            $sql3 = "INSERT into finbalance(access_id,created_at,amountreturned,balance) VALUES('$fid',NOW(),'$amountback','$newfinbal1')";
		                    $conn3 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn3));
		                   $result3 =  mysqli_query($conn3, $sql3) or die("Error in Selecting totalinvest " . mysqli_error($conn3));
                            if($result3){
                                $sql4 = "Update investorrequest set baapproval='1' where access_id='$fid' AND email='$email' AND category='$category' AND amountback='$amountback'";
		                      $conn4 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn4));
		                      $result4 =  mysqli_query($conn4, $sql4) or die("Error in Selecting totalinvest " . mysqli_error($conn4));
                                if($result4){
                                    $to=$email;
                             $message2='
		
			<html>
			<head>
			<title>Title of email</title>
			</head>

			<body>

			<div  style=" border:1px solid grey; padding:20px;">
			        <div style="font-size: 35px; margin: 30px;color:#C0392B;">
			        	<strong>Hello, Welcome !</strong> 
			        </div>
			        <p> Dear User,<br><br>
			       		Your request is apporved
			        </p><br>

			        <div id="instructions">
			                <div class="category">
			                        <div class="category-heading" style="font-weight: 500; font-size: 16px;"> Investor REQUEST </div>
			                        <ul class="category-instructions">
                                        <li> </li>
                                            <li>your requested amount '.$amountback.' is approved </li> 
			                                <li> Just Login and start evaluating your Finance.</li>
			                        </ul>
			                </div>
			                
			        </div>
			 		<br><br><br>
	        		<div>
		                 Thanks again, and if you ever have any questions or feedback, just send us an email :<br><br>
		                 <span style="color:#C0392B;"> SAIRAM RAVI  :</span> ravi.sairam27@gmail.com <br>
		                 <span style="color:#C0392B;"> VARUN J SHAH : </span> vjs281095@gmail.com <br>
		                 <br>
		                 We read &amp; respond to every request!
	       			</div>

			</div>

			</body>
			</html>	
		';
    
			                 $sentmail = mail($to,$subject,$message2,implode("\r\n",$header)) or die("Error sending mail.");
                                    
                                        $response["success"] = TRUE;
                                        $response["message"]= "Fund return accepted";
                                        echo json_encode($response); 
                                }else{
                                    $response["success"] = FALSE;
                                    $response["message"] = "investor request  table not updated";
                                    echo json_encode($response);  
                                }
                            }else{
                                $response["success"] = FALSE;
                                $response["message"] = "financier balance not updated";
                                echo json_encode($response);  
                            }    
                        }else{
                            $response["success"] = FALSE;
                            $response["message"] = "investorapproved not updated";
                            echo json_encode($response);  
                        }
            }else{
                $response["success"] = FALSE;
                $response["message"] = "Investor requesting more than invested";
                echo json_encode($response); 
            }
        }else{
            $response["success"] = FALSE;
            $response["message"] = "Your Balance is low Rightnow to pay back";
            echo json_encode($response); 
        }
    }else{
            $response["success"] = FALSE;
            $response["message"] = "category not specified";
            echo json_encode($response);
        }
}else{
	$response["success"] = FALSE;
    $response["message"] = "Required parameters (name, email or password) is missing!";
    echo json_encode($response);
	}
?>
