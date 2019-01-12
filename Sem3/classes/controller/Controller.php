<?php

namespace Controller;

include 'classes/model/User.php';
include 'classes/model/Comments.php';
include '../../classes/integration/DBH.php';

use model\User;
use model\Comments;
use Integration\DBH;
    

class Controller
{
    
    public function login($username, $pwd){
        $user = new User();
        $user->loginUser($username, $pwd);
    }
    
    public function signup($first, $last, $email, $uid, $pwd) {
        $user = new User();
        $user->signinUser($first, $last, $email, $uid, $pwd);
    }
    
    public function logout(){
        $user = new User();
        $user->logoutUser();
    }
    
    public function setCommentM($uid, $date, $message) {
        $comment = new Comments();
        $comment->setComM($uid, $date, $message);
    }
    public function setCommentP($uid, $date, $message) {
        $comment = new Comments();
        $comment->setComP($uid, $date, $message);
    }
    
}