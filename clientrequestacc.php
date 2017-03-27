<?php

include_once 'session.inc.php';
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
// json response array
$response = array("error" => FALSE);

if (isset($_POST['fid']) && isset($_POST['email']) && isset($_POST['category']) && (isset($_POST['amountrequested']) || isset($_POST['amountrepay'])) ) {
	   $fid = $_POST['fid'];
       $email = $_POST['email'];
       $category = $_POST['category'];
        
        $subject="Client Request confirmation";
		$header= array("From: FINMENT ","Content-type: text/html");
		
    if($category=="loan"){
        $amountrequested=$_POST["amountrequested"];
        $sql = "SELECT balance
            FROM finbalance
            INNER JOIN 
            (SELECT access_id, MAX(created_at) as TopDate
            FROM finbalance
            WHERE access_id = '$fid'
            GROUP BY access_id) AS EachItem ON 
            EachItem.TopDate = finbalance.created_at 
            AND EachItem.access_id = finbalance.access_id";
		$conn = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		$result =  mysqli_query($conn, $sql) or die("Error in Selecting bal " . mysqli_error($conn));
        $users=mysqli_fetch_assoc($result);
        
        if($amountrequested<=$users["balance"]){ /*** check balance of financier */
            $sql1 = "SELECT max(totloan)as totloan from clientapproved where access_id='$fid' AND email='$email'";
		    $conn1 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		    $result1 =  mysqli_query($conn1, $sql1) or die("Error in Selecting totloan " . mysqli_error($conn));
            $users1=mysqli_fetch_assoc($result1);
            if($users1["totloan"]==null){
                $newloan=$amountrequested;
            }else{
                $newloan=($users1["totloan"]+$amountrequested);
            } 
            if($users1["totloan"]==null){
            $sql2 = "Insert INTO clientapproved(access_id,email,created_at,totloan,category) VALUES('$fid','$email',NOW(),'$newloan','$category')";
		    $conn2 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		    $result2 =  mysqli_query($conn2, $sql2) or die("Error in clientapproved " . mysqli_error($conn));   
            }else{
            $sql2 = "UPDATE clientapproved set totloan='$newloan' WHERE access_id='$fid' AND email='$email' AND category='$category'";
		    $conn2 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		    $result2 =  mysqli_query($conn2, $sql2) or die("Error in clientapproved " . mysqli_error($conn));   
            }
            if($result2){ /*** client loan approved */
                    $newfinbal=($users["balance"]-$amountrequested);
                    $sql3 = "Insert into finbalance(access_id,created_at,amountreturned,balance) VALUES('$fid',NOW(),'$amountrequested','$newfinbal')";
                    $conn3 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		            $result3 =  mysqli_query($conn3, $sql3) or die("Error in finbalance " . mysqli_error($conn));
                if($result3){ /*** financier balance approved */
                        $sql4 = "UPDATE clientrequest set bapproval='1' where access_id='$fid' AND email='$email' AND amountrequested='$amountrequested' AND category='$category' ";
                        $conn4 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		                $result4 =  mysqli_query($conn4, $sql4) or die("Error in clientrequest " . mysqli_error($conn));
                        if($result4){ /*** client request table updated */
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
			                        <div class="category-heading" style="font-weight: 500; font-size: 16px;"> CLIENT REQUEST </div>
			                        <ul class="category-instructions">
                                       
                                            <li>your requested amount '.$amountrequested.' is approved </li> 
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
                            $response["message"]= "Fund approved Successfully";
                            echo json_encode($response); 
                        }else{
                            $response["success"] = FALSE;
                            $response["message"]= "client request table not updated";
                            echo json_encode($response); 
                        }
                }else{
                        $response["success"] = FALSE;
                        $response["message"]= "Financier balance not updated";
                        echo json_encode($response); 
                }
            }else{
                $response["success"] = FALSE;
                $response["message"] = "loan not approved into clientapproved";
                echo json_encode($response); 
            }
        }else{
            $response["success"] = FALSE;
            $response["message"] = "your balance is low to approve";
            echo json_encode($response); 
        }
    }
    else if($category=="repay"){
        $amountrepay=$_POST["amountrepay"];
        $sql = "SELECT balance
            FROM finbalance
            INNER JOIN 
            (SELECT access_id, MAX(created_at) as TopDate
            FROM finbalance
            WHERE access_id = '$fid'
            GROUP BY access_id) AS EachItem ON 
            EachItem.TopDate = finbalance.created_at 
            AND EachItem.access_id = finbalance.access_id";
		$conn = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		$result =  mysqli_query($conn, $sql) or die("Error in Selecting financierbal " . mysqli_error($conn));
        $users=mysqli_fetch_assoc($result);
        
        $sql1 = "SELECT MAX(totloan)as totloan,max(totpayback)as totpayback FROM clientapproved WHERE access_id='$fid' AND email='$email'";
		$conn1 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		$result1 =  mysqli_query($conn1, $sql1) or die("Error in Selecting maxtot or maxpay " . mysqli_error($conn));
        $users1=mysqli_fetch_assoc($result1);
        if($users1["totpayback"]==null){
            $newpayback=$amountrepay;
        }else{
            $newpayback=($users1["totpayback"]+$amountrepay);
        }
        
        if(($users1["totloan"]!=null) && ($users1["totloan"]>=$amountrepay)){/*** checking payback with loan */
            $newloan=($users1["totloan"]-$amountrepay);
              $sql2 = "Update clientapproved set totpayback='$newpayback',totloan='$newloan' Where access_id='$fid' AND email='$email'";
		      $conn2 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		      $result2 =  mysqli_query($conn2, $sql2) or die("Error in Selecting clientapproved " . mysqli_error($conn));
              if($result2){ /*** checking clientapproved table updated */
                 if($users["balance"]==null){
                     $newfinbal1=$amountrepay;
                 }else{
                    $newfinbal1=($users["balance"]+$amountrepay);
                 }
                    $sql3 = "Insert into finbalance(access_id,created_at,amountadded,balance) VALUES('$fid',NOW(),'$amountrepay','$newfinbal1')";
		            $conn3 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		            $result3 =  mysqli_query($conn3, $sql3) or die("Error in Selecting finbal " . mysqli_error($conn));
                  if($result3){ /*** Financier balance update checking */
                      $sql4 = "UPDATE clientrequest set rapproval='1' where access_id='$fid' AND email='$email' AND amountrepay='$amountrepay' AND category='$category'";
		              $conn4 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
		              $result4 =  mysqli_query($conn4, $sql4) or die("Error in Selecting clientreq " . mysqli_error($conn));
                      if($result4){ /*** client request table updated */
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
			                        <div class="category-heading" style="font-weight: 500; font-size: 16px;"> CLIENT REQUEST </div>
			                        <ul class="category-instructions">
                                        <li> </li>
                                            <li>your requested amount '.$amountrepay.' is approved </li> 
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
                            $response["message"]= "Fund taken Successfully";
                            echo json_encode($response); 
                      }else{
                        $response["success"] = FALSE;
                        $response["message"] = "client request table not updated";
                        echo json_encode($response);  
                      }
                  }else{
                    $response["success"] = FALSE;
                    $response["message"] = "financier balance is not updated";
                    echo json_encode($response); 
                  }
              }else{
                 $response["success"] = FALSE;
                 $response["message"] = "client approved table not updated";
                 echo json_encode($response); 
              }
        }else{
            $response["success"] = FALSE;
            $response["message"] = "He is paying more than he took";
            echo json_encode($response);
        }
    }
    else{
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
