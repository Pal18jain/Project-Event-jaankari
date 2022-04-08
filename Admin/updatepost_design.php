
<?php

// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "event_jaankari";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT C_id,C_Name FROM `category`";

$result1 = mysqli_query($connect, $query);

?>
<?php
    $id= $_GET['id'];
    $query = "SELECT * FROM events WHERE E_id='$id'";
    $data= mysqli_query($connect,$query);

    $result=mysqli_fetch_array($data);
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Creating post
        </title>
        
        <link rel="stylesheet" type="text/css" href="../CSS/create_post.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script>
            $(function(){
                $("#StartDate").datepicker({
                    numberOfMonths:1,
                    dateFormat:'yy-mm-dd',
                    onSelect:function(selectdate){
                        var dt=new Date(selectdate);
                        dt.setDate(dt.getDate())
                        $("#EndDate").datepicker("option","minDate",dt);
                    }
                });
                $("#EndDate").datepicker({
                    numberOfMonths:1,
                    dateFormat:'yy-mm-dd',
                    onSelect:function(selectdate){
                        var dt=new Date(selectdate);
                        dt.setDate(dt.getDate())
                        $("#StartDate").datepicker("option","maxDate",dt);
                    }
                });
            })
        </script>
    </head>
    <body>
        <div class="container">
            <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="title">
                Update Event Details
            </div>
            <div class="form">
                <div class="input_field">
                    <label> Title*</label>
                    <input type="text" class="input" value="<?php echo $result['title']; ?>" name="ename" required>
                </div>
                <div class="input_field">
                    <label> Start Date*</label>
                    <input  id="StartDate" class="input" value="<?php echo $result['start_date']; ?>" name="sdate" required>
                </div>
                <div class="input_field">
                    <label> End Date*</label>
                    <input id="EndDate" class="input" value="<?php echo $result['end_date']; ?>" name="edate" required>
                </div>
                <div class="input_field">
                    <label> Event Venue</label>
                    <input type="text" class="input" value="<?php echo $result['city']; ?>" name="evenue">
                </div>
                <div class="input_field">
                    <label> Description*</label>
                    <textarea class="input" name="edetails" required><?php echo $result['description']; ?></textarea>
                </div>
                <div class="input_field">
                    <label for="category"> Event Type*</label>
                    <select id="category" name="category"  class="input" required>
                    <option value="" disabled selected hidden>Choose a Category</option>
                            <?php while($row1 = mysqli_fetch_array($result1)){?>
                                <option value="<?php echo $row1[0];?>"<?php if($row1[0] == $result['C_id']) echo 'selected="selected"';?>><?php echo $row1[1];?></option>
                                <?php }?>
                    </select>
                </div>
               
                <div class="input_field">
                    <label> Website URL*</label>
                    <input type="text" class="input" value="<?php echo urldecode($result['website_link']); ?>" name="url" required>
                </div>
                <div class="input_field">
                    <label> Image* </label>
                    <input class="input" name="img" type="file" onchange="readURL(this)" accept="Image/*" required>
                </div>
                <div class="input_field">
                    <label> Registration URL*</label>
                    <input type="text" class="input" value="<?php echo urldecode($result['register_link']); ?>" name="rurl" >
                </div>
                <div class="input_field">
                    <label> Contact Number</label>
                    <input type="text" class="input" value="<?php echo $result['contact_no']; ?>" name="cno">
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
        $ename=$_POST['ename'];
        $ename = mysqli_real_escape_string($connect,$ename); 

        $sdate=$_POST['sdate'];
        $edate=$_POST['edate'];
        $evenue=$_POST['evenue'];
        $evenue = mysqli_real_escape_string($connect,$evenue); 

        $edetails=$_POST['edetails'];
        $edetails = mysqli_real_escape_string($connect,$edetails); 

        $category=$_POST['category'];
        $url=$_POST['url'];
        $url = urlencode($url); 
        $url = mysqli_real_escape_string($connect,$url); 
        
      $file = addslashes(file_get_contents($_FILES["img"]["tmp_name"]));  
      $rurl=$_POST['rurl'];
        $rurl = urlencode($rurl); 
        $rurl = mysqli_real_escape_string($connect,$rurl);

        $cno=$_POST['cno'];
        $cno = mysqli_real_escape_string($connect,$cno);

        $query= "UPDATE events SET title='$ename', description='$edetails', start_date='$sdate', end_date = '$edate',city='$evenue',C_id='$category',Image='$file',website_link= '$url', register_link='$rurl', contact_no='$cno' WHERE E_id='$id'";
        $data = mysqli_query($connect, $query);
        if($data){
            echo "<script>alert('Record Updated')</script>";
            ?>
            <meta http-equiv = "refresh" content = "0; url = http://localhost:8080/Project-Event-jaankari/admin/display_event.php" />
            <?php
        }
        else{
            echo "failed to update";
        }
    }
?>

