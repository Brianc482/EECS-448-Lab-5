<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "bclark421", "aij4in3a", "bclark421");
if ($mysqli->connect_error) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$query = "SELECT * FROM Posts;";
$result = $mysqli->query($query);
if ($stmt = mysqli_prepare($mysqli, $query)) {
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      for ($i=0; $i < $number; $i++){
        $deleteBox = $_POST['checkbox'][$i];
        $sql = "DELETE FROM Posts WHERE post_id = '$i'";
        $result = $mysqli->query($sql);
      }
      mysqli_stmt_close($stmt);
    }
  $numDeleted = count($_POST["checkbox"]);
     echo "<h1>You deleted ". $numDeleted . " post(s)</h1>";
     echo "<table>";
     echo "<tr>";
     echo "<th>Post ID</th>";
     echo "<th>User</th>";
     echo "<th>Post</th>";
     echo "</tr>";
     $query2 = "SELECT * FROM Posts;";
     $result2 = $mysqli->query($query2);
     while ($row = $result2->fetch_assoc()) {
       $user = $row["author_id"];
       $p_id = $row["post_id"];
       $content = $row["content"];
       echo "<tr>";
       echo "<td>" . $p_id . "</td>";
       echo "<td>" .$user. "</td>";
       echo "<td>" . $content . "</td>";
       echo "</tr>";
     }
     echo "</table>";
   $mysqli->close();
 ?>
