<!DOCTYPE html>
<html>
<head>
    <title>Remove</title>
</head>
<body>
<h1>Confirm Removal</h1>
<form method="post" action="">

    Enter Old Password:<input type="password" name="paw0" >
    Enter New Password:<input type="password" name="paw1" >
    Confirm Password:<input type="password" name="paw2" >
    <input type="submit" name="change" value="Change">
</form>
<form method="post" action="busoperator.php">
    <input type="submit" name="back" value="Back">
</form>
<?php
session_start();
//$role= $_SESSION['role'];
$email= $_SESSION['email'];
if(isset($_POST['change'])&& (!(empty($_POST['paw0'])))) {
    $passwordold = ($_POST['paw0']);
    $passwordnew = ($_POST['paw1']);
    $passwordcon = ($_POST['paw2']);
    if ($passwordnew===$passwordcon) {
        $db = mysqli_connect("localhost", "root", '', "bus_booking") or die ("Failed to connect");
        $query = "select password from login where email='$email'";
        $result = mysqli_query($db, $query);
        if ($row = mysqli_fetch_array($result)) {
            $password1 = $row['password'];

        }
        mysqli_free_result($result);
        mysqli_close($db);

        if ($passwordold === $password1) {

            $db = mysqli_connect("localhost", "root", '', "bus_booking") or die ("Failed to connect");
            $query1 = "update login set password='$passwordcon' where email='$email'";
            $result1 = mysqli_query($db, $query1);
            if ($result1) {
                //echo $email;
                echo "Succesfully changed";
                //header('Location: login.php');
            }

        } else {
            echo "Your password is incorrect";
        }
    }
    else{
        echo "Passwords not matching";
    }
}
?>
