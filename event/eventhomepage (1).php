<h1> KNOW ABOUT ALL EVENTS AT ONE PLACE</h1>
<?php
require '../Admin/connection.php';

$query = "SELECT * FROM category ";

$cat_res = mysqli_query($con, $query);
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res))
    {
        $cat_arr[]=$row;
    }
        ?>
        
        <center>
        
  <div class="container"> 
   
      <div class="box"> 
          <div class="box-row"> 
              
                  <?php 
                  foreach($cat_arr as $list)  {
                      ?>
                      <div class="box-cell box1">
                      <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($list['C_img']).'" width="400px;"height="300px;"/>'?>
                      <li><a href = "categories.php?C_id=<?php echo $list['C_id'];?>">
                      <?php echo $list['C_Name']  ?>
                  </a>

                      </li>
                  </div>
                      <?php  
                  }
                  ?>  
            </div> 
          </div> 
      </div> 
  </div> 
</center>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="stylesheet" href="event1.css">
    <link rel="stylesheet" href="categories.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body >
  
<div class="logo">
  <img src="../Images/जानकारी-removebg-preview.png" alt="logo">
  
  <!--<div class="search-box">
    <input class="search-txt" type="text" name="" placeholder="Type to search">
    <a class="search-btn" href="#">
        <i class="fas fa-search"></i></a>
        </div>-->
      <div class="topnav-right">
        
        <a href="eventhomepage (1).php">Home</a>
        <a href="eventhomepage (1).php">View Events</a>
        <a href="../contact_us/contact.html">Contact Us</a> 
        
      </div>
</div>

</body>
</html>