<?php

// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "event_jaankari";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `category`";

$result1 = mysqli_query($connect, $query);

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
            <form action="adminpanel.php" method="POST" autocomplete="off">
            <div class="title">
                Create A Post
            </div>
            <div class="form">
                <div class="input_field">
                    <label> Event Name*</label>
                    <input type="text" class="input" name="ename" required>
                </div>
                <div class="input_field">
                    <label> Start Date*</label>
                    <input  id="StartDate" class="input" name="sdate" required>
                </div>
                <div class="input_field">
                    <label> End Date</label>
                    <input id="EndDate" class="input" name="edate">
                </div>
                <div class="input_field">
                    <label> Event Venue*</label>
                    <input type="text" class="input" required name="evenue">
                </div>
                <div class="input_field">
                    <label> Event Details*</label>
                    <textarea class="input" name="edetails" required></textarea>
                </div>
                <div class="input_field">
                    <label for="category"> Event Category*</label>
                    <select id="category" name="category" class="input" required>
                            <option value="" disabled selected hidden>Choose a Category</option>
                            <?php while($row1 = mysqli_fetch_array($result1)):;?>
                            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                            <?php endwhile;?>
                    </select>
                </div>
                <div class="input_field">
                    <label> Event Website URL</label>
                    <input type="text" class="input" name="url">
                </div>
                <div class="input_field">
                    <label> Image* </label>
                    <input class="input" name="img" type="file" onchange="readURL(this)" accept="Image/*" required>
                </div>
                <div class="input_field">
                    <input type="submit" value="UPLOAD" name="register" class="btn">
                </div>
            </div>
        </form>
        </div>
    </body>
</html>

<?php
    if(isset($_POST['register'])){
        $ename=$_POST['ename'];
        $sdate=$_POST['sdate'];
        $edate=$_POST['edate'];
        $evenue=$_POST['evenue'];
        $edetails=$_POST['edetails'];
        $category=$_POST['category'];
        $url=$_POST['url'];
        $url = urlencode($url); 
        $url = mysqli_real_escape_string($connect,$url); 
 
        $img=$_POST['img'];

        $query= "INSERT INTO events (title, start_date, end_date, city, description, C_id, Image, website_link )
                            values('$ename','$sdate','$edate','$evenue','$edetails','$category', '$img','$url')";
        $data = mysqli_query($connect, $query);
        if($data){
            echo "inserted";
        }
        else{
            echo "failed";
        }
    }
?>