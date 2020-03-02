<?php

  if ($_POST) {

    $error = "";
    $successMessage = "";

    if(!$_POST["email"]) {
      $error .= "An email address is required.<br>";
    }

    if(!$_POST["subject"]) {
      $error .= "An subject address is required.<br>";
    }

    if(!$_POST["content"]) {
      $error .= "An content address is required.<br>";
    }

    if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
      $error .= "The email address is invalid.<br>";
    }

    if ($error != "") {

      $error = '<div class="alert alert-danger" role="alert">
  <strong>There were error(s) in your form: </strong>' . error . '
</div>'; 
  } else {

    $emailTo = $_POST["email"];
    $subject = $_POST["subject"];
    $body = $_POST["content"];
    $headers = "From: Yourlove@mattsunwoongkim-com.stackstaging.com";

    if(mail($emailTo, $subject, $body, $headers)) {
      $successMessage = '<div class="alert alert-green" role="alert">
  <strong>You\'re message was sent!</strong></div>'; 
    } else {
      $error = '<div class="alert alert-danger" role="alert">
  <strong>Failed to Send</strong></div>'; 
    }
  }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Get in touch</title>
  </head>
  <body>

    <div class="container">
      <h1>Get in Touch!</h1>

      <div id="error"><? echo $error.$successMessage; ?></div>

      <form method="post">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
  </div>
  
  <div class="form-group">
    <label for="subject">Subject</label>
    <input class="form-control" type="text" id="subject" name="subject">
  </div>
  <div class="form-group">
    <label for="content">What would you like to ask us?</label>
    <textarea class="form-control" id="content" rows="3" name="content"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  
    <script type="text/javascript">
    
    $("form").submit(function (e) {
      e.preventDefault();

      var error = "";
      
      if($("#email").val() == "") {

        error += "The email field is required<br>";
      }

      if($("#subject").val() == "") {

        error += "The subject field is required<br>";
      }

      if($("#content").val() == "") {

        error += "The content field is required<br>";
      }

      if (error != ""){
        $("#error").html('<div class="alert alert-danger" role="alert">
  <strong>There were error(s) in your form: </strong>' + error + '
</div>');
      } else {
        $("form").unbind("submit").submit();
      }
    });

    </script>
  
  
  
  
  </body>
</html>


<script type="text/javascript">
    
     $("form").submit(function (e) {
      e.preventDefault();

      var error = "";
         if($("#email").val() == "") {

        error += "The email field is required<br>";
      }

      if($("#subject").val() == "") {
        
 		 error += "The subject field is required<br>";
      }

      if($("#content").val() == "") {

        error += "The content field is required<br>";
      }

        if (error != ""){
        $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form: </strong></p>' + error + '</div>');

      }else {
        $("form").unbind("submit").submit();
      }
    });

    </script>