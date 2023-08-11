<?php

include("connection.php");
session_start();

if(isset($_POST["btns"])){

    $name = $_POST["wname"];
    $price = $_POST["wprice"];
    $img_type = $_FILES["wfil"]["type"];
    if(strtolower($img_type) == "image/jpg" || strtolower($img_type) == "image/jpeg" || strtolower($img_type) == "image/png" ){
      $img_name = $_FILES["wfil"]["name"];
    //   $target = "img/" .basename($img_name);
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
    <title>Product</title>
    <link rel="stylesheet" href="css/product.css">
    <script src="https://kit.fontawesome.com/0962378758.js" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
</head>

<body>
    <div class="main">
        <div class="nav">
            <ul class="nav-bar">
                <li class="nav-li2"><i class="fa-solid fa-bars"></i></li>

            </ul>
            <ul class="nav-ul">
                <li class="nav-img"><img src="<?php echo $_SESSION["img"]?>" alt=""></li>
            </ul>
        </div>

        <div class="main-content">
           
            <div class="main-detail">
                <div class="main-head">
                    <h1>Our Products</h1>
                </div>
                <div class="ja-btn">
        <button>Add Product</button>
    </div>
                <table class="table align-middle bg-white m-auto">
                    <thead class="bg-light">
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Rating</th>
                            <th>Update</th>
                            <th>Delete</th>

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
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo $data["img"]?>" alt=""
                                        style="width: 55px; height: 55px" class="rounded-circle" />
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1"><?php echo $data["name"]?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5 class="fw-normal mb-1"><?php echo $data["corrector"]?></h5>
                            </td>
                            <td>
                                <h6 class="">800</h6>
                            </td>
                            <td>
                                <a href="update.php?updateId=<?php echo $data["id"]?>">Update</a>
                            </td>
                            <td>
                            <a href="delete.php?deleteId=<?php echo $data["id"]?>">Delete</a>

                            </td>
</tr>
                       

<?php
}
}

?>
   
                    </tbody>
                </table>

            </div>
        </div>

    </div>

    <aside id="side">
        <div class="croos">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="logo">
            <i class="fa-brands fa-apple"></i>
            <h2>Dashboard</h2>
        </div>
        <div class="side-nav">
            <ul class="side-ul">
                <a href="welcome.php" style="text-decoration: none;color: white;">
                    <li class="side-li"><i class="fa-solid fa-display"></i><a class="side-a"
                            href="welcome.php">Dashboard</a></li>
                </a>
                <a href="product.php">
                    <li class="side-li"><i class="fa-solid fa-envelope"></i><a class="side-a" href="product.php">Product</a></li>
                </a>
                <a href="">
                    <li class="side-li"><i class="fa-solid fa-cart-shopping"></i><a class="side-a" href="">Sales</a>
                    </li>
                </a>
                <a href="">
                    <li class="side-li"><i class="fa-solid fa-bag-shopping"></i><a class="side-a" href="">Purchases</a>
                    </li>
                </a>
                <a href="costomers.html">
                    <li class="side-li"><i class="fa-solid fa-people-group"></i><a class="side-a"
                            href="costomers.html">Customers</a></li>
                </a>
                <a href="">
                    <li class="side-li"><i class="fa-solid fa-gear"></i><a class="side-a" href="">Settings</a></li>
                </a>


            </ul>
        </div>

    </aside>


    <div class="product-form">
        <div class="product-form-head">
            <h2>Add Product</h2>
        </div>
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
    </div>


    <div class="profile">
        <div class="p-img">
            <img src="<?php echo $_SESSION["img"]?>" alt="">
            <div class="p-name">
                <h5><?php echo $_SESSION["name"]?></h5>
                <span><?php echo $_SESSION["email"]?></span>
            </div>
        </div>
        <div class="p-content">
            <div class="p-profile">
                <i class="fa-solid fa-user"></i>
                <a href="profile.php"><button>My Profile</button></a>
            </div>
            <div class="p-logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                <button><a href="logout.php">Log Out</a></button>
            </div>
        </div>
    </div>

    <script>
    let bar_2 = document.querySelector(".nav-li2"),
        side_2 = document.querySelector("#side"),
        cross = document.querySelector(".croos");

    bar_2.addEventListener("click", () => {
        side_2.classList.add("show");
    })
    cross.addEventListener("click", () => {
        side_2.classList.remove("show");
    })


    let nav_img = document.querySelector(".nav-ul"),
        profile = document.querySelector(".profile");

    nav_img.addEventListener("click", () => {
        profile.classList.toggle("open");
    })

    let product_form = document.querySelector(".product-form"),
ja_btn = document.querySelector(".ja-btn");

ja_btn.addEventListener("click" , ()=>{
    product_form.classList.toggle("product_open");
})
    </script>

</body>

</html>