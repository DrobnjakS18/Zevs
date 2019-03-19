<?php

if(isset($_POST['trener'])){
    session_start();

    $errors = [];



    $ime = $_POST['ime'];

    $ime_reg = "/^[A-ZČĆŠĐŽ][a-zčćšđž]{2,9}$/";

    if(!preg_match($ime_reg,$ime)){

        $errors[] = "Ime nije u dobrom formatu!";

    }

    $prezime = $_POST['prezime'];

    $prezime_reg = "/^([A-ZČĆŠĐŽ][a-zčćšđž]{2,14}(\s)*){1,2}$/";

    if(!preg_match($ime_reg,$ime)){

        $errors[] = "Ime nije u dobrom formatu!";

    }


    $alt= $ime."_".$prezime;
    $slika = $_FILES['slika'];

    $ime_slike = $slika['name'];
    $tip_slike = $slika['type'];
    $stara_putanja = $slika['tmp_name'];
    $vel_slike = $slika['size'];

    $dozvoljeni_formati = array("image/jpg","image/jpeg","image/png", "image/gif");

    if(!in_array($tip_slike, $dozvoljeni_formati)){
        $errors[] = "Tip fajla nije ok.";
    }

    if($vel_slike > 3000000){ // 3.000.000B ~ 3MB
        $errors[] = "Fajl mora biti manji od 3MB.";
    }

    $uloga= $_POST['uloga'];

    if($uloga == "0"){

        $errors[] = "Niste izabrali ulogu";
    }

    $sport= $_POST['sport'];

    if($sport == "0"){

        $errors[] = "niste izabrali sport";
    }

    if(count($errors) > 0){

        $_SESSION['trener_insert_error'] = "Lose popunjena polja";
        header("Location:../index.php?page=Treneri_insert");
    }
    else {

        $naziv_slike = time().$ime_slike;
        $ime_slike = "images/$ime_slike";
        $nova_putanja = "../images/".$naziv_slike;


        if(move_uploaded_file($stara_putanja,$nova_putanja)){




            $upit_galerija_insert = "INSERT INTO `treneri`(`id`, `ime`, `prezime`, `putanja_slike`,`naziv_slike`,`alt`, `ul_tr_id`)
VALUES ('',:ime,:prezime,:slika,:ime_slike,:alt,:uloga)";

            include "config.php";
            $upit= $konekcija->prepare($upit_galerija_insert);


            $upit->bindParam(":ime",$ime);
            $upit->bindParam(":prezime",$prezime);
            $upit->bindParam(":slika",$nova_putanja);
            $upit->bindParam(":ime_slike",$ime_slike);
            $upit->bindParam(":alt",$alt);
            $upit->bindParam(":uloga",$uloga);


            try{

                $rez_slika_unos =$upit->execute();

                if($rez_slika_unos){

                    $trener_id = $konekcija->lastInsertId();


                        $upit_vez = "INSERT INTO `trener_sport`(`id`, `id_t`, `id_s`) VALUES ('',$trener_id,$sport)";

                        $trener_vez = $konekcija->query($upit_vez);

                        if($trener_vez){

                            $_SESSION['treneri_insert'] = "Uspesno dodat novi trener";
                            header("Location:../index.php?page=Treneri_insert");
                        }else{

                            $_SESSION['trener_insert_error'] = $e->getMessage();
                            header("Location:../index.php?page=Treneri_insert");
                        }

                }
            }catch(PDOException $e){

                $_SESSION['trener_insert_error'] = $e->getMessage();
                header("Location:../index.php?page=Treneri_insert");
            }
        }
        else {

            $_SESSION['trener_insert_error'] = "Nije uspeo upload slike";
            header("Location:../index.php?page=Treneri_insert");
        }
    }

}else {

    header("Location:../index.php");
}




