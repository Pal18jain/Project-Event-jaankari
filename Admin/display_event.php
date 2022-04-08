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
                width:70px;
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
$query = "SELECT * FROM events,category WHERE category.C_id=events.C_id ORDER BY E_id";
$data= mysqli_query($con,$query);

$total=mysqli_num_rows($data);

if($total != 0){
    ?>
        <h1 align="center"> All Event Details<h1>
        <table align="center" border=1 cellspacing="7" width="100%">
            <tr>
            <th width="3%">Id</th>
            <th width="9%">Title</th>
            <th width="20%">Description</th>
            <th width="4%">Start Date</th>
            <th width="4%">End Date</th>
            <th width="6%">Venue</th>
            <th width="6%">Event Type</th>
            <th width="7%">Website URL</th>
            <th width="10%">Image</th>
            <th width="7%">Registration URL</th>
            <th width="8%">Contact No.</th>
            <th width="16%">Operations</th>
        </tr>
    <?php
    while($result=mysqli_fetch_array($data)){
        echo"<tr>
        <td>".$result['E_id']."</td>
        <td>".$result['title']."</td>
        <td>".$result['description']."</td>
        <td>".$result['start_date']."</td>
        <td>".$result['end_date']."</td>
        <td>".$result['city']."</td>
        <td>".$result['C_Name']."</td>
        <td><a href=\"" . urldecode($result["website_link"]). "\"> Click Here </a></td>
        <td>".'<img src="data:image/jpeg;base64,'.base64_encode($result['Image']).'" width="150px;"height="140px;"/>',"</td>
        <td><a href=\"" . urldecode($result["register_link"]). "\"> Click Here </a></td>
        <td>".$result['contact_no']."</td>
        <td><a href='updatepost_design.php?id=$result[E_id]'> <input type='submit' value='Update' class='update'></a>
        <a href='delete_post.php?id=$result[E_id]'> <input type='submit' value='Delete' class='delete' onclick='return checkdelete()'></a></td>
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
        return confirm('Are you sure you want to delete this record?');
    }
</script>