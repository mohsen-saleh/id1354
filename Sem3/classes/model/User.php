<?php
namespace Model;
$errors = array();

/**
 * Description of login
 *
 * @author Mohsen
 */
include 'classes/Integration/DBH.php';
use Integration\DBH;
class User {
    //put your code here
    
    public function loginUser($uid, $pwd) {
        
    include '../integration/dbh.inc.php';
    
    //Error handlers
	//Check if inputs are empty
	if (empty($uid) || empty($pwd)) {
		return "empty";
        
	} else {
        $DBH = new DBH();
		$resultCheck = $DBH->checkResult($uid);
		if ($resultCheck < 1) {
			return "error1";
		} else {
			if ($row = $DBH->fetch_assoc($uid)) {
				//De-hashing the password
				$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
				if ($hashedPwdCheck == false) {
					return "error";
				} elseif ($hashedPwdCheck == true) {
					//Log in the user here
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'];
                    return "success";
				}
			}
		}
	}
    }
    
    public function signinUser($first, $last, $email, $uid, $pwd) {
        
    include '../integration/dbh.inc.php';
    //Error handlers
	//Check for empty fields
	if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
		return "empty";
	} else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
			header("Location: resources/views/signup.php?signup=invalid");
			return "invalid";
		} else {
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				return "invalidEmail";
			} else {  
                $DBH = new DBH();
                $resultCheck = $DBH->checkResult2($uid);
                if ($resultCheck > 0) {
					return "usertaken";
				} else {
					//Hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					
                    //Insert the user into the database                   
                    $DBH = new DBH();
					$DBH->insertUser($first, $last, $email, $uid, $hashedPwd, $conn);                   
					return "success";
				}
			}
		}
	}
    }
    public function logoutUser() {
        session_start();
	    session_unset();
	    session_destroy();
	    return "success";
    }
}
