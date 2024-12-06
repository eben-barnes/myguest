<?php

include("creds.php");

$sql = "SELECT id, firstname, lastname, email, registration_date FROM MyGuests";
$result = mysqli_query($conn, $sql);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Guests</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>My Guests</h1>
                <?php
                    if(!isset($_POST['editGuest'])){
                        ?>

<form method="POST" action="addGuest.php">
<div class="mb-3">
<label class="form-label">First Name</label>
<input type="text" name="firstname" class="form-control">
</div>
<div class="mb-3">
<label class="form-label">Last Name</label>
<input type="text" name="lastname" class="form-control">
</div>
<div class="mb-3">
<label class="form-label">Email address</label>
<input type="email" name="email" class="form-control">
</div>
<button name="addGuest" type="submit" class="btn btn-primary">Add Guest</button>
</form>

                <?php
                    } else {
                ?>
<form method="POST" action="editGuest.php">
<input type="hidden" name="id" value="<?= $_POST['id'] ?>">
<div class="mb-3">
<label class="form-label">First Name</label>
<input type="text" name="firstname" class="form-control" value="<?= $_POST['firstname'] ?>">
</div>
<div class="mb-3">
<label class="form-label">Last Name</label>
<input type="text" name="lastname" class="form-control" value="<?= $_POST['lastname'] ?>">
</div>
<div class="mb-3">
<label class="form-label">Email address</label>
<input type="email" name="email" class="form-control" value="<?= $_POST['email'] ?>">
</div>
<button name="editGuest" type="submit" class="btn btn-info">Edit Guest</button>
</form>
                <?php        
                    }
                ?>
                <?php
                // MARK: Add Guest
                ?>
            <br><br><br>

<table class="table table-hover table-striped table-border">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email Address</th>
        <th>Registration Date</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>

    <?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['firstname'] ?></td>
    <td><?= $row['lastname'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['registration_date'] ?></td>
    <td>
        <form action="deleteGuest.php" method="POST">
            <input type="hidden" name="id" value="<?= $row['id']?>">
            <button name="deleteGuest" type="submit" class="btn btn-danger"><i class="fa-solid fa-trash fa-rotate-by delete" style="--fa-rotate-angle: 135deg;"></i></i></i></button>
        </form>
    </td>
     <td>
        <form action="index.php" method="POST">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="firstname" value="<?= $row['firstname'] ?>">
            <input type="hidden" name="lastname" value="<?= $row['lastname'] ?>">
            <input type="hidden" name="email" value="<?= $row['email'] ?>">
            <button type="submit" name="editGuest" class="btn btn-info"><i class="fa-solid fa-pencil edit"></i></button>
        </form>
    </td>
</tr>
    


    <?php
    }
  } else {
    echo "0 results";
  }
    ?>
</table>




            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>