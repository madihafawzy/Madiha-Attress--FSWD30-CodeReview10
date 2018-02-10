<?php
 	session_start();
 	if (!isset($_SESSION['person'])) {
 	 	header("Location: index.php");
 	} else if(isset($_SESSION['person'])!="") {
 	 	header("Location: home.php");
 	}
 	if (isset($_GET['logout'])) {
 	 	unset($_SESSION['person']);
 	 	session_unset();
 	 	session_destroy();
 	 	header("Location: index.php");
 	 exit;
 	}
 ?>