<?php 
  include_once ("./includes/db_conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="/final/styles/dashboard_style.css">
    <title>Dashboard</title>
    <style>
        table  td, table th{
        vertical-align:middle;
        text-align:right;
        padding:20px!important;
        }
    </style>
</head>
<body>
  <nav>
    <div class="nav__content">
      <div class="logo"><a href="#">LESCHEDU</a></div>
      <label for="check" class="checkbox">
        <i class="ri-menu-line"></i>
      </label>
      <input type="checkbox" name="check" id="check" />
      <ul>
        <li><a href="index.php" >Log out</a></li>
      </ul>
    </div>
  </nav>
    <div class="container my-4">
      <h1 style="color: white;"><center>DASH<b>BOARD</b></center></h1>
        <header class="d-flex justify-content-between my-4">
            <h1 style="color: white;">Account List</h1>
            <div>
                <a href="create.php" class="btn btn-primary">Add New Account</a>
            </div>
        </header>
      <div class="card-body">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
        <div class="row">
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <select name="sort_alphabet" class="form-control">
                        <option value="">--Select Option--</option>
                        <option value="a-z" <?php if(isset($_GET["sort_alphabet"]) && $_GET["sort_alphabet"] == "a-z"){echo "selected";} ?> >A-Z(Descending Order)</option>
                        <option value="z-a" <?php if(isset($_GET["sort_alphabet"]) && $_GET["sort_alphabet"] == "z-a"){echo "selected";} ?>>Z-A (Descending Order)</option>
                    </select>
                    <button type="submit" class="input-group-text btn btn-primary">Sort</button>
                </div>
            </div>
        </div>
      </form>
      </div>
        <table class="table table-bordered" style="background-color: white;">
        <thead>
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
          <!-- Show data -->
        <?php
          $sort_option = "";

          if(isset($_GET["sort_alphabet"])){
            if($_GET["sort_alphabet"] == "a-z"){
                $sort_option = "ASC";
            }elseif($_GET["sort_alphabet"] == "z-a"){
              $sort_option = "DESC";
            }
          }
          $query = "SELECT * FROM account ORDER BY fullName $sort_option;";
          $result = mysqli_query($conn, $query);
          $resultCheck = mysqli_num_rows($result);
          if ($resultCheck > 0){
            while ($row = mysqli_fetch_array($result)) {
              $id = $row['id'];
              echo "$id";
              echo "<tr>
                <td>". $row["id"]. "</td>
                <td>". $row["fullName"]. "</td>
                <td>". $row["email"]. "</td>
                <td>". $row["phone"]. "</td>
                <td>". $row["password"]. "</td>
                <td>
                  <a href='update.php?updateid=$id' class='btn btn-warning'>Update</a>
                  <a href='./process/process_deleteAccount.php?deleteid=$id' class='btn btn-danger'>Delete</a>
                </td>
              </tr>";
            }
          }else{
            ?>
              <tr>
                <td colspan="6">No Data Found </td>

                </td>
              </tr>
            <?php
          }
        ?>
        </table>
    </div>
</body>
</html>