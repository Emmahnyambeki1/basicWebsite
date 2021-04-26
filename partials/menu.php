
<?php

include('../constants/config.php');


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <link rel="stylesheet" type="text/css" href="../css/style.css"> -->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-4.0.0/dist/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="text-center m-2">Customer Basic Crude System</h1>
    <?php if (isset($_SESSION['user'])) {
    	echo '<div class="container">
    		<span class="float-right"> <a class="btn btn-outline-warning" href="logout.php"> Logout</a> </span>
    		
    	</div>';
    	
   } ?>
