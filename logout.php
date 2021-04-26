<?php
include('constants/config.php');


	session_destroy();

	unset($_SESSION['user_name']);

	header('location: index.php');



 

?>

