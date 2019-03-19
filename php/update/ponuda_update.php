<?php if(isset($_POST['Ponuda'])){
    session_start();
    $errors = [];

    $id = $_POST['id'];

    $naziv= $_POST['naziv'];
    $reNaziv = "/^[A-Z][a-z]{2,10}$/";

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

        $_SESSION['ponuda_insert_greske'] = $errors;
        header("location: ../../index.php?page=Ponuda_insert&&id=$id");
    }
    else {
        echo "ok";
        include "../config.php";




        $upit = "UPDATE `ponuda` SET `ponuda`=:ponuda,`cena`=:cena,`bodystep`=:step,`bodypump`=:pump,`yoga`=:yoga,`cardio_box`=:box,`zumba`=:zumba WHERE id=".$id;
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
                $_SESSION['ponuda_insert'] = "Uspesno izmenjena ponuda";
                header("location: ../../index.php?page=Ponuda_insert&&id=$id");
            }
            else {
                $_SESSION['ponuda_insert_tekst'] = "Nije uspela izmena ponude";
                header("location: ../../index.php?page=Ponuda_insert&&id=$id");
            }
        }catch(PDOException $e){

            $_SESSION['ponuda_insert_tekst'] = "Serverska greska";
            header("location: ../../index.php?page=Ponuda_insert&&id=$id");
        }
    }



}else{

    header("Location:../../index.php?page=Pocetna");
}