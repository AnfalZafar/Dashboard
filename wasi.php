<?php
include("connection.php");

if(isset($_POST["btns"])){

$name = $_POST["wname"];
$price = $_POST["wprice"];
$img_type = $_FILES["wfil"]["type"];
if(strtolower($img_type) == "image/jpg" || strtolower($img_type) == "image/jpeg" || strtolower($img_type) == "image/png" ){
  $img_name = $_FILES["wfil"]["name"];
  $target = "img/" .basename($img_name);
  if(move_uploaded_file($_FILES["wfil"]["tmp_name"] , $img_name)){
    $insert = "INSERT INTO `store_tables`( `name`, `img`, `corrector`) VALUES ('$name' , '$img_name','$price')";
    $run = mysqli_query($connect , $insert);
    if($run){
        echo("Done");
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
    <title>Practice</title>
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
  rel="stylesheet"
/>
</head>
<body>
    
<form method="post" enctype="multipart/form-data">

<input type="text" name="wname" placeholder="Enter Name">;
<input type="text" name="wprice" placeholder="Enter price">;
<input type="file" name="wfil" placeholder="Enter file">;

<button type="submit" name="btns">Submit</button>

</form>



<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Img</th>
    </tr>
  </thead>
  <tbody>
<?php
$select = "SELECT * FROM `store_tables`";
$got = mysqli_query($connect , $select);
while($data = mysqli_fetch_array($got)){
    if($data["corrector"] == "admin"){
    }elseif($data["corrector"] == "user"){

    }else{
    
    ?>
 <tr>
      <td><?php echo $data["name"] ?></td>
      <td><?php echo $data["corrector"] ?></td>
      <td><img width="50px" height="50px" src="<?php echo $data["img"]?>" alt=""></td>
    </tr>
<?php
}
}

?>
   
   
  </tbody>
</table>


<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"
></script>
</body>
</html>