<?php
session_start();

include_once "core/morpion.php";

if(!isset($_SESSION['u1']) or empty($_SESSION['u1']) or !isset($_SESSION['u2']) or empty($_SESSION['u2'])){
    header("Location: login.php");
    die;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Morpion</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/login.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Nova
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nova-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="page-contact" style="background-color: white; text-align: center;">

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top sticked">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="d-flex align-items-center">Morpion</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        
      <button 
        onclick="window.location.href = 'deconnect.php';" 
        style="border: 0px;background-color: #314357;color: white;";
      > 
        <i class="bi bi-box-arrow-right">

        </i> 
      </button >



    </div>
  </header><!-- End Header -->


<br>
<br>
<br>
<br>

<h1>
    <?php 
    $t = test($_SESSION['morpion']);
    
    if ($t === "O"){
      echo("O winned !");
      $_SESSION["playended"] = true;
    }
    
    else if($t === "X"){
      echo("X winned !");
      $_SESSION["playended"] = true;
    }
    
    else if($t === true){
      echo("Draw !");
      $_SESSION["playended"] = true;

    }

    else if($_SESSION['current_user'] == 0){
        echo(
            "Tour de ". $_SESSION['u1'] . "</strong>"            
        );
    }
    else {
        echo(
            "Tour de ". $_SESSION['u2'] . "</strong>"            
        );
    }

    ?>
</h1>

<br>


<form class="morpion" method="post">
    <div>

      <input type="submit" name="1" value="<?php echo($_SESSION['morpion'][0][0]); ?>">
      <input type="submit" name="2" value="<?php echo($_SESSION['morpion'][0][1]); ?>">
      <input type="submit" name="3" value="<?php echo($_SESSION['morpion'][0][2]); ?>">
    </div>
    <div>
      <input type="submit" name="4" value="<?php echo($_SESSION['morpion'][1][0]); ?>">
      <input type="submit" name="5" value="<?php echo($_SESSION['morpion'][1][1]); ?>">
      <input type="submit" name="6" value="<?php echo($_SESSION['morpion'][1][2]); ?>">
    </div>
    <div>
      <input type="submit" name="7" value="<?php echo($_SESSION['morpion'][2][0]); ?>">
      <input type="submit" name="8" value="<?php echo($_SESSION['morpion'][2][1]); ?>">
      <input type="submit" name="9" value="<?php echo($_SESSION['morpion'][2][2]); ?>">
    </div>
</form> 

<?php

$key = array_keys($_POST)[0];
$convert = [
    1 => [0, 0],
    2 => [0, 1],
    3 => [0, 2],
    4 => [1, 0],
    5 => [1, 1],
    6 => [1, 2],
    7 => [2, 0],
    8 => [2, 1],
    9 => [2, 2],
];


if($_SESSION["playended"] !== true){
  if(in_array($key, array_keys($convert))){


      if(empty($_SESSION['morpion'][$convert[$key][0]][$convert[$key][1]])){

          $_SESSION['morpion'][$convert[$key][0]][$convert[$key][1]] = $_SESSION['current_user'] == 0 ? "O" : "X";

          $_SESSION['current_user'] = ( $_SESSION['current_user'] + 1 ) % 2;
          header("Location: game.php");
      }    
  }
}




?>










  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

