<?php

include_once("../includes/db_conn.php");
if(isset($_GET["deleteid"])){
    $id=$_GET['deleteid'];

    $query = "DELETE from account WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if($result){
        header ("Location: ../dashboard.php");
    }
}

?>