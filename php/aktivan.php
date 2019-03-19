<?php
$data = null;
$status = 404;
if(isset($_POST['posalji'])){

    $cekirano = $_POST['cekiran'];

    $svi = $_POST['svi'];


    require 'config.php';
    $br = 0;
    $success = 0;
    $error = 0;
    foreach ($svi as $jedan){

        $upit = "UPDATE `galerija` SET `aktivan`=0 WHERE id=".$jedan;

        $ocisti = $konekcija->query($upit);


        if($ocisti){

           $br++;
        } else {
            $error++;
        }
    }

    if(isset($cekirano)){
        foreach ($cekirano as $cek){

        $upit = "UPDATE `galerija` SET `aktivan`=1 WHERE id=".$cek;

        $aktiviraj = $konekcija->query($upit);

        if($aktiviraj){

            $success++;
        }else{

            $error++;
        }

    }
    }else {

       $data = null;
       $status = 404;
    }

    if($success){

        $data = ['msg' => 'Uspesno ste aktivirali slike za pocetnu stranu'];
        $status = 200;
    }

    if($error){
        $data = null;
        $status = 409;
    }

}
http_response_code($status);
echo json_encode($data);
