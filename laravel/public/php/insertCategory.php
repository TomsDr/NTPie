<?php
$con=mysqli_connect("localhost","root","","ntpie");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$category_name = mysqli_real_escape_string($con, $_POST['name']);


$sql="INSERT INTO category (name)
VALUES ('$category_name')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "Category added";

mysqli_close($con);
?> 