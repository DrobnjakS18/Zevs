<?php
session_start();
if(isset($_SESSION['korisnik'])){
    unset($_SESSION['korisnik']);
    header("Location:../index.php?page=Pocetna");
}else{

    header("Location:../index.php?page=Pocetna");
}