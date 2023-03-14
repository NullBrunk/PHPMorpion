<?php
session_start();

if(isset($_SESSION['u1']) && !empty($_SESSION['u1']) && isset($_SESSION['u2']) && !empty($_SESSION['u2'])){
  echo("?");
  header("Location: game.php");

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

<body class="page-contact">

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

    </div>
  </header><!-- End Header -->

  <main id="main">

   
    <!-- ======= Contact Section ======= -->
    <section>
      
		<div class="position-relative">

			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<i style="color: white;" class="bi bi-person"></i>
		      	</div>

		      	<h3 class="text-center mb-4">Login</h3>
				

<?php
if(isset($_GET['e'])){
  echo('  
    <div class="alert alert-danger">
      Pleaser enter two different names.
    </div>
  ');

}
?>

	
	<form method="post" class="login-form">
		

		<div class="form-group">
			<input type="text" id="u1" name="u1" class="form-control rounded-left" placeholder="User 1" required>
		</div>
	<br>
		<div class="form-group d-flex">
			<input type="text" id="u2" name="u2" class="form-control rounded-left" placeholder="User 2" required>
		</div>
	<br>
		<div class="form-group">
			<button type="submit" class="form-control btn btn-primary rounded submit px-3">Play</button>
		</div>
	
		<div class="form-group d-md-flex">
	
<?php

if(!empty($_POST['u1']) && !empty($_POST['u2']) && isset($_POST['u1']) && isset($_POST['u2']) && $_POST['u1'] == $_POST['u2']){
  echo("<script>window.location.href = '?e'</script>");
  die;
}
else if (!empty($_POST['u1']) && !empty($_POST['u2']) && isset($_POST['u1']) && isset($_POST['u2'])){
  $_SESSION['u1'] = htmlspecialchars($_POST['u1']);
  $_SESSION['u2'] = htmlspecialchars($_POST['u2']);
  $_SESSION['current_user'] = 0;
  $_SESSION['morpion'] = [ 
    [
      "", 
      "", 
      ""
    ], 
    [
      "", 
      "", 
      ""
    ], 
    [
      "", 
      "", 
      ""
    ] 
  ];
  header("Location: game.php");
}
?>

		</div>
	</form>

	</div>
		</div>
	</div>
</div>

    </section><!-- End Contact Section -->

  </main><!-- End #main -->



  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>