<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<?php

// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "event_jaankari";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../CSS/add_a_category.css">
</head>
<body>
<div class="container">
            <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="title">
                Add a Category
            </div>
            <div class="form">
                <div class="input_field">
                    <label> Event Type*</label>
                    <input type="text" class="input" name="acname" required>
                </div>
                <div class="input_field">
                    <label> Image* </label>
                    <input class="input" name="cimg" type="file" onchange="readURL(this)" accept="Image/*" required>
                </div>
                <div class="input_field">
                    <input type="submit" value="UPLOAD" name="register" class="btn">
                </div>
            </div>
        </form>
        </div>
</body>
</html>
<script>  
 $(document).ready(function(){  
      $('#UPLOAD').click(function(){  
           var image_name = $('#cimg').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#cimg').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#cimg').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  

<?php
    if(isset($_POST['register'])){
        $acname=$_POST['acname'];
        $acname = mysqli_real_escape_string($connect,$acname); 
        
      $file = addslashes(file_get_contents($_FILES["cimg"]["tmp_name"]));  

        $query= "INSERT INTO category (C_Name, C_img)
                            values('$acname','$file')";
        $data = mysqli_query($connect, $query);
        if($data){
            echo "<script>alert('Record Inserted')</script>";
            ?>
            <meta http-equiv = "refresh" content = "0; url = http://localhost:8080/Project-Event-jaankari/admin/home.php" />
            <?php
        }
        else{
            echo "failed";
        }
    }
?>
