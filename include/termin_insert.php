<?php if(isset($_SESSION['korisnik'])):?>
    <?php if($_SESSION['korisnik']->uloga == 'admin'):?>
        <?php
        if(isset($_GET['id'])){

            $upit = "SELECT * FROM `raspored_treninga` WHERE id =".$_GET['id'];

            $izmena = $konekcija->query($upit)->fetch();

        }
        ?>
        <div id="registration-form">
            <div class='fieldset'>
                <legend><?php echo isset($_GET['id'])?'Izmeniti termin  ':'Dodati termin'?></legend>
                <form action="php/<?php echo isset($_GET['id'])?'update/termin_update.php':'termin_insert.php'?>" method="post" >
        <?php if(!isset($_GET['id'])):?>
                    <div class='row'>
                        <label>Dan</label>

                            <select id="dan" name="dan" >
                                <option value="0">Izaberite</option>
                                <?php
                                $upit = 'SELECT * FROM dani';

                                $dani_sve = DohvatiSve($upit);
                                foreach ($dani_sve as $dan):
                                    ?>
                                    <option value="<?= $dan->id_dani?>"><?= $dan->naziv?></option>
                                <?php endforeach;?>
                            </select>

                    </div>
        <?php endif;?>
                    <div class='row'>
                        <label>Sport</label>
                        <?php if(isset($_GET['id'])):?>
                            <select name="sport" id="sport" >
                                <option value="0">Izaberite</option>
                                <?php
                                $upit = 'SELECT * FROM sport';
                                $sport_sve = DohvatiSve($upit);
                                foreach ($sport_sve as $uloga):
                                    if($uloga->id == $izmena->id_sport):
                                        ?>
                                        <option value="<?= $uloga->id?>" selected="selected"><?= $uloga->sport?></option>
                                    <?php else:?>
                                        <option value="<?= $uloga->id?>"><?= $uloga->sport?></option>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </select>
                        <?php else:?>
                            <select id="sport" name="sport" >
                                <option value="0">Izaberite</option>
                                <?php
                                $upit = 'SELECT * FROM sport';

                                $sport_sve = DohvatiSve($upit);
                                foreach ($sport_sve as $uloga):
                                    ?>
                                    <option value="<?= $uloga->id?>"><?= $uloga->sport?></option>
                                <?php endforeach;?>
                            </select>
                        <?php endif;?>
                    </div>
                    <div class='row'>
                        <label>Vreme</label>
                        <?php if(isset($_GET['id'])):?>
                            <select name="vreme" id="vreme" >
                                <option value="0">Izaberite</option>
                                <?php
                                $upit = 'SELECT * FROM vreme';
                                $vreme_sve = DohvatiSve($upit);
                                foreach ($vreme_sve as $vreme):
                                    if($vreme->id == $izmena->id_vreme):
                                        ?>
                                        <option value="<?= $vreme->id?>" selected="selected"><?= $vreme->pocetak." ".$vreme->kraj?></option>
                                    <?php else:?>
                                        <option value="<?= $vreme->id?>"><?= $vreme->pocetak." ".$vreme->kraj?></option>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </select>
                        <?php else:?>
                            <select id="vreme" name="vreme" >
                                <option value="0">Izaberite</option>
                                <?php
                                $upit = 'SELECT * FROM vreme';
                                $vreme_sve = DohvatiSve($upit);
                                foreach ($vreme_sve as $vreme):
                                    ?>
                                    <option value="<?= $vreme->id?>"><?= $vreme->pocetak." ".$vreme->kraj?></option>
                                <?php endforeach;?>
                            </select>
                        <?php endif;?>
                    </div>
                    <div class='row'>
                        <label>Trener</label>
                        <?php if(isset($_GET['id'])):?>
                            <select name="trener" id="trener" >
                                <option value="0">Izaberite</option>
                                <?php
                                $upit = 'SELECT * FROM treneri';
                                $trener_sve = DohvatiSve($upit);
                                foreach ($trener_sve as $trener):
                                    if($trener->id == $izmena->id_trener):
                                        ?>
                                        <option value="<?= $trener->id?>" selected="selected"><?= $trener->ime." ".$trener->prezime?></option>
                                    <?php else:?>
                                        <option value="<?= $trener->id?>"><?= $trener->ime." ".$trener->prezime?></option>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </select>
                        <?php else:?>
                            <select id="trener" name="trener" >
                                <option value="0">Izaberite</option>
                                <?php
                                $upit = 'SELECT * FROM treneri';

                                $trener_sve = DohvatiSve($upit);
                                foreach ($trener_sve as $trener):
                                    ?>
                                    <option value="<?= $trener->id?>"><?= $trener->ime." ".$trener->prezime?></option>
                                <?php endforeach;?>
                            </select>
                        <?php endif;?>
                    </div>
                    <?php if(!isset($_GET['id'])):?>
                        <input type="submit" value="Dodaj" name="termin_insert" id="termin_insert" >
                    <?php else:?>
                        <input type="hidden" name="id" value="<?= $_GET['id']?>"/>
                        <input type="submit" value="Izmeni" name="izmena" id="izmena" >
                    <?php endif;?>
                </form>
            </div>
            <?php
            if(isset($_SESSION['termin_insert_error'])){

                NizGreske($_SESSION['termin_insert_error'],'termin_insert_error');

            }
            TekstGreske('termin_insert_greska');
            TekstGreske('termin_insert_');
            TekstGreske('br_redova');


            if(isset($_SESSION['termin_update_error'])){

                NizGreske($_SESSION['termin_update_error'],'termin_update_error');

            }
            TekstGreske('termin_insert_');
            TekstGreske('termin_insert_greska');
            ?>
        </div>
        <div id="reg_greske"></div>
    <?php endif;?>
<?php else:?>
    <?php require "include/pocetna.php";?>
    <!--<h1>DOSLO JE DO GRESKE</h1>-->
<?php endif;?>
