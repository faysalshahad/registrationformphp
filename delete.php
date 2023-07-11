<?php
include "connect.php";
# getting the deleteID from URL.
# this deleteID has been defined in display.php
if (isset($_GET['deleteID'])) {
    # code...
    # storing the deleteID value in a variable.
    $idtodelete = $_GET['deleteID'];

    # writing SQL query to perform the delete action from the sql database
    $sqltodelete = "delete from crudtable where userID=$idtodelete";
    #the $connectphp vairable has been declared in connect.php file 
    $resulttodelete = mysqli_query($connectphp,$sqltodelete);
    if ($resulttodelete) {
        # code...
       # echo '<script>alert("ID no $idtodelete has been deleted successfully from the database.")</script>';
        header ("location:display.php");
    } else {
        # code...
        echo ("There is an error to connect to the database. 
        Please check your internet, connection or codes.");
        die(mysqli_error());
           
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User Details</title>

    <!-- Bootstrap CSS Stylesheet Code-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- <br><br>
<a href="user.php" class="btn btn-outline-primary" style="margin-top: .5rem;">Add New User</a>
            <a href="display.php?deleteID='.$IDdisplay.'" class="btn btn-outline-danger" style="margin-top: .5rem;">User Details</a> -->

</body>
</html>