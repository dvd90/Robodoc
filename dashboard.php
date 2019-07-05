<?php
    include 'db/db.php';
    include "db/config.php";

    session_start();//on logout session_destroy();
        if(!empty($_POST["loginMail"])) { //true if form was submitted
        $query  = "SELECT * FROM tbl_users_221 WHERE email='"
        . $_POST["loginMail"]
        . "' and password='"
        . $_POST["loginPass"]
        ."'";


        $result = mysqli_query($connection , $query);
        $row    = mysqli_fetch_array($result);


        if(is_array($row)) {
            $_SESSION["user_id"] = $row['id'];
            header('Location: dashboard.php');
        } else {
            $message = "Invalid Username or Password!";
        }
        }
        if(!empty($_POST["sign_out"])){
          $_SESSION["user_id"] = NULL;
          header('Location: index.php');
        }
        if(!empty($_GET["new_user"])){
          $_SESSION["user_id"] = $_GET["new_user"];
        }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/css/style.css">
    <link rel="icon" href="includes/images/favicon.ico" type="image/x-icon">
    <title>Robodoc</title>
  </head>
  <body>
    <!-- Navbar Start-->
    <nav class="navbar  sticky-top navbar-expand-lg navbar-light bg-light">
      <a href="index.php"><img src="https://i.ibb.co/mqFRGhx/Image-4.png" alt="Image-4" border="0"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse flex-row-reverse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php"><i class="fas fa-home"></i></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="health_alert.php">HEALTH ALERTS</a>
          </li>
          <?php
          if($_SESSION["user_id"]) {

              $query = "SELECT name FROM tbl_users_221 WHERE id='"
              .$_SESSION["user_id"]
              ."'";
              $result = mysqli_query($connection , $query);
              $row    = mysqli_fetch_array($result);

              echo '<li class="nav-item">
            <a class="nav-link" href="diagnose_form.php">GET A DIAGNOSE</a>
          </li>
              <li class="nav-item dropdown">
                                       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome '.$row["name"].'</a>
                                     <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <form method="post">
   <button type="submit" name="sign_out" value="sign_out" class="dropdown-item">Sign out</button>
</form>
                    </div>
                  </li>';

          } else {

            echo '<li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="far fa-user"></i>
                   </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" data-toggle="modal" data-target="#modal-login">Login</a>
                    <a class="dropdown-item" href="sign_up.php">Sign Up</a>
                    </div>
                  </li>';
          }
           ?>
        </ul>
      </div>
    </nav>
    <!-- Navbar End-->
    <main>
    <section id="dashboard">
      <div class="container dash-container">
        <div class="row dash-row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                Health related News
              </div>
              <div class="card-body text-center">
                <iframe src="https://www.npr.org/player/embed/724468630/725139755" width="100%" height="215" frameborder="0" scrolling="no" title="NPR embedded audio player"></iframe>
              </div>
            </div>
          </div>
        </div>
        <div class="row dash-row">
          <div class="col-md-6 col-sm-12 side-box">
            <div class="card">
              <div class="card-header">
                Activity log
              </div>
              <div class="card-body">
                <?php
                  if($_SESSION["user_id"]) {



                    echo '<h5 class="card-title">Hey '
                    .
                    '</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>';
                  }else{
                    echo '<h5 class="card-title">Please LOGIN</h5>
                <p class="card-text">Start now and get your first diagnose...</p>
                <a href="sign_up.php" class="pure-material-button-contained">SIGN UP</a>';
                  }
                 ?>

              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 side-box">
            <div class="card">
              <div class="card-body card-logo">
                <img src='https://i.ibb.co/kXhT79B/Image-9-1.png' class='card-img index-img'>
                <a href="diagnose_form.php" class="pure-material-button-contained">Start your Diagnose</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row dash-row">
          <div class="col">
            <div class="card">
              <canvas id="myChart"></canvas>
              <!--               <div class="card-header">
                Featured
              </div>
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="pure-material-button-contained">Go somewhere</a>
              </div> -->
            </div>
          </div>
        </div>
      </div>
      </main>
    </section>
      <div class="footer">
        <div class="footer-links">
          <a href="#"><i class="fab fa-github"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-linkedin"></i></a>
        </div>
        <div class="footer-copyright">
          <i class="fas fa-heart"></i> Shenkar
        </div>
      </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <form method="post">
                <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="loginMail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="loginPass" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <button type="submit" class="pure-material-button-contained">Login</button>
              <a href="sign_up.php">Sign-up</a>
          <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>

            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="includes/js/main.js"></script>
  </body>
</html>
<?php
//close DB connection
mysqli_close($connection);
?>
