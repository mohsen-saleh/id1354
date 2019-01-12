<?php
session_start();
    date_default_timezone_set('Europe/Stockholm');
    include 'classes/integration/dbh.inc.php';
    
    
    function getComments($conn){
    $sql = "SELECT * FROM comments2";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $id = $row['uid'];
        $sql2 = "SELECT * FROM users WHERE user_id='$id'";
        $result2 = $conn->query($sql2);
        if ($row2 = $result2->fetch_assoc()) {
          echo "<div class='comment-box'><p>";
          echo $row2['user_id']."<br>";
          echo $row['date']."<br>";
          echo nl2br($row['message']);
          echo "</p>";
          if (isset($_SESSION['u_id'])) {
              if ($_SESSION['u_id'] == $row2['user_id']) {
                  echo "<form class='delete-form' method='POST' action='".deleteComments($conn)."'>
                  <input type='hidden' name='cid' value='".$row['cid']."'>
                  <button type='submit' name='commentDelete'>Delete</button>
                </form>";
              }
          }  
          echo "</div>";
      
        }   
    }
}

function deleteComments($conn){
    if (isset($_POST['commentDelete'])){
        $cid = $_POST['cid'];
        
        $sql = "DELETE FROM comments2 WHERE cid='$cid'";
        $result = $conn->query($sql);
        header("Location: start.php");
        
    }
    
}

