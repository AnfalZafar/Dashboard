<?php

include("connection.php");
$full = $_GET["updateId"];
$select = "SELECT * FROM `store_tables` WHERE `store_tables`.`id` = $full";
$runs = mysqli_query($connect , $select);
$fetch = mysqli_fetch_array($runs);

if(isset($_POST["btns"])){
    $name = $_POST["wname"];
    $price = $_POST["wprice"];
    $image_type = $_FILES["wfil"]["type"];

    if(strtolower($image_type == "image/png") ||strtolower($image_type =="image/jpeg") ||strtolower($image_type == "image/jpg" )){
      
$image_name = $_FILES["wfil"]["name"];
// $target = "img/" .basename ($image_name);
if(move_uploaded_file($_FILES["wfil"]["tmp_name"] , $image_name)){
    $update = "UPDATE `store_tables` SET `id`='[value-1]',`name`='$name'',`img`='$image_name',`corrector`='$price' WHERE ``.`id` = $full";
    $runn = mysqli_query($connect , $update);
    if($runn){
        echo("Done");
        header("location:product.php");
    }else{
        echo("Not Done");
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
    <title>Update</title>
</head>
<body>
    
<form method="post" enctype="multipart/form-data">
    
    <div class="name">
        <input type="text" name="wname" placeholder="Enter Product Name">
    </div>
    <div class="name">
        <input type="text" name="wprice" placeholder="Enter Product Price">
    </div>
    <div class="file">
        <input type="file" name="wfil" placeholder="Enter Product Name">
    </div>
    <div class="btn">
        <button type="submit" name="btns">Add</button>
    </div>
    
        </form>


</body>
</html>