<?php

if(isset($_POST['tekst_insert'])){
    session_start();
    $errors = [];

    $sport = $_POST['sport'];

    if($sport == '0'){
        $errors[] = 'Niste izabrali sport';
    }

    $tekst = $_POST['tekst'];


    if(count($errors) > 0){

        $_SESSION['tekst_insert_error'] = $errors;
        header("Location:../index.php?page=Tekst_insert");
    }
    else {

        $upit = "INSERT INTO `pocetna_tekst`(`id`, `tekst`, `id_sport`) VALUES ('',:tekst,:sport)";

        include "config.php";
        $upit_tekst = $konekcija->prepare($upit);

        $upit_tekst->bindParam(':tekst',$tekst);
        $upit_tekst->bindParam(':sport',$sport);

        $rez = $upit_tekst->execute();

        if($rez){
            $_SESSION['tekst_insert_'] = "Uspesno dodat tekst";
            header("Location:../index.php?page=Tekst_insert");

        }else{
            $_SESSION['tekst_insert_greska'] = "Neuspesan upis";
            header("Location:../index.php?page=Tekst_insert");
        }
    }
}else {

    header("Location:../index.php");
}

