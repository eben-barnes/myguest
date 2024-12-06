<?php

if (!isset($_POST['editGuest'])){
    header("Location: index.php");
    exit;
}

require_once("creds.php");

// echo $_POST['firstname']. " " . $_POST['lastname']. " " . $_POST['email']. " " . $_POST['id'];
// die;

$sql = "UPDATE MyGuests SET lastname='{$_POST['lastname']}', firstname= '{$_POST['firstname']}', email= '{$_POST['email']}' WHERE id={$_POST['id']}";

// echo $sql;die;

if (mysqli_query($conn, $sql)) {
  header("Location: index.php");
  exit;
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>