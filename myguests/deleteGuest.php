<?php

if(!isset($_POST['deleteGuest'])){
    header("Location: index.php");
    exit;
}

require_once("creds.php");

// sql to delete a record
$sql = "DELETE FROM MyGuests WHERE id={$_POST['id']}";

// echo $sql;die;


if (mysqli_query($conn, $sql)) {
  header("Location: index.php");
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>