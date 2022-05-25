<?php
    require('./filecall.php');
?>
<!DOCTYPE html>
<head>
    <title>Sales</title>
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
            <div class="col-12 pt-3" id="topMain"><p id="titleTop">Fastfood / Sales</p></div>
            <div class="col-12 p-5" id="midMain">
                <div class="col-12">
                    <form action="sales.php" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Search Sales Data (Sales ID)" aria-label="Search Sales Data" aria-describedby="button-addon2">
                        <button class="btn btn-success" style="width: 15vh;" type="submit" id="button-addon2">Search</button>
                    </div>
                    </form>
                </div>
                <div class="col-12 overflow-auto" style="height: 60vh; background-color: #f2f2f2;">
                    <table class="table table-striped" id="myTable">
                    <thead class="table-dark" style="position: sticky; top: 0; z-index: 1;">
                        <tr>
                        <th scope="col" style="text-align:center;vertical-align:middle">ID</th>
                        <th scope="col" style="text-align:center;vertical-align:middle">Product ID</th>
                        <th scope="col" style="text-align:center;vertical-align:middle">Quantity</th>
                        <th scope="col" style="text-align:center;vertical-align:middle">Total</th>
                        <th scope="col" style="text-align:center;vertical-align:middle">Date</th>
                        <th scope="col" style="text-align:center;vertical-align:middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "";
                            if(isset($_POST['search'])){
                                $search = $_POST['search'];

                                if($search == ""){
                                    $query = "SELECT * FROM sales";
                                }
                                else {
                                    $query = "SELECT * FROM sales WHERE `sales_id` LIKE '%$search%' || `product_id` LIKE '%$search%'";
                                }
                            }
                            else{
                                $query = "SELECT * FROM sales";
                            }
                            
                            $sql = mysqli_query($connection,$query);
                            $counter = 0;
                            while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
                            $id = $row["sales_id"]; $pid = $row["product_id"]; $quantity = $row["quantity"];
                            $total = $row["total"]; $date = $row["date"]; $counter+=1;?>
                            <tr>
                            <th scope="row" style="width: 10vh; text-align:center;vertical-align:middle"><?php echo "$id"?></th>
                            <td style="width: 40vh; text-align:center; vertical-align:middle"><?php echo "$pid"?></td>
                            <td style="width: 40vh; text-align:center; vertical-align:middle"><?php echo "$quantity"?></td>
                            <td style="width: 40vh; text-align:center;vertical-align:middle"><?php echo "$total"?></td>
                            <td style="width: 40vh; text-align:center;vertical-align:middle"><?php echo "$date"?></td>
                            <td style="width: 40vh; text-align:center;vertical-align:middle">
                                <button style="vertical-align:middle; width: 12vh; margin-top: 5px;" type="button" class="opendelModal btn btn-Danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
                            </td>
                            </tr>
                        <?php }?>
                    </tbody>
                    </table>
                </div>
                <div class="d-flex flex-column-reverse">
                    <div class="col-12" style="background-color: #212529">
                        <p style = "color: rgb(219, 219, 219); font-size: 15px; margin: 8px;">Total Sales:
                        <b style="margin-left: 3px;"><?php 
                            $query = "SELECT SUM(`total`) as totalsales FROM sales";
                            $sql = mysqli_query($connection,$query);
                            $summ = mysqli_fetch_array($sql, MYSQLI_ASSOC);
                            echo $summ["totalsales"];
                        ?></b>
                        </p>
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
        <h5 class="modal-title" id="salesname"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Are you sure you want to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="deleteSales.php" method="POST">
            <input type="hidden" id="modalID" name="modalID" value=""/>
            <button type="submit" class="btn btn-danger">Delete Record</button>
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
        document.getElementById("salesname").innerHTML = "Sales ID:  ".concat(id);
    });
</script>

</body>
</html>
