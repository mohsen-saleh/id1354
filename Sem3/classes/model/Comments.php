<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Model;
include_once 'classes/Integration/DBH.php';
use Integration\DBH;
/**
 * Description of Comments
 *
 * @author Mohsen
 */
class Comments {
    //put your code here
    
    public function setComM($uid, $date, $message) {
        include '../integration/dbh.inc.php';
        
        $DBH = new DBH();
        $result = $DBH->setComment($uid, $date, $message, $conn);
           
	exit();
    }
    
    
    public function setComP($uid, $date, $message) {
        include '../integration/dbh.inc.php';
        
        $DBH = new DBH();
        $result = $DBH->setCommentP($uid, $date, $message, $conn);
       
	exit();
    }
    
    
}