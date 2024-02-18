<?php
    $conn = mysqli_connect("localhost:3308","root","","crud");
    if(!$conn){
        die("Error". mysqli_connect_error());
    }
?>