<?php if(isset($_GET['id'])):?>
<div id="registration-form">
    <div class='fieldset'>
        <legend>Registracija</legend>
        <form action="php/reg.php" method="post" onsubmit="return Registracija()">
            <div class='row'>
                <label>Ime</label>
                <input type="text" placeholder name='ime' id='ime' >
            </div>
            <div class='row'>
                <label>Prezime</label>
                <input type="text" placeholder name='prezime' id='prezime' >
            </div>
            <div class='row'>
                <label>Godine</label>
                <input type="text" placeholder name='godine' id='godine' >
            </div>
            <div class='row'>
                <label>Telefon</label>
                <input type="text" placeholder="06" name='telefon' id='telefon' >
            </div>
            <div class='row'>
                <label>Email</label>
                <input type="text" placeholder name='email' id='email' >
            </div>
            <div class='row'>
                <label>Lozinka</label>
                <input type="password" placeholder name='lozinka' id='lozinka' >
            </div>
            <div class='row'>
                <label>Pol</label><br/>
                <input type="radio" placeholder name='pol' id='1' value="1">  Zenski
                <input type="radio" placeholder name='pol' id='2' value="2">  Muski
            </div>
            <br/>
            <input type="hidden" name="ponuda" value="<?= $_GET['id']?>"/>
            <input type="submit" value="Registruj se" name="registracija" id="registracija" >
        </form>
    </div>
</div>
<div id="reg_greske"></div>
<?php endif;?>
<?php
    if(isset($_SESSION['reg_greske'])){

        NizGreske($_SESSION['reg_greske'],'reg_greske');

        }
    TekstGreske('reg_greske_tekst');

?>

