<?php


include("constants/config.php");
include("partials/menu.php");

if (!isset($_SESSION['user'])) {
   header('location: index.php');
}

// variable declaration and initialization
      
          $target_directory = "images/";
          $uploadStatus = 1;

        if(isset($_POST['upload'])){

          $target_upload_file_directory = $target_directory . basename($_FILES["image"]["name"]);
          if (empty($target_upload_file_directory)) {
            
          }

          $imageType = strtolower(pathinfo($target_upload_file_directory,PATHINFO_EXTENSION));


                $user_name=$_POST['user_name'];
                $email=$_POST['email'];
                $location=$_POST['location'];
            
                # check if the file is an image
                $is_image = getimagesize($_FILES["image"]["tmp_name"]);

                if(!$is_image){
                    echo '<script>alert("File is not an Image!");</script>';
                    $uploadStatus = 0;
                }

                #check if the file already exists in the folder
                if(file_exists($target_upload_file_directory)){
                    echo '<script>alert("Kindly upload a different file !");</script>';
                    $uploadStatus = 0;           
                }
                #check the file size
                if ($_FILES['image']['size'] > 5000000){
                    echo '<script>alert("File is too big !");</script>';
                   $uploadStatus =0;                
                }
                #restrict file upload types
                if ($imageType != 'jpg' && $imageType != 'png' && $imageType != 'jpeg') {
                    echo '<script>alert("Allowed files : .jpg .png .jpeg !");</script>';
                    $uploadStatus = 0;
                }

                if ($uploadStatus == 0) {
                    echo '<script>alert("Sorry the file was not uploaded !!!");</script>';
                   
                } else {

                    $sql="INSERT into customer (user_name,email,location,image_name) VALUES ('".$user_name."','".$email."','".$location."','".$target_upload_file_directory."') ";        
                    
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_upload_file_directory)) {

                        echo '<script>alert("Everything looks good!!!");</script>';

                        $result=mysqli_query($conn,$sql);

                     if($result){
                            $_SESSION['add']="customer added successfully";
                            $message=base64_encode('category added successfully');
                            header('location: manage.customer.php?message='.$message);

                        }
                        else{
                            echo mysqli_error($conn);
                            $_SESSION['add']="failed to add customer";
                            $message=base64_encode('failed to add category');
                            header('location: add.customer.php?message='.$message);

                        }
                        
                    } else {
                     echo '<script>alert("Ooops You must have missed something !!!");</script>';
                    }
                    
                }
            }
                

       
        //check whether the image is selected and check the value of the image accordingly
        //    print_r($_POST);
        // //die();
        //  // if(isset($_FILES['image']['name'])){
        //      //to upload the image ,you need image name and the source path,destination path
        //      $image_name=$_FILES['image']['tmp_name'];
        //      //auto rename the image so that when we upload the same image it doesnt override the existing one
        //     echo $image_name['mime']
        //     //get the extension for our image(jpg,png) food1.jpg
        //      $ext=end(explode('.', $image_name));
        //      //rename the image

        //      $image_name="person_image-".rand(000,999).'.'.$ext;//e.g food_category 800.png


        //      //image source path

        //      $source_path=$_FILES['image']['tmp_name'];


        //      //image destination path

        //      $destination_path="images/category".$image_name;

        //      //upload the file
        //      $upload=move_uploaded_file($source_path , $destination_path);

        //      //check if the image is uploaded or no and if not redirect with an error message
        //      if($upload == false){
        //         echo "error";

        //          // $_SESSION['upload']="failed to upload the image";
        //          // $message=base64_encode('failed to upload file');

        //          // header('location: add.customer.php?message='.$message);

        //          //die();
        //      }

         // }
         // else{
         //   $image_name="";
         // }

        
        
?><!-- 
 -->
<div class="main-content">

    <div class="wrapper">
        

        <h1 class="text-center mt-2">ADD CUSTOMER</h1>
        <br /><br />

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="form-group">
                        <label for="" class="">User Name</label>
                        <input class="form-control" type="user_name" name="user_name" placeholder="Enter your user name">
                    </div>
                     <div class="form-group">
                        <label for="" class="">Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="" class="">Location</label>
                        <input class="form-control" type="location" name="location" placeholder="Enter your location">
                    </div>
                    <div class="form-group">
                        <label for="" class="">Select image</label>
                        <input class="form-control" type="file" name="image">
                    </div>
                    
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name="upload" value="Add Customer">
                    </div>
                </div>
            </div>



        </form>
    </div>
</div>

<?php include("partials/footer.php"); ?>
  
