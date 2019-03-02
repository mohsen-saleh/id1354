
<?php

include 'classes/Controller/Controller.php';
use Controller\Controller;

if (isset($_POST['submit'])) {
	
    $contr = new Controller();
	$logoutstatus = $contr->logout();
    header("Location: resources/views/start.php?logout=".$logoutstatus);
}