<?php

if(isset($_POST['izmena'])){
    session_start();

    $errors = [];

    $id = $_POST['id'];

    $naziv= $_POST['naziv'];
    $reNaziv = "/^[\w\s]{1,255}$/";

    if(!preg_match($reNaziv,$naziv)){

        $errors[] = "Nije dobar naziv slike";

    }


    $alt= $naziv;
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



    if(count($errors) > 0){

        $_SESSION['galerija_update_error'] = "Lose popunjena polja";
        header("Location:../../index.php?page=Galerija_insert&&id=$id");
    }
    else {

        $naziv_slike = time().$ime_slike;
        $nova_putanja = "../../images/".$naziv_slike;


        if(move_uploaded_file($stara_putanja,$nova_putanja)){


            $upit_galerija_insert = "UPDATE `galerija` SET `naziv`=:naziv,`slika_putanja`=:slika,`slika_naziv`=:naziv_slike,`alt`=:alt WHERE id = ".$id;

            include "../config.php";
            $upit= $konekcija->prepare($upit_galerija_insert);

            $upit->bindParam(":naziv",$naziv);
            $upit->bindParam(":slika",$nova_putanja);
            $upit->bindParam(":naziv_slike",$naziv_slike);
            $upit->bindParam(":alt",$naziv);

            try{
                $rez_slika_unos =$upit->execute();

                if($rez_slika_unos){
                    $_SESSION['galerija_update_'] = "Uspesno izmenjena slika";
                    header("Location:../../index.php?page=Galerija_insert&&id=$id");

                }
            }catch(PDOException $e){

                $_SESSION['galerija_update_error'] = "Serverska gresla";
                header("Location:../../index.php?page=Galerija_insert&&id=$id");
            }
        }
        else {

            $_SESSION['galerija_update_error'] = "Nije uspeo upload slike";
            header("Location:../../index.php?page=Galerija_insert&&id=$id");
        }
    }

}else {

    header("Location:../../index.php");
}


