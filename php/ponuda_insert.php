
<?php if(isset($_POST['Ponuda'])){
session_start();
    $errors = [];


    $naziv= $_POST['naziv'];
    $reNaziv = "/^[A-Z0-9][a-z0-9\s]{2,20}$/";

    if(!preg_match($reNaziv,$naziv)){

        $errors[] = "Naziv u losem formatu";

    }

    $cena = $_POST['cena'];

    $rebrojevi = "/^[1-9][0-9]{0,3}$/";

    if(!preg_match($rebrojevi,$cena)){

        $errors[] = "Cena u losem formatu";

    }


    $BodyStep = $_POST['BodyStep'];


    if(!preg_match($rebrojevi,$BodyStep)){

        $errors[] = "BodyStep u losem formatu";

    }

    $BodyPump = $_POST['BodyPump'];

    if(!preg_match($rebrojevi,$cena)){

        $errors[] = "BodyPump u losem formatu";

    }

    $Yoga = $_POST['Yoga'];

    if(!preg_match($rebrojevi,$cena)){

        $errors[] = "Yoga u losem formatu";

    }

    $Cardio_Box = $_POST['Cardio_Box'];

    if(!preg_match($rebrojevi,$cena)){

        $errors[] = "Cardio Box u losem formatu";

    }

    $Zumba = $_POST['Zumba'];

    if(!preg_match($rebrojevi,$cena)){

        $errors[] = "Zumba u losem formatu";

    }

    if(count($errors) != 0){

        $_SESSION['ponuda_greske'] = $errors;
        header("location: ../index.php?page=Ponuda_insert");
    }
    else {

        include "config.php";




        $upit = "INSERT INTO `ponuda`(`id`, `ponuda`, `cena`, `bodystep`, `bodypump`, `yoga`, `cardio_box`, `zumba`) 
VALUES ('',:ponuda,:cena,:step,:pump,:yoga,:box,:zumba)";
        $upit_unos = $konekcija->prepare($upit);

        $upit_unos->bindParam(":ponuda",$naziv);
        $upit_unos->bindParam(":cena",$cena);
        $upit_unos->bindParam(":step",$BodyStep);
        $upit_unos->bindParam(":pump",$BodyPump);
        $upit_unos->bindParam(":yoga",$Yoga);
        $upit_unos->bindParam(":box",$Cardio_Box);
        $upit_unos->bindParam(":zumba",$Zumba);


        try{
            $rez = $upit_unos->execute();

            if($rez){
                $_SESSION['ponuda_uspeh'] = "Uspesno dodata ponuda";
                header("location: ../index.php?page=Ponuda_insert");
            }
            else {
                $_SESSION['ponuda_greske_tekst'] = "Nije uspelo dodavanje ponude";
                header("location: ../index.php?page=Ponuda_insert");
            }
        }catch(PDOException $e){

            $_SESSION['ponuda_greske_tekst'] = "Serverska greska".$e->getMessage();
            header("location: ../index.php?page=Ponuda_insert");
        }
    }



}else{

    header("Location:../index.php?page=Pocetna");
}