<?php 

// Connect to Database
$conn = mysqli_connect('localhost', 'prague', 'test111', 'naija_pizza');

//Check Connection to database
if (!$conn) {
    echo 'Connection Error:' . mysqli_connect_error();
}
