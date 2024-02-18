<?php
    //connect to database
    include_once "../includes/db_conn.php";

    //check request method
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        //get data from user
        $fullName = $_POST["fullName"];
        $email = $_POST["email"];   
        $phone = $_POST["phone"];
        $password = $_POST["password"];

        if(!empty($fullName) && !empty($email) && !empty($phone) && !empty($password)){

            $query_check = mysqli_query($conn,"SELECT email FROM account WHERE email = '$email'");
            if(mysqli_num_rows($query_check) != 0){
                header ("Location: ../index.php?signup=email_exists");
            }else{
                    $query = "INSERT INTO account (fullName, email, phone, password) VALUES (?, ?, ?, ?)";
                    $stmt = mysqli_prepare($conn, $query);
                    if ($stmt) {
                        // Bind parameters
                        mysqli_stmt_bind_param($stmt, 'ssss', $fullName, $email, $phone, $password);

                        // Execute the statement
                        mysqli_stmt_execute($stmt);

                        // Check for success
                        if(mysqli_stmt_affected_rows($stmt) > 0) {
                            $conn->close();
                            $stmt->close();
                            echo "
                            <script>
                            alert('Account Created');
                            setTimeout(function() { window.location.href = '../index.php'; }, 100);
                            </script>";
                        } else {
                            echo "<script>alert('Failed to insert data');</script>";
                        }
                    }else {
                            echo "Error: " . mysqli_error($conn);
                    }
                }
        }else{
            header ("Location: ../index.php?signup=empty_fields");
        }
    }
?>