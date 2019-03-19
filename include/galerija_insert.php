<?php if(isset($_SESSION['korisnik'])):?>
    <?php if($_SESSION['korisnik']->uloga == 'admin'):?>
        <?php
        if(isset($_GET['id'])){

            $upit = "SELECT * FROM `galerija`WHERE id = ".$_GET['id'];

            $izmena = $konekcija->query($upit)->fetch();

        }
        ?>
<div id="registration-form">
    <div class='fieldset'>
        <legend><?php echo isset($_GET['id'])?'Izmeniti sliku':'Dodaj sliku'?></legend>
        <form action="php/<?php echo isset($_GET['id'])?'update/galerija_update.php':'galerija_insert.php'?>" method="post" enctype="multipart/form-data" onsubmit="return galerija_insert()">
        <div class='row'>
            <label>Naziv</label>
            <input type="text" placeholder name='naziv' id='naziv' value="<?php if(isset($_GET['id'])) echo $izmena->naziv?>">
        </div>
        <div class='row'>
            <label>Slika</label>
            <?php if(isset($_GET['id'])):?>
                <img src="<?= 'images/'.$izmena->slika_naziv?>" alt="<?= $izmena->alt?>"/>
            <?php endif;?>
            <input type="file" placeholder name='slika' id='slika' >
        </div>
            <?php if(!isset($_GET['id'])):?>
                <input type="submit" value="Dodaj" name="galerija_insert" id="galerija_insert" >
            <?php else:?>
                <input type="hidden" name="id" value="<?= $_GET['id']?>"/>
                <input type="submit" value="Izmeni" name="izmena" id="izmena" >
            <?php endif;?>
        </form>
    </div>
    <?php
    $greske = ["galerija_insert_error",'galerija_insert'];

    foreach ($greske as $red){

        TekstGreske($red);
    }

    TekstGreske('galerija_update_error');
    TekstGreske('galerija_update_');

    ?>

</div>
        <div id="reg_greske"></div>
    <?php endif;?>
<?php else:?>
    <?php require "include/pocetna.php";?>
    <!--<h1>DOSLO JE DO GRESKE</h1>-->
<?php endif;?>
