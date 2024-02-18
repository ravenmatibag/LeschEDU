<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Add New Account</title>
    <style>
        body {
        background-color: rgb(109, 104, 104);
        }
    </style>
</head>
<body>
    <div class="container my-5">
    <header class="d-flex justify-content-between my-4">
            <h1 style="color: white;">Add New Account</h1>
            <div>
            <a href="dashboard.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        
        <form action="./process/process_addAccount.php" method="post">
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="fullName" placeholder="Full Name:">
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-elemnt my-4">
                <input type="phone" class="form-control" name="phone" placeholder="Phone:">
            </div>
            <div class="form-element my-4">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>

            <!-- Error Message -->
            <?php 
              $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              if(strpos($fullUrl, "addAcc=email_exists")==true){
                echo " <p class='error_msg' style='color:red;'> Email Already Exists! </p>";
              }else if (strpos($fullUrl, "addAcc=empty_fields")==true){
                echo " <p class='error_msg' style='color:red;'> You did not fill in all fields!  </p>";
              }
            ?>

            <div class="form-element my-4">
                <input type="submit" name="create" value="Add Account" class="btn btn-primary">
            </div>
        </form>
        
        
    </div>
</body>
</html>