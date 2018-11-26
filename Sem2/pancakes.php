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
        
        <title>Tasty Recipes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="body">
             
        <h1>Pancakes Recipe</h1>
        </div>
        
        <div class="left">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="calendar.html">Calendar</a></li>
            <li><a href="meatballs.php">Meatballs</a></li>
            <li><a href="pancakes.php">Pancakes</a></li>
            <li><a href="login.php">Login</a></li>
            </ul>
        </div>
        
         
            
             <div class="mainContent">
                <div class="content">
                    <article class="topContent">
                       
                        <img class="bild2" src="https://www.eggs.ca/assets/RecipePhotos/Fluffy-Pancakes-New-CMS.jpg" alt="HTML5 Icon" >
                        <header>
                        
                            <h3><a href="#" title="Ingredients"> Ingredients </a></h3>
                        </header>
                        
                        
                        <footer>
                            <p class="post-info"> 5 servings </p>
                           
                        </footer>
                        
                        
                            <p>  ● 1 cup sifted self-rising flour </p>
                             <p>  ● 1 cup milk </p>
                              <p>  ● 1 egg </p>
                               <p>  ● 1 cup sifted self-rising flour </p>
                    </article>
                    
                    <article class="bottomContent">
                        <header>
                            <h3><a href="#" title="Directions"> Directions </a></h3>
                        </header>
                        
                        
                        <footer>
                            <p class="post-info">  </p>
                           
                        </footer>
                        
                        
                            <p> 1. Beat eggs, oil, and milk together, and add to flour. Stir until combined.</p>
                             <p> 2. Heat a greased griddle until drops of water sprinkled on it evaporate noisily. Pour 1/8 to 1/4 cup batter onto the griddle. Turn over with a metal spatula when bubbles begin to form on top. Cook second side to a golden brown color.</p>
                    </article>
                    
                </div>    
             </div>
        <?php
        if (isset($_SESSION['id'])) {
           echo "<form method='POST' action='".setComments($conn)."'> 
            <input type='hidden' name='uid' value='".$_SESSION['id']."'>
            <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
            <textarea name='message'></textarea><br>
            <button type= 'submit' name= 'commentSubmit'>Comment</button>    
        </form>";
       } else{
           echo "You need to be logged in to comment! 
            <br><br>";
       }       
       
getComments($conn);   
?> 
      
    </body>
</html>
