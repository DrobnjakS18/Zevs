<?php
session_start();
if(isset($_POST['login'])){

    $errors = [];

    $email = $_POST['email'];

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

        $errors[] = "Email nije u dobrom formatu!";

    }

    $pass = $_POST['lozinka'];


    $re_pass = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";


    if(!preg_match($re_pass,$pass)){

        $errors[] = "Nije dobra lozinka!Min 8 karaktera i barem 1 broj";
    }

    if(count($errors) != 0){

        $_SESSION['log_greske'] = $errors;
        header("location: ../index.php?page=Login");
    }
    else {

        include "config.php";

        $pass = md5($pass);

        $upit = "SELECT *,k.id AS KorID FROM korisnik k INNER JOIN ponuda p on k.ponuda_id = p.id INNER JOIN uloga u on k.uloga_id = u.id  WHERE email = :email AND lozinka=:pass AND aktivan = 1";
        $upit_log = $konekcija->prepare($upit);

        $upit_log->bindParam(":email",$email);
        $upit_log->bindParam(":pass",$pass);


        try{
            $upit_log->execute();
            $rez = $upit_log->fetch();
            if($rez){

                $_SESSION['korisnik'] = $rez;
                header("location: ../index.php?page=Profile");
            }
            else {
                $_SESSION['log_greske_tekst'] = "Nije pronadjen takav korisnik u bazi";
                header("location: ../index.php?page=Login");
            }
        }catch(PDOException $e){

            $_SESSION['log_greske_tekst'] = "Serverska greska";
            header("location: ../index.php?page=Login");
        }
    }
}else{

    header("Location:../index.php?page=Pocetna");
}