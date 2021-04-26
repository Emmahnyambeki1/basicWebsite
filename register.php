<?php


include("partials/menu.php");

include("constants/config.php");



//process values from form to database

if(isset($_POST['submit'])){

	$user_name=$_POST['user_name'];

	$email=$_POST['email'];

	$password=md5($_POST['password']);

	$c_password=md5($_POST['confirm_password']);

	print_r($_POST);

	if ($password != $c_password) {
		echo '<script> alert("Password dont match");</script>';
		
	}else{

	$sql = "INSERT INTO users (user_name, email, password) VALUES ('".$user_name."', '".$email."', '".$password."')";


	$result = mysqli_query($conn,$sql);



	if($result){

		$_session['success'] = "user added successfully";
		$_SESSION['user_name']=$user_name;


		header('location: index.php');
	}else{ 
		echo '<script> alert('.mysqli_error($conn).');</script>';

		$_session['add'] = "failed to add user";
		
		header('location: register.php');
	}
	mysqli_close($conn);
}
}


?>
<div class="main-content row justify-content-center">

	<div class="wrapper col-md-6 card">
		
		<h1 class="text-center mt-2 card-header">Register here</h1><br>
		<div class="alert hide"></div>
		
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="card-body">
			<div class="row">
			 	<div class="col-md-6 offset-md-3">
				 	<div class="form-group">
						<label for="" class="">User Name</label>
						<input class="form-control" type="text" name="user_name" placeholder="enter your username">
					</div>
					<div class="form-group">
						<label for="" class="">Email</label>
						<input class="form-control" type="email" name="email" placeholder="enter yor email">
					</div>
				 	<div class="form-group">
						<label for="" class="">Password</label>
						<input class="form-control" type="password" name="password" placeholder="enter your password">
					</div>
					<div class="form-group">
						<label for="" class="">Confirm password</label>
						<input class="form-control" type="password" name="confirm_password" placeholder="confirm password">
					</div>
				 	<div class="form-group">
						<input class="btn btn-success float-right" type="submit" name="submit" value="Register">
               			 <a href="index.php" class="btn btn-outline-info float-left">Login</a>

					</div>
				</div>
			</div>
		</form>

	</div>
	</div>


<?php include("partials/footer.php"); ?>




