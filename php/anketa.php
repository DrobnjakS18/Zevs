<?php
$data = null;
$staus = 404;
if(isset($_POST['posaji'])){


    $id = $_POST['id'];

    $upit = "INSERT INTO `anketa_ocena`(`id`, `id_a`, `id_o`) VALUES ('',1,".$id.")";

    require 'config.php';
    $anketa = $konekcija->query($upit);

    try {
        if ($anketa) {

            $kor = $_POST['kor'];

            $upit_dva = "INSERT INTO `korisnik_ocena`(`id`, `id_k`, `id_o`) VALUES ('',".$kor.",".$id.")";


            $kor = $konekcija->query($upit_dva);


            if($kor){

                $data = ['msg' => 'Hvala sto ste glasali!'];
                $staus = 201;

            }else{

                $data = null;
                $staus = 409;
            }


        } else {

            $data = null;
            $staus = 409;
        }


    } catch (PDOException $e) {

        $data = $e->getMessage();
        $staus = 500;
    }

}
http_response_code($staus);
echo json_encode($data);

