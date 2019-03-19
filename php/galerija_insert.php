<?php
session_start();
if(isset($_POST['galerija_insert'])){

    $errors = [];

    $naziv= $_POST['naziv'];
    $reNaziv = "/^[\w\s]{1,255}$/";

    if(!preg_match($reNaziv,$naziv)){

        $errors[] = "Nije dobar naziv slike";

    }

    $alt= $_POST['naziv'];
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

        $_SESSION['galerija_insert_error'] = "Lose popunjena polja";
        header("Location:../index.php?page=Galerija_insert");
    }
    else {

        $naziv_slike = time().$ime_slike;
        $nova_putanja = "../images/".$naziv_slike;


        if(move_uploaded_file($stara_putanja,$nova_putanja)){



            $upit_galerija_insert = "INSERT INTO `galerija`(`id`, `naziv`, `slika_putanja`, `slika_naziv` ,`alt`) VALUES ('',:naziv,:slika,:naziv_slike,:alt)";

            include "config.php";
            $upit= $konekcija->prepare($upit_galerija_insert);

            $upit->bindParam(":naziv",$naziv);
            $upit->bindParam(":slika",$nova_putanja);
            $upit->bindParam(":naziv_slike",$naziv_slike);
            $upit->bindParam(":alt",$naziv);

            try{
                $rez_slika_unos =$upit->execute();

                if($rez_slika_unos){

                    $_SESSION['galerija_insert'] = "Uspesno dodata slika";
                    header("Location:../index.php?page=Galerija_insert");

                }
            }catch(PDOException $e){

                $_SESSION['galerija_insert_error'] = $e->getMessage();
                header("Location:../index.php?page=Galerija_insert");
            }
        }
        else {

            $_SESSION['galerija_insert_error'] = "Nije uspeo upload slike";
            header("Location:../index.php?page=Galerija_insert");
        }
    }



}else {

    header("Location:../index.php?page=Pocetna");
}