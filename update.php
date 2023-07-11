<?php

# including the connect.php file inside this user.php file
include "connect.php";

$idtoupdate = $_GET['updateID'];

$sqldisplayinfo = "select * from crudtable where userID = $idtoupdate";
$resultdisplay = mysqli_query($connectphp,$sqldisplayinfo);
$rowtable = mysqli_fetch_assoc($resultdisplay);

#$IDdisplay = $rowtable ['userID'];
#userfirstname is the column name is sql database
$firstnamedisplay =  $rowtable ['userfirstname'];
#userlastname is the column name is sql database
$lastnamedisplay =  $rowtable ['userlastname'];
#useraddress is the column name is sql database
$addressdisplay = $rowtable ['useraddress'];
#useremail is the column name is sql database
$emaildisplay = $rowtable ['useremail'];
#userphone is the column name is sql database
$phonedisplay = $rowtable ['userphone'];
#username is the column name is sql database
$usernamedisplay = $rowtable ['username'];
#userpassword is the column name is sql database
$passworddisplay = $rowtable ['userpassword'];
#confirmuserpassword is the column name is sql database
$confirmpassworddisplay = $rowtable ['confirmuserpassword'];

if (isset($_POST['updatebutton'])) {
    # code.. creating variables to capture user input.
    $getfirstname = $_POST['firstnameinput'];
    $getlastname = $_POST['lastnameinput'];
    $getaddress = $_POST['addressinput'];
    $getusername = $_POST['usernameinput'];
    $getemail = $_POST['useremailinput'];
    $getphone = $_POST['userphoneinput'];    
    $getpassword = $_POST['userpasswordinput'];
    $getconfirmpassword = $_POST['confirmuserpasswordinput'];

    # checking the passwords whether they are matching with each other or not.
    if  ($getpassword === $getconfirmpassword ) {
    # sql query to insert the user input inside the database in table named crudtable

    $sqlupdateinfo = "update crudtable set userID = $idtoupdate,
    userfirstname = '$getfirstname' , userlastname = '$getlastname', useraddress = '$getaddress', 
    username = '$getusername', useremail = '$getemail', userphone = $getphone, 
    userpassword = '$getpassword', confirmuserpassword = '$getconfirmpassword' 
    where userID = $idtoupdate";

    # $connectphp is the variable which has been created inside the coonect.php file
    # this mysqli_query takes two arguments. first one is $con to connect to the database
    #second one is the $sqlinsertdataintotable query variable to insert the data from the database. 
    $resulttoupdate = mysqli_query($connectphp, $sqlupdateinfo);

    
        if ($resulttoupdate) {
                   
        # code...
        #echo '<script>alert("Data has been inserted in table named crudtable successfully")</script>';

        header("location:display.php");
        } else {
            # code...
        echo ("There is an error to connect to the database. 
        Please check your internet, connection or codes.");
        die(mysqli_error());
           
        }

    } else {
         # code...
         echo '<script>alert("Please Fill out the form again carefully as the passwords did not match with each other.")</script>';
        
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation</title>
<!-- Bootstrap CSS Stylesheet Code-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>



<div class="container my-5"> <!--Container Div Start -->

<h1 class="mb-3 text-success">Update User Details:</h1>
  <form method="post">

  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">First Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="firstnameinput" value=<?php echo $firstnamedisplay; ?> required>
    </div>
  </div>

  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Last Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="lastnameinput" value=<?php echo $lastnamedisplay; ?> required>
    </div>
  </div>

  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Address:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="addressinput" value=<?php echo $addressdisplay; ?> required>
    </div>
  </div>


  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="useremailinput" value=<?php echo $emaildisplay; ?> required>
    </div>
  </div>

  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Phone:</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="userphoneinput" min="0" value=<?php echo $phonedisplay; ?> required>
    </div>
  </div>

    <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Username:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="usernameinput" value=<?php echo $usernamedisplay; ?> required>
    </div>
  </div>


  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="userpasswordinput" value=<?php echo $passworddisplay; ?> required>
    </div>
  </div>


  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Confirm Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="confirmuserpasswordinput" value=<?php echo $confirmpassworddisplay; ?> required>
    </div>
  </div>

  
  <button type="submit" class="btn btn-outline-success btn-lg"  style="margin-top: .5rem;" name="updatebutton">Update</button>
  <a href="user.php" class="btn btn-outline-danger btn-lg" style="margin-top: .5rem;">Cancel</a>
  <a href="display.php" class="btn btn-outline-dark btn-lg" style="margin-top: .5rem;">User Details</a>
</form>

</div> <!--Container Div End -->
    
</body>
</html>