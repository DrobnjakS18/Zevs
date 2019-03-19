<?php

if(isset($_POST['termin_insert'])){
    session_start();

    $upit = "SELECT COUNT(id) AS BrojRedova FROM raspored_treninga";
    include "config.php";

    $br_redova = $konekcija->query($upit)->fetch();

    $br_int = intval($br_redova->BrojRedova);

    if($br_int == 56){

        $_SESSION['br_redova'] = "Svi termini su popunjeni";
        header("Location:../index.php?page=Termin_insert");
    }else{

        $errors = [];

        $dan = $_POST['dan'];

        if($dan == '0'){
            $errors[] = 'Niste izabrali dan';
        }


       $upit = "SELECT COUNT(rd.id_rd) AS BrTer FROM dani d LEFT JOIN raspored_dani rd ON d.id_dani = rd.id_d LEFT JOIN raspored_treninga rt ON rd.id_r = rt.id INNER JOIN vreme v ON rt.id_vreme = v.id INNER JOIN sport s ON rt.id_sport = s.id INNER JOIN treneri t ON rt.id_trener = t.id WHERE d.id_dani = ".$dan;

        $dani = $konekcija->query($upit)->fetch();

        $dani_int = intval($dani->BrTer);

        if($dani_int == 8){

            $_SESSION['br_redova'] = "Svi termini za ovaj su popunjeni";
            header("Location:../index.php?page=Termin_insert");

        }else {

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

                $_SESSION['termin_insert_error'] = $errors;
                header("Location:../index.php?page=Termin_insert");
            }
            else {

                $upit = "INSERT INTO `raspored_treninga`(`id`, `id_vreme`, `id_sport`, `id_trener`) VALUES ('',:vreme,:sport,:trener)";

                $upit_tekst = $konekcija->prepare($upit);

                $upit_tekst->bindParam(':vreme',$vreme);
                $upit_tekst->bindParam(':sport',$sport);
                $upit_tekst->bindParam(':trener',$trener);

                $rez = $upit_tekst->execute();

                if($rez){

                    $ras_termin = $konekcija->lastInsertId();


                    $upit = "INSERT INTO `raspored_dani`(`id_rd`, `id_r`, `id_d`) VALUES ('',".$ras_termin.",".$dan.")";

                    $upit_tekst_2 = $konekcija->query($upit);

                    $res = $upit_tekst_2;

                    if($res){
                        $_SESSION['termin_insert_'] = "Uspesno dodat termin";
                        header("Location:../index.php?page=Termin_insert");
                    }else{
                        $_SESSION['termin_insert_greska'] = "Neuspesno dodat termin";
                        header("Location:../index.php?page=Termin_insert");
                    }


                }else{
                    $_SESSION['termin_insert_greska'] = "Neuspesno dodat termin";
                    header("Location:../index.php?page=Termin_insert");
                }
            }


        }

    }


}else{

    header("Location:../index.php");
}
