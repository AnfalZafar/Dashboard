<?php

include("connection.php");
session_start();
if(isset($_POST["signup"])){

$email = $_POST["semail"];
$pass = $_POST["spass"];
$select = "SELECT * FROM `store_tables` WHERE email = '$email' and Pass = '$pass'";
$run = mysqli_query($connect , $select);
$num_row = mysqli_num_rows($run);
$fetch = mysqli_fetch_array($run);
if($num_row != 0){
    $_SESSION["email"] = $fetch["email"];
    $_SESSION["name"] = $fetch["name"];
    $_SESSION["img"] = $fetch["img"];
    $_SESSION["address"] = $fetch["location"];
    $_SESSION["phone"] = $fetch["phone"];
    if($fetch["corrector"] == "admin"){
    header("location:welcome.php");       
    }elseif($fetch["corrector"] == "user"){
        header("location:web.php");
    }else{
        echo("Error");
    }
}

}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    



<form method="post" enctype="multipart/form-data" >
<div class="text">
    <h1>Sign UP</h1>
</div>

<div class="name">
<label for="text">Email</label>
    <input type="text" placeholder="Enter Email" name="semail">
</div>
<div class="pass">
<label for="text">Password</label>
    <input type="password" placeholder="Enter Password" name="spass">
</div>

<div class="btn">
    <button type="submit" name="signup">Sign In</button>
</div>


</form>









</body>
</html>