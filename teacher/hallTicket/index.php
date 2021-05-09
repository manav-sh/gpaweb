<?php include 'filesLogic.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Upload Hall Ticket</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <meta name="viewport" content="width=device-width , initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="container">
    <div class="sub-container">
      <center>
        <h2 class="heading">Welcome Respected Sir/Ma'am</h2>
      </center>
      <p class="note">Upload the PDF of Hall ticket that is been recieved by you in the below form along with the Semester and section </p><br>
      <form class="inputs" autocomplete="off" action = "index.php" method = "post" enctype="multipart/form-data">
        <input class="text-input" type="text" name="username" placeholder="Semester">
        <br>
        <input class="text-input" type="password" name="password" placeholder="Section">
        <br>
        <div class="file-input">
        <input class="inputfile" name="myfile" type="file" id="file"> <label class="file-label" for="file"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Choose File (.pdf file) </label>
        </div>
        <br>
        <input class="login-btn" type="submit" name="save" value="Upload Hall Ticket">
        
        
      </form>
  </div>
</div>
</body>
</html>
