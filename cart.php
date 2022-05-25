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
                        <p id="titleTop">YOUR CART</p>
                    </div>
                    <div class="col-6">
                        <div class="input-group input-group-sm mb-3 d-flex justify-content-end">
                            <button class="btn btn-warning" type="button" onclick="window.location.href = 'index.php';" id="button-addon2" style="font-weight: bold; width: 20vh;">BACK</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 p-5 overflow-auto" style="height: 76vh" id="midMain">
                <div class="row">
                    <?php
                        $query = "SELECT products.imagepath as 'img', products.product_name as 'prodname',cart.cartid as 'id', cart.qty as 'qty', cart.total as 'total'
                        FROM products
                        INNER JOIN cart ON products.product_id=cart.prod_id;";
                        $sql = mysqli_query($connection,$query);
                        $counter = 0;
                        while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
                            $id = $row['id']; $pname = $row["prodname"]; $pimg = $row["img"];
                            $qty = $row["qty"]; $price = $row["total"];
                            echo "<div class='col-12 col-sm-6 col-md-3 d-flex justify-content-center p-1'>
                                    <div class='card' style='width: 18rem;'>
                                        <img class='card-img-top' src='$pimg' style='height: 15rem;' alt='Card image cap'>
                                        <div class='card-body'>
                                            <h4 class='card-title' id='prodName'>$pname ($qty)</h4>
                                            <h5 class='card-text pb-3' style='color:gray;'>Total: ₱ $price</h5>
                                            <form action='deleteitem.php' method='POST'>
                                                <input type='hidden' id='cartID' name='cartID' value='$id'/>
                                                <button type='submit' id='addCarts' class='btn btn-danger'>Remove</button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>";
                            $counter++;
                        }
                    ?>
                    
                </div>
            </div>
            <div class="col-12" style="height: 12vh">
                <div class="row">
                    <div class="col-6 col-sm-6 text-center">
                        <button type='submit' class='btn btn-danger mt-4' style="width: 30vh" data-toggle='modal' data-target='#clearModal'>CANCEL ORDER</button>
                    </div>
                    <div class="col-6 col-sm-6 text-center">
                        <button  type='button' id='addCarts' value='$counter' class='btn btn-danger mt-4' data-toggle='modal' data-target='#confirmModal'style="width: 30vh">CHECK OUT</button>
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

<!-- Modal Confirmation-->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productname">Confirm Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <p for="exampleInputEmail1">Total Price: </p>
            <div class="input-group mb-3">
                <span class="input-group-text">₱</span>
                <?php
                    $query = "SELECT SUM(total) as carttot FROM cart";
                    $sql = mysqli_query($connection,$query);
                    $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
                    $num = $row["carttot"];
                ?>
                <input type="text" class="form-control" id="totalpricee" value="<?php echo $num ?>" name="totalprice" aria-label="Amount (to the nearest dollar)" readonly>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="hidden" id="modalID" name="modalID" value=""/>
            <button type="button" data-toggle='modal' data-target='#receiptModal' data-dismiss="modal" class="btn btn-danger">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Deletion-->
<div class="modal fade" id="clearModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productname">Cancel Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Are you sure, you're going to cancel your orders?
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" onclick="window.location.href = 'clearcart.php';" class="btn btn-danger">Cancel Order</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Receipt-->
<div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productname">Your Receipt</h5>
      </div>
      <div class="modal-body">  
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php   
                    $query = "SELECT products.product_name as 'prodname', cart.qty as 'qty', cart.total as 'total'
                    FROM products
                    INNER JOIN cart ON products.product_id=cart.prod_id;";
                    $sql = mysqli_query($connection,$query);
                    $counter = 0;
                    while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
                        $prnames = $row["prodname"]; $pqtys= $row["qty"]; $total = $row["total"];
                        echo "<tr><th scope='row'>$prnames</th>
                        <td>$pqtys</td>
                        <td>$total</td></tr>";
                        $counter++;
                    }
                ?>
                <tr>
                    <tr><th scope='row'></th>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <tr><th scope='row'>Total Price</th>
                    <td></td>
                    <td><?php echo $num ?></td>
                </tr>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
            <button type="submit" class="btn btn-danger" onclick="window.location.href = 'confirm.php';">Thank you!</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>