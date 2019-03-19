<?php

if(isset($_POST['izmena'])){
    session_start();
    $errors = [];

    $id = $_POST['id'];

    $sport = $_POST['sport'];

    if($sport == '0'){
        $errors[] = 'Niste izabrali sport';
    }

    $tekst = $_POST['tekst'];

    $tekst_reg = "/[A-Z0-9][a-z0-9]{1,254}/";

    if(!preg_match($tekst_reg,$tekst)){

        $errors[] = 'Los popunjen tekst';
    }

    if(count($errors) > 0){

        $_SESSION['tekst_update_error'] = $errors;
        header("Location:../../index.php?page=Tekst_insert&&id=$id");
    }
    else {

        $upit = "UPDATE `pocetna_tekst` SET `tekst`=:tekst,`id_sport`=:sport WHERE id = ".$id;

        include "../config.php";
        $upit_tekst = $konekcija->prepare($upit);

        $upit_tekst->bindParam(':tekst',$tekst);
        $upit_tekst->bindParam(':sport',$sport);

        $rez = $upit_tekst->execute();

        if($rez){
            $_SESSION['tekst_update_'] = "Uspesno izmenjen tekst";
            header("Location:../../index.php?page=Tekst_insert&&id=$id");

        }else{
            $_SESSION['tekst_update_error'] = "Neuspesna izmane";
            header("Location:../../index.php?page=Tekst_insert&&id=$id");
        }
    }
}else {

    header("Location:../index.php");
}

