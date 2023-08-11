<?php
include("connection.php");

if(isset($_POST["sigin"])){
    $name = $_POST["sname"];
    $email = $_POST["semail"];
    $phone = $_POST["sphone"];
    $pass = $_POST["spass"];
    $location = $_POST["slocation"];
    $corrector = $_POST["corrector"];
    $img_type = $_FILES["fil"]["type"];
    if(strtolower($img_type) == "image/png" || strtolower($img_type) == "image/jpg" || strtolower($img_type) == "image/jpeg"){
        $img_name = $_FILES["fil"]["name"];
        // $target = "img/" .basename ($img_name);
        if(move_uploaded_file($_FILES["fil"]["tmp_name"] , $img_name)){
            $insert = "INSERT INTO `store_tables`(`name`, `email`, `phone`, `Pass`, `location`, `img` , `corrector`) VALUES ('$name','$email','$phone','$pass','$location','$img_name','$corrector')";
            $run = mysqli_query($connect , $insert);
           if($run){
            header("location:signup.php");
           }
            }
        }
        
 

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="css/signin.css">
</head>
<body>
    



<form method="post" enctype="multipart/form-data" >
<div class="text">
    <h1>Sign In</h1>
</div>
<div class="name">
    <label for="text" >Name</label>
    <input type="text" placeholder="Enter Name" name="sname">
</div>
<div class="name">
    <label for="text" >Corrector</label>
    <select name="corrector" id="">
        <option value="admin">Admin</option>
        <option value="user">User</option>

    </select>
</div>
<div class="name">
<label for="text">Email</label>
    <input type="text" placeholder="Enter Email" name="semail">
</div>
<div class="phone">
<label for="text">Phone</label>
    <input type="text" placeholder="Enter Phone" name="sphone">
</div>

<div class="pass">
<label for="text">Password</label>
    <input type="password" placeholder="Enter Password" name="spass">
</div>

<div class="loca">
<label for="text">Location</label>
    <input type="text" placeholder="Enter Location" name="slocation">
</div>

<div class="fill">
<label for="text">Choose Your Img</label>
    <input type="file" placeholder="Enter Phone" name="fil">
</div>
<div class="btn">
    <button type="submit" name="sigin">Sign In</button>
</div>


</form>









</body>
</html>