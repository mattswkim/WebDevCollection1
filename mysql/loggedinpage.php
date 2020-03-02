<?php

  session_start();

  // $diaryContent = "";

  if (array_key_exists("id", $_COOKIE) && $_COOKIE['id']) {

    $_SESSION['id'] = $_COOKIE["id"];

  }

if (array_key_exists("id", $_SESSION)) {

    include("connection.php");

    $query = "SELECT diary FROM `users` WHERE id = 
    ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";

    $row = mysqli_fetch_array(mysqli_query($link, $query));

    $diaryContent = $row['diary'];

  } else {

    header("Location: index.php");

  }

  include("header.php");

?>


  <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex" id="opaque">
    <a class="navbar-brand" href="#">Secret Diary</a>

    <div class="ml-auto p-2 my-2 my-lg-0">
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php "Hi, ".$_SESSION['email'] ?></a>

      <a href='index.php?logout=1'>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log out</button>
      </a>
    </div>
  </nav>

  <div class="container-fluid" id="containerLoggedInPage">

    <textarea id="diary" class="form-control">
    <?php

      echo $diaryContent;

    ?>
    </textarea>
  
  </div>

<?php

  include("footer.php");

?>