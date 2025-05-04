<?php
$conn = new mysqli("localhost", "root", "", "gaming_store");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
