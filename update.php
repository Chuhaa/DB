<?php
session_start();
$email= $_SESSION['email'];
//if (isset($_POST['search'])) {
    //$id = $_POST['id'];
    //echo $email;
    $db = mysqli_connect("localhost", "root", '', "bus_booking") or die ("Failed to connect");
    $query = "select name,ph_number from customer where email='$email'";
    $result = mysqli_query($db, $query);
    if ($row = mysqli_fetch_array($result)) {

        $username = $row['name'];
        //$email = $row['email'];
        $phone = $row['ph_number'];
        //echo $username;
        // header('Location: login.php');
    }
    mysqli_free_result($result);
    mysqli_close($db);



//}
//else {
    //$username ='' ;
    //$email='';
    //$phone='' ;
//}
if(isset($_POST['submit'])){
    $username = $_POST['name'];
    //$id = $_POST['id'];
    //$email=($_POST['email']);
    $phone=($_POST['ph_number']);

    $db = mysqli_connect("localhost", "root", '', "bus_booking") or die ("Failed to connect");
    $query = "update customer set name='$username',ph_number='$phone' where email='$email '";
    $result = mysqli_query($db,$query);
    if($result) {
        echo "Succesfully updated";
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
<form method="post" action="update.php">
    
    name:<input type="text" name="name" value="<?php echo $username;?>"><br><br>
    email:<input type="text" name="email" value="<?php echo $email;?>"readonly><br><br>
    Phoneno:<input type="int" name="ph_number" value="<?php echo $phone?>"><br><br>

    <input type="submit" name="submit" value="submit">
</form>
</body>
</html>