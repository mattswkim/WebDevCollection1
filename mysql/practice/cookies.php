<?php

  // SET THE COOKIE FOR 24 HOURS
  // setcookie("customerID", "1234", time() + 60 * 60 * 24);


  // DELETE THE COOKIE
  // setcookie("customerID", "", time() - 60 * 60);


  // UPUDATE THE COOKIE
  $_COOKIE["customerID"] = "test";

  echo $_COOKIE("customerId");


?>
