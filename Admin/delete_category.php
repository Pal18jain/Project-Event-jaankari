<?php
include("connection.php");
$id= $_GET['id'];
$query = "DELETE FROM category WHERE C_id='$id'";

    $data= mysqli_query($con,$query);
    if($data){
        echo "<script>alert('Record Deleted')</script>";
        ?>
        <meta http-equiv = "refresh" content = "0; url = http://localhost:8080/Project-Event-jaankari/admin/display_category.php" />
        <?php
    }
    else{
        echo "Failed to Delete";
    }
?>