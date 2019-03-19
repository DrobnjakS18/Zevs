<?php

if(isset($_POST['izmena'])){
    session_start();

    $errors = [];

    $id = $_POST['id'];

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

    if($sport == null){

        $errors[] = "niste izabrali sport";
    }

    if(count($errors) > 0){

        $_SESSION['trener_update_error'] = "Lose popunjena polja";
        header("Location:../../index.php?page=Treneri_insert&&id=$id");
    }
    else {

        $naziv_slike = time().$ime_slike;
        $ime_slike = "images/$ime_slike";
        $nova_putanja = "../../images/".$naziv_slike;


        if(move_uploaded_file($stara_putanja,$nova_putanja)){


            include "../config.php";
            $upit_galerija_update_2 = "UPDATE `treneri` SET `ime`=:ime,`prezime`=:prezime,`putanja_slike`=:slika,`naziv_slike`=:ime_slike,`alt`=:alt,`ul_tr_id`=:uloga WHERE id =:id";
            $upit= $konekcija->prepare($upit_galerija_update_2);

            $upit->bindParam(":ime",$ime);
            $upit->bindParam(":prezime",$prezime);
            $upit->bindParam(":slika",$nova_putanja);
            $upit->bindParam(":ime_slike",$ime_slike);
            $upit->bindParam(":alt",$alt);
            $upit->bindParam(":uloga",$uloga);
            $upit->bindParam(":id",$id);

            try{
                $rez_slika_unos_2 =$upit->execute();

                if($rez_slika_unos_2){



                        $upit_galerija_update = "UPDATE `trener_sport` SET `id_s`=:sport WHERE id_t =".$id;

                        $upit= $konekcija->prepare($upit_galerija_update);

                        $upit->bindParam(":sport",$sport);

                        $rez_slika_unos = $upit->execute();


                        if($rez_slika_unos){

                            $_SESSION['treneri_update'] = "Uspesno izmenjen trener";
                            header("Location:../../index.php?page=Treneri_insert&&id=$id");
                        }else{

                            $_SESSION['trener_update_error'] = "Serverska greska";
                            header("Location:../../index.php?page=Treneri_insert&&id=$id");
                        }




                    }else {

                    $_SESSION['trener_update_error'] = "Nije uspela izmena trenera";
                    header("Location:../../index.php?page=Treneri_insert&&id=$id");
                }

                }catch(PDOException $e){

                $_SESSION['trener_update_error'] = "Serverska greska".$e->getMessage();
                header("Location:../../index.php?page=Treneri_insert&&id=$id");
            }
        }
        else {

            $_SESSION['trener_update_error'] = "Nije uspeo upload slike";
            header("Location:../../index.php?page=Treneri_insert&&id=$id");
        }
    }

}else {

    header("Location:../../index.php");
}
