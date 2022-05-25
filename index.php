<?php
    require('./filecall.php');
?>
<!DOCTYPE html>
<head>
    <title>Mcdo Kiosk</title>
    <link rel="stylesheet" href="order.css">
    <link rel="icon" type="image/x-icon" href="Background/mcdoo.ico">
</head>
<body class="container-fluid">
<div class="row">
    <!--NAVBAR-->
    <div class="col-md-1 d-none d-md-block" id="navMed">
        <div class="row d-flex flex-column min-vh-100">
            <div class="col-12" id="navLabel">
                <p id="labelss" style="font-size: 2vh;">MCDO KIOSK</p>
            </div>
            <div style="margin-top: 32vh;" class="btn-group-vertical">
                <button type="button" style="border-radius: 0;"  class="btn mb-1" id="navButtons" onclick="window.location.href = 'index.php';">
                    <img id="iconimg" src="Icons/groupmeals.png">
                </button>
                <button type="button" style="border-radius: 0;"  class="btn mb-1" id="navButtons" onclick="window.location.href = 'chicken.php';">
                    <img id="iconimg" src="Icons/chicken.png">
                </button>
                <button type="button" class="btn mb-1" id="navButtons" onclick="window.location.href = 'burger.php';">
                    <img id="iconimg" src="Icons/burger.png"> 
                </button>
                <button type="button" class="btn mb-1" id="navButtons" onclick="window.location.href = 'dessert.php';">
                <img id="iconimg" src="Icons/dessert.png">
                </button>
                <button type="button" style="border-radius: 0;"  class="btn" id="navButtons" onclick="window.location.href = 'others.php';">
                <img id="iconimg" src="Icons/others.png">
                </button>
            </div>
            <footer class = "mt-auto" style="height: 4vh; background-color: #272727;"><p class="text-white mt-1">Version 1.0</p></footer>
        </div>
    </div>
    <div class="col-md-2 d-block d-md-none" id="navSmall">
        <div class="row d-flex flex-column">
            <div class="col-12 d-flex flex-column" style="height: 7.5vh;">
                <p id="labelss" class="text-center mt-auto">MCDO KIOSK</p>
            </div>
            <div class="col-12" style="background-color: rgb(231, 35, 35); height: 10vh;">
                <div class="btn-group col-12 h-100 container-fluid rounded-0" role="group" aria-label="Basic example">
                    <button type="button" style="border-radius: 0;"  class="btn mb-1" id="navButton" onclick="window.location.href = 'index.php';">
                        <img id="iconimg" src="Icons/groupmeals.png">
                    </button>
                    <button type="button" style="border-radius: 0;"  class="btn mb-1" id="navButton" onclick="window.location.href = 'chicken.php';">
                        <img id="iconimg" src="Icons/chicken.png">
                    </button>
                    <button type="button" class="btn mb-1" id="navButton" onclick="window.location.href = 'burger.php';">
                        <img id="iconimg" src="Icons/burger.png"> 
                    </button>
                    <button type="button" class="btn mb-1" id="navButton" onclick="window.location.href = 'dessert.php';">
                    <img id="iconimg" src="Icons/dessert.png">
                    </button>
                    <button type="button" style="border-radius: 0;"  class="btn" id="navButton" onclick="window.location.href = 'others.php';">
                    <img id="iconimg" src="Icons/others.png">
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!--BODY-->
    <div class="col-12 col-md-11" id="mainpanel">
        <div class="row">
            <div class="col-12 pt-3" id="topMain">
                <div class="row">
                    <div class="col-6">
                        <p id="titleTop">Group Meals</p>
                    </div>
                    <div class="col-6">
                        <div class="input-group input-group-sm mb-3 d-flex justify-content-end">
                            <button class="btn btn-warning" type="button" onclick="window.location.replace('cart.php');" id="button-addon2" style="font-weight: bold; width: 20vh;">
                            <?php
                                $query = "SELECT COUNT(*) as cartnum FROM cart";
                                $sql = mysqli_query($connection,$query);
                                $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
                                $num = $row["cartnum"];
                                echo "CHECK CHART ($num)";
                            ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 p-5 overflow-auto" id="midMain">
                <form action="searchprod.php" method="POST">
                <div class="input-group mb-4">
                        <input type="text" class="form-control" style="height: 6vh" name="search" placeholder="Search Products">
                        <button class="btn btn-danger" style="height: 6vh; width: 15vh" type="submit">Search</button>
                </div>
                </form>
                <div class="row">
                    <?php
                        $query = "SELECT * FROM products WHERE `category` = 'Group Meals'";
                        $sql = mysqli_query($connection,$query);
                        $counter = 0;
                        while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
                            $id = $row["product_id"]; $pname = $row["product_name"]; $pimg = $row["imagepath"];
                            $category = $row["category"]; $price = $row["price"];
                            echo "<div class='col-12 col-sm-6 col-md-3 d-flex justify-content-center p-1'>
                                    <div class='card' style='width: 18rem;'>
                                        <img class='card-img-top' src='$pimg' style='height: 15rem;' alt='Card image cap'>
                                        <div class='card-body'>
                                            <h2 class='card-title' id='prodName'>$pname</h2>
                                            <h5 class='card-text pb-3' style='color:gray;'>₱ $price</h5>
                                            <input type='hidden' id='prodID$counter' name='prodID$counter' value='$id'/>
                                            <input type='hidden' id='prodName$counter' name='prodName$counter' value='$pname'/>
                                            <input type='hidden' id='prodPrice$counter' name='prodPrice$counter' value='$price'/>
                                            <button type='button' id='addCarts' onclick='addCartz(this);' value='$counter' class='btn btn-danger' data-toggle='modal' data-target='#addModal'>Add to cart</button>
                                        </div>
                                        </div>
                                    </div>";
                            $counter++;
                        }
                    ?>
                </div>
            </div>
            <div class="col-12 d-flex flex-column" id="botmain">
                <p class="mt-1" id="bottomLabel" style = "color: rgb(219, 219, 219);
                font-size: 15px;
                margin-left: 5px;" onclick="window.location.href = 'login.php';">University of the East Project</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productname"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="addCart.php" method="POST">
            <p for="exampleInputEmail1">Quantity</p>
            <div class="input-group mb-3">
                <button class="btn btn-warning" type="button" id="button-addon1" onclick="decrease();">-</button>
                <input type="text" class="form-control" id="qtyy" name="qty" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" value="1" readonly>
                <button class="btn btn-warning" type="button" id="button-addon1" onclick="increase();">+</button>
            </div>
            <p for="exampleInputEmail1">Price</p>
            <div class="input-group mb-3">
                <span class="input-group-text">₱</span>
                <input type="text" class="form-control" id="totalpricee" name="totalprice" aria-label="Amount (to the nearest dollar)" readonly>
                <input type="hidden" class="form-control" id="actualprice">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="hidden" id="modalID" name="modalID" value=""/>
            <button type="submit" class="btn btn-danger">Add to cart</button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script type="text/javascript">
        function addCartz(button){
            var id= document.getElementById("prodID".concat(button.value)).value;
            var name = document.getElementById("prodName".concat(button.value)).value;
            var price = document.getElementById("prodPrice".concat(button.value)).value;
            document.getElementById("qtyy").value = "1";
            document.getElementById("modalID").value = id;
            document.getElementById("productname").innerHTML = name;
            document.getElementById("totalpricee").value = price;
            document.getElementById("actualprice").value = price;
        }

        function increase(){
            if(document.getElementById("qtyy").value >= 1){
                let val = Number(document.getElementById("qtyy").value) + Number(1);
                let price = Number(document.getElementById("actualprice").value) * val;
                document.getElementById("qtyy").value = val;
                document.getElementById("totalpricee").value = price;
            }
        }

        function decrease(){
            if(document.getElementById("qtyy").value != 1){
                let val = Number(document.getElementById("qtyy").value) - Number(1);
                let price = Number(document.getElementById("totalpricee").value) - Number(document.getElementById("actualprice").value);
                document.getElementById("qtyy").value = val;
                document.getElementById("totalpricee").value = price;
            }
        }
</script>
