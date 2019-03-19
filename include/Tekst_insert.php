<?php if(isset($_SESSION['korisnik'])):?>
    <?php if($_SESSION['korisnik']->uloga == 'admin'):?>
        <?php
        if(isset($_GET['id'])){

            $upit = "SELECT * FROM `pocetna_tekst`WHERE id = ".$_GET['id'];

            $izmena = $konekcija->query($upit)->fetch();


        }
        ?>
        <div id="registration-form">
            <div class='fieldset'>
                <legend><?php echo isset($_GET['id'])?'Izmeniti tekst':'Dodati tekst'?></legend>
                <form action="php/<?php echo isset($_GET['id'])?'update/tekst_update.php':'tekst_insert.php'?>" method="post" >
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
                        <label>Tekst za sport</label>
                        <textarea name='tekst' id='tekst' rows="4" cols="80"><?php if(isset($_GET['id'])) echo $izmena->tekst?>
                        </textarea>
                    </div>
                <?php if(!isset($_GET['id'])):?>
                    <input type="submit" value="Dodaj" name="tekst_insert" id="tekst_insert" >
                <?php else:?>
                    <input type="hidden" name="id" value="<?= $_GET['id']?>"/>
                    <input type="submit" value="Izmeni" name="izmena" id="izmena" >
                <?php endif;?>
                </form>
            </div>
            <?php
            if(isset($_SESSION['tekst_insert_error'])){

                NizGreske($_SESSION['tekst_insert_error'],'tekst_insert_error');

            }
            if(isset($_SESSION['tekst_update_error'])){

                NizGreske($_SESSION['tekst_update_error'],'tekst_update_error');

            }
            TekstGreske('tekst_insert_greska');
            TekstGreske('tekst_insert_');
            TekstGreske('tekst_update_');
            ?>
        </div>
        <div id="reg_greske"></div>
    <?php endif;?>
<?php else:?>
    <?php require "include/pocetna.php";?>
    <!--<h1>DOSLO JE DO GRESKE</h1>-->
<?php endif;?>

