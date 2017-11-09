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
                $querylogin = "INSERT INTO login(email,password,role) VALUES('$email','$password','customer')";

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
<html>

<title>Demo|Lisenme</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css.css">
<link type="text/css" rel="stylesheet" href="style.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="jquery.min.js"></script>

<style>

    h1,h2,h3,h4,h5,h6 {font-family: "Oswald"}
    body {font-family: "Open Sans"}


    .select-boxes{width: 280px;text-align: center;}
    select {
        background-color: #F5F5F5;
        border: 1px double #15a6c7;
        color: #1d93d1;
        font-family: Georgia;
        font-weight: bold;
        font-size: 14px;
        height: 39px;
        padding: 7px 8px;
        width: 250px;
        outline: none;
        margin: 10px 0 10px 0;
    }
    select option{
        font-family: Georgia;
        font-size: 14px;}
    /*h6{
        font-size: 14px;
        height: 39px;
        width: 250px;

        }*/
    input{
        font-family: Georgia;
        font-weight: bold;
        font-size: 14px;
        height: 39px;
        padding: 7px 8px;
        width: 350px;
        outline: none;
        margin: 10px 0 10px 0;}

    button{
        font-family: Georgia;
        font-weight: bold;
        font-size: 10px;
        height: 30px;
        padding: 7px 8px;
        width: 100px;
        outline: none;
        margin: 10px 0 10px 0;}
</style>
<body class="w3-blue">

<!-- Navigation bar with social media icons -->
<div class="w3-bar w3-black w3-hide-small" style="height:5%">
    <a href="booking.php" class="w3-bar-item w3-button" ><i class="fa fa-home"></i></a>
    <a href="https://twitter.com/LisenMee" class="w3-bar-item w3-button"><i class="fa fa-book"></i></a>
    <a href="https://www.youtube.com/channel/UCEdC6Qk_DZ9fX_gUYFJ1tsA" class="w3-bar-item w3-button"><i class="fa fa-search"></i></a>
    <a href="https://plus.google.com/115714479889692934329" class="w3-bar-item w3-button"><i class="fa fa-phone"></i></a>
    <!--<a href="https://www.linkedin.com/in/lisen-me-b017a8137/" class="w3-bar-item w3-button"><i class="fa fa-linkedin"></i></a>-->
</div>
<div class="w3-content" style="max-width:1600px">

    <!-- Header -->
    <header class="w3-container w3-center w3-padding-48 w3-white">
        <h1 class="w3-xxxlarge"><a href="http://www.lisenme.com/"><img src="img/logon.jpg" alt="Girl Hat" style="width:20%" class="w3-padding-16"></a></h1>
        <h6>Welcome to  <span class="w3-tag">BusOn</span></h6>


    </header>


    <!-- Image header -->


    <!-- Grid -->
    <div class="w3-row w3-padding w3-border">

        <!-- Blog entries -->
        <div class="w3-col l12 s12">

            <!-- Blog entry -->
            <div class="w3-container w3-white w3-margin w3-padding-large">

                <h2 style="text-align: center";>Select Your Seat Preference</h2>
                <br>
                <div class="select-boxes">
                </div>
            </div>
            <h1>Register</h1>
            <?php
            echo "BECOME BUS OPERATOR"
            ?>

            <form method="post" action="bussignup.php">
                <input type="submit" name="bus" value="BUS OPERATOR">

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
    <script type="text/javascript">

        <!--


        function checkPasswordMatch() {
            var password = $("#txtNewPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();

            if (password != confirmPassword)
                $("#divCheckPasswordMatch").html("Passwords do not match!");
            else
                $("#divCheckPasswordMatch").html("Passwords match.");
        }
        //--></script>
    <form method="post" action="signup.php">
        <label><b>Name  </b></label>
        <div class="td">
            <input type="text" name = "name" placeholder="Enter username">
        </div>
        <label><b>Email  </b></label>
        <div class="td">
            <input type="text" name="email" placeholder="Enter mail here">
        </div>
        <label><b>Phone Number  </b></label>

        <div class ='td'>
            <input type="int" name=phone" placeholder="Enter ph no">
        </div>
        <label><b>Password  </b></label>

        <div class='td'></div>
        <input type="password" name="password" placeholder="Password" id="txtNewPassword" />
        </div>
        <label><b>Confirm Password </b></label>

        <div class="td">
            <input type="password" name="cpassword" placeholder="Confirm Password" id="txtConfirmPassword" onkeyup="checkPasswordMatch();" />
        </div>
        <div class="registrationFormAlert" id="divCheckPasswordMatch">
        </div>

        <input type="submit" name="submit" value="Register">
    </form>
