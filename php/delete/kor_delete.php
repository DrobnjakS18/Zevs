<?php

session_start();
if(isset($_GET['id'])){

    $del_kor = $_GET['id'];

    $upit = "DELETE FROM `korisnik_ocena` WHERE id_k = ".$del_kor;

    require '../config.php';
    $upit_delete = $konekcija->query($upit);


    try{
        if($upit_delete){

            $upit = "DELETE FROM `korisnik` WHERE id=".$del_kor;

            $upit_delete_2 = $konekcija->query($upit);

            if($upit_delete_2){
                header("location: ../../index.php?page=Admin");
            }else{

                $_SESSION['del_kor_greska'] = "Korisnik nije obrisan";
                header("location: ../../index.php?page=Admin");
            }
        }
        else {
            $_SESSION['del_kor_greska'] = "Korisnik nije obrisan";
            header("location: ../../index.php?page=Admin");
        }
    }catch(PDOExceptin $e){

        $_SESSION['del_kor_greska'] = "Serverksa greska".$e->getMessage();
        header("location: ../../index.php?page=Admin");
    }


}else{

    header("location: ../../index.php?page=Pocetna");
}

