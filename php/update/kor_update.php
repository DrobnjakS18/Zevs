<?php

session_start();

if($_SERVER['REQUEST_METHOD'] != "POST"){
    header("Location:../index.php?page=Pocetna");
}
if(isset($_POST['izmena'])){

    $errors = [];
    $id = $_POST['id'];

    $uloga = $_POST['uloga'];

    if($uloga == "0"){

        $errors[] = "Niste izabrali ulogu";
    }

    $ponuda = $_POST['ponuda'];

    if($ponuda == "0"){

        $errors[] = "Niste izabrali ponudu";
    }

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

    $godine = $_POST['godine'];

    $godine_reg = "/^[1-9][0-9]$/";

    if(!preg_match($godine_reg,$godine)){

        $errors[] = "Godina nije u dobrom formatu!";

    }

    $tel = $_POST['telefon'];

    $tel_reg = "/^06[01234569][0-9]{6,7}$/";

    if(!preg_match($tel_reg,$tel)){

        $errors[] = "Broj telefona nije u dobrom formatu!";

    }

    $email = $_POST['email'];

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

        $errors[] = "Email nije u dobrom formatu!";

    }


    $pol = $_POST['pol'];

    if(!isset($pol)){
        $errors[] = "Niste izabrali pol";
    }

    if(count($errors) != 0){

        $_SESSION['update_greske'] = $errors;
        header("location: ../index.php?page=Korisnik_insert&&id=$id");
    }
    else {


        include "../config.php";



        $upit = "UPDATE `korisnik` SET `ime`=:ime,`prezime`=:prezime,`godine`=:godine,`telefon`=:tel,`email`=:email,`pol_id`=:pol,`uloga_id`=:uloga,`ponuda_id`=:ponuda WHERE id = :id";
        $ko_izmena = $konekcija->prepare($upit);

        $ko_izmena->bindParam(":ime",$ime);
        $ko_izmena->bindParam(":prezime",$prezime);
        $ko_izmena->bindParam(":godine",$godine);
        $ko_izmena->bindParam(":tel",$tel);
        $ko_izmena->bindParam(":email",$email);
        $ko_izmena->bindParam(":pol",$pol);
        $ko_izmena->bindParam(":uloga",$uloga);
        $ko_izmena->bindParam(":ponuda",$ponuda);
        $ko_izmena->bindParam(":id",$id);

        try{
            $rez = $ko_izmena->execute();

            if($rez){
                $_SESSION['update_korisnik'] = 'Podaci uspesno izmenjeni';
                header("location: ../../index.php?page=Korisnik_insert&&id=$id");
            }
            else {
                $_SESSION['update_greske_tekst'] = "Nije uspela izmena";
                header("location: ../../index.php?page=Korisnik_insert&&id=$id");
            }
        }catch(PDOException $e){

            $_SESSION['update_greske_tekst'] = "Serverska greska".$e->getMessage();
            header("location: ../../index.php?page=Korisnik_insert&&id=$id");
        }
    }
}else{

    header("Location:../../index.php?page=Pocetna");
}




