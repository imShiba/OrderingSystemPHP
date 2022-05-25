<link rel="stylesheet" type="text/css" href="bootstrap\css\bootstrap.min.css">
<script type="text/javascript" src="bootstrap\js\bootstrap.bundle.js"></script>
<link rel="stylesheet" type="text/css" href="main.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<?php

$host = 'localhost';
$users = 'root';
$password = '';
$database = 'ordering_sys';

$connection = mysqli_connect($host,$users,$password,$database);

if (mysqli_connect_error()){
    echo "Error: Unable to connect to MySQL <br>";
    echo "Message: ".mysqli_connect_error()."<br>";

}
else{
}

?>