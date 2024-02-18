<?php
    include_once "../includes/db_conn.php";
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password)){

        if(!$conn){
            die('Connect Error('.mysqli_connect_errno() . ')'.mysqli_connect_error());
        }else{
            $query = "SELECT * FROM account WHERE email='$email' && password='$password'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result)){
                header ("Location: ../dashboard.php");
            }else{
                header ("Location: ../index.php?signin=unmatched");
            }
        }

    }else{
        
        header("Location: ../index.php?signin=empty");
    }

?>