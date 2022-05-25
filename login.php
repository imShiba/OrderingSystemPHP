<?php
    require('./filecall.php');
    error_reporting(0);

    $user = $_POST['user']; //getting user input
    $pass = $_POST['pass']; //getting pass input
    $hoolder = "";
    $count=0;
    if (isset($_POST['user'])){
        $query = ("SELECT * FROM admin WHERE username = '$user' AND password = '$pass'");
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result);

        if ($_POST['user'] == ""){
            $hoolder = "Don't leave textfield empty.";
        }
        else if($row['username'] == $user && $row['password']== $pass) {
            echo header("location: dashboard.php");
        }
        else{
            $count=1;
        }
    }
?>
<!DOCTYPE html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="image/x-icon" href="Background/mcdoo.ico">
</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-md-4"></div>
      <div class="col-md-4">
        <h2 class="text-center text-white mt-5">Admin Login</h2>
        <div class="text-center text-white">Only employees can access this webpage.</div>
        <div class="card my-5" id="loginn">

          <form class="card-body cardbody-color" method="POST">

            <div class="text-center">
              <img src="https://ritecaremedicalofficepc.com/wp-content/uploads/2019/09/img_avatar.png"  onclick="window.location.href = 'index.php';" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-4"
                width="200px" alt="profile">
            </div>

            <div class="input-group mb-3 mt-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Username</span>
            <input type="text" class="form-control" id="user" name="user" style="width: 100px" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default" style="width: 100px">Password</span>
            <input type="password" class="form-control" id="pass" name="pass" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <?php
                if($count == 1){
                    echo "
                    <div class='alert alert-danger' role='alert'>
                        Invalid Username/Password.
                    </div>";
                }
            ?>
            <div class="text-center"><button type="submit" class="btn btn-danger px-5 w-100">Login</button></div>
          </form>
        </div>
    </div>
</div>
<div class="col-md-4"></div> 
</div>
</div>
</body>
</html>
