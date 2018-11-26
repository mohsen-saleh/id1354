<?php
   date_default_timezone_set('Europe/Stockholm');
   include 'dbh.inc.php';
   include 'comments.inc.php';
   session_start();
   
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="reset.css" type="text/css"/>
        <link rel="stylesheet" href="index.css" type="text/css"/>
        <link rel="stylesheet" href="style.css" type="text/css">
       


        
        <title>Mat kalender</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="body">
             
        <h1>Tasty Recipes</h1>
        
   </div>
        
        <div class="left">


<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="calender.html">Calender</a></li>
  <li><a href="meatballs.php">Meatballs</a></li>
  <li><a href="pancakes.php">Pancakes</a></li>
  <li><a href="login.php">Login</a></li>
</ul>

        </div>
       
         <div class="login">
 <?php  
     
       echo "<form method='POST' action='".getLogin($conn)."'>
           <input type='text' name='uid'> 
           <input type='password' name='pwd'> 
           <button type='submit' name='loginSubmit'>Login</button>
           </form>";
      
            echo "<form method='POST' action='".userLogout()."'>      
            <button type='submit' name='logoutSubmit'>Log out</button>
            </form>";
       
       if (isset($_SESSION['id'])){
           echo "You are logged in!";
       } else{
           echo "You are NOT logged in!";
       }       
?>    
     
             </div>  
       
    </body>
</html>




