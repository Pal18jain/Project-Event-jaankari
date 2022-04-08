
<?php
error_reporting(E_ERROR);
// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "event_jaankari";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

?>
<?php
    $id= $_GET['id'];
    $query = "SELECT * FROM category WHERE C_id='$id'";
    $data= mysqli_query($connect,$query);

    $result=mysqli_fetch_array($data);
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Adding category
        </title>
        
        <link rel="stylesheet" type="text/css" href="../CSS/add_a_category.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    </head>
    <body>
        <div class="container">
            <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="title">
                Update Category Details
            </div>
            <div class="form">
                <div class="input_field">
                    <label> Event Type Name*</label>
                    <input type="text" class="input" value="<?php echo $result['C_Name']; ?>" name="acname" required>
                </div>
                <div class="input_field">
                    <label> Image* </label>
                    <input class="input" name="cimg" type="file" onchange="readURL(this)" accept="Image/*" required>
                </div>
                <div class="input_field">
                    <input type="submit" value="UPDATE" name="update" class="btn">
                </div>
            </div>
        </form>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['update'])){
        $acname=$_POST['acname'];
        $acname = mysqli_real_escape_string($connect,$acname); 
      if(!empty($_FILES["cimg"]["tmp_name"]) && file_exists($_FILES["cimg"]["tmp_name"])){
      $file = addslashes(file_get_contents($_FILES["cimg"]["tmp_name"]));  
      }

        $query= "UPDATE category SET C_Name='$acname',C_img='$file' WHERE C_id='$id'";
        $data = mysqli_query($connect, $query);
        if($data){
            echo "<script>alert('Record Updated')</script>";
            ?>
            <meta http-equiv = "refresh" content = "0; url = http://localhost:8080/Project-Event-jaankari/admin/display_category.php" />
            <?php
        }
        else{
            echo "failed to update";
        }
    }
?>

