<?php
$data = null;
$status = 404;

if(isset($_POST['izmeni'])){


    $errors = [];

    $id =  $_POST['id'];

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

    if(count($errors) != 0){

        $data = [
            'msg' => 'Doslo je do greske'
        ];
        $status = 400;
    }
    else {

        include "config.php";
        $upit = "UPDATE `korisnik` SET `ime`= :ime,`prezime`=:prezime,`godine`=:god,`telefon`=:tel,`email`=:email WHERE id = :id";

        $upit_update = $konekcija->prepare($upit);

        $upit_update->bindParam(":ime",$ime);
        $upit_update->bindParam(":prezime",$prezime);
        $upit_update->bindParam(":god",$godine);
        $upit_update->bindParam(":tel",$tel);
        $upit_update->bindParam(":email",$email);
        $upit_update->bindParam(":id",$id);

        try{
            $rez = $upit_update->execute();

            if($rez){
                $data =[
                    'msg' => 'Uspesno izmenjeni podaci'
                ];
                $status = 200;
            }
            else {
                $data =[
                    'msg' => 'Doslo je do greske u upitu'
                ];
                $status = 409;
            }
        }catch(PDOException $e){

            $data =[
                'msg' => 'Serverska greska'
            ];
            $status = 500;
        }
    }


}else {

    $data = null;
    $status = 404;
}

http_response_code($status);
echo json_encode($data);