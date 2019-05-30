
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="../includes/css/style.css">
    <link rel="icon" href="includes/images/favicon.ico" type="image/x-icon">
    <title>Robodoc</title>
  </head>
  <body>
    <!-- Navbar Start-->
    <nav class="navbar  sticky-top navbar-expand-lg navbar-light bg-light">
      <a href="../index.html"><img src="https://i.ibb.co/mqFRGhx/Image-4.png" alt="Image-4" border="0"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse flex-row-reverse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="../index.html"><i class="fas fa-home"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../diagnose_form.html">GET A DIAGNOSE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../health_alert.html">HEALTH ALERTS</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" data-toggle="modal" data-target="#modal-login">Login</a>
              <a class="dropdown-item" href="../sign_up.html">Sign Up</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Navbar End-->
    <main>
    <section id="diagnose-result">
  <div class="container">
<?php
ini_set('display_errors', 'On');
if (isset($_POST['chk_group'])) {
    $symptomsArray = $_POST['chk_group'];

    $json = file_get_contents("../data/sick.json");
    $j = json_decode($json);

    $diseasesChecked = array_fill(0, sizeof($j), 0);

    $i = 0;
    foreach ($symptomsArray as $symptom){
      foreach ($j as $desease) {
        if (in_array($symptom, $desease->symptoms)){
          $diseasesChecked[$i] += 1;
        }
        $i += 1;
      }
      $i = 0;
    }

    $i = 0;
    foreach ($diseasesChecked as $value) {
      if ($value > 0){
        $p = $value * 20;
        $link = "show_desease.php?name={$j[$i]->name}&amp;spread={$j[$i]->spread_by}&amp;prevention={$j[$i]->prevention}";
        echo "<div class='row justify-content-md-center'>
        <div class='col-md-8'>
<div class='card'>
  <h5 class='card-header'>$p % of probability </h5>
  <div class='card-body'>
    <h5 class='card-title'> {$j[$i]->name} </h5>
  <p class='card-text'>Prevention: {$j[$i]->prevention}</p>
    <a href='{$link}' class='pure-material-button-contained'>Read More</a>
  </div>
  </div>
  </div>
</div>";
      }
      $i += 1;
    }

// echo '<pre>';
// var_dump($diseasesChecked);
// echo '</pre>';

// echo '<pre>';
// var_dump($j);
// echo '</pre>';

// echo '<pre>';
// var_dump($symptomsArray);
// echo '</pre>';
}else{
      echo "<div class='row justify-content-md-center'>
      <div class='col-md-6'>
<div class='card'>
  <h5 class='card-header'>Sorry</h5>
  <div class='card-body'>
    <h5 class='card-title'>Sorry we cannot find a match if you don't enter any of your symptoms 🤮</h5>
    <a href='../diagnose_form.html' class='pure-material-button-contained'>Go Back</a>
  </div>
  </div>
  </div>
</div>
      ";
}

?>
</div>
</div>
</div>
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
    </section>
    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
