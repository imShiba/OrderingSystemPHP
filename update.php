<?php
    require('./filecall.php'); //connect to database.php

    if (isset($_POST['product-id'])){
        $id = $_POST['product-id'];
        $imgpath = $_FILES['prodProfile'];
        $name = ucfirst($_POST['product-name']);
        $category = ucfirst($_POST['category']);
        $price = $_POST['price'];
        $queryUpdate = "";

        //FILE UPLOADING
        $file = $_FILES['prodProfile'];
        //File Properties
        $fileName = $file['name'];
        $tmpName = $file['tmp_name'];
        $file_destination = 'Images/'.$fileName;
        if(move_uploaded_file($tmpName,$file_destination)){
            echo $file_destination;
        }
        else{
            $file_destination = 'Images/NoValue';
            echo "Not Saved";
        }

        if(file_exists($file_destination) || is_uploaded_file($file_destination)){
            echo "true";
            $queryUpdate = "UPDATE `products` SET `imagepath` = 'Images/$fileName',
            `product_name`='$name',
            `category`='$category',
            `price`= $price WHERE `product_id` = $id"; //update product
        }
        else{
            echo "trues";
            $queryUpdate = "UPDATE `products` SET 
            `product_name`='$name',
            `category`='$category',
            `price`= $price WHERE `product_id` = $id"; //update product
        }

        $sqlUpdate = mysqli_query($connection,$queryUpdate); 

        echo header('Location: product.php'); //go to other location
    }
?>

