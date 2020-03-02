<?php

  session_start();

  echo $_SESSION['username'];

  $link = mysqli_connect("shareddb-q.hosting.stackcp.net","usersdb-313137ddb5", "myfirst1db","usersdb-313137ddb5");

  if (mysqli_connect_error()) {

    die ("There was an error");

  } 

  
  if ($_POST['email'] == '') {

    echo "<p>Email address is required.</p>";

  } elseif ($_POST['password'] == '') {

    echo "<p>password is required.</p>";

  } else {

    $query = "SELECT id FROM users WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";

    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {

      echo "<p>That email address has already been taken.</p>";

    } else {

      $query = "INSERT INTO users (`email`,`password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."',
      '".mysqli_real_escape_string($link, $_POST['password'])."')";

      if (mysqli_query($link, $query)) {

        $_SESSION['email'] = $_POST['email'];

        header("Location: session.php");

      } else {

        echo "<p>There was a problem signing you up - please try again later.</p>";

      }
    }

  }


  

  // $query = "INSERT INTO `users` (`email`, `password`) VALUES('kirsten@asdf.com', 'asdf12121')";

  // $query = "UPDATE users SET email = 'adfad.adss.com' WHERE id = 3 LIMIT 1";

  // mysqli_query($link, $query);

  // $query = "SELECT * FROM users WHERE email Like '%.com'";

  // $name = "Matt Kim";

  // $query = "SELECT email FROM users WHERE name = '".mysqli_real_escape_string($link, $name)."'";

  // if ($result = mysqli_query($link, $query)) {

  //   while ($row = mysqli_fetch_array($result)) {

  //     print_r($row);

  //   }

  // }



?>


<form method="post">

    <input type="text" name="email" placeholder="Email address">
    <input type="password" name="password" placeholder="Password">

    <input type="submit" value="Sign Up">


</form>