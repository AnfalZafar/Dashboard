<?php

include("connection.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/welcome.css">
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
            <div class="main-box">
                <!-- box 1 -->
                <div class="box">
                    <div class="box-content">
                        <h1>540</h1>
                        <h3>Sales</h3>
                    </div>
                    <div class="box-icon">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                </div>

                <!-- box 2 -->
                <div class="box">
                    <div class="box-content">
                        <h1>100</h1>
                        <h3>Customers</h3>
                    </div>
                    <div class="box-icon">
                    <i class="fa-solid fa-people-group"></i>
                    </div>
                </div>

                <!-- box 3 -->
                <div class="box">
                    <div class="box-content">
                        <h1>$ 10050</h1>
                        <h3>Earns</h3>
                    </div>
                    <div class="box-icon">
                    <i class="fa-solid fa-dollar-sign"></i>
                    </div>
                </div>
            </div>
            <div class="main-detail">
                <div class="main-head">
                    <h1>Customers Details</h1>
                </div>

                <table class="table align-middle bg-white m-auto">
                    <thead class="bg-light">
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                $select = "SELECT * FROM `store_tables`";
                $run = mysqli_query($connect , $select);
                while( $fetch = mysqli_fetch_array($run)){
                    
                    if($fetch["corrector"] == "user"){  ?>
                                         
                <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo $fetch["img"] ?>" alt="" style="width: 45px; height: 45px"
                                        class="rounded-circle" />
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1"><?php echo $fetch["name"] ?></p>
                                        <p class="text-muted mb-0"><?php echo $fetch["email"] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1"><?php echo $fetch["location"] ?></p>
                            </td>
                            <td>
                                <span
                                    class="badge badge-success rounded-pill d-inline"><?php echo $fetch["phone"] ?></span>
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
    </script>

</body>

</html>