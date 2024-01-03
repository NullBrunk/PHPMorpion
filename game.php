<?php
session_start();
include_once "app/functions.php";

if(!isset($_SESSION['u1']) or empty($_SESSION['u1']) or !isset($_SESSION['u2']) or empty($_SESSION['u2'])){
    header("Location: login.php");
    die;
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

    <body class="page-contact" style="background-color: white; text-align: center;">
        <header id="header" class="header d-flex align-items-center fixed-top sticked">
            <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

                <a href="index.html" class="logo d-flex align-items-center">
                    <h1 class="d-flex align-items-center">Morpion</h1>
                </a>
                    
                <button 
                    onclick="window.location.href = 'disconnect.php'" 
                    style="border: 0px; background-color: #314357; color: white;">

                    <i class="bi bi-box-arrow-right"></i> 
                </button>
            </div>
        </header>


        <br><br><br><br>

        <h1>
            <?php 


            if(check_win()) {
                if($_SESSION["winned"] ===  "null") {
                    echo "Draw !";
                } else {
                    echo $_SESSION["winned"] . " winned !";
                }
                $_SESSION["playended"] = true;
            }
        
            else if($_SESSION['current_user'] == 0){
                echo(
                    "Tour de ". $_SESSION['u1'] . "</strong>"            
                );
            }
            else if($_SESSION['current_user'] == 1){
                echo(
                    "Tour de ". $_SESSION['u2'] . "</strong>"            
                );
            }

            ?>
        </h1>

        <br>


        <form class="morpion" method="post">
            
            <?php foreach($_SESSION["morpion"] as $line_number => $line): ?>
                <div>
                <?php foreach($line as $column_number => $square): ?>
                    <input type="submit" name="<?= "$line_number-$column_number" ?>" value="<?= $square ?>">
                <?php endforeach ?>
                </div>
            <?php endforeach ?>
            

        </form> 
    </body>
</html>

<?php

# Get the "NAME" attribute of the clicked button
$button_value = array_keys($_POST)[0];

if($_SESSION["playended"] !== true && isset($button_value) && !empty($button_value)){
    $button_value = explode("-", $button_value);
    
    $x = (int)$button_value[0];
    $y = (int)$button_value[1];

    # Check if the case is not already filled in
    if(empty($_SESSION['morpion'][$x][$y])){
        $_SESSION['morpion'][$x][$y] = $_SESSION['current_user'] == 0 ? "O" : "X";
        $_SESSION['current_user'] = ( $_SESSION['current_user'] + 1 ) % 2;
        header("Location: game.php");
    }
}

?>
