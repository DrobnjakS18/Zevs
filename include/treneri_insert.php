<?php if(isset($_SESSION['korisnik'])):?>
<?php if($_SESSION['korisnik']->uloga == 'admin'):?>
<?php
if(isset($_GET['id'])){

    $upit = "SELECT *,tr.id As TrId,s.id AS SportID FROM treneri tr INNER JOIN uloga_trenera ut ON tr.ul_tr_id = ut.id INNER JOIN trener_sport ts ON tr.id = ts.id_t INNER JOIN sport s ON ts.id_s = s.id  WHERE tr.id =".$_GET['id'];

    $izmena = $konekcija->query($upit)->fetch();


}
?>
<div id="registration-form">
    <div class='fieldset'>
        <legend><?php echo isset($_GET['id'])?'Izmeni trenera':'Dodaj trenera'?></legend>
        <form action="php/<?php echo isset($_GET['id'])?'update/trener_update.php':'trener_insert.php'?>" method="post" onsubmit="return Treneri()" enctype="multipart/form-data">
            <div class='row'>
                <label>Ime</label>
                <input type="text" placeholder name='ime' id='ime' value="<?php if(isset($_GET['id'])) echo $izmena->ime?>">
            </div>
            <div class='row'>
                <label>Prezime</label>
                <input type="text" placeholder name='prezime' id='prezime' value="<?php if(isset($_GET['id'])) echo $izmena->prezime?>">
            </div>
            <div class='row'>
                <label>Slika</label>
                <?php if(isset($_GET['id'])):?>
                    <img src="<?= $izmena->naziv_slike?>" alt="<?= $izmena->alt?>"/>
                <?php endif;?>
                <input type="file" placeholder name='slika' id='slika' >
            </div>
            <div class='row'>
                <label>Uloga</label><br/>
                <?php if(isset($_GET['id'])):?>
                    <select id="uloga" name="uloga">
                        <option value="0">Izaberite</option>
                        <?php
                        $upit = 'SELECT * FROM uloga_trenera';

                        $rez = DohvatiSve($upit);
                        foreach ($rez as $uloga):
                            if($uloga->id == $izmena->ul_tr_id):
                                ?>
                                <option value="<?= $uloga->id?>" selected="selected"><?= $uloga->ul_trenera?></option>
                            <?php else:?>
                                <option value="<?= $uloga->id?>"><?= $uloga->ul_trenera?></option>
                            <?php endif;?>
                        <?php endforeach;?>
                    </select>
                <?php else:?>
                    <select id="uloga" name="uloga">
                        <option value="0">Izaberite</option>
                        <?php
                        $upit = 'SELECT * FROM uloga_trenera';

                        $rez = DohvatiSve($upit);
                        foreach ($rez as $uloga):
                            ?>
                            <option value="<?= $uloga->id?>"><?= $uloga->ul_trenera?></option>
                        <?php endforeach;?>
                    </select>
                <?php endif;?>
            </div>
            <div class='row'>
                <label>Sport</label><br/>
                <?php if(isset($_GET['id'])):?>
                    <select name="sport" id="sport" >
                        <option value="0">Izaberite</option>
                        <?php
                        $upit = 'SELECT * FROM sport';
                        $sport_sve = DohvatiSve($upit);
                        foreach ($sport_sve as $uloga):
                            if($uloga->id == $izmena->SportID):
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
            <br/>
            <?php if(!isset($_GET['id'])):?>
                <input type="submit" value="Dodaj" name="trener" id="trener" >
            <?php else:?>
                <input type="hidden" name="id" value="<?= $_GET['id']?>"/>
                <input type="submit" value="Izmeni" name="izmena" id="izmena" >
            <?php endif;?>
        </form>
    </div>

    <?php
    TekstGreske("treneri_insert");
    TekstGreske("trener_insert_error");
    TekstGreske('trener_update_error');
    TekstGreske('treneri_update');

    ?>
</div>
<div id="reg_greske"></div>

    <?php endif;?>
<?php else:?>
    <?php require "include/pocetna.php";?>
    <!--<h1>DOSLO JE DO GRESKE</h1>-->
<?php endif;?>

