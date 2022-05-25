<?php
    require('./filecall.php');

    $query = "SELECT * FROM cart";
    $sql = mysqli_query($connection,$query);
    $counter = 0;
    while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
        $cid = $row["cartid"]; $cprodid = $row["prod_id"]; $cqty = $row["qty"]; $ctotal = $row["total"];
        $salesdate = date("m/d/Y");

        //INSERT TO SALES TABLE
        $query2 = "INSERT INTO `sales`(`sales_id`, `product_id`, `quantity`, `total`, `date`) 
        VALUES ('',$cprodid,$cqty,$ctotal,'$salesdate')";
        $sql2 = mysqli_query($connection,$query2);

        //DELETE TO CART
        $queryDelete = "DELETE FROM cart WHERE cartid='$cid'"; //delete cart item
        $sqlDelete = mysqli_query($connection,$queryDelete); 
    }

    echo header('Location: index.php'); //go to other location
?>