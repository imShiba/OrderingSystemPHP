<?php
    require('./filecall.php'); //connect to database.php

    $queryDelete = "DELETE FROM cart"; //delete cart item
    $sqlDelete = mysqli_query($connection,$queryDelete); 

    echo header('Location: index.php'); //go to other location
?>