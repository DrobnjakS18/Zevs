<?php


session_start();
require "php/config.php";
require 'php/metode.php';





//echo $_SERVER['REMOTE_ADDR']; KADA SE BUDE HOSTTOVAO SAJT
$page= '';

if(isset($_GET['page'])){

    $page = $_GET['page'];
}

require "include/head.php";
require "include/nav.php";
switch($page){

    case "Pocetna":
        require "include/pocetna.php";
        break;
    case "Galerija":
        require "include/galerija.php";
        break;
    case "Treneri":
        require "include/treneri.php";
        break;
    case "Ponuda":
        require "include/ponuda.php";
        break;
    case "Kontakt":
        require "include/kontakt.php";
        break;
    case "Autor":
        require "include/autor.php";
        break;
    case "Registracija":
        require "include/registracija.php";
        break;
    case "Login":
        require "include/login.php";
        break;
    case "Profile":
        require "include/profile.php";
        break;
    case "Admin":
        require "include/admin_panel.php";
        break;
    case "Galerija_insert":
        require "include/galerija_insert.php";
        break;
    case "Ponuda_insert":
        require "include/ponuda_insert.php";
        break;
    case "Treneri_insert":
        require "include/treneri_insert.php";
        break;
    case "Korisnik_insert":
        require "include/korisnik_insert.php";
        break;
    case "Tekst_insert":
        require "include/tekst_insert.php";
        break;
    case "Termin_insert":
        require "include/termin_insert.php";
        break;
    default:
        require "include/pocetna.php";
        break;
}

require "include/pocni_danas.php";
require "include/footer.php";
