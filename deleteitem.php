<?php
    require('./filecall.php'); //connect to database.php

    if (isset($_POST['cartID'])){
        $delprod = $_POST['cartID']; 

        $queryDelete = "DELETE FROM cart WHERE cartid='$delprod'"; //delete cart item
        $sqlDelete = mysqli_query($connection,$queryDelete); 

        echo header('Location: cart.php'); //go to other location
    }
?>