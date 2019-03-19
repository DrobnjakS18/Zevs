<?php if(isset($_SESSION['korisnik'])):?>
<div class="container">
    <div id="registration-form">
        <div class='fieldset'>
            <legend>Profil</legend>
            <div class="forma">
                <div class='row'>
                    <label>Clanski broj:<?= $_SESSION['korisnik']->KorID?></label>
                </div>
                <div class='row'>
                    <label>Ime</label>
                    <input type="text" value="<?= $_SESSION['korisnik']->ime?>" name='ime' id='ime' >
                </div>
                <div class='row'>
                    <label>Prezime</label>
                    <input type="text" value="<?= $_SESSION['korisnik']->prezime?>" name='prezime' id='prezime' >
                </div>
                <div class='row'>
                    <label>Godine</label>
                    <input type="text" value="<?= $_SESSION['korisnik']->godine?>" name='godine' id='godine' >
                </div>
                <div class='row'>
                    <label>Telefon</label>
                    <input type="text" value="<?= "0".$_SESSION['korisnik']->telefon?>" name='telefon' id='telefon' >
                </div>
                <div class='row'>
                    <label>Email</label>
                    <input type="text" value="<?= $_SESSION['korisnik']->email?>" name='email' id='email' >
                </div>
                <div class='row'>
                    <label>Ponuda:<?= $_SESSION['korisnik']->ponuda?></label>
                </div>
                <div class='row'>
                    <label>Vazi od:<?= $_SESSION['korisnik']->vazi_od?></label>
                </div>
                <div class='row'>
                    <label>Vazi do:<?= $_SESSION['korisnik']->vazi_do?></label>
                </div>
                <input type="hidden" name="id" id='id' value="<?= $_SESSION['korisnik']->KorID?>"/>
                <button class='dugme' onclick="update_profil()">SACUVAJ IZMENE</button>
            </div>
        </div>
    </div>
    <div id="reg_greske"></div>
    <?php endif;?>
    <?php
    if(isset($_SESSION['izmena_greske'])){

        $niz_greske = $_SESSION['izmena_greske'];
        echo "<div id='ser_reg'>";
        echo "<ul>";
        foreach($niz_greske as $niz){

            echo "<li>$niz</li>";
        }

        echo "</ul>";
        echo "</div>";
        unset($_SESSION['izmena_greske']);
    }

    if(isset($_SESSION['izmena_greske_tekst'])){
        echo $_SESSION['izmena_greske_tekst'];
        unset($_SESSION['izmena_greske_tekst']);
    }

    if(isset($_SESSION['izmena_uspeh'])){
        echo $_SESSION['izmena_uspeh'];
        unset($_SESSION['izmena_uspeh']);
    }
    ?>


</div>