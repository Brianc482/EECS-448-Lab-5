<?php
  $user= $_POST["user_name"];
  $mysqli = new mysqli("mysql.eecs.ku.edu", "bclark421", "aij4in3a", "bclark421");
  /* check connection */
  if ($mysqli->connect_error) {
      die("Connection failed: " . $mysqli->connect_error);
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  if (empty($user)){
    echo "No username entered. Please, try again. <br>";
  }
  else{
    echo "Enter a username to be known by: ".$user. "<br>";
    $query="INSERT INTO Users(user_id) VALUES ('$user');";

    if ($result = $mysqli->query($query)) {
      echo "The new username was record successfully";
    }
    else{
      echo "That username seems to already be in use. Please, select a new username.";
    }
  }
  /* close connection */
$mysqli->close();
 ?>
