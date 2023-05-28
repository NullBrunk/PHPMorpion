<?php

function horizontal(array $morpion): string
{
    foreach($morpion as $line){
        if ( sizeof( array_unique( $line ) ) == 1 && $line[0] != "" ) {
            return $line[0];
        }
    }

    return "";
}


function vertical(array $morpion): string
{
    for ($i = 0; $i < 3; $i++){

        $x = 0;
        $o = 0;

        for($j = 0; $j < 3; $j++){

            if ($morpion[$j][$i] == "X"){
                $x++;
            }

            else if($morpion[$j][$i] == "O"){
                $o++;
            }

        }

        if($x == 3){
            return "X";
        }
        else if ($o == 3){
            return "O";
        }
    }
        
    return "";
}


function diagonale(array $morpion): string
{

    $o = 0;
    $x = 0;
    
    for($i = 0; $i < 3; $i++){
        if($morpion[$i][$i] == "O"){
            $o++;
        }
        else if($morpion[$i][$i] == "X"){
            $x++;
        }
    }
    if($o == 3){
        return "O";
    }
    else if($x == 3){
        return "X";
    }    
    

    $o = 0;
    $x = 0;

    for($i = 0; $i < 3; $i++){
        if ($morpion[$i][2-$i] == "O"){
            $o++;
        }
        else if($morpion[$i][2-$i] == "X"){
            $x++;
        }
    }
    if($o == 3){
        return "O";
    }
    else if($x == 3){
        return "X";
    }  


    return "";
}


function is_draw(array $morpion): bool 
{
    foreach($morpion as $ligne){
        foreach($ligne as $case){
            if(empty($case)){
               return false; 
            }
        }
    }
    return true;
}



function test(array $morpion) 
{
    $h = horizontal($morpion);
    $v = vertical($morpion);
    $d = diagonale($morpion);
    

    if($h != ""){
        return $h; 
    }
    
    if($v != ""){
        return $v;
    }

    if($d != ""){
        return $d;
    }
    
    return is_draw($morpion);
}