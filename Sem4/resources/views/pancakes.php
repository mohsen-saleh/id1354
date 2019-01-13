<?php
   session_start();
   date_default_timezone_set('Europe/Stockholm');
   include '../../classes/integration/dbh.inc.php';
   //include '../../comments.inc.php';
   //include '../../getCommentsP.php';
   //include '../../classes/integration/DBH.php';
   //session_start();
   
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
        
        <title>Tasty Recipes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

                
               
        
        <script>
            $(document).ready(function()
                {
                    $(function(){
 
                        $.ajax({                                      
                            url: '../../get-commentP.php',                          
                            data: "",
                            dataType: 'json',                   
                            success: function(data)        
                            {
                                $('#form1').append("<button id='com-btn' onclick='postComment()' >Comment</button>"); 
                                for(var i = 0; i < data.length; i++)
                                {
                                  var user = data[i].user_uid;              
                                  date = data[i].date; 
                                  message = data[i].message;
                                  deletable = data[i].deletable;
                                  cid = data[i].cid;
                                  if(deletable)
                                  {
                                       $('.comment-box1').append("<div class='comment-box'><p><p class='user-date'>" +user+": "+ "<br></p>"+date+ "<br>"+ message + "<br>"+ "<button id='del-btn' onclick=deleteComment("+cid+")>Delete</button></p>");
                                  }
                                  else
                                  {
                                    $('.comment-box1').append("<div class='comment-box'><p><p class='user-date'>" +user+": "+ "<br></p>"+date+ "<br>"+ message +"</p>"); 
                                  }
                                }
                            } 
                        }); 
                    }); 
                });
                
                function postComment()
                 {
                    var uid = $("#uid").val();
                    date = $("#date").val();
                    message = $("#message").val();
                           
                     $.ajax({
                         url: '../../do-commentP.php',
                         type: 'post',
                         dataType: 'json',
                         data:
                                 {
                                     uid: uid,
                                     date: date,
                                     message: message
                                 },
                         success: function (data)
                                   {
                                       $('.comment-box1').html(" ");
                                       for (var i = 0; i < data.length; i++)
                                       {
                                           var user = data[i].user_uid;              
                                            date = data[i].date; 
                                            message = data[i].message;
                                            deletable = data[i].deletable;
                                            cid = data[i].cid;
                                           if (deletable)
                                           {
                                               $('.comment-box1').append("<div class='comment-box'><p><p class='user-date'>" +user+": "+ "<br></p>"+date+ "<br>"+ message + "<br>"+ "<button id='del-btn' onclick=deleteComment("+cid+")>Delete</button></p>");
                                           } else
                                           {
                                               $('.comment-box1').append("<div class='comment-box'><p><p class='user-date'>" +user+": "+ "<br></p>"+date+ "<br>"+ message +"</p>"); 
                                           }
                                       }
                                   }
     });
     }
                    function deleteComment(cid)
                           {
                               $.ajax({
                               url: '../../deleteCommentsP.php',
                               type: 'post',
                               dataType: 'json',
                                  data:
                                           {
                                               'cid': cid,
                                        
                                           },
                                   success: function (data)
                                   {
                                       $('.comment-box1').html(" ");
                                       for (var i = 0; i < data.length; i++)
                                       {
                                           var user = data[i].user_uid;              
                                            date = data[i].date; 
                                            message = data[i].message;
                                            deletable = data[i].deletable;
                                            cid = data[i].cid;
                                           if (deletable)
                                           {
                                               $('.comment-box1').append("<div class='comment-box'><p><p class='user-date'>" +user+": "+ "<br></p>"+date+ "<br>"+ message + "<br>"+ "<button id='del-btn' onclick=deleteComment("+cid+")>Delete</button></p>");
                                           } else
                                           {
                                               $('.comment-box1').append("<div class='comment-box'><p><p class='user-date'>" +user+": "+ "<br></p>"+date+ "<br>"+ message +"</p>"); 
                                           }
                                       }
                                   }
                               });
                           }
        </script>
    </head>
    <body>
        <div class="body">
             
        <h1>Pancakes Recipe</h1>
        </div>
        
        <div class="left">
        <ul>
            <li><a href="start.php">Home</a></li>
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
            if (isset($_SESSION['u_id'])) {
				echo "<div id='form1' >   
                     <input type='hidden' name='uid' id='uid' value='".$_SESSION['u_id']."'>
                     <input type='hidden' name='date' id='date' value='".date('Y-m-d H:i:s')."'>
                     <textarea name='message' id='message'></textarea><br>
                            
                </div> ";
			}else{
                echo '<div id="login-link"><form action="login.php" method="POST">
				<button type="submit" name="submit">Login</button>
				</form>Log in to write a comment</div>';
                        }
                              
                echo"<div class='comment-box1'>"; 
                echo "</div>";
     ?>
      
    </body>
</html>
