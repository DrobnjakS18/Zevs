<?php

session_start();
if(isset($_GET['id'])){

    require '../config.php';
    $del_tr = $_GET['id'];

    $upit = "SELECT * FROM raspored_treninga rt INNER JOIN raspored_dani rd ON rt.id = rd.id_r WHERE rt.id_trener = $del_tr";

    $del_upit = $konekcija->query($upit)->fetchAll();

    foreach ($del_upit as $trener_id){

        $upit_dva = "DELETE FROM `raspored_dani` WHERE id_rd = $trener_id->id_rd" ;

        $upit_del= $konekcija->query($upit_dva);
    }


    try{

        if($upit_del){

            $upit = "DELETE FROM `raspored_treninga` WHERE id_trener = ".$del_tr;

            $upit_delete = $konekcija->query($upit);

            if($upit_delete){

                $upit = "DELETE FROM `trener_sport` WHERE id_t = ".$del_tr;

                $upit_delete_2 = $konekcija->query($upit);


                if($upit_delete_2){


                    $upit = "DELETE FROM `treneri` WHERE id = ".$del_tr;

                    $upit_delete_3 = $konekcija->query($upit);

                    if($upit_delete_3){
                        header("location: ../../index.php?page=Admin");
                    }else{

                        $_SESSION['del_kor_greska'] = "Trener nije obrisan";
                        header("location: ../../index.php?page=Admin");
                    }

                }else{

                    $_SESSION['del_kor_greska'] = "Trener nije obrisan";
                    header("location: ../../index.php?page=Admin");
                }
            }
            else {
                $_SESSION['del_kor_greska'] = "Trener nije obrisan";
                header("location: ../../index.php?page=Admin");
            }
        }else {
            $_SESSION['del_kor_greska'] = "Trener nije obrisan";
            header("location: ../../index.php?page=Admin");
        }


    }catch(PDOExceptin $e){

        $_SESSION['del_kor_greska'] = "Serverksa greska".$e->getMessage();
        header("location: ../../index.php?page=Admin");
    }


}else{

    header("location: ../../index.php?page=Pocetna");
}
