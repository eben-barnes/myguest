<?php

// echo $_POST['addGuest'];die;

if (!isset($_POST['addGuest'])){
    header("Location: index.php");
    exit;
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



echo $_POST['firstname'] . " " . $_POST['lastname'] . " " . $_POST['email'];

include("creds.php");

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('$firstname','$lastname','$email')";


if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
  header("Location:index.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


?>
