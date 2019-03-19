<?php

$data= null;
$status = 404;
if(isset($_POST['posalji'])){

    $id = $_POST['id'];

    $upit  = 'SELECT *,rt.id AS RasTr  FROM dani d LEFT JOIN raspored_dani rd ON d.id_dani = rd.id_d LEFT JOIN raspored_treninga rt ON rd.id_r = rt.id INNER JOIN vreme v ON rt.id_vreme = v.id INNER JOIN sport s ON rt.id_sport = s.id INNER JOIN treneri t ON rt.id_trener = t.id WHERE d.id_dani = '.$id.' ORDER BY RasTr';

    require 'config.php';

    $dani = DohvatiSve($upit);


    if($dani){

        $data = $dani;
        $status = 200;
    }else {

        $data = null;
        $podaci = 400;
    }
}
http_response_code($status);
echo json_encode($data);

