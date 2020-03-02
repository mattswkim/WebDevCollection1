<?php

  $weather = "";
  $error = "";
  if($_GET['city']) {
    
    $urlContents = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city']).",uk&appid=4f0deb744677bcd0e029efbc566bdd80");

    $weatherArray = json_decode($urlContents, true);

    if ($weatherArray['cod'] == 200) {

      $weather = "The weather in ".$_GET['city']." is currently '".$weatherArray['weather'][0]['description']."'.";


      $tempInCelcius = $weatherArray['main']['temp'] - 273;

      $weather .=" The temperature is ".$tempInCelcius."&deg;C and the humidity is ".$weatherArray['main']['humidity'].".";
    } else {

      $error = "Could not find city - please try again. ex) Tokyo, JP";

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

    <title>Weather</title>
    <style type="text/css">
      html { 
        background: url(background.jpg) no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }

      body {
        background: none;
      }

      .container {
        text-align: center;
        margin-top: 100px;
        width: 40%;
      }

      input {
        margin: 20px 0;
      }

      #weather {
        margin-top: 15px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>What's The Weather?</h1>
      <form>
  
 
    <div class="form-group">
      <label for="inputCity">Enter Your City: </label>
      <input type="text" class="form-control" id="city" name="city" placeholder="E.g London, Tokyo" value="<?php 
      if(array_key_exists('city', $_GET)) {
        echo $_GET['city']; 
      }
        ?>">
        
    </div>

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    
    <div id="weather"><?php

      if ($weather) {

        echo '<div class="alert alert-light" role="alert">'.$weather.'</div>';

      } else if ($error) {

        echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
      }
    ?>

    </div>
    </div>

    <div class="footer"><p>Photo by Hugues de BUYER-MIMEURE on Unsplash</p></div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>