<?php
$host = '192.168.101.104'; //host
$port = '9000'; //port
$null = NULL; //null var
      
//Create TCP/IP sream socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
//reuseable port
socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);

//bind socket to specified host
socket_bind($socket, 0, $port);

//listen to port
socket_listen($socket);

//create & add listning socket to the list
$clients = array($socket);

$response = array();

//start endless loop, so that our script doesn't stop
while (true) {
	//manage multipal connections
	$changed = $clients;
	//returns the socket resources in $changed array
	socket_select($changed, $null, $null, 0, 10);
	
	//check for new socket
	if (in_array($socket, $changed)) {
		$socket_new = socket_accept($socket); //accpet new socket
		$clients[] = $socket_new; //add socket to client array
		
		$header = socket_read($socket_new, 1024); //read data sent by the socket
		perform_handshaking($header, $socket_new, $host, $port); //perform websocket handshake
		
		socket_getpeername($socket_new, $ip); //get ip address of connected socket
		$response = mask(json_encode(array('type'=>'system', 'message'=>$ip.' connected'))); //prepare json data
		send_message($response); //notify all users about new connection
		
		//make room for new socket
		$found_socket = array_search($socket, $changed);
		unset($changed[$found_socket]);
	}
	
	//loop through all connected sockets
	foreach ($changed as $changed_socket) {	
		
		//check for any incomming data
		while(socket_recv($changed_socket, $buf, 1024, 0) >= 1)
		{
			$received_text = unmask($buf); //unmask data
			$tst_msg = json_decode($received_text);//json decode 
			$email = $tst_msg->email;//sender name
           
            
			$password = $tst_msg->password; //message text
			$category = $tst_msg->category;//color
            $fid = $tst_msg->fid;
            $fid1=getuserfid($email);
            $loan="loan";
            $repay="repay";
            $invest ="invest";
            $backamt = "backamt";
            
                    $sql0 = "SELECT balance
                    FROM finbalance
                    INNER JOIN 
                    (SELECT access_id, MAX(created_at) as TopDate
                    FROM finbalance
                    WHERE access_id = '$fid1'
                    GROUP BY access_id) AS EachItem ON 
                    EachItem.TopDate = finbalance.created_at 
                    AND EachItem.access_id = finbalance.access_id";
                    $conn0 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn0));
                    $result0 =  mysqli_query($conn0, $sql0) or die("Error in Selecting " . mysqli_error($conn0));
                    $users1=mysqli_fetch_assoc($result0);
    
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

                    $totalclientloan=0;
                    $sql6 = "select totloan from clientapproved where access_id='$fid1'";
                    $conn6 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
                    $result6 = mysqli_query($conn6, $sql6) or die("Error in Selecting " . mysqli_error($conn));
                    if($result6!= NULL){
                        while($users6=mysqli_fetch_assoc($result6)){
                            $totalclientloan +=$users6["totloan"];
                        }
		              }
                    $totalinvestorinvest=0;
                    $sql7 = "select totalinvest from investorapproved where access_id='$fid1'";
                    $conn7 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn));
                    $result7 = mysqli_query($conn7, $sql7) or die("Error in Selecting " . mysqli_error($conn));
                    if($result7!= NULL){
                        while($users7=mysqli_fetch_assoc($result7)){
                            $totalinvestorinvest += $users7["totalinvest"];
                        }
		              }
            if($email!=null && $password!=null && $category!=null){
            if($category=="Financier"){
                if(isUserExisted($email)){
                    if(isuseractivated($email)){
                        $user = getUserByEmailAndPassword($email, $password);
                        if($user){
                            $ravi = mask(json_encode(array('success'=>TRUE, 
                                                 'message'=>"Financier Loggin in", 
                                                 'category'=>$category, 
                                                 'uid'=>$user["unique_id"], 
                                                 'fid'=>$user["access_id"],                                                   'fname'=>$user["fname"],
                                                 'lname'=>$user["lname"],
                                                 'email'=>$user["email"],
                                                 'created_at'=>$user["created_at"],
                                                 'updated_at'=>$user["updated_at"],
                                                 'mobile'=>$user["mobile"],
                                                 'clients'=>$user["clients"],
                                                 'investors'=> $user["Investors"],
                                                 'balance'=>$users1["balance"],
                                                 'clientloan'=>$totalclientloan,
                                                 'investorinvest'=>$totalinvestorinvest)));
                                                send_message($ravi);
                        }else{
                            $ravi = mask(json_encode(array('success'=>FALSE, 'message'=>"financier data retrival error")));
                            send_message($ravi);
                        }
                     }else{
                            $ravi = mask(json_encode(array('success'=>FALSE, 'message'=>"financier Activation Pending")));
                            send_message($ravi);
                        }
                }else{
                   $ravi = mask(json_encode(array('success'=>FALSE, 'message'=>"financier doesnt Exist")));
                   send_message($ravi);
                }
            }else if($category=="Client")  {
                    if(isclientExisted($email)){
                            if(isclientactivated($email)){
                                    $user = getUserByEmailAndPasswordandfidandclient($email, $password, $fid);
                                    if($user){
                                            $ravi = mask(json_encode(array('success'=>TRUE, 
                                                                           'message'=>"Client Loggin in", 
                                                                           'category'=>$category, 
                                                                           'uid'=>$user["unique_id"], 
                                                                           'fid'=>$user["access_id"],
                                                                           'fname'=>$user["fname"],
                                                                           'lname'=>$user["lname"],
                                                                           'email'=>$user["email"],
                                                                           'created_at'=>$user["created_at"],
                                                                           'updated_at'=>$user["updated_at"],
                                                                           'mobile'=>$user["mobile"],
                                                                           'totrequested'=>$users2["totrequested"],
                                                                           'bapproval'=> $users2["bapproval"],
                                                                           'totrepay'=>$users3["totrepay"],
                                                                           'rapproval'=>$users3["rapproval"])));
                                                
                                            send_message($ravi);
                                    }else{
                                            $ravi = mask(json_encode(array('success'=>FALSE, 'message'=>"Client data Retrival error")));
                                            send_message($ravi);       
                                        } 
                                    }else{
                                       $ravi = mask(json_encode(array('success'=>FALSE, 'message'=>"Client Activation Pending")));
                                        send_message($ravi);
              
                            }
                    }else{
                            $ravi = mask(json_encode(array('success'=>FALSE, 'message'=>"Client Doesnt exist")));
                            send_message($ravi);
      }
}else if($category=="Investor"){
      if(isinvestorExisted($email)){
          if(isinvestorActivated($email)){
          $user = getUserByEmailAndPasswordandfidandinvestor($email, $password, $fid);
          if($user){
                  
                  $ravi = mask(json_encode(array('success'=>TRUE, 
                                                 'message'=>"Investor Loggin in", 
                                                 'category'=>$category, 
                                                 'uid'=>$user["unique_id"], 
                                                 'fid'=>$user["access_id"],
                                                 'fname'=>$user["fname"],
                                                 'lname'=>$user["lname"],
                                                 'email'=>$user["email"],
                                                 'created_at'=>$user["created_at"],
                                                 'updated_at'=>$user["updated_at"],
                                                 'mobile'=>$user["mobile"],
                                                 'totamtinvest'=>$users4["totamtinvest"],
                                                 'iapproval'=> $users4["iapproval"],
                                                 'totamtback'=>$users5["totamtback"],
                                                 'baapproval'=>$users5["baapproval"])));
                  send_message($ravi);
      }else{
                   
                    $ravi = mask(json_encode(array('success'=>FALSE, 'message'=>"Investor data Retrival error")));
                  send_message($ravi);       
      }
  }else{
           
                    $ravi = mask(json_encode(array('success'=>FALSE, 'message'=>"Investor Activation pending")));
                  send_message($ravi);
      }
  }else{
                    
                    $ravi = mask(json_encode(array('success'=>FALSE, 'message'=>"Investor Doesnt exist")));
                    send_message($ravi);
      }
  }else{
                    
                    $ravi = mask(json_encode(array('success'=>FALSE, 'message'=>"category not specified")));
                    send_message($ravi);
    }
        }else{
                    $ravi = mask(json_encode(array('success'=>FALSE, 'message'=>"Dude you are a qrcode generator")));
                    send_message($ravi);
			        break 2; //exist this loop
            }
			
		}
		
		$buf = @socket_read($changed_socket, 1024, PHP_NORMAL_READ);
		if ($buf === false) { // check disconnected client
			// remove client for $clients array
			$found_socket = array_search($changed_socket, $clients);
			socket_getpeername($changed_socket, $ip);
			unset($clients[$found_socket]);
			
			//notify all users about disconnected connection
			$response = mask(json_encode(array('type'=>'system', 'message'=>$ip.' disconnected')));
			send_message($response);
		}
	}
}
// close the listening socket
socket_close($socket);
        

    function getUserByEmailAndPassword($email, $password) {
        
        $sql0 = "SELECT * FROM financiers WHERE email = '$email'";
        $conn0 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn0));
        $result0 =  mysqli_query($conn0, $sql0) or die("Error in Selecting " . mysqli_error($conn0));

        if ($result0) {
            $user=mysqli_fetch_assoc($result0);

            // verifying user password
            $salt = $user['salt'];
            $encrypted_password = $user['encrypted_password'];
            $hash = checkhashSSHA($salt, $password);
            // check for password equality
            if ($encrypted_password == $hash) {
                // user authentication details are correct
                return $user;
            }
        } else {
            return NULL;
        }
    }
    
    function getUserByEmailAndPasswordandfidandclient($email, $password, $fid) {
        
        $sql0 = "SELECT * FROM clients WHERE email = '$email' and access_id= '$fid'";
        $conn0 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn0));
        $result0 =  mysqli_query($conn0, $sql0) or die("Error in Selecting " . mysqli_error($conn0));

        if ($result0) {
            $user=mysqli_fetch_assoc($result0);

            // verifying user password
            $salt = $user['salt'];
            $encrypted_password = $user['encrypted_password'];
            $hash = checkhashSSHA($salt, $password);
            // check for password equality
            if ($encrypted_password == $hash) {
                // user authentication details are correct
                return $user;
            }
        } else {
            return NULL;
        }
    }
    
    function getUserByEmailAndPasswordandfidandinvestor($email, $password, $fid) {
        
        $sql0 = "SELECT * FROM investors WHERE email = '$email' and access_id= '$fid'";
        $conn0 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn0));
        $result0 =  mysqli_query($conn0, $sql0) or die("Error in Selecting " . mysqli_error($conn0));

        if ($result0) {
            $user=mysqli_fetch_assoc($result0);

            // verifying user password
            $salt = $user['salt'];
            $encrypted_password = $user['encrypted_password'];
            $hash = checkhashSSHA($salt, $password);
            // check for password equality
            if ($encrypted_password == $hash) {
                // user authentication details are correct
                return $user;
            }
        } else {
            return NULL;
        }
    }

    function isuseractivated($email){
        $sql0 = "SELECT activated from financiers WHERE email = '$email'";
        $conn0 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn0));
        $result0 =  mysqli_query($conn0, $sql0) or die("Error in Selecting " . mysqli_error($conn0));
        $users1=mysqli_fetch_assoc($result0);
        if ($users1['activated']==1) {
            return true;
        } else {
            return false;
        }
    }
    
    function isclientactivated($email){
       $sql0 = "SELECT activated from clients WHERE email = '$email'";
        $conn0 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn0));
        $result0 =  mysqli_query($conn0, $sql0) or die("Error in Selecting " . mysqli_error($conn0));
        $users1=mysqli_fetch_assoc($result0);
        if ($users1['activated']==1) {
            return true;
        } else {
            return false;
        }
    }
    
    function isinvestoractivated($email){
         $sql0 = "SELECT activated from investors WHERE email = '$email'";
        $conn0 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn0));
        $result0 =  mysqli_query($conn0, $sql0) or die("Error in Selecting " . mysqli_error($conn0));
        $users1=mysqli_fetch_assoc($result0);
        if ($users1['activated']==1) {
            return true;
        } else {
            return false;
        }
    }

    function isUserExisted($email) {
      $sql0 = "SELECT email from financiers WHERE email = '$email'";
        $conn0 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn0));
        $result0 =  mysqli_query($conn0, $sql0) or die("Error in Selecting " . mysqli_error($conn0));
        $users1=mysqli_fetch_assoc($result0);
        if ($users1["email"]!=null) {
            return true;
        } else {
            return false;
        }
    }
    
    function getuserfid($email){
        
                    $sql0 = "SELECT access_id from financiers WHERE email = '$email' ";
                    $conn0 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn0));
                    $result0 =  mysqli_query($conn0, $sql0) or die("Error in Selecting " . mysqli_error($conn0));
                    $users1=mysqli_fetch_assoc($result0);
      
        return $users1['access_id'];  
    }
   
    function isclientExisted($email) {
        $sql0 = "SELECT email from clients WHERE email = '$email'";
        $conn0 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn0));
        $result0 =  mysqli_query($conn0, $sql0) or die("Error in Selecting " . mysqli_error($conn0));
        $users1=mysqli_fetch_assoc($result0);
        if ($users1["email"]!=null) {
            return true;
        } else {
            return false;
        }
    }
    
    function isinvestorExisted($email) {
        $sql0 = "SELECT email from investors WHERE email = '$email'";
        $conn0 = mysqli_connect("localhost","root","","finment") or die("Error " . mysqli_error($conn0));
        $result0 =  mysqli_query($conn0, $sql0) or die("Error in Selecting " . mysqli_error($conn0));
        $users1=mysqli_fetch_assoc($result0);
        

        if ($users1["email"]!=null) {
            return true;
        } else {
            return false;
        }
    }

    function hashSSHA($password) {

        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }

    /**
     * Decrypting password
     * @param salt, password
     * returns hash string
     */
    function checkhashSSHA($salt, $password) {

        $hash = base64_encode(sha1($password . $salt, true) . $salt);

        return $hash;
    }

function send_message($msg)
{
	global $clients;
	foreach($clients as $changed_socket)
	{
		@socket_write($changed_socket,$msg,strlen($msg));
	}
	return true;
}


//Unmask incoming framed message
function unmask($text) {
	$length = ord($text[1]) & 127;
	if($length == 126) {
		$masks = substr($text, 4, 4);
		$data = substr($text, 8);
	}
	elseif($length == 127) {
		$masks = substr($text, 10, 4);
		$data = substr($text, 14);
	}
	else {
		$masks = substr($text, 2, 4);
		$data = substr($text, 6);
	}
	$text = "";
	for ($i = 0; $i < strlen($data); ++$i) {
		$text .= $data[$i] ^ $masks[$i%4];
	}
	return $text;
}

//Encode message for transfer to client.
function mask($text)
{
	$b1 = 0x80 | (0x1 & 0x0f);
	$length = strlen($text);
	
	if($length <= 125)
		$header = pack('CC', $b1, $length);
	elseif($length > 125 && $length < 65536)
		$header = pack('CCn', $b1, 126, $length);
	elseif($length >= 65536)
		$header = pack('CCNN', $b1, 127, $length);
	return $header.$text;
}

//handshake new client.
function perform_handshaking($receved_header,$client_conn, $host, $port)
{
	$headers = array();
	$lines = preg_split("/\r\n/", $receved_header);
	foreach($lines as $line)
	{
		$line = chop($line);
		if(preg_match('/\A(\S+): (.*)\z/', $line, $matches))
		{
			$headers[$matches[1]] = $matches[2];
		}
	}

	$secKey = $headers['Sec-WebSocket-Key'];
	$secAccept = base64_encode(pack('H*', sha1($secKey . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));
	//hand shaking header
	$upgrade  = "HTTP/1.1 101 Web Socket Protocol Handshake\r\n" .
	"Upgrade: websocket\r\n" .
	"Connection: Upgrade\r\n" .
	"WebSocket-Origin: $host\r\n" .
	"WebSocket-Location: ws://$host:$port/demo/shout.php\r\n".
	"Sec-WebSocket-Accept:$secAccept\r\n\r\n";
	socket_write($client_conn,$upgrade,strlen($upgrade));
}