<?php
include_once 'database.php';

$result = mysqli_query($conn, "SELECT * FROM events limit 1");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Event</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body >
<div class="logo">
      <img src="logo.png" alt="logo">
</div>
<input type="checkbox" id="toggle">
  <label for="toggle" class="show-btn"></label>

  <div class="topnav-right">
  <a href="#home">Home</a>
  <a href="#news">View Events</a>
  <a href="#contact">Contact Us</a>
   
</div>


  <?php
  if (mysqli_num_rows($result) > 0) {

?>
    <div class="wrapper">
    
        <label for="toggle">
        <i class="cancel-icon fas fa-times"></i>
        </label>
        <?php

        $i=0;
        while($row = mysqli_fetch_array($result)) {
            ?>
        <div class="content">
            <header> <?php echo $row['title'];?> </header>

            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Image']).'" width="400px;"height="300px;"/>'?>
            <br>
            <pre>Start Date: <?php echo $row['start_date'];?>                              Organiser: Banasthali Vidyapith</pre>
        <pre style="text-align: justify;">        End Date: <?php echo $row['end_date'];?>                                  City: <?php echo $row['city'];?> </pre>
            <pre style="text-align: center;">                                             State: Rajasthan</pre>
           <?php echo "<a href=\"" . urldecode($row["website_link"]). "\"> Click Here </a>" ?>
           <?php echo "<a href=\"" . urldecode($row["register_link"]). "\"> Click Here </a>" ?>
            <pre style="text-align: justify;">  <?php echo $row['description'];?> </pre>                  
         <?php 
            $i++;
        }
        ?>
            
        </div>
        <?php
  } else
  {
      echo "No result found";
  }
  ?>
    </div>
</body>
</html>