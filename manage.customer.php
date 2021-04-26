<?php 

include("constants/config.php");
include("partials/menu.php");


if (!isset($_SESSION['user'])) {
   header('location: index.php');
}
?>
<div class="main-content">
	<div class="wrapper">
		
        <div class='text-center p-2'>
            <h3 > Manage Customer</h3>
        </div>
		
		<br />
      
   

   <div class="container">
     <div class="row">
        <div class="col-md-12">
        <a href="add.customer.php" class="btn btn-sm btn-outline-primary float-right m-2"> + Add Customer</a>
            
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-12 card card-body">
            <div class="table-responsive">
                <table class="table table-stripped " style="vertical-align: center">
                    <thead class="thead-dark">
                        <td>ID</td>
                        <td>user_name</td>
                        <td>email</td>
                        <td>location</td>
                        <td>image_name</td>
                        <td>create_at</td>
                        <td>Updated_at</td>
                    </thead>
                    <tbody>
                    <?php
                    $sql    = "SELECT * FROM customer";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                            
                            while ($row = mysqli_fetch_assoc($result))
                            {
                               
                                echo '<tr>
                                        <td>'.$row['id'].'</td>
                                        <td>'.$row['user_name'].'</td>
                                        <td>'.$row['email'].'</td>
                                        <td>'.$row['location'].'</td>
                                        <td><img src="'.$row['image_name'].'" class="img img-fluid img-thumbnail" style="width:100px; height: 100px" /></td>
                                        <td>'.$row['created_at'].'</td>
                                        <td>'.$row['update_at'].'</td>
                                    </tr>';
                            }
                        
                    }

                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>


    <br /><br /><br />


	</div>
	
</div>



<?php 
include("partials/footer.php");

?>