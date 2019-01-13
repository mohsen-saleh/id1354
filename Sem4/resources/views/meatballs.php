<?php
   session_start();
   date_default_timezone_set('Europe/Stockholm');
   include '../../classes/integration/dbh.inc.php';
   //include '../../classes/integration/DBH.php';
   //include '../../getCommentsM.php';
   //include '../../comments.inc.php';
   
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
                            url: '../../get-comment.php',                          
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
                         url: '../../do-commentM.php',
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
                               url: '../../deleteComments.php',
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
             
        <h1>Meatballs Recipe</h1>
        </div>
        
        <div class="left" >
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
                        
                        <img class="bild2" src="https://www.dietdoctor.com/wp-content/uploads/2017/07/DD-464-swedishmeatballs.jpg" alt="HTML5 Icon" >
                        <header>
                            <h3><a href="#" title="Ingredients"> Ingredients </a></h3>
                        </header>
                        
                        <footer>
                            <p class="post-info"> 6 servings </p>
                           
                        </footer>
                        
                        
                            <p> ● 2 slices day-old white bread, crumbled </p>
                            <p> ● 1/2 cup heavy cream </p>
                            <p> ● 1 teaspoon butter </p>
                            <p> ● 2/3 pound ground beef </p>
                            <p> ● 1/3 pound finely ground pork </p>
                            <p> ● 1 egg </p>
                            <p> ● 1 tablespoon brown sugar (optional) </p>
                            <p> ● 1 teaspoon salt </p>
                            <p> ● 1/4 teaspoon ground black pepper </p>
                            <p> ● 1/4 teaspoon ground nutmeg </p>
                            <p> ● 1/4 teaspoon ground allspice </p>
                            <p> ● 1/8 teaspoon ground ginger (optional) </p>
                            <p> ● 1/4 cup chicken broth </p>
                            <p> ● 3 tablespoons all-purpose flour, or as needed </p>
                            <p> ● 2 cups beef broth, or as needed </p>
                            <p> ● 1/2 (8 ounce) container sour cream </p>
                    </article>
                    
                    <article class="bottomContent">
                        <header>
                            <h3><a href="#" title="Directions"> Directions </a></h3>
                        </header>
                        
                        
                        <footer>
                            <p class="post-info"> Preparation: 25 min, Cook: 1 h </p>
                           
                        </footer>
                        
                        
                            <p> 1. Preheat oven to 350 degrees F (175 degrees C).</p>
                            <p> 2. Place the bread crumbs into a small bowl, and mix in the cream. Allow to stand until crumbs absorb the cream, about 10 minutes. While the bread is soaking, melt 1 teaspoon of butter in a skillet over medium heat, and cook and stir the onion until it turns light brown, about 10 minutes. Place onion into a mixing bowl; mix with the ground beef, ground pork, egg, brown sugar, salt, black pepper, nutmeg, allspice, and ginger. Lightly mix in the bread crumbs and cream.</p>
                            <p> 3. Melt 1 tablespoon of butter in a large skillet over medium heat. Pinch off about 1 1/2 tablespoon of the meat mixture per meatball, and form into balls. Place the meatballs into the skillet, and cook just until the outsides are brown, about 5 minutes, turning the meatballs often. Insides of the meatballs will still be pink. Place browned meatballs into a baking dish, pour in chicken broth, and cover with foil..</p>
                            <p> 4. Bake in the preheated oven until the meatballs are tender, about 40 minutes. Remove meatballs to a serving dish.</p>                   
                            <p> 5. To make brown gravy, pour pan drippings into a saucepan over medium heat. Whisk the flour into the pan drippings until smooth, and gradually whisk in enough beef broth to total about 2 1/2 cups of liquid. Bring the gravy to a simmer, whisking constantly until thick, about 5 minutes. Just before serving, whisk in the sour cream. Season to taste with salt and black pepper. Serve the gravy with the meatballs.</p>                 
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
