<?php

# including the connect.php file inside this user.php file
include "connect.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display User Details</title>
    
<!-- Bootstrap CSS Stylesheet Code-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">

<h1 class="mb-3 text-success">User Details:</h1>

<a href="user.php" class="btn btn-outline-primary btn-lg" style="margin-top: .5rem;">Add New User</a>
</div>
<div class="container my-2">
<table class="table table-danger">
  <thead>
    <tr class="table-success">
      <th scope="col">ID No.</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    # code to display the content in the website from the database
    $sqldisplayinfo = "select * from crudtable";
    $resultdisplay = mysqli_query($connectphp,$sqldisplayinfo);
    if ($resultdisplay) {
        # code...
        while ($rowtable = mysqli_fetch_assoc($resultdisplay)) {
            # code...
            #userID is the table column name
            $IDdisplay = $rowtable ['userID'];
            #userfirstname is the table column name
            $firstnamedisplay =  $rowtable ['userfirstname'];
            #userlastname is the table column name
            $lastnamedisplay =  $rowtable ['userlastname'];
            #useraddress is the table column name
            $addressdisplay = $rowtable ['useraddress'];
            #useremail is the table column name
            $emaildisplay = $rowtable ['useremail'];
            #userphone is the table column name
            $phonedisplay = $rowtable ['userphone'];
            #username is the table column name
            $usernamedisplay = $rowtable ['username'];
            #userpassword is the table column name
            $passworddisplay = $rowtable ['userpassword'];

            echo ('<tr class="table-warning">
            <th scope="row">'.$IDdisplay.'</th>
            <td>'.$firstnamedisplay.'</td>
            <td>'.$lastnamedisplay.'</td>
            <td>'.$addressdisplay.'</td>
            <td>'.$emaildisplay.'</td>
            <td>'.$phonedisplay.'</td>
            <td>'.$usernamedisplay.'</td>
            <td>'.$passworddisplay.'</td>
            <td>
            <a href="update.php?updateID='.$IDdisplay.'" class="btn btn-outline-dark" style="margin-top: .5rem;">Update</a>
            <a href="delete.php?deleteID='.$IDdisplay.'" class="btn btn-outline-danger" style="margin-top: .5rem;">Delete</a>
            </td>
          </tr>');

        
    }
}
    ?>
    <!-- <tr class="table-warning">
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr> -->


  </tbody>
</table>
</div>
    
</body>
</html>