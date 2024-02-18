<?php 
    $id = "";
    $fullName = "";
    $email = "";
    $phone = "";
    $password = "";

    $conn = mysqli_connect("localhost:3308","root","","crud");
    if(!$conn){
        die("Error". mysqli_connect_error());
    }

    $id = $_GET['updateid'];
    $sql = "SELECT * FROM account WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $fullName = $row['fullName'];
    $email = $row['email'];
    $phone = $row['phone'];
    $password = $row['password'];

    if(isset($_POST['id'])){
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $query = "UPDATE account SET fullName='$fullName', email='$email', phone='$phone', password='$password' WHERE id=$id";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "Update successful";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body {
        background-color: rgb(109, 104, 104);
        }
    </style>
    <title>Update Account</title>
</head>
<body>
    <div class="container my-5">
    <header class="d-flex justify-content-between my-4">
            <h1 style="color: white;">Update Account</h1>
            <div>
            <a href="dashboard.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form method="post"  >
            <input type="hidden" name="id" value="<?php echo $id; ?>" >
            <div class="form-elemnt my-4">
                    <input type="text" class="form-control" name="fullName" value="<?php echo $fullName; ?>" placeholder="Full Name:">
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Email:">
            </div>
            <div class="form-elemnt my-4">
                <input type="phone" class="form-control" name="phone" value="<?php echo $phone; ?>" placeholder="Phone:">
            </div>
            <div class="form-element my-4">
                <input type="password" class="form-control" name="password" value="<?php echo $password; ?>" placeholder="Password:">
            </div>
            <div class="form-element my-4">
                <input type="submit" name="update" value="Update Account" class="btn btn-primary">
                
            </div>
        </form>
        
        
    </div>
</body>
</html>