<?php
/**
 * Created by PhpStorm.
 * User: G2
 * Date: 02-Oct-17
 * Time: 06:49 PM
 */

	session_start();
	if(isset($_POST['submit'])){
        $username = strip_tags($_POST['name']);
        $password = strip_tags($_POST['password']);
        $email=($_POST['email']);
        $phone=($_POST['phone']);
        $db = mysqli_connect("localhost", "root", '', "db") or die ("Failed to connect");
        $query = "INSERT INTO customer(name,password,email,phone_no) VALUES('$username', '$password','$email','$phone')";
        $result = mysqli_query($db,$query);
        if($result) {
            echo "Succesfully registered";
            header('Location: login.php');
        }
        else {
            echo "Failed to register";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
<h1>Register</h1>
<?php
echo "BECOME BUS OPERATOR"
?>

<form method="post" action="bussignup.php">
    <input type="submit" name="bus" value="bus">

</form>
<?php

echo "SIGNUP AS CUSTOMER";
?>

    <form method="post" action="signup.php">
            <input type="text" name = "name" placeholder="Enter username">
            <input type="password" name="password" placeholder="Enter password here">
            <input type="text" name="email" placeholder="Enter mail here">
            <input type="int" name=phone" placeholder="Enter ph no">

        <input type="submit" name="submit" value="Register">
            </form>

<?php
if (isset($_POST['bus'])){
    ?>
<a href = "bussignup.php" >Login</a>



           <?php }
           ?>


</body>
</html>