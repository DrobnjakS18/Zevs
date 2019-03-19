<?php if(isset($_SESSION['korisnik'])):?>
<?php if($_SESSION['korisnik']->uloga == 'admin'):?>
        <?php
        if(isset($_GET['id'])){

            $upit = "SELECT * FROM `ponuda`WHERE id = ".$_GET['id'];

            $izmena = $konekcija->query($upit)->fetch();


        }
        ?>
    <div id="registration-form">
        <div class='fieldset'>
            <legend><?php echo isset($_GET['id'])?'Izmeniti ponudu':'Dodati ponudu'?></legend>
            <form action="php/<?php echo isset($_GET['id'])?'update/ponuda_update.php':'ponuda_insert.php'?>" method="post" onsubmit="return ponuda_insert()">
            <div class='row'>
                <label>Naziv Ponude</label>
                <input type="text" placeholder name='naziv' id='naziv' value="<?php if(isset($_GET['id'])) echo $izmena->ponuda?>">
            </div>
            <div class='row'>
                <label>Cena</label>
                <input type="text" placeholder name='cena' id='cena' value="<?php if(isset($_GET['id'])) echo $izmena->cena?>">
            </div>
            <div class='row'>
                <label>BodyStep</label>
                <input type="text" placeholder name='BodyStep' id='BodyStep' value="<?php if(isset($_GET['id'])) echo $izmena->bodystep?>">
            </div>
            <div class='row'>
                <label>BodyPump</label>
                <input type="text"  name='BodyPump' id='BodyPump' value="<?php if(isset($_GET['id'])) echo $izmena->bodypump?>" >
            </div>
            <div class='row'>
                <label>Yoga</label>
                <input type="text" placeholder name='Yoga' id='Yoga' value="<?php if(isset($_GET['id'])) echo $izmena->yoga?>">
            </div>
            <div class='row'>
                <label>Cardio Box</label>
                <input type="text" placeholder name='Cardio_Box' id='Cardio_Box' value="<?php if(isset($_GET['id'])) echo $izmena->cardio_box?>">
            </div>
            <div class='row'>
                <label>Zumba</label>
                <input type="text" placeholder name='Zumba' id='Zumba' value="<?php if(isset($_GET['id'])) echo $izmena->zumba?>">
            </div>
            <br/>
                <?php if(!isset($_GET['id'])):?>
                    <input type="submit" value="Dodaj" name="Ponuda" id="Ponuda" >
                <?php else:?>
                    <input type="hidden" name="id" value="<?= $_GET['id']?>"/>
                    <input type="submit" value="Izmeni" name="Ponuda" id="Ponuda" >
                <?php endif;?>
            </form>
        </div>
        <?php

        if(isset($_SESSION['ponuda_greske'])){

            NizGreske($_SESSION['ponuda_greske'],'ponuda_greske');
        }

        TekstGreske('ponuda_greske_tekst');
        TekstGreske('ponuda_uspeh');



        if(isset($_SESSION['ponuda_insert_greske'])){

            NizGreske($_SESSION['ponuda_insert_greske'],'ponuda_insert_greske');
        }

        TekstGreske('ponuda_insert');
        TekstGreske('ponuda_insert_tekst');
        ?>
    </div>
    <div id="reg_greske"></div>
    <?php endif;?>

<?php else:?>
    <?php require "include/pocetna.php";?>
    <!--<h1>DOSLO JE DO GRESKE</h1>-->
<?php endif;?>

