<?php
    require('./filecall.php');
?>
<!DOCTYPE html>
<head>
    <title>Products</title>
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
                <button type="button" style="border-radius: 0;" class="btn btn-danger mb-2" id="navButtons" onclick="window.location.href = 'dashboard.php';">Dashboard</button>
                <button type="button" class="btn btn-danger mb-2" id="navButtons" onclick="window.location.href = 'product.php';">Product Data</button>
                <button type="button" class="btn btn-danger mb-2" id="navButtons" onclick="window.location.href = 'sales.php';">Sales Data</button>
                <button type="button" style="border-radius: 0;" class="btn btn-danger" id="navButtons" onclick="window.location.href = 'login.php';">Logout</button>
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
            <div class="col-12 pt-3" id="topMain"><p id="titleTop">Fastfood / Products</p></div>
            <div class="col-12 p-5" id="midMain">
                <div class="col-12">
                    <form action="product.php" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Search Products (Product ID / Product Name)" aria-label="Search Products" aria-describedby="button-addon2">
                        <button class="btn btn-success" style="width: 15vh;" type="submit" id="button-addon2">Search</button>
                    </div>
                    </form>
                </div>
                <div class="col-12 overflow-auto" style="height: 60vh; background-color: #f2f2f2;">
                    <table class="table table-striped" id="myTable">
                    <thead class="table-dark" style="position: sticky; top: 0; z-index: 1;">
                        <tr>
                        <th scope="col" style="text-align:center;vertical-align:middle">ID</th>
                        <th scope="col" style="text-align:center;vertical-align:middle">Product Image</th>
                        <th scope="col" style="text-align:center;vertical-align:middle">Product Name</th>
                        <th scope="col" style="text-align:center;vertical-align:middle">Category</th>
                        <th scope="col" style="text-align:center;vertical-align:middle">Price</th>
                        <th scope="col" style="text-align:center;vertical-align:middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "";
                            if(isset($_POST['search'])){
                                $search = $_POST['search'];

                                if($search == ""){
                                    $query = "SELECT * FROM products";
                                }
                                else {
                                    $query = "SELECT * FROM products WHERE `product_id` LIKE '%$search%' || `product_name` LIKE '%$search%'";
                                }
                            }
                            else{
                                $query = "SELECT * FROM products";
                            }
                            
                            $sql = mysqli_query($connection,$query);
                            $counter = 0;
                            while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
                            $id = $row["product_id"]; $pname = $row["product_name"]; $pimg = $row["imagepath"];
                            $category = $row["category"]; $price = $row["price"]; $counter+=1;?>
                            <tr>
                            <th scope="row" style="width: 10vh; text-align:center;vertical-align:middle"><?php echo "$id"?></th>
                            <td style="width: 40vh; text-align:center; vertical-align:middle">
                            <img src="<?php echo "$pimg"?>" style="width:10vh;">
                            </td>
                            <td style="width: 40vh; text-align:center; vertical-align:middle"><?php echo "$pname"?></td>
                            <td style="width: 40vh; text-align:center;vertical-align:middle"><?php echo "$category"?></td>
                            <td style="width: 40vh; text-align:center;vertical-align:middle"><?php echo "$price"?></td>
                            <td style="width: 40vh; text-align:center;vertical-align:middle">
                                <button style="vertical-align:middle; width: 12vh; margin-top: 5px;" type="button" class="openupModal btn btn-warning" data-toggle="modal" data-target="#updateModal">Update</button>
                                <button style="vertical-align:middle; width: 12vh; margin-top: 5px;" type="button" class="opendelModal btn btn-Danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
                            </td>
                            </tr>
                        <?php }?>
                    </tbody>
                    </table>
                </div>
                <div class="d-flex flex-column-reverse">
                    <div class="align-self-end">
                        <button style="vertical-align:middle; margin-top: 10px; width: 30vh;" type="button" class="btn btn-Primary" data-toggle="modal" data-target="#addModal">Add Product</button>
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



<!-- Modal Delete-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productname"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Are you sure you want to delete this item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="delete.php" method="POST">
            <input type="hidden" id="modalID" name="modalID" value=""/>
            <button type="submit" class="btn btn-danger">Delete Product</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Update-->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productname">Update Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="update.php" method="POST" enctype='multipart/form-data'>
          <div class="form-group">
            <label for="product-id" class="col-form-label">ID:</label>
            <input type="text" class="form-control" id="product-id" name="product-id" readonly required>
          </div>
          <div class="form-group">
            <label for="formFile" class="col-form-label">Product Image:</label>
            <input class="form-control" type="file" id="prodProfile" name="prodProfile" accept=".jpg,.png">
          </div>
          <div class="form-group">
            <label for="product-name" class="col-form-label">Product Name:</label>
            <input type="text" class="form-control" id="product-name" name="product-name" required>
          </div>
          <div class="form-group">
            <label for="category" class="col-form-label">Category:</label>
            <div class="input-group">
                <select class="form-select" id="category" name="category" placeholder="Choose..." required>
                    <option value="Group Meals">Group Meals</option>
                    <option value="Chicken">Chicken</option>
                    <option value="Burgers">Burgers</option>
                    <option value="Dessert and Drinks">Dessert and Drinks</option>
                    <option value="Others">Others...</option>
                </select>
                <label class="input-group-text" for="inputGroupSelect02">Options</label>
            </div>
          </div>
          <div class="form-group">
            <label for="price" class="col-form-label">Price:</label>
            <div class="input-group mb-3">
                <span class="input-group-text">₱</span>
                <input type="number" min="0" class="form-control" id="price" name="price" required>
            </div>
          </div>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning">Update Product</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal AddProd-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productname">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="add.php" method="POST" enctype='multipart/form-data'>
          <div class="form-group">
            <label for="product-id" class="col-form-label">ID:</label>
            <input type="text" class="form-control" id="add-id" name="add-id" value="Automatically Generated" readonly>
          </div>
          <div class="form-group">
            <label for="formFile" class="col-form-label">Product Image:</label>
            <input class="form-control" type="file" id="add-img" name="add-img" accept=".jpg,.png" required>
          </div>
          <div class="form-group">
            <label for="product-name" class="col-form-label">Product Name:</label>
            <input type="text" class="form-control" id="add-name" name="add-name" required>
          </div>
          <div class="form-group">
            <label for="category" class="col-form-label">Category:</label>
            <div class="input-group">
                <select class="form-select" id="category" name="add-category" placeholder="Choose..." required>
                    <option value="Group Meals">Group Meals</option>
                    <option value="Chicken">Chicken</option>
                    <option value="Burgers">Burgers</option>
                    <option value="Dessert and Drinks">Dessert and Drinks</option>
                    <option value="Others">Others...</option>
                </select>
                <label class="input-group-text" for="inputGroupSelect02">Options</label>
            </div>
          </div>
          <div class="form-group">
            <label for="price" class="col-form-label">Price:</label>
            <div class="input-group mb-3">
                <span class="input-group-text">₱</span>
                <input type="number" min="0" class="form-control" id="add-price" name="add-price" required>
            </div>
          </div>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- for modal -->
<script type="text/javascript">
    $("#myTable").on('click','.opendelModal',function () {
        var currentRow=$(this).closest("tr");
        var id = currentRow.find("th:eq(0)").text();
        var name = currentRow.find("td:eq(1)").text();
        document.getElementById("modalID").value = id;
        document.getElementById("productname").innerHTML = name;
    });

    $("#myTable").on('click','.openupModal',function () {
        var currentRow=$(this).closest("tr");
        var id = currentRow.find("th:eq(0)").text();
        var name = currentRow.find("td:eq(1)").text();
        var category = currentRow.find("td:eq(2)").text();
        var options= document.getElementById('category').options;
        var price = currentRow.find("td:eq(3)").text();
        document.getElementById("product-id").value = id;
        document.getElementById("product-name").value = name;

        for (var i= 0, n= options.length; i < n ; i++) {
            if (options[i].value==category) {
                document.getElementById("category").selectedIndex = i;
                break;
            }
        }

        document.getElementById("price").value = price;
    });
</script>

</body>
</html>
