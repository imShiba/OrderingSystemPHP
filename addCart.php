<?php
    require('./filecall.php'); //connect to database.php

    if (isset($_POST['modalID'])){
        $id = $_POST['modalID'];
        $qty = $_POST['qty'];
        $total = $_POST['totalprice'];
        $queryUpdate = "INSERT INTO `cart`(`cartid`, `prod_id`, `qty`, `total`) VALUES ('',$id,$qty,$total)";

        $sqlUpdate = mysqli_query($connection,$queryUpdate); 

        echo header('Location: index.php'); //go to other location
    }
?>

