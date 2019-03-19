<?php

session_start();
if(isset($_GET['id'])){

    $del_tek = $_GET['id'];


    $upit = "DELETE FROM `pocetna_tekst` WHERE id = ".$del_tek;

    require '../config.php';
    $upit_delete = $konekcija->query($upit);


    try{

        if($upit_delete){

            header("location: ../../index.php?page=Admin");
        }else{

            $_SESSION['del_kor_greska'] = "Slika nije obrisana";
            header("location: ../../index.php?page=Admin");
        }
    }catch(PDOExceptin $e){

        $_SESSION['del_kor_greska'] = "Serverksa greska".$e->getMessage();
        header("location: ../../index.php?page=Admin");
    }


}else{

    header("location: ../../index.php?page=Pocetna");
}