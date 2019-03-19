<?php

if(isset($_POST['izmena'])){
    session_start();

        $errors = [];

        $id = $_POST['id'];

        $sport = $_POST['sport'];

        if($sport == '0'){
            $errors[] = 'Niste izabrali sport';
        }

        $vreme = $_POST['vreme'];


        if($vreme == '0'){
            $errors[] = 'Niste izabrali vreme';
        }


        $trener = $_POST['trener'];


        if($trener == '0'){
            $errors[] = 'Niste izabrali trenera';
        }


        if(count($errors) > 0){

            $_SESSION['termin_update_error'] = $errors;
            header("Location:../../index.php?page=Termin_insert");
        }
        else {

            $upit = "UPDATE `raspored_treninga` SET `id_vreme`=:vreme,`id_sport`=:sport,`id_trener`=:trener WHERE id = $id";

            include "../config.php";

            $upit_tekst = $konekcija->prepare($upit);

            $upit_tekst->bindParam(':vreme',$vreme);
            $upit_tekst->bindParam(':sport',$sport);
            $upit_tekst->bindParam(':trener',$trener);

            $rez = $upit_tekst->execute();

            if($rez){
                $_SESSION['termin_insert_'] = "Uspesno izmenjen termin";
                header("Location:../../index.php?page=Termin_insert");

            }else{
                $_SESSION['termin_insert_greska'] = "Neuspesno izmenjen termin";
                header("Location:../../index.php?page=Termin_insert");
            }
        }


}else{

    header("Location:../../index.php");
}
