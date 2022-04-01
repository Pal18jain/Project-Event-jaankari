<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/adminpanel.css">
</head>
<body>
    
    <div class="container">
        <div class="header">
        <img src="../Images/जानकारी-removebg-preview.png" width="150" height="150">
        </div>
        <div class="content">
            <h1>Welcome Admin</h1>
            <button onclick="window.location.href='http://localhost:8080/Project-Event-jaankari/admin/create_a_post.php';" class="btn"> Create Post </button>
            <button onclick="window.location.href='http://localhost:8080/Project-Event-jaankari/admin/display_event.php';" class="btn"> Update/Delete Posts </button>
            <button onclick="window.location.href='http://localhost:8080/Project-Event-jaankari/admin/add_category.php';" class="btn"> Add Category </button>
            <button onclick="window.location.href='http://localhost:8080/Project-Event-jaankari/admin/display_category.php';" class="btn"> Update/Delete Category </button>
            <button class="btn"> Send Email </button>
            <button onclick="window.location.href='http://localhost:8080/Project-Event-jaankari/admin/logout.php';" class="btn"> Logout </button>
        </div>
    </div>
    
</body>
</html>
