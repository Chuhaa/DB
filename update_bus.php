<?php
session_start();
$email= $_SESSION['email'];

$db = mysqli_connect("localhost", "root", '', "bus_booking") or die ("Failed to connect");
$query = "select name,ph_number,email from bus_operator where email='$email'";
$result = mysqli_query($db, $query);
if ($row = mysqli_fetch_array($result)) {

    $username = $row['name'];
    $phone = $row['ph_number'];

}
mysqli_free_result($result);
mysqli_close($db);

if(isset($_POST['update'])&& (!(empty($_POST['name'])))){
    //echo $email;
    $username = $_POST['name'];
    echo $username;
    //$id = $_POST['id'];
    //$email=($_POST['email']);
    $phone=($_POST['ph_number']);

    $db = mysqli_connect("localhost", "root", '', "bus_booking") or die ("Failed to connect");
    $query1 = "update bus_operator set name='$username',ph_number='$phone' where email='$email'";
    $result1 = mysqli_query($db,$query1);
    if($result1) {
        //echo $email;
        //echo "Succesfully updated";
        //header('Location: login.php');
    }
    else {
        echo "Failed to update";
    }
}



?>
<!DOCTYPE html>
<html>
<head>
    <title>Your details</title>
</head>
<body>
<h1>Your Details</h1>
<form method="post" action="update_bus.php">

    name:<input type="text" name="name" value="<?php echo $username;?>"><br><br>
    email:<input type="text" name="email" value="<?php echo $email;?>"readonly><br><br>
    Phoneno:<input type="int" name="ph_number" value="<?php echo $phone?>"><br><br>

    <input type="submit" name="update" value="Update">

</form><br>
<form action="busoperator.php">
    <input type="submit" name="back" value="Back">
</form>
<form action="busoperator.php">
    <input type="submit" name="back" value="Back">
</form>

</body>
</html>