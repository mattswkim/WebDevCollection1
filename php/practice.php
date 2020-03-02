<?php

echo "<h2>Variables</h2>";

$name = "Matt";

echo "<p>My name is $name</p>";

$string1 = "<p>This is the first part";
$string2 = "of a sentence</p>";

echo $string1." ".$string2;

$myNumber = 45;

$calculation = $myNumber = 31 / 97 + 4;

echo "The result of the calculation is ".$calculation;

$myBool = true;

echo "<p> This statement is true? ".$myBool."</p>";

$variableName = "name";

echo "<p>".$$variableName."</p>";

echo "<h2>Arrays</h2>";


$myArray = array("Rob","Kirsten","Tommy","Ralphie");

print_r($myArray);

echo "<br><br>";

$anotherArray[0] = "Pizza";
$anotherArray[1] = "yogurt";
$anotherArray["myFavouriteFood"] = "ice cream";

print_r($anotherArray);

echo "<br><br>";


$thirdArray = array(
  "France" => "French", 
  "USA" => "English", 
  "Germany" => "German");

unset($thirdArray["France"]);

print_r($thirdArray);

echo "<br><br>".sizeof($thirdArray)."<br><br>";

echo "<h2>If statements</h2>";

$user = "Bob";

if($user == "Matt") {

  echo "Hello $user";
  
} else {
  echo "I don't know you";
}
echo "<br><br>";

$age = 25;


if ($age >= 18) {

  echo "You may proceed";

} else {

  echo "You are too young, Sorry";
  
}

echo "<p>Printing all the even numbers from 2 to 30</p>";
for ($i = 2; $i < 31; $i++) {

  if($i % 2 == 0) {
    
    echo $i." | ";
  }
  
}

echo "<br><br>";

$family = array("Harley","Matt","Kate","Marcus");

for ($i = 0; $i < sizeof($family); $i++) {

echo $family[$i]." | ";
}


echo "<br><h2>While loop</h2>";

$i = 0;

  while ($i < sizeof($family)) {
    echo $family[$i]." | ";
    $i++;
  }
  echo "<br><h2>Get variables</h2>";

  if(is_numeric($_GET['number']) && $_GET['number'] > 0 && $_GET['number'] == round($_GET['number'],0)) {

    $i = 2;
    $isPrime = true;

    while($i < $_GET['number']) {

      if ($_GET['number'] % $i == 0) {
        
        // Number is not prime!
        $isPrime = false;

      } 
      
      $i++;

    }
    if ($isPrime) {
      
      echo "<p>".$i." is a prime number!</p>";

    } else {

      echo "<p>".$i." is not a prime number!</p>";
    }

  } else if($_GET) {

    // User has submitted something which is not a positive whole number

    echo "<p>Please enter a positive whole number</p>";
  }

  if($_POST) {
 
    $isKnown = false;
  foreach ($family as $value) {
    
    if($value == $_POST['name']) {

      $isKnown = true;

    }

  }

  if ($isKnown) {

    echo "Hi there, ".$_POST['name']."!";
    
  } else {

    echo "I don't know you! ";
  }
}

$emailTo = "euhnyung@gmail.com";
$subject = "Hi Honey!";
$body = "I love you my love!";
$headers = "From: Yourlove@mattsunwoongkim-com.stackstaging.com";

if(mail($emailTo,$subject,$body,$headers)) {
  echo "Email has been successfully sent";

}else {
  echo "Email could not be sent.";
}



?>

<p>Please enter a whole number</p>

<form>

  <input name="number" type="text">

  <input type="submit" value="Go!">

</form>
<br><br>


<p>Please enter your name</p>

<form method="post">

  <input name="number" type="text">

  <input type="submit" value="Go!">

</form>


