<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<html>
    <head>
        <title>Display</title>
        <style>
            body{
                background-image: url("../Images/back.jfif");
            }
            table{
                background-color:rgba(255, 255, 255, 0.582);
            }
            th,td{
                text-align:center;
            }
            .update,.delete{
                background-color:green;
                color:white;
                cursor:pointer;
                height:32px;
                width:100px;
                font-weight:bold;
                border:0;
                outline:none;
                border-radius:5px;
            }
            .delete{
                background-color:rgb(214, 32, 32);
            }
        </style>
    </head>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("connection.php");
$query = "SELECT * FROM category ";
$data= mysqli_query($con,$query);

$total=mysqli_num_rows($data);

if($total != 0){
    ?>
        <h1 align="center"> Category Details<h1>
        <table align="center" border=1 cellspacing="7" width="70%">
            <tr>
            <th width="10%">Event Type Id</th>
            <th width="30%">Even Type Name</th>
            <th width="10%">Image</th>
            <th width="20%">Operations</th>
        </tr>
    <?php
    while($result=mysqli_fetch_array($data)){
        echo"<tr>
        <td>".$result['C_id']."</td>
        <td>".$result['C_Name']."</td>
        <td>".'<img src="data:image/jpeg;base64,'.base64_encode($result['C_img']).'" width="180px;"height="140px;"/>',"</td>

        <td><a href='update_category.php?id=$result[C_id]'> <input type='submit' value='Update' class='update'></a>
        <a href='delete_category.php?id=$result[C_id]'> <input type='submit' value='Delete' class='delete' onclick='return checkdelete()'></a></td>
        </tr>";

    }
}
else{
    echo "No records";
}
?>
 </table>
 </html>
<script>
    function checkdelete(){
        return confirm('Please Note: All the events of this category will also be deleted. Are you sure you want to delete this record?');
    }
</script>