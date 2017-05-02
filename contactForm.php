<html>
    <head>
      <meta charset="UTF-8" />
        <title>contactForm</title>
    </head>
    <body>
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$nameError = $emailError = $messageError = "";
$name = $email = $message = "";

    //to check the name
    if (empty($_POST["Name"]))
    {
      $nameError = "A name is required";
    }
    else
    {
      $name = contactForm($_POST["Name"]);
        if (preg_match("/[^A-Za-z]/", $name))
        {
          $nameError = "Only letters and white space allowed";
          $name = "";
        }
        elseif (strlen($name) > 20)
        {
          $nameError = "No more than 20 characters";
          $name = "";
        }
      }
    //to check the email address
    if (empty($_POST["Email"]))
    {
      $emailError = "Email is required";
    }
    else
    {
      $email = contactForm($_POST["Email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL))
      {
        $emailError = "Invalid email format";
        $email = "";
      }
    }

    //to gather the message
    if (empty($_POST["Message"]))
    {
      $message = "";
    }
    else
    {
      $message = contactForm($_POST["Message"]);
      if  (strlen($message) > 50)
      {
        $messageError = "No more than 50 characters";
        $message = "";
      }
    }

  //My function
  function contactForm($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

<?php
  echo "<h2>Your Input is:</h2>";
  echo strtolower ($name); echo $nameError;
  echo "<br>";
  echo $email; echo $emailError;
  echo "<br>";
  echo strtolower ($message); echo $messageError;
?>

    </body>

</html>
