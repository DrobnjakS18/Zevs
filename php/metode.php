<?php


function TekstGreske($tekst){

    if(isset($_SESSION[$tekst])){
        echo $_SESSION[$tekst];
        unset($_SESSION[$tekst]);
    }
}

function NizGreske($niz,$tekst){

//        $niz_greske = $_SESSION[$niz];
        echo "<div class='ser_reg'>";
        echo "<ul>";
        foreach($niz as $red){

            echo "<li>$red</li>";
        }
        echo "</ul>";
        echo "</div>";
        unset($_SESSION[$tekst]);

}

function NazivSlike($string){

    $rez_put = explode("/",$string);
    echo $rez_put[2];
}






















