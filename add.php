<?php
    require('./filecall.php'); //connect to database.php

    if (isset($_POST['add-id'])){
        $id = $_POST['add-id'];
        $imgpath = $_FILES['add-img'];
        $name = ucfirst($_POST['add-name']);
        $category = ucfirst($_POST['add-category']);
        $price = $_POST['add-price'];
        $queryUpdate = "";

        //FILE UPLOADING
        $file = $_FILES['add-img'];

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
            $queryUpdate = "INSERT INTO `products`(`product_id`, `imagepath`, `product_name`, `category`, `price`) VALUES ('','$file_destination','$name','$category',$price)"; //update product
        }

        $sqlUpdate = mysqli_query($connection,$queryUpdate); 

        echo header('Location: product.php'); //go to other location
    }
?>

