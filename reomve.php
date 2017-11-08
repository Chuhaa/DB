<!DOCTYPE html>
<html>
<head>
    <title>Remove</title>
</head>
<body>
<h1>Confirm Removal</h1>
<form method="post" action="">

    Enter Password:<input type="password" name="paw" >
    <input type="submit" name="remove" value="Remove">
</form>
<form method="post" action="busoperator.php">
    <input type="submit" name="back" value="Back">
</form>
<?php
session_start();
$role= $_SESSION['role'];
$email= $_SESSION['email'];
if(isset($_POST['remove'])&& (!(empty($_POST['paw'])))) {
    $password = ($_POST['paw']);

    $db = mysqli_connect("localhost", "root", '', "bus_booking") or die ("Failed to connect");
    $query = "select password from login where email='$email'";
    $result = mysqli_query($db, $query);
    if ($row = mysqli_fetch_array($result)) {
        $password1 = $row['password'];

    }
    mysqli_free_result($result);
    mysqli_close($db);

    if ($password===$password1){

        $db = mysqli_connect("localhost", "root", '', "bus_booking") or die ("Failed to connect");
        $query1 = "update login set status='deactive' where email='$email'";
        $result1 = mysqli_query($db,$query1);
        if($result1) {
            //echo $email;
            echo "Succesfully removed";
            //header('Location: login.php');
        }

    }
    else{
        echo "Your password is incorrect";
    }
}
?>
