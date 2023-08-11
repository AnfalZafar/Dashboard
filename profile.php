<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <script src="https://kit.fontawesome.com/0962378758.js" crossorigin="anonymous"></script>

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
        <div class="head">
    <img src="<?php echo $_SESSION["img"]?>" alt="">
    <h2><?php echo $_SESSION["name"]?></h2>
</div>

<div class="m_detail">
    <div class="name-email">
    <div class="name">
        <h3 for="name">Name</h3>
        <h1><?php echo $_SESSION["name"]?></h1>
    </div>
    <div class="email">
        <h3 for="name">Email</h3>
        <h1><?php echo $_SESSION["email"]?></h1>
    </div>

</div>


<div class="phone-address">
    <div class="name">
        <h3 for="name">Address</h3>
        <h1><?php echo $_SESSION["address"]?></h1>
    </div>
    <div class="email">
        <h3 for="name">Phone</h3>
        <h1><?php echo $_SESSION["address"]?></h1>
    </div>

</div>
<div class="btns">
    <a href=""><button>Edit Your Profile</button></a>
</div>



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
                <a href="Product.php">
                    <li class="side-li"><i class="fa-solid fa-envelope"></i><a class="side-a" href="Product.php">Product</a></li>
                </a>
                <a href="">
                    <li class="side-li"><i class="fa-solid fa-cart-shopping"></i><a class="side-a" href="">Sales</a>
                    </li>
                </a>
                <a href="">
                    <li class="side-li"><i class="fa-solid fa-bag-shopping"></i><a class="side-a" href="">Purchases</a>
                    </li>
                </a>
                <a href="">
                    <li class="side-li"><i class="fa-solid fa-gear"></i><a class="side-a" href="">Settings</a></li>
                </a>


            </ul>
        </div>

    </aside>






    <div class="profile">
        <div class="p-img">
            <img src="<?php echo $_SESSION["img"]?>" alt="">
            <div class="p-name">
                <h3><?php echo $_SESSION["name"]?></h3>
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
    </script>



</body>
</html>