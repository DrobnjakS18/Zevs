<?php

if(isset($_POST['anketa_insert'])){
    session_start();
    $errors = [];

    $anketa = $_POST['anketa'];

    $anketa_reg = "/^[A-Z0-9][a-z0-9]{1,254}$/";

    if(!preg_match($anketa_reg,$anketa)){

        $errors[] = 'Los popunjen tekst. Pitanje mora da pocne velikim slovom!';
    }

    if(count($errors) > 0){

        $_SESSION['anketa_insert_error'] = $errors;
        header("Location:../index.php?page=Anketa_insert");
    }
    else {

        $upit = "INSERT INTO `anketa`(`id`, `pitanje`) VALUES ('',:pitanje)";

        include "config.php";
        $upit_anketa = $konekcija->prepare($upit);

        $upit_anketa->bindParam(':pitanje',$anketa);

        $rez = $upit_anketa->execute();

        if($rez){
            $_SESSION['anketa_insert'] = "Uspesno dodato pitanje";
            header("Location:../index.php?page=Anketa_insert");

        }else{
            $_SESSION['anketa_insert_greska'] = "Neuspesan upis";
            header("Location:../index.php?page=Anketa_insert");
        }
    }
}else {

    header("Location:../index.php");
}