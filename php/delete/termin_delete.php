<?php

session_start();
if(isset($_GET['id'])){

    $del_ter = $_GET['id'];


    $upit = "DELETE FROM `raspored_dani` WHERE id_r =".$del_ter;


    require '../config.php';
    $upit_delete = $konekcija->query($upit);


    try{

        if($upit_delete){

            $upit = "DELETE FROM `raspored_treninga` WHERE id = ".$del_ter;

            $upit_delete_2 = $konekcija->query($upit);

            if($upit_delete_2){
                header("location: ../../index.php?page=Admin");
            }else{

                $_SESSION['del_kor_greska'] = "Termin nije obrisan";
                header("location: ../../index.php?page=Admin");
            }

        }else{

            $_SESSION['del_kor_greska'] = "Termin nije obrisan";
            header("location: ../../index.php?page=Admin");
        }
    }catch(PDOExceptin $e){

        $_SESSION['del_kor_greska'] = "Serverksa greska".$e->getMessage();
        header("location: ../../index.php?page=Admin");
    }

}else{

    header("location: ../../index.php?page=Pocetna");
}