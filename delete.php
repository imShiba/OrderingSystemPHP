<?php
    require('./filecall.php'); //connect to database.php

    if (isset($_POST['modalID'])){
        $delprod = $_POST['modalID']; 

        $queryDelete = "DELETE FROM products WHERE product_id='$delprod'"; //delete product
        $sqlDelete = mysqli_query($connection,$queryDelete); 

        echo header('Location: product.php'); //go to other location
    }
?>