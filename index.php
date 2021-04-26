<?php 

include('constants/config.php');
include("partials/menu.php"); 

?>

    <div class="row justify-content-center">
            <div class="col-md-4" >
                 <div class="card">
            <div class="card-header">
                    <h3 class="text-center" >Log In</h3>
                
            </div>
            <div class="card-body">
             <form action="" method="POST">
       
                <div class="form-group">
                <label for="user_name">User Name</label>
                <input class="form-control" type="text" name="user_name"  placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input class="form-control" type="password" name="password" placeholder="Enter your password">
            </div>
            <div class="form-group">
                <input class="btn btn-success float-right" type="submit" name="login" value="login">
                <a href="register.php" class="btn btn-outline-info float-left">Register</a>
            </div>
            </form>
        </div>
    </div>
   </div>
        </div>

   <?php //include("partials/footer.php"); ?>


<?php
if(isset($_POST['login'])){
    //process the login form
    $user_name=$_POST['user_name'];
    $password=md5($_POST['password']);

    //sql query
    $sql="SELECT * FROM users WHERE user_name ='".$user_name."' AND password= '".$password."'";

    //execute the query
    $result=mysqli_query($conn,$sql);

    //check if the user exist by counting the number of rows

    $count=mysqli_num_rows($result);

    if($count==1){

        $_SESSION['login']=' login successful';
        $_SESSION['user']= $user_name;//checks whether the user is logged in or not
        $message=base64_encode(' login successful');
        header('location: manage.customer.php?message='.$message);


    }
    else{
        echo 'error';
        $_SESSION['login']=' failed to login';
        $message=base64_encode('failed to login');
        header('location: index.php?message='.$message);

}
}
?>