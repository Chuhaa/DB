<?php
/**
 * Created by PhpStorm.
 * User: G2
 * Date: 02-Oct-17
 * Time: 06:49 PM
 */

	session_start();
	if(isset($_POST['submit'])) {
        if (($_POST['password']) != $_POST['cpassword']) {
            echo "password do not match";
        }
        else{
            $db = mysqli_connect("localhost", "root", '', "bus_booking") or die ("Failed to connect");
            $email = ($_POST['email']);
            $sql1 = "SELECT * FROM login WHERE email = '$email'";
            $result1 = mysqli_query($db, $sql1) or die(mysqli_error());
            $username = strip_tags($_POST['name']);
            if (mysqli_num_rows($result1) > 0) {
                echo "Provided Email is already in use";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo("$email is not a valid email address");
            } else {
                $password = md5(strip_tags($_POST['password']));
                if (empty($password)) {
                    echo "Please enter password.";
                } elseif (strlen(strip_tags($_POST['password'])) < 6) {
                    echo "Too small password";
                } else {
                    $phone = ($_POST['phone']);

                    $db = mysqli_connect("localhost", "root", '', "bus_booking") or die ("Failed to connect");
                    $query = "INSERT INTO customer(name,email,ph_number) VALUES('$username','$email','$phone')";
                    $querylogin = "INSERT INTO login(email,password,role,status) VALUES('$email','$password','customer','active')";

                    $result = mysqli_query($db, $query);
                    $resultlogin = mysqli_query($db, $querylogin);

                    if ($resultlogin and $result) {
                        echo "Succesfully registered";
                        header('Location: login.php');
                    } else {
                        echo "Failed to register";
                    }
                }
            }
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




<?php
if (isset($_POST['bus'])){
    ?>
<a href = "bussignup.php" >Login</a>

<?php }
?>

</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head><title></title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript"><!--
        function checkPasswordMatch() {
            var password = $("#txtNewPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();

            if (password != confirmPassword)
                $("#divCheckPasswordMatch").html("Passwords do not match!");
            else
                $("#divCheckPasswordMatch").html("Passwords match.");
        }
        //--></script>
</head>
<body>
<form method="post" action="signup.php">
<div class="td">
<input type="text" name = "name" placeholder="Enter username">
</div>
<div class="td">
    <input type="text" name="email" placeholder="Enter mail here">
</div>
<div>
    <input type="int" name=phone" placeholder="Enter ph no">
</div>
<div class="td">
    <input type="password" name="password" placeholder="Password" id="txtNewPassword" />
</div>
<div class="td">
    <input type="password" name="cpassword" placeholder="Confirm Password" id="txtConfirmPassword" onkeyup="checkPasswordMatch();" />
</div>
<div class="registrationFormAlert" id="divCheckPasswordMatch">
</div>

    <input type="submit" name="submit" value="Register">
</form>


</body>
</html>