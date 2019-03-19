<?php
//Posto se hostuje staviti svoju ip adresu(192.168.0.104) da bi radilo
    require "podaci.php";

    try {
        $konekcija = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8", USER, PASS);
        $konekcija->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $konekcija->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    } catch (PDOException $e) {

        echo $e->getMessage();
    }


    function DohvatiSve($upit){
        global $konekcija;
        $rez = $konekcija->query($upit)->fetchAll();
        return $rez;

    }


