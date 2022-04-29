<?php include 'sendemail.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Send an Email</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="../CSS/styleform.css">
</head>
<body>
<section>
  <div class="container">
    <form method="POST" id="myform">
    <h2 > SEND AN EMAIL</h2>
      <div class="form-group">
        <label for="subject" >Subject*</label>
        <input type="text" id="subject" name="subject" required>
      </div>

      <div class="form-group">
        <label for="body" >Message*</label>
        <textarea name="body" id="body" cols="30" rows="10" required></textarea>
      </div>
      <button type="submit" name="submit" value="Send">Send Email</button>
    </form>
  </div>
  <div id="status"></div>
</section>
    </script>
    <script type="text/javascript">
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href);
    }
    </script>

</body>
</html>
      