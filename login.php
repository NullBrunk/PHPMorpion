<?php
session_start();

if(isset($_SESSION['u1']) && !empty($_SESSION['u1']) && isset($_SESSION['u2']) && !empty($_SESSION['u2'])){
    header("Location: game.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Morpion</title>

        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        
        <link href="assets/css/main.css" rel="stylesheet">
        <link href="assets/css/login.css" rel="stylesheet">

    </head>

    <body class="page-contact">

        <header id="header" class="header d-flex align-items-center fixed-top sticked">
            <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <h1 class="d-flex align-items-center">Morpion</h1>
                </a>
            </div>
        </header>

        <main id="main">
            <section>
                <div class="position-relative">
                    <div class="row justify-content-center">
                        <div class="col-md-7 col-lg-5">
                            <div class="login-wrap p-4 p-md-5">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <i style="color: white;" class="bi bi-person"></i>
                                </div>

                                <h3 class="text-center mb-4">Login</h3>
                        

                                <?php if(isset($_GET['e'])): ?>
                                    <div class="alert alert-danger">
                                        Pleaser enter two different names.
                                    </div>
                                <?php endif; ?>

            
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
                
                                        <?php if(isset($_POST['u1']) && isset($_POST['u2']) && $_POST['u1'] == $_POST['u2']): ?>
                                            <script>window.location.href = '?e'</script>
                                            <?php die; ?>
                                        <?php elseif(!empty($_POST['u1']) && !empty($_POST['u2']) && isset($_POST['u1']) && isset($_POST['u2'])): ?>
                                            
                                            <?php
                                                $_SESSION['u1'] = htmlspecialchars($_POST['u1']);
                                                $_SESSION['u2'] = htmlspecialchars($_POST['u2']);
                                                $_SESSION['current_user'] = 0;
                                                $_SESSION['morpion'] = [ 
                                                    [ "", "", "" ], 
                                                    [ "", "", "" ], 
                                                    [ "", "", "" ],
                                                ];
                                                    
                                                header("Location: game.php");
                                            ?>  

                                        <?php endif;?>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>