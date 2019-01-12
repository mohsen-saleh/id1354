<?php
   date_default_timezone_set('Europe/Stockholm');
   include '../../classes/integration/dbh.inc.php';
   include '../../comments.inc.php';
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
        <link rel="stylesheet" href="../css/reset.css" type="text/css"/>
        <link rel="stylesheet" href="../css/index.css" type="text/css"/>
        <link rel="stylesheet" href="../css/style.css" type="text/css"/>
        
       


        
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
  <li><a href="start.php">Home</a></li>
  <li><a href="calender.html">Calender</a></li>
  <li><a href="meatballs.php">Meatballs</a></li>
  <li><a href="pancakes.php">Pancakes</a></li>
  <li><a href="login.php">Login</a></li>
</ul>

        </div>
       
         <div class="login">
 <?php
					if (isset($_SESSION['u_id'])) {
						echo '<form action="../../logout.php" method="POST">
							<button type="submit" name="submit">Logout</button>
						</form>';
					} else {
						echo '<form action="../../do-login.php" method="POST">
							<input type="text" name="uid" placeholder="Username/e-mail">
							<input type="password" name="pwd" placeholder="password">
							<button type="submit" name="submit">Login</button>
						</form>
						<a href="signup.php">Sign up</a>';
					}
             
                    if (isset($_SESSION['u_id'])) {
				        echo "You are logged in!";
			     }
?>
     
             </div>  
       
    </body>
</html>




