<?php
if (isset($_POST['search'])) {
    $id = $_POST['id'];
    $db = mysqli_connect("localhost", "root", '', "bus_booking") or die ("Failed to connect");
    $query = "select name,email,ph_number from customer where customer_id=$id";
    $result = mysqli_query($db, $query);
    if ($row = mysqli_fetch_array($result)) {

        $username = $row['name'];
        $email = $row['email'];
        $phone = $row['ph_number'];
        // header('Location: login.php');
    }
    mysqli_free_result($result);
    mysqli_close($db);



}
else {
    $username ='' ;
    $email='';
    $phone='' ;
}
if(isset($_POST['submit'])){
    $username = $_POST['name'];
    $id = $_POST['id'];
    $email=($_POST['email']);
    $phone=($_POST['ph_number']);
    $db = mysqli_connect("localhost", "root", '', "bus_booking") or die ("Failed to connect");
    $query = "update customer set name='$username',email='$email',ph_number='$phone' where customer_id=$id ";
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
    <title>Register</title>
</head>
<body>
<h1>Register</h1>
<form method="post" action="update.php">
    ID:<input type="text" name = "id"> <br><br>
    name:<input type="text" name="name" value="<?php echo $username;?>"><br><br>
    email:<input type="text" name="email" value="<?php echo $email;?>"><br><br>
    Phoneno:<input type="int" name="ph_number" value="<?php echo $phone?>"><br><br>
    <input type="submit" name="search" value="find">
    //<input type="submit" name="submit" value="submit">
</form>
</body>
</html>