<?php
// Create connection
$conn = mysqli_connect("localhost", "root","","travel_db");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>