<?php if(isset($_SESSION['korisnik'])):?>
<?php if($_SESSION['korisnik']->uloga == 'admin'):?>
    <?php
        if(isset($_GET['id'])){

            $upit = "SELECT *,k.id as KorId FROM korisnik k INNER JOIN uloga u ON k.uloga_id = u.id INNER JOIN ponuda p ON k.ponuda_id = p.id WHERE k.id = ".$_GET['id'];

            $izmena = $konekcija->query($upit)->fetch();

        }
        ?>
<div id="registration-form">
        <div class='fieldset'>
            <legend><?php echo isset($_GET['id'])?'Izmeni korisnika':'Unosi novog korisnika'?></legend>
            <form action="php/<?php echo isset($_GET['id'])?'update/kor_update.php':'korisnik_unos.php'?>" method="post" onsubmit="return Korisnik_unos()">
                <div class='row'>
                    <label>Ime</label>
                    <input type="text" placeholder name='ime' id='ime' value="<?php if(isset($_GET['id'])) echo $izmena->ime?>">
                </div>
                <div class='row'>
                    <label>Prezime</label>
                    <input type="text" placeholder name='prezime' id='prezime' value="<?php if(isset($_GET['id'])) echo $izmena->prezime?>">
                </div>
                <div class='row'>
                    <label>Godine</label>
                    <input type="text" placeholder name='godine' id='godine' value="<?php if(isset($_GET['id'])) echo $izmena->godine?>">
                </div>
                <div class='row'>
                    <label>Telefon</label>
                    <input type="text" placeholder="06" name='telefon' id='telefon' value="<?php if(isset($_GET['id'])) echo "0".$izmena->telefon?>">
                </div>
                <div class='row'>
                    <label>Email</label>
                    <input type="text" placeholder name='email' id='email' value="<?php if(isset($_GET['id'])) echo $izmena->email?>" >
                </div>
                <div class='row'>
                    <label>Pol</label><br/>
                    <?php if(isset($_GET['id'])): ?>
                        <input type="radio" placeholder name='pol' id='1' value="1" <?php if($izmena->pol_id == '1'){echo 'checked';}?>>  Zenski
                    <input type="radio" placeholder name='pol' id='2' value="2" <?php if($izmena->pol_id == '2'){echo 'checked';}?>>  Muski
                    <?php else:?>
                    <input type="radio" placeholder name='pol' id='1' value="1">  Zenski
                    <input type="radio" placeholder name='pol' id='2' value="2">  Muski
                    <?php endif;?>
                </div>
                <div class='row'>
                    <label>Ponuda</label>
                    <?php if(isset($_GET['id'])):?>
                        <select id="ponuda" name="ponuda">
                            <option value="0">Izaberite</option>
                            <?php
                            $upit = 'SELECT * FROM ponuda';

                            $rez = DohvatiSve($upit);
                            foreach ($rez as $ponuda):
                                if($ponuda->id == $izmena->ponuda_id):
                                    ?>
                                    <option value="<?= $ponuda->id?>" selected="selected"><?= $ponuda->ponuda?></option>
                                <?php else:?>
                                    <option value="<?= $ponuda->id?>"><?= $ponuda->ponuda?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>
                    <?php else:?>
                        <select id="ponuda" name="ponuda">
                            <option value="0">Izaberite</option>
                            <?php
                            $upit = 'SELECT * FROM ponuda';

                            $rez = DohvatiSve($upit);
                            foreach ($rez as $ponuda):
                                ?>
                                <option value="<?= $ponuda->id?>"><?= $ponuda->ponuda?></option>
                            <?php endforeach;?>
                        </select>
                    <?php endif;?>
                </div>
                <div class='row'>
                    <label>Uloga</label>
                    <?php if(isset($_GET['id'])):?>
                        <select id="uloga" name="uloga">
                            <option value="0">Izaberite</option>
                            <?php
                            $upit = 'SELECT * FROM uloga';

                            $rez = DohvatiSve($upit);
                            foreach ($rez as $uloga):
                                if($uloga->id == $izmena->uloga_id):
                                ?>
                                <option value="<?= $uloga->id?>" selected="selected"><?= $uloga->uloga?></option>
                                <?php else:?>
                                <option value="<?= $uloga->id?>"<?= $uloga->uloga?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>
                        <?php else:?>
                    <select id="uloga" name="uloga">
                        <option value="0">Izaberite</option>
                        <?php
                            $upit = 'SELECT * FROM uloga';

                            $rez = DohvatiSve($upit);
                            foreach ($rez as $uloga):
                        ?>
                        <option value="<?= $uloga->id?>"><?= $uloga->uloga?></option>
                        <?php endforeach;?>
                    </select>
                    <?php endif;?>
                </div>
                <br/>
                <?php if(!isset($_GET['id'])):?>
                <input type="submit" value="Unesi" name="registracija" id="registracija" >
                <?php else:?>
                <input type="hidden" name="id" value="<?= $_GET['id']?>"/>
                <input type="submit" value="Izmeni" name="izmena" id="izmena" >
                <?php endif;?>
            </form>
        </div>
    <?php
    if(isset($_SESSION['reg_greske'])){

        NizGreske($_SESSION['reg_greske'],'reg_greske');

    }
    TekstGreske('reg_greske_tekst');

    if(isset($_SESSION['update_greske'])){

        NizGreske($_SESSION['update_greske'],'update_greske');

    }
    TekstGreske('update_greske_tekst');
    TekstGreske('update_korisnik');


    ?>
    </div>
    <div id="reg_greske"></div>

    <?php endif;?>
<?php else:?>
    <?php require "include/pocetna.php";?>
    <!--<h1>DOSLO JE DO GRESKE</h1>-->
<?php endif;?>

