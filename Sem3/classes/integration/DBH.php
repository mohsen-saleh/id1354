<?php
namespace Integration;
/**
 * Description of the DatabaseHandler
 *
 * @author Mohsen
 */
class DBH {
    //put your code here
    
    public function getUser($uid, $conn) {
        include 'dbh.inc.php';
        
        
        $sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    
    public function insertUser($first, $last, $email, $uid, $hashedPwd, $conn) {
        
        include 'dbh.inc.php';
        
        $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
        mysqli_query($conn, $sql);
    }
    
    public function getUser2($uid) {
        include 'dbh.inc.php';
        
        $sql = "SELECT * FROM users WHERE user_uid='$uid'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    
    public function fetch_assoc($uid){
        include 'dbh.inc.php';
        
        $result = $this->getUser($uid, $conn);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    
    public function checkResult($uid) {
        include 'dbh.inc.php';
        
        $result = $this->getUser($uid, $conn);
		$resultCheck = mysqli_num_rows($result);
        return $resultCheck;
    }
    
    public function checkResult2($uid) {
        include 'dbh.inc.php';
        
        $result = $this->getUser2($uid, $conn);
		$resultCheck = mysqli_num_rows($result);
        return $resultCheck;
    } 
    
    public function setComment($uid, $date, $message, $conn) {
        include 'dbh.inc.php';
        
        $sql = "INSERT INTO comments (uid, date, message) VALUES ('$uid', '$date', '$message')";
        $result = $conn->query($sql);
    }
    
    public function setCommentP($uid, $date, $message, $conn) {
        include 'dbhandler.inc.php';
        
        $sql = "INSERT INTO comments2 (uid, date, message) VALUES ('$uid', '$date', '$message')";
        $result = $conn->query($sql);
    }
    
}