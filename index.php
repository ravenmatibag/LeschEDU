<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style.css" />
    <title>PROJECT</title>
  </head>
  <body>

    <nav>
      <div class="nav__content">
        <div class="logo"><a href="index.php">LESCHEDU</a></div>
        <label for="check" class="checkbox">
          <i class="ri-menu-line"></i>
        </label>
        <input type="checkbox" name="check" id="check" />
        <ul>
          <li><a href="#email" >Log In</a></li>
          <li><a class="sign-btn"> <button type="button" class="button-like-text_2" data-toggle="modal" data-target="#registerModal">Sign up</button></a></li>
        </ul>
      </div>
    </nav>

    
    <section class="section">
      <div class="section__container">
        <div class="content">
          <h1 class="title">
            LESCH<B style="color: #9333ea;">EDU</B>
          </h1>
          <p class="description">
            "Empowering Users, Securing Connections: Your Gateway to Seamless Account Management."
          </p>
        </div>

        <!-- Log In-->

        <div class="login-form">
          <!-- FORM HERE -->
          <form action="./process/process_login.php" method="post">
            <h2 class="sign-text">Sign In</h2>
            <div class="form-group">
                <input id="email" type="email" placeholder="Email:" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password:" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Log In" name="login" class="btn btn-primary btn-lg btn-block">
            </div>

            <!-- Error handling php -->
            <?php 
              $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              if(strpos($fullUrl, "signin=empty")==true){
                echo " <p class='error_msg' style='color:red;'> You did not fill in all fields! </p>";
              }else if(strpos($fullUrl, "signin=unmatched")==true){
                echo " <p class='error_msg' style='color:red;'> Input does not match! </p>";
              }
            ?>
            
          </form>
        <div>
          <p style="color: white" class="not_statement">Not registered yet? <button type="button" class="button-like-text" data-toggle="modal" data-target="#registerModal">Register Here
          </button></p></div>
        </div>
      </div>
      </div>
    </section>

    <!-- Modal Registration-->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registerModal" style="color: white;">Sign Up</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- FORM HERE -->
            <form action="./process/process_signUp.php" method="post">
              <div class="form-group">
                  <input type="text" class="form-control" name="fullName" placeholder="Full Name:">
              </div>
              <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email:">
              </div>
              <div class="form-group">
                <input type="phone" class="form-control" name="phone" placeholder="Phone:">
              </div>
              <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password:">
              </div>
            </div>
            <div class="modal-footer">

            <?php 
              $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              if(strpos($fullUrl, "signup=email_exists")==true){
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                document.querySelector('.button-like-text_2').click();});
                </script>";
                echo " <p class='error_msg' style='color:red;'> Email Already Exists! </p>";
              }else if (strpos($fullUrl, "signup=empty_fields")==true){
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                document.querySelector('.button-like-text_2').click();});
                </script>";
                echo " <p class='error_msg' style='color:red;'> You did not fill in all fields!  </p>";
              }
            ?>

              <div class="form-btn">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Register" name="Register">
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>