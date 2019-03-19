<?php if(isset($_SESSION['korisnik'])):?>
    <?php if($_SESSION['korisnik']->uloga == 'admin'):?>
        <h1 class="admin_naslov">Admin panel</h1>
<div class="admin-panel">

    <div class="slidebar">
        <ul>
            <li><a href="" name="tab1"><i class="fa fa-tachometer"></i>Korisnici</a></li>
            <li><a href="" name="tab2"><i class="fa fa-eyedropper"></i>Ponuda</a></li>
            <li><a href="" name="tab3"><i class="fa fa-pencil"></i>Treneri</a></li>
            <li><a href="" name="tab4"><i class="fa fa-picture-o"></i>Galerija</a></li>
            <li><a href="" name="tab5"><i class="fa fa-file-video-o"></i>Index Tekst</a></li>
            <li><a href="" name="tab6"><i class="fa fa-wrench"></i>Raspored Termina</a></li>
            <li><a href="" name="tab7"><i class="fa fa-wrench"></i>Statistika</a></li>
        </ul>
    </div>

    <div class="main">
        <div id="tab1"><h2 class="header">Korisnici </span></h2>
        <table>
           <tr>
               <th>Ime</th>
               <th>Prezime</th>
               <th>Uloga</th>
               <th>Email</th>
               <th>Telefon</th>
               <th>Izmeni</th>
               <th>Obrisi</th>
           </tr>
            <?php
                $upit = "SELECT *,k.id as KorId FROM korisnik k INNER JOIN uloga u ON k.uloga_id = u.id";

                $upit_sel = $konekcija->query($upit)->fetchAll();

                foreach ($upit_sel as $koe):
            ?>
            <tr>
                <td><?= $koe->ime?></td>
                <td><?= $koe->prezime?></td>
                <td><?= $koe->uloga?></td>
                <td><?= $koe->email?></td>
                <td><?= "0".$koe->telefon?></td>
                <td><a class='izmena' href="index.php?page=Korisnik_insert&&id=<?= $koe->KorId?>">Izmeni</a></td>
                <td><a class='obrisi' href="php/delete/kor_delete.php?id=<?= $koe->KorId?>" >Obrisi</a></td>
            </tr>
            <?php endforeach;?>
        </table>
        </div>

        <div id="tab2"><h2 class="header">Ponuda <span class="plus"><a href="index.php?page=Ponuda_insert">+</a></span></h2>
            <table>
                <tr>
                    <th>Ponuda</th>
                    <th>Cena</th>
                    <th>BodyStep</th>
                    <th>BodyPump</th>
                    <th>Yoga</th>
                    <th>Cardio Box</th>
                    <th>Zumba</th>
                    <th>Izmeni</th>
                    <th>Obrisi</th>
                </tr>
                <?php
                $upit = "SELECT * FROM ponuda";

                $upit_sel = $konekcija->query($upit)->fetchAll();

                foreach ($upit_sel as $ponuda):
                    ?>
                    <tr>
                        <td><?= $ponuda->ponuda?></td>
                        <td><?= $ponuda->cena?></td>
                        <td><?= $ponuda->bodystep?></td>
                        <td><?= $ponuda->bodypump?></td>
                        <td><?= $ponuda->yoga?></td>
                        <td><?= $ponuda->cardio_box?></td>
                        <td><?= $ponuda->zumba?></td>
                        <td><a class='izmena' href="index.php?page=Ponuda_insert&&id=<?= $ponuda->id?>">Izmeni</a></td>
                        <td><a class='obrisi' href="php/delete/ponuda_delete.php?id=<?= $ponuda->id?>" >Obrisi</a></td>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>
        <div id="tab3"><h2 class="header">Treneri <span class="plus"><a href="index.php?page=Treneri_insert">+</a></span></h2>
            <table>
                <tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Uloga</th>
                    <th>Izmeni</th>
                    <th>Obrisi</th>
                </tr>
                <?php
                $upit='SELECT *,t.id As TrId FROM treneri t INNER JOIN uloga_trenera ut ON t.ul_tr_id = ut.id';


                $upit_sel = $konekcija->query($upit)->fetchAll();

                foreach ($upit_sel as $tr):
                    ?>
                    <tr>
                        <td><?= $tr->ime?></td>
                        <td><?= $tr->prezime?></td>
                        <td><?= $tr->ul_trenera?></td>
                        <td><a class='izmena' href="index.php?page=Treneri_insert&&id=<?= $tr->TrId?>">Izmeni</a></td>
                        <td><a class='obrisi' href="php/delete/trener_delete.php?id=<?= $tr->TrId?>">Obrisi</a></td>
                    </tr>
                <?php endforeach;?>
            </table>

        </div>
        <div id="tab4"><h2 class="header">Galerija  <span class="plus"><a href="index.php?page=Galerija_insert">+</a></span></h2>
            <table>
                <tr>
                    <th>naziv</th>
<!--                    <th>Slika</th>-->
                    <th>Izmeni</th>
                    <th>Obrisi</th>
                    <th>Aktivna</th>
                </tr>
                <?php
                $upit = "SELECT * FROM galerija";

                $upit_sel = $konekcija->query($upit)->fetchAll();

                foreach ($upit_sel as $galerija_slika):
                    ?>
                    <tr>
                        <td><?= $galerija_slika->naziv?></td>
                        <td><a class='izmena' href="index.php?page=Galerija_insert&&id=<?= $galerija_slika->id?>">Izmeni</a></td>
                        <td><a class='obrisi' href="php/delete/galerija_delete.php?id=<?= $galerija_slika->id?>">Obrisi</a></td>
                        <td><input type="checkbox" name="aktivan[]" value="<?= $galerija_slika->id?>" id="aktivan" <?php
                            if($galerija_slika->aktivan == 1)
                                echo "checked";
                            ?>/></td>
                    </tr>
                <?php endforeach;?>
            </table>
            <button id='aktiviraj_galeriju' onclick="aktiviraj_galeriju()">Aktiviraj</button>
        </div>
        <div id="tab5"><h2 class="header">Index Tekst  <span class="plus"><a href="index.php?page=Tekst_insert">+</a></span></h2>
            <table>
                <tr>
                    <th>Naslov</th>
                    <th>Tekst</th>
                    <th>Izmeni</th>
                    <th>Obrisi</th>
                </tr>
                <?php
                $upit = 'SELECT *,pt.id AS PoTek FROM pocetna_tekst pt INNER JOIN sport s ON pt.id_sport = s.id';
                $rez =DohvatiSve($upit);

                foreach ($rez as $tekst):
                    ?>
                    <tr>
                        <td><?= $tekst->sport?></td>
                        <td><?= $tekst->tekst?></td>
                        <td><a class='izmena' href="index.php?page=Tekst_insert&&id=<?= $tekst->PoTek?>">Izmeni</a></td>
                        <td><a class='obrisi' href="php/delete/tekst_delete.php?id=<?=$tekst->PoTek?>">Obrisi</a></td>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>


        <div id="tab6"><h2 class="header">Raspored Termina <span class="plus"><a href="index.php?page=Termin_insert">+</a></span></h2>
            <ul id="dani_admin">
                <?php
                $rez = DohvatiSve('SELECT * FROM dani');
                foreach ($rez as $dan):
                ?>
                <li><a class='dan' href="#" data-id="<?= $dan->id_dani?>"><?= $dan->naziv?></a></li>
                <?php endforeach;?>
            </ul>
            <div id="dan_tabela"></div>
        </div>


        <div id="tab7"><h2 class="header">Statistika</h2>
            <?php
            $upit  = 'SELECT COUNT(id) AS BrojRedova FROM raspored_treninga';
            $ukupnp = DohvatiSve($upit);
            foreach ($ukupnp as $kor):
                ?>
                <h5>Ukupan broj treninga: <?= $kor->BrojRedova?></h5>
            <?php endforeach;?>
        <?php
            $upit  = 'SELECT COUNT(id) AS UkupnoKor FROM korisnik';
           $ukupnp = DohvatiSve($upit);
            foreach ($ukupnp as $kor):
        ?>
                <h5>Ukupan broj korisnika: <?= $kor->UkupnoKor?></h5>
            <?php endforeach;?>
            <?php
            $upit  = 'SELECT COUNT(id) AS UkupnoPon FROM ponuda';
            $ukupnp = DohvatiSve($upit);
            foreach ($ukupnp as $pon):
                ?>
                <h5>Ukupan broj ponuda: <?= $pon->UkupnoPon?></h5>
            <?php endforeach;?>
            <?php
            $upit  = 'SELECT COUNT(id) AS UkupnoTrenera FROM treneri';
            $ukupnp = DohvatiSve($upit);
            foreach ($ukupnp as $trener):
                ?>
                <h5>Ukupan broj trenera: <?= $trener->UkupnoTrenera?></h5>
            <?php endforeach;?>
            <?php
            $upit  = 'SELECT COUNT(id) AS UkupnoSlika FROM galerija';
            $ukupnp = DohvatiSve($upit);
            foreach ($ukupnp as $slika):
                ?>
                <h5>Ukupan broj slika u galeriji: <?= $slika->UkupnoSlika?></h5>
            <?php endforeach;?>
            <?php
            $upit  = 'SELECT AVG(id_o) AS Prosek FROM anketa_ocena';
            $ukupnp = DohvatiSve($upit);
            foreach ($ukupnp as $prosek):
                ?>
                <h5>Prosena ocena ankete: <?= $prosek->Prosek?></h5>
            <?php endforeach;?>
            <?php
            $upit  = 'SELECT AVG(godine) AS Godine FROM korisnik';
            $ukupnp = DohvatiSve($upit);
            foreach ($ukupnp as $prosek):
                ?>
                <h5>Prosecan broj godina clana: <?= $prosek->Godine?></h5>
            <?php endforeach;?>
            <h5>Spisak korisnika koji su glasali:</h5>
            <ul>
                <?php
                $upit  = 'SELECT *,k.id AS KorID FROM korisnik k INNER JOIN korisnik_ocena ko ON k.id = ko.id_k INNER JOIN ocena o ON ko.id_o = o.id';
                $ukupnp = DohvatiSve($upit);
                foreach ($ukupnp as $glasao):
                    ?>
                <li><h5><?= $glasao->ime." ".$glasao->prezime." ".$glasao->ocena?></h5></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>


</div>
<?php endif;?>
<?php else:?>
    <?php require "include/pocetna.php";?>
<!--<h1>DOSLO JE DO GRESKE</h1>-->
<?php endif;?>