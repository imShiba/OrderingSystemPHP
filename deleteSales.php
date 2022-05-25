<?php
    require('./filecall.php'); //connect to database.php

    if (isset($_POST['modalID'])){
        $delprod = $_POST['modalID']; 

        $queryDelete = "DELETE FROM sales WHERE sales_id='$delprod'"; //delete sales
        $sqlDelete = mysqli_query($connection,$queryDelete); 

        echo header('Location: sales.php'); //go to other location
    }
?>