<?php

$conn=mysqli_connect("localhost", "root", "", "himanidb") or die("Connect failed: %s\n". $conn -> error);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
