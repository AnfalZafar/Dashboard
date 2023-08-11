<?php

include("connection.php");
$get = $_GET["deleteId"];
$delete = "DELETE FROM `store_tables` WHERE `store_tables`.`id` = $get";
$run = mysqli_query($connect , $delete);
if($run){
    echo("Done");
    header("location:product.php");
}
?>