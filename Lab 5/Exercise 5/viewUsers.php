<?php
  $mysqli = new mysqli("mysql.eecs.ku.edu", "bclark421", "aij4in3a", "bclark421");
  /* check connection */
  if($mysqli->connect_error){
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  $query = "SELECT user_id FROM Users;";
  $result = $mysqli->query($query);
  if($result->num_rows > 0){
    echo "<table>
    <tr>
    <th>Current usernames in the database:</th>
    </tr>";
    while($row = $result->fetch_assoc()){
      $user = $row["user_id"];
      echo "<tr>";
      echo "<td>".$user."</td>";
      echo "</tr>";
    }
    echo "</table>";
  }else{
    echo "There are currently no existing usernames to display";
  }
  /* close connection */
  $mysqli->close();
?>

