<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


class DB_Functions {

    private $conn;

    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $db = new Db_Connect();
        $this->conn = $db->connect();
    }

    // destructor
    function __destruct() {

    }
    
    public function activateuser($email,$passkey)
    {
        $stmt = $this->conn->prepare("SELECT activated FROM financiers WHERE email= ? AND confirmation= ?");
        $stmt->bind_param("ss", $email, $passkey);
        $stmt->execute();
        $user=$stmt->get_result()->fetch_assoc();
        $stmt->close();
        if($user['activated']==1){
            return false;
        }else
        {
        $stmt = $this->conn->prepare("UPDATE financiers SET activated=1 WHERE email= ? AND confirmation=?");
        $stmt->bind_param("ss", $email, $passkey);
        $result = $stmt->execute();
        $stmt->close();
            return true;
        }  
    }
    
    public function activateclient($email,$passkey)
    {
        $stmt = $this->conn->prepare("SELECT activated FROM clients WHERE email= ? AND confirmation= ?");
        $stmt->bind_param("ss", $email, $passkey);
        $stmt->execute();
        $user=$stmt->get_result()->fetch_assoc();
        $stmt->close();
        if($user['activated']==1){
            return false;
        }else
        {
        $stmt = $this->conn->prepare("UPDATE clients SET activated=1 WHERE email= ? AND confirmation=?");
        $stmt->bind_param("ss", $email, $passkey);
        $result = $stmt->execute();
        $stmt->close();
            return true;
        }  
    }
    
    public function activateinvestor($email,$passkey)
    {
        $stmt = $this->conn->prepare("SELECT activated FROM investors WHERE email= ? AND confirmation= ?");
        $stmt->bind_param("ss", $email, $passkey);
        $stmt->execute();
        $user=$stmt->get_result()->fetch_assoc();
        $stmt->close();
        if($user['activated']==1){
            return false;
        }else
        {
        $stmt = $this->conn->prepare("UPDATE investors SET activated=1 WHERE email= ? AND confirmation=?");
        $stmt->bind_param("ss", $email, $passkey);
        $result = $stmt->execute();
        $stmt->close();
            return true;
        }  
    }
     /**
     * Storing new user
     * returns user details
     */
    public function storeUser($fname, $lname, $email, $fpsw, $mobile, $aadhar, $panid , $confirmation, $fid) {
        $uuid = uniqid('', true);
        $hash = $this->hashSSHA($fpsw);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt
        
        $activated=0;
        $stmt = $this->conn->prepare("INSERT INTO financiers(unique_id, access_id, fname, lname, email, encrypted_password, salt, created_at, mobile, aadhar, panid, password1, confirmation, activated) VALUES(?, ?, ?, ?, ?, ?, ?, NOW(),?,?,?,?,?,?)");
        $stmt->bind_param("sssssssssssss", $uuid, $fid, $fname, $lname, $email, $encrypted_password, $salt, $mobile, $aadhar, $panid, $fpsw, $confirmation, $activated);
        $result = $stmt->execute();
        $stmt->close();
        $stmt = $this->conn->prepare("INSERT INTO finbalance(access_id,created_at,balance) VALUES(?,NOW(),0)");
        $stmt->bind_param("s", $fid);
        $result1 = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            if($result1){
            $stmt = $this->conn->prepare("SELECT * FROM financiers WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;
            }else{
                return false;
            }
        } else {
            return false;
        }
    }
    
    public function storeUserclient($fname, $lname, $email, $fpsw, $mobile, $aadhar, $panid , $confirmation ,$fid) {
     $uuid = uniqid('', true);
        $hash = $this->hashSSHA($fpsw);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt
        
        $activated=0;
        $stmt = $this->conn->prepare("INSERT INTO clients(unique_id, access_id, fname, lname, email, encrypted_password, salt, created_at, mobile, aadhar, panid, password1, confirmation, activated) VALUES(?, ?, ?, ?, ?, ?, ?, NOW(),?,?,?,?,?,?)");
        $stmt->bind_param("sssssssssssss", $uuid, $fid, $fname, $lname, $email, $encrypted_password, $salt, $mobile, $aadhar, $panid, $fpsw, $confirmation, $activated);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM clients WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }
    
    public function storeUserinvestor($fname, $lname, $email, $fpsw, $mobile, $aadhar, $panid , $confirmation, $fid) {
        $uuid = uniqid('', true);
        $hash = $this->hashSSHA($fpsw);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt
    
        $activated=0;
        $stmt = $this->conn->prepare("INSERT INTO investors(unique_id, access_id, fname, lname, email, encrypted_password, salt, created_at, mobile, aadhar, panid, password1, confirmation, activated) VALUES(?, ?, ?, ?, ?, ?, ?, NOW(),?,?,?,?,?,?)");
        $stmt->bind_param("sssssssssssss", $uuid, $fid, $fname, $lname, $email, $encrypted_password, $salt, $mobile, $aadhar, $panid, $fpsw, $confirmation, $activated);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM investors WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }
    
    public function updatenoofclients($fid){
         $stmt = $this->conn->prepare("SELECT * from financiers WHERE access_id = ?");
        $stmt->bind_param("s", $fid);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();
       
        $clients= $user['clients'];
        $clients=$clients+1;
        $stmt->close();
        $stmt = $this->conn->prepare("UPDATE financiers SET clients=? WHERE access_id=?");
        $stmt->bind_param("ss", $clients, $fid);
        $result = $stmt->execute();
        $stmt->close();
            if($result){
                return true;
            }else
            {
                return false;
            }
        
    }
    
    public function updatenoofinvestors($fid){
         $stmt = $this->conn->prepare("SELECT investors from financiers WHERE access_id = ?");
        $stmt->bind_param("s", $fid);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();
        $clients= $user['investors'];
        $clients=$clients+1;
        $stmt->close();
        $stmt = $this->conn->prepare("UPDATE financiers SET investors=? WHERE access_id=?");
        $stmt->bind_param("ss", $clients, $fid);
        $result = $stmt->execute();
        $stmt->close();
            if($result){
                return true;
            }else
            {
                return false;
            }
        
    }
    
    public function isuseractivated($email){
        $stmt = $this->conn->prepare("SELECT activated from financiers WHERE email = ?");

        $stmt->bind_param("s", $email);

        $stmt->execute();

        $user = $stmt->get_result()->fetch_assoc();

        if ($user['activated']==1) {
            // user existed
            $stmt->close();
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
    }
    
    public function isclientactivated($email){
        $stmt = $this->conn->prepare("SELECT activated from clients WHERE email = ?");

        $stmt->bind_param("s", $email);

        $stmt->execute();

        $user = $stmt->get_result()->fetch_assoc();

        if ($user['activated']==1) {
            // user existed
            $stmt->close();
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
    }
    
    public function isinvestoractivated($email){
        $stmt = $this->conn->prepare("SELECT activated from investors WHERE email = ?");

        $stmt->bind_param("s", $email);

        $stmt->execute();

        $user = $stmt->get_result()->fetch_assoc();

        if ($user['activated']==1) {
            // user existed
            $stmt->close();
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
    }
    
    public function getnoofclients($fid){
        $stmt = $this->conn->prepare("SELECT * FROM financiers WHERE access_id = ?");
		$stmt->bind_param("s", $fid);
		if($stmt->execute()) {
			$user = $stmt->get_result()->fetch_assoc();
			$stmt->close();
		  $sai = $user['clients'];
		  return $sai;
		}
		else {
			return NUll;
		}
    }
    
    public function getnoofinvestors($fid){
        $stmt = $this->conn->prepare("SELECT investors FROM financiers WHERE access_id = ?");
		$stmt->bind_param("s", $fid);
		if($stmt->execute()) {
			$user = $stmt->get_result()->fetch_assoc();
			$stmt->close();
		  $sai = $user['investors'];
		  return $sai;
		}
		else {
			return NUll;
		}
    }
    
	public function updateUser($preemail, $name, $email, $mobile) {

		$stmt = $this->conn->prepare("UPDATE users SET name=?,email=?,updated_at=NOW(),mobile=? WHERE email=?");
        $stmt->bind_param("ssss", $name, $email, $mobile, $preemail);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }

	public function getUserPasswordByEmail($email) {
		$stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
		$stmt->bind_param("s", $email);
		if($stmt->execute()) {
			$user = $stmt->get_result()->fetch_assoc();
			$stmt->close();
		  $sai = $user['password'];
		  return $sai;
		}
		else {
			return NUll;
		}

	}

	public function isUserPasswordCorrect($email,$prepass) {
		$stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
		$stmt->bind_param("s", $email);
		if($stmt->execute()) {
			$user = $stmt->get_result()->fetch_assoc();
			$stmt->close();

			// verifying user password
            $salt = $user['salt'];
            $encrypted_password = $user['encrypted_password'];
            $hash = $this->checkhashSSHA($salt, $prepass);
            // check for password equality
            if ($hash = $encrypted_password) {

                return true;
            }
        } else {
            return false;
        }
	}

	public function getUserByEmail($email) {

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");

        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;

        } else {
            return NULL;
        }
    }
    
    public function getuserPassword($email){
        $stmt = $this->conn->prepare("SELECT * FROM financiers WHERE email = ?");

        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;

        } else {
            return NULL;
        }
    }
    
    public function getclientPassword($email){
        $stmt = $this->conn->prepare("SELECT * FROM clients WHERE email = ?");

        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;

        } else {
            return NULL;
        }
    }
    
    public function getinvestorPassword($email){
        $stmt = $this->conn->prepare("SELECT * FROM investors WHERE email = ?");

        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;

        } else {
            return NULL;
        }
    }
    

    /**
     * Get user by email and password
     */
    public function getUserByEmailAndPassword($email, $password) {

        $stmt = $this->conn->prepare("SELECT * FROM financiers WHERE email = ?");

        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            // verifying user password
            $salt = $user['salt'];
            $encrypted_password = $user['encrypted_password'];
            $hash = $this->checkhashSSHA($salt, $password);
            // check for password equality
            if ($encrypted_password == $hash) {
                // user authentication details are correct
                return $user;
            }
        } else {
            return NULL;
        }
    }
    
    
    public function getUserByEmailAndPasswordandfidandclient($email, $password, $fid) {

        $stmt = $this->conn->prepare("SELECT * FROM clients WHERE email = ? AND access_id = ?");

        $stmt->bind_param("ss", $email, $fid);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            // verifying user password
            $salt = $user['salt'];
            $encrypted_password = $user['encrypted_password'];
            $hash = $this->checkhashSSHA($salt, $password);
            // check for password equality
            if ($encrypted_password == $hash) {
                // user authentication details are correct
                return $user;
            }
        } else {
            return NULL;
        }
    }
    
    public function getUserByEmailAndPasswordandfidandinvestor($email, $password, $fid) {

        $stmt = $this->conn->prepare("SELECT * FROM investors WHERE email = ? and access_id= ?");

        $stmt->bind_param("ss", $email, $fid);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            // verifying user password
            $salt = $user['salt'];
            $encrypted_password = $user['encrypted_password'];
            $hash = $this->checkhashSSHA($salt, $password);
            // check for password equality
            if ($encrypted_password == $hash) {
                // user authentication details are correct
                return $user;
            }
        } else {
            return NULL;
        }
    }

	public function changePassword($email, $newfpsw) {
        $hash = $this->hashSSHA($newfpsw);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt

        $stmt = $this->conn->prepare("UPDATE financiers set encrypted_password=?,salt=?,updated_at=NOW(),password1=? WHERE email=?");
        $stmt->bind_param("ssss", $encrypted_password,$salt,$newfpsw,$email);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM financiers WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }
    
    public function changePasswordclient($email, $newfpsw) {
        $hash = $this->hashSSHA($newfpsw);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt

        $stmt = $this->conn->prepare("UPDATE clients set encrypted_password=?,salt=?,updated_at=NOW(),password1=? WHERE email=?");
        $stmt->bind_param("ssss", $encrypted_password,$salt,$newfpsw,$email);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM clients WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }

    
    public function changePasswordinvestor($email, $newfpsw) {
        $hash = $this->hashSSHA($newfpsw);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt

        $stmt = $this->conn->prepare("UPDATE investors set encrypted_password=?,salt=?,updated_at=NOW(),password1=? WHERE email=?");
        $stmt->bind_param("ssss", $encrypted_password,$salt,$newfpsw,$email);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM investors WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }


	  /**
     * Get user by mobile and password
     */
    public function getUserByMobileAndPassword($mobile, $password) {

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE mobile = ?");

        $stmt->bind_param("s", $mobile);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            // verifying user password
            $salt = $user['salt'];
            $encrypted_password = $user['encrypted_password'];
            $hash = $this->checkhashSSHA($salt, $password);
            // check for password equality
            if ($encrypted_password == $hash) {
                // user authentication details are correct
                return $user;
            }
        } else {
            return NULL;
        }
    }

	/**store location to user */
	public function storeLocation($lon, $lat, $email) {
		$stmt = $this->conn->prepare("UPDATE users set longitude=?,latitude=? WHERE email=?");
        $stmt->bind_param("sss", $lon, $lat, $email);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
			}
	}

    public function financierfundinsert($fund,$email,$fid){
    $stmt = $this->conn->prepare("SELECT balance
            FROM finbalance
            INNER JOIN 
            (SELECT access_id, MAX(created_at) as TopDate
            FROM finbalance
            WHERE access_id = ?
            GROUP BY access_id) AS EachItem ON 
            EachItem.TopDate = finbalance.created_at 
            AND EachItem.access_id = finbalance.access_id");
    $stmt->bind_param("s", $fid);
    $stmt->execute();
    $prevfund = $stmt->get_result()->fetch_assoc();   
    $newfund = $prevfund["balance"]+ $fund;
    $stmt = $this->conn->prepare("INSERT INTO finbalance(access_id,created_at,amountadded,balance) VALUES(?,NOW(),?,?)");
    $stmt->bind_param("sss", $fid,$fund,$newfund);
    $result=$stmt->execute();
    $stmt->close();
    if ($result) {
            $stmt = $this->conn->prepare("SELECT balance FROM finbalance WHERE access_id = ?");
            $stmt->bind_param("s", $fid);
            $stmt->execute();
            $stmt->store_result();
          if ($stmt->num_rows > 0) {
            // user existed
            $stmt->close();
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
        
        } else {
            return false;
        }
}
    
    public function clientfundrequest($fund,$email,$fid){
    $stmt = $this->conn->prepare("SELECT totrequested
            FROM clientrequest
            INNER JOIN 
            (SELECT access_id, MAX(created_at) as TopDate
            FROM clientrequest
            WHERE access_id = ?
            GROUP BY access_id) AS EachItem ON 
            EachItem.TopDate = clientrequest.created_at 
            AND EachItem.access_id = clientrequest.access_id");
    $stmt->bind_param("s", $fid);
    $stmt->execute();
    $prevfund = $stmt->get_result()->fetch_assoc();   
    $newfund = $prevfund["totrequested"]+ $fund;
    $stmt = $this->conn->prepare("INSERT INTO clientrequest(access_id,email,created_at,amountrequested,totrequested,approval,interestrate) VALUES(?,?,NOW(),?,?,'0','2.50')");
    $stmt->bind_param("ssss", $fid,$email,$fund,$newfund);
    $result=$stmt->execute();
    $stmt->close();
    if ($result) {
            $stmt = $this->conn->prepare("SELECT totrequested FROM clientrequest WHERE access_id = ?");
            $stmt->bind_param("s", $fid);
            $stmt->execute();
            $stmt->store_result();
          if ($stmt->num_rows > 0) {
            // user existed
            $stmt->close();
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
        
        } else {
            return false;
        }
}
    
    
    /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
        $stmt = $this->conn->prepare("SELECT email from financiers WHERE email = ?");

        $stmt->bind_param("s", $email);

        $stmt->execute();

        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // user existed
            $stmt->close();
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
    }
    
    public function getuserfid($email){
        $stmt = $this->conn->prepare("SELECT access_id from financiers WHERE email = ?");

        $stmt->bind_param("s", $email);

        $stmt->execute();
        $fid = $stmt->get_result()->fetch_assoc();
        
        $stmt->close();
        return $fid['access_id'];  
    }
    
    
     /**
     * Check user is existed or not
     */
    public function isclientExisted($email) {
        $stmt = $this->conn->prepare("SELECT email from clients WHERE email = ?");

        $stmt->bind_param("s", $email);

        $stmt->execute();

        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // user existed
            $stmt->close();
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
    }
    
    public function isinvestorExisted($email) {
        $stmt = $this->conn->prepare("SELECT email from investors WHERE email = ?");

        $stmt->bind_param("s", $email);

        $stmt->execute();

        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // user existed
            $stmt->close();
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
    }

    /**
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     */
    public function hashSSHA($password) {

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
    public function checkhashSSHA($salt, $password) {

        $hash = base64_encode(sha1($password . $salt, true) . $salt);

        return $hash;
    }
}

?>
