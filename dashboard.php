<?php
    require('./filecall.php');
    error_reporting(0);
?>
<!DOCTYPE html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" type="image/x-icon" href="Background/mcdoo.ico">
</head>
<body class="container-fluid">
<div class="row">
    <!--NAVBAR-->
    <div class="col-md-2 d-none d-md-block" id="navMed">
        <div class="row d-flex flex-column min-vh-100">
            <div class="col-12" id="navLabel">
                <p id="labelss">MCDONALDS ADMIN</p>
            </div>
            <div class="col-12" id="imageNav"></div>
            <div style="margin-top: 35vh;" class="btn-group-vertical">
                <button type="button" style="border-radius: 0;"  class="btn btn-danger mb-2" id="navButtons" onclick="window.location.href = 'dashboard.php';">Dashboard</button>
                <button type="button" class="btn btn-danger mb-2" id="navButtons" onclick="window.location.href = 'product.php';">Product Data</button>
                <button type="button" class="btn btn-danger mb-2" id="navButtons" onclick="window.location.href = 'sales.php';">Sales Data</button>
                <button type="button" style="border-radius: 0;"  class="btn btn-danger" id="navButtons" onclick="window.location.href = 'login.php';">Logout</button>
            </div>
            <footer class = "mt-auto" style="height: 4vh; background-color: #272727;"><p class="text-white mt-1">Version 1.0</p></footer>
        </div>
    </div>
    <div class="col-md-2 d-block d-md-none" id="navSmall">
        <div class="row d-flex flex-column">
            <div class="col-12 d-flex flex-column" style="height: 7.5vh;">
                <p id="labelss" class="text-center mt-auto">Admin Panel</p>
            </div>
            <div class="col-12 bg-danger" style="height: 7.5vh;">
                <div class="btn-group col-12 bg-danger h-100 container-fluid rounded-0" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-danger rounded-0" onclick="window.location.href = 'dashboard.php';">Dashboard</button>
                    <button type="button" class="btn btn-danger rounded-0" onclick="window.location.href = 'product.php';">Product Data</button>
                    <button type="button" class="btn btn-danger rounded-0" onclick="window.location.href = 'sales.php';">Sales Data</button>
                    <button type="button" class="btn btn-danger rounded-0" onclick="window.location.href = 'login.php';">Logout</button>
                </div>
            </div>
        </div>
    </div>

    <!--BODY-->
    <div class="col-12 col-md-10" id="mainpanel">
        <div class="row">
            <div class="col-12 pt-3" id="topMain"><p id="titleTop">Home / Dashboard</p></div>
            <div class="col-12 p-5" id="midMain">
                <div class="row" style="height:22vh;">
                    <div class="col-12 col-md-4 bg-primary d-flex flex-column">
                        <p class="mt-auto" id="counter">
                            <?php
                                $query = "SELECT count('product_id') as 'counts' FROM products";
                                $sql = mysqli_query($connection,$query);

                                if(($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))){
                                    echo $row['counts'];
                                }
                            ?>
                        </p>
                        <p class="mt-auto" id="counterLabel">Total Products</p>
                    </div>
                    <div class="col-12 col-md-4 bg-success d-flex flex-column">
                        <p class="mt-auto" id="counter"> ₱
                            <?php
                                $query = "SELECT sum(total) as 'sale' FROM sales";
                                $sql = mysqli_query($connection,$query);

                                if(($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))){
                                    echo $row['sale'];
                                }
                            ?>
                        </p>
                        <p class="mt-auto" id="counterLabel">Total Sales</p>
                    </div>
                    <div class="col-12 col-md-4 bg-danger d-flex flex-column">
                        <p class="mt-auto" id="counter">
                            <?php
                                $query = "SELECT sum(quantity) as 'sale' FROM sales";
                                $sql = mysqli_query($connection,$query);

                                if(($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))){
                                    echo $row['sale'];
                                }
                            ?>
                        </p>
                        <p class="mt-auto" id="counterLabel">Sold Products</p>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex flex-column" id="botmain">
                <p class="mt-1" id="bottomLabel" style = "color: rgb(219, 219, 219);
                font-size: 15px;
                margin-left: 5px;">University of the East Project</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
