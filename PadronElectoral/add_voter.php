<?php

$host = "localhost"; 
$user = "root";
$password = "Felix1729!2020";
$dbname = "electoral";

$conn = new mysqli($host, $user, $password, $dbname);

$name = $_POST['name'];
$age = $_POST['age'];
$address = $_POST['address'];
$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));

$sql = "INSERT INTO voters (name, age, address, photo) VALUES ('$name', '$age', '$address', '$photo')";

if ($conn->query($sql) === TRUE) {
  header("Location: register.php");
  exit();
} else {
  echo "Error adding voter: " . $conn->error;
}
if ($conn->query($sql) === FALSE) {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

?>