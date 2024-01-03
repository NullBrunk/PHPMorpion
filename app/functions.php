<?php

function horizontal_win(): bool
{
    foreach($_SESSION['morpion'] as $line){
        if ( sizeof(array_unique($line)) === 1 && $line[0] !== "" ) {
            $_SESSION["winned"] =  $line[0];
            return true;
        }
    }

    return false;
}


function vertical_win(): bool
{
    for ($i = 0; $i < 3; $i++){

        $x = 0;
        $o = 0;

        for($j = 0; $j < 3; $j++){

            if ($_SESSION['morpion'][$j][$i] == "X"){
                $x++;
            }
            else if($_SESSION['morpion'][$j][$i] == "O"){
                $o++;
            }

        }

        if($x == 3){
            $_SESSION["winned"] = "X";
            return true;
        }
        else if ($o == 3){
            $_SESSION["winned"] =  "O";
            return true;
        }
    }
    return false;
}


function diagonal_win(): bool
{

    $o = 0;
    $x = 0;
    
    for($i = 0; $i < 3; $i++){
        if($_SESSION['morpion'][$i][$i] == "O"){
            $o++;
        }
        else if($_SESSION['morpion'][$i][$i] == "X"){
            $x++;
        }
    }
    if($o == 3){
        $_SESSION["winned"] = "O";
        return true;
    }
    else if($x == 3){
        $_SESSION["winned"] =  "X";
        return true;
    }    
    

    $o = 0;
    $x = 0;

    for($i = 0; $i < 3; $i++){
        if ($_SESSION['morpion'][$i][2-$i] == "O"){
            $o++;
        }
        else if($_SESSION['morpion'][$i][2-$i] == "X"){
            $x++;
        }
    }
    if($o == 3){
        $_SESSION["winned"] =  "O";
        return true;
    }
    else if($x == 3){
        $_SESSION["winned"] =  "X";
        return true;
    }  


    return false;
}


function check_draw(): bool 
{
    foreach($_SESSION['morpion'] as $line){
        if(in_array("", $line)) {
            return false;
        }            
    }

    $_SESSION["winned"] = "null";
    return true;
}



function check_win() 
{
    return horizontal_win() || 
           vertical_win() || 
           diagonal_win() || 
           check_draw();
}