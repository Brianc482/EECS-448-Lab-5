<?php
$user= $_POST["u_name"];
$myPost=$_POST["post1"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "bclark421", "aij4in3a", "bclark421");
 #check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
  if (empty($user) || empty($myPost))
  {
    echo "Username or Post not entered. Please, try again. <br>";
  }
  else {
    echo "Username: ".$user. "<br>";
    echo "Post: ".$myPost. "<br>";
    $query="INSERT INTO Posts(content, author_id) VALUES ('$myPost', (SELECT user_id FROM Users WHERE user_id = '$user'));";
      if ($result = $mysqli->query($query)) {
      echo "New Record created successfully";
      /* free result set */
      $result->free();
      }
      else{
        echo "Username not found. Please try again";
      }
    }
  /* close connection */
$mysqli->close();
 ?>
