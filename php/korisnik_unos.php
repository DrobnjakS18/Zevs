<?php
session_start();

if($_SERVER['REQUEST_METHOD'] != "POST"){
    header("Location:../index.php?page=Pocetna");
}
if(isset($_POST['registracija'])){

    $errors = [];

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

    $pass = $_POST['lozinka'];


    $re_pass = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";


    if(!preg_match($re_pass,$pass)){

        $errors[] = "Nije dobra lozinka!Min 8 karaktera i barem 1 broj";
    }

    $pol = $_POST['pol'];

    if(!isset($pol)){
        $errors[] = "Niste izabrali pol";
    }

    if(count($errors) != 0){

        $_SESSION['reg_greske'] = $errors;
        header("location: ../index.php?page=Korisnik_insert");
    }
    else {

        include "config.php";

        $pass = md5($pass);

        $vazi_od = date("Y-m-d H:i:s",time());
        $mesec_dana = strtotime("1 month",time());
        $vazi_do= date("Y-m-d H:i:s",$mesec_dana);


        $upit = "INSERT INTO `korisnik`(`id`, `ime`, `prezime`, `godine`, `telefon`, `email`, `lozinka`, `pol_id`, `uloga_id`, `ponuda_id`, `vazi_od`, `vazi_do`, `aktivan`)
 VALUES ('',:ime,:prezime,:god,:tel,:email,:pass,:pol,:uloga,:ponuda,:od,:do,1)";
        $upit_unos = $konekcija->prepare($upit);

        $upit_unos->bindParam(":ime",$ime);
        $upit_unos->bindParam(":prezime",$prezime);
        $upit_unos->bindParam(":god",$godine);
        $upit_unos->bindParam(":tel",$tel);
        $upit_unos->bindParam(":email",$email);
        $upit_unos->bindParam(":pass",$pass);
        $upit_unos->bindParam(":pol",$pol);
        $upit_unos->bindParam(":uloga",$uloga);
        $upit_unos->bindParam(":ponuda",$ponuda);
        $upit_unos->bindParam(":od",$vazi_od);
        $upit_unos->bindParam(":do",$vazi_do);

        try{
            $rez = $upit_unos->execute();

            if($rez){
//                $_SESSION['korisnik'] = $rez;
                header("location: ../index.php?page=Admin");
            }
            else {
                $_SESSION['reg_greske_tekst'] = "Nije uspeo unos";
                header("location: ../index.php?page=Korisnik_insert");
            }
        }catch(PDOException $e){

            $_SESSION['reg_greske_tekst'] = "Serverska greska";
            header("location: ../index.php?page=Korisnik_insert");
        }
    }
}else{

    header("Location:../index.php?page=Pocetna");
}





