<h1> KNOW ABOUT ALL EVENTS AT ONE PLACE</h1>
<?php

$con=mysqli_connect("localhost","root","","event_jaankari");

if(mysqli_connect_error())
{
    echo "Cannot connect";
}
if(isset($_GET['C_id'])){
$cat_id= $_GET['C_id'];
}
?>
      
  <div class="container"> 
   
      <div class="box"> 
          <div class="box-row"> 
              <div class="box-cell box1">
                  <?php
                  $sql="SELECT * FROM category";
                  $result= mysqli_query($con, $sql);
                  if(mysqli_num_rows($result)>0){
                      $active="";
                      ?>
                  <ul>
                  <?php while($row=mysqli_fetch_assoc($result)){
                      if(isset($_GET['C_id'])){
                          
                      if($row['C_id']== $cat_id){
                          $active="active";
                      }
                    }
                      echo '<img src="data:image/jpeg;base64,'.base64_encode($row['C_img']).'" width="400px;"height="300px;"/>';
                     echo "<li><a href = 'categories.php?cid={$row['C_id']}'>{$row['C_Name']}</a></li>";
                       }?>
                  </ul>
                  <?php }?>  
            </div> 
          </div> 
      </div> 
  </div> 
   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="stylesheet" href="event1.css">
    <link rel="stylesheet" href="eventhome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body >
  
<div class="logo">
  <img src="jankaari.png" alt="logo">
  
  <!--<div class="search-box">
    <input class="search-txt" type="text" name="" placeholder="Type to search">
    <a class="search-btn" href="#">
        <i class="fas fa-search"></i></a>
        </div>-->
      <div class="topnav-right">
        <a href="#home">Home</a>
        <a href="#View Events">View Events</a>
        <a href="#contact">Contact Us</a> 
        
      </div>
</div>
</body>
</html>