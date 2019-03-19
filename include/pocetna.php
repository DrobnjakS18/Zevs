<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeIn">
                        <h1>Neka ti postane stil zivota, ne obaveza</h1>
                        <p><a href="index.php?page=Ponuda" class="btn btn-primary">Prijavi se</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="fh5co-services" class="fh5co-bg-section">
    <div class="container">
        <div class="row">
            <?php
                $upit = 'SELECT *,pt.id AS PoTek FROM pocetna_tekst pt INNER JOIN sport s ON pt.id_sport = s.id';
                $rez =DohvatiSve($upit);

                foreach ($rez as $tekst):
            ?>
            <div class="col-md-4 text-center animate-box">
                <div class="services">
                    <span><img class="img-responsive" src="images/<?= $tekst->ikonica?>" alt=""></span>
                    <h3><?= $tekst->sport?></h3>
                    <p><?= $tekst->tekst?></p>
                    <p><a href="#termini" class="btn btn-primary btn-outline btn-sm">Termini <i class="icon-arrow-right"></i></a></p>
                </div>
            </div>
            <?php endforeach;?>
    </div>
</div>

<div id="fh5co-trainer">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <h2>Treneri</h2>
            </div>
        </div>
        <div class="row">
            <?php
            $upit = "SELECT *,t.id AS TrId FROM treneri t INNER JOIN uloga_trenera ut ON t.ul_tr_id = ut.id";

            $treneri = DohvatiSve($upit);

            foreach ($treneri as $trener):

                ?>
                <div class="col-md-4 col-sm-4 animate-box">
                    <div class="trainer">
                        <img class="img-responsive" src="<?= $trener->naziv_slike?>" alt="<?= $trener->alt?>">
                        <div class="title">
                            <h3><?= $trener->ime." ".$trener->prezime?></h3>
                            <span><?= $trener->ul_trenera?></span>
                        </div>
                        <div class="desc text-center">
                            <ul class="fh5co-social-icons">
                                <li><a href="https://twitter.com/?lang=en"><i class="icon-twitter"></i></a></li>
                                <li><a href="https://www.facebook.com"><i class="icon-facebook"></i></a></li>
                                <li><a href="https://www.linkedin.com"><i class="icon-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<div id="termini">
<div id="fh5co-schedule" class="fh5co-bg" style="background-image: url(images/img_bg_1.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                <h2>Raspored Treninga</h2>
            </div>
        </div>

        <div class="row animate-box">

            <div class="fh5co-tabs">
                <ul class="fh5co-tab-nav">
                    <li class="active"><a href="" data-tab="1"><span class="visible-xs">S</span><span class="hidden-xs">Ponedeljak</span></a></li>
                    <?php
                     $upit = "SELECT * FROM `dani` WHERE id_dani > 1;";
                     $rez = DohvatiSve($upit);
                     foreach ($rez as $dan):
                    ?>
                    <li><a href="" data-tab="<?= $dan->id_dani?>"><span class="visible-xs">M</span><span class="hidden-xs"><?= $dan->naziv?></span></a></li>
                    <?php endforeach;?>
<!--                    <li><a href="" data-tab="3"><span class="visible-xs">T</span><span class="hidden-xs">Sreda</span></a></li>-->
<!--                    <li><a href="" data-tab="4"><span class="visible-xs">W</span><span class="hidden-xs">Cetvrtak</span></a></li>-->
<!--                    <li><a href="" data-tab="5"><span class="visible-xs">Th</span><span class="hidden-xs">Petak</span></a></li>-->
<!--                    <li><a href="" data-tab="6"><span class="visible-xs">F</span><span class="hidden-xs">Subota</span></a></li>-->
<!--                    <li><a href="" data-tab="7"><span class="visible-xs">S</span><span class="hidden-xs">Nedelja</span></a></li>-->

                </ul>

                <!-- Tabs -->
                <div class="fh5co-tab-content-wrap">

                    <div class="fh5co-tab-content tab-content active" data-tab-content="1">
                        <ul class="class-schedule">
                            <?php
                            $upit = 'SELECT *,rt.id AS RasTr FROM dani d LEFT JOIN raspored_dani rd ON d.id_dani = rd.id_d LEFT JOIN raspored_treninga rt ON rd.id_r = rt.id INNER JOIN vreme v ON rt.id_vreme = v.id INNER JOIN sport s ON rt.id_sport = s.id INNER JOIN treneri t ON rt.id_trener = t.id WHERE d.id_dani = 1 ORDER BY RasTr';
                            $rez = DohvatiSve($upit);

                            foreach ($rez as $termin):
                            ?>
                            <li class="text-center">
                                <span><img src="images/<?= $termin->ikonica?>" class="img-responsive" alt=""></span>
                                <span class="time"><?= $termin->pocetak ." - ".$termin->kraj?></span>
                                <h4><?= $termin->sport?></h4>
                                <small><?= $termin->ime ." ".$termin->prezime?></small>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>

                    <div class="fh5co-tab-content tab-content active" data-tab-content="2">
                        <ul class="class-schedule">

                            <?php
                            $upit = 'SELECT *,rt.id AS RasTr FROM dani d LEFT JOIN raspored_dani rd ON d.id_dani = rd.id_d LEFT JOIN raspored_treninga rt ON rd.id_r = rt.id INNER JOIN vreme v ON rt.id_vreme = v.id INNER JOIN sport s ON rt.id_sport = s.id INNER JOIN treneri t ON rt.id_trener = t.id WHERE d.id_dani = 2 ORDER BY RasTr';
                            $rez = DohvatiSve($upit);

                            foreach ($rez as $termin):
                                ?>
                                <li class="text-center">
                                    <span><img src="images/<?= $termin->ikonica?>" class="img-responsive" alt=""></span>
                                    <span class="time"><?= $termin->pocetak ." - ".$termin->kraj?></span>
                                    <h4><?= $termin->sport?></h4>
                                    <small><?= $termin->ime ." ".$termin->prezime?></small>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>

                    <div class="fh5co-tab-content tab-content active" data-tab-content="3">
                        <ul class="class-schedule">
                            <?php
                            $upit = 'SELECT *,rt.id AS RasTr FROM dani d LEFT JOIN raspored_dani rd ON d.id_dani = rd.id_d LEFT JOIN raspored_treninga rt ON rd.id_r = rt.id INNER JOIN vreme v ON rt.id_vreme = v.id INNER JOIN sport s ON rt.id_sport = s.id INNER JOIN treneri t ON rt.id_trener = t.id WHERE d.id_dani = 3 ORDER BY RasTr ';
                            $rez = DohvatiSve($upit);

                            foreach ($rez as $termin):
                                ?>
                                <li class="text-center">
                                    <span><img src="images/<?= $termin->ikonica?>" class="img-responsive" alt=""></span>
                                    <span class="time"><?= $termin->pocetak ." - ".$termin->kraj?></span>
                                    <h4><?= $termin->sport?></h4>
                                    <small><?= $termin->ime ." ".$termin->prezime?></small>
                                </li>
                            <?php endforeach;?>

                        </ul>
                    </div>

                    <div class="fh5co-tab-content tab-content active" data-tab-content="4">
                        <ul class="class-schedule">
                            <?php
                            $upit = 'SELECT *,rt.id AS RasTr FROM dani d LEFT JOIN raspored_dani rd ON d.id_dani = rd.id_d LEFT JOIN raspored_treninga rt ON rd.id_r = rt.id INNER JOIN vreme v ON rt.id_vreme = v.id INNER JOIN sport s ON rt.id_sport = s.id INNER JOIN treneri t ON rt.id_trener = t.id WHERE d.id_dani = 4 ORDER BY RasTr';
                            $rez = DohvatiSve($upit);

                            foreach ($rez as $termin):
                                ?>
                                <li class="text-center">
                                    <span><img src="images/<?= $termin->ikonica?>" class="img-responsive" alt=""></span>
                                    <span class="time"><?= $termin->pocetak ." - ".$termin->kraj?></span>
                                    <h4><?= $termin->sport?></h4>
                                    <small><?= $termin->ime ." ".$termin->prezime?></small>
                                </li>
                            <?php endforeach;?>

                        </ul>
                    </div>
                    <div class="fh5co-tab-content tab-content active" data-tab-content="5">
                        <ul class="class-schedule">
                            <?php
                            $upit = 'SELECT *,rt.id AS RasTr FROM dani d LEFT JOIN raspored_dani rd ON d.id_dani = rd.id_d LEFT JOIN raspored_treninga rt ON rd.id_r = rt.id INNER JOIN vreme v ON rt.id_vreme = v.id INNER JOIN sport s ON rt.id_sport = s.id INNER JOIN treneri t ON rt.id_trener = t.id WHERE d.id_dani = 5 ORDER BY RasTr';
                            $rez = DohvatiSve($upit);

                            foreach ($rez as $termin):
                                ?>
                                <li class="text-center">
                                    <span><img src="images/<?= $termin->ikonica?>" class="img-responsive" alt=""></span>
                                    <span class="time"><?= $termin->pocetak ." - ".$termin->kraj?></span>
                                    <h4><?= $termin->sport?></h4>
                                    <small><?= $termin->ime ." ".$termin->prezime?></small>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>

                    <div class="fh5co-tab-content tab-content active" data-tab-content="6">
                        <ul class="class-schedule">
                            <?php
                            $upit = 'SELECT *,rt.id AS RasTr FROM dani d LEFT JOIN raspored_dani rd ON d.id_dani = rd.id_d LEFT JOIN raspored_treninga rt ON rd.id_r = rt.id INNER JOIN vreme v ON rt.id_vreme = v.id INNER JOIN sport s ON rt.id_sport = s.id INNER JOIN treneri t ON rt.id_trener = t.id WHERE d.id_dani = 6 ORDER BY RasTr';
                            $rez = DohvatiSve($upit);

                            foreach ($rez as $termin):
                                ?>
                                <li class="text-center">
                                    <span><img src="images/<?= $termin->ikonica?>" class="img-responsive" alt=""></span>
                                    <span class="time"><?= $termin->pocetak ." - ".$termin->kraj?></span>
                                    <h4><?= $termin->sport?></h4>
                                    <small><?= $termin->ime ." ".$termin->prezime?></small>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>

                    <div class="fh5co-tab-content tab-content active" data-tab-content="7">
                        <ul class="class-schedule">
                            <?php
                            $upit = 'SELECT *,rt.id AS RasTr FROM dani d LEFT JOIN raspored_dani rd ON d.id_dani = rd.id_d LEFT JOIN raspored_treninga rt ON rd.id_r = rt.id INNER JOIN vreme v ON rt.id_vreme = v.id INNER JOIN sport s ON rt.id_sport = s.id INNER JOIN treneri t ON rt.id_trener = t.id WHERE d.id_dani = 7 ORDER BY RasTr';
                            $rez = DohvatiSve($upit);

                            foreach ($rez as $termin):
                                ?>
                                <li class="text-center">
                                    <span><img src="images/<?= $termin->ikonica?>" class="img-responsive" alt=""></span>
                                    <span class="time"><?= $termin->pocetak ." - ".$termin->kraj?></span>
                                    <h4><?= $termin->sport?></h4>
                                    <small><?= $termin->ime ." ".$termin->prezime?></small>
                                </li>
                            <?php endforeach;?>

                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
</div>
<div id="fh5co-pricing">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <h2>Najbolje Ponude</h2>
            </div>
        </div>
        <div class="row">
            <p><a href="index.php?page=Ponuda" class="btn btn-primary">Sve ponude</a></p>
            <div class="pricing">
                <?php
                    $upit = "SELECT * FROM `ponuda` ORDER by id  LIMIT 4";

                    $upit_ponuda = $konekcija->query($upit)->fetchAll();

                    foreach($upit_ponuda as $ponuda):
                ?>
                <div class="col-md-3 animate-box">
                    <div class="price-box">
                        <h2 class="pricing-plan"><?= $ponuda->ponuda?></h2>
                        <div class="price"><sup class="currency">€</sup><?= $ponuda->cena?><small>/mesec</small></div>
                        <ul class="classes">
                            <li><?= $ponuda->bodystep?> BodyStep</li>
                            <li class="color"><?= $ponuda->bodypump?> BodyPump</li>
                            <li><?= $ponuda->yoga?> Yoga</li>
                            <li class="color"><?= $ponuda->cardio_box?> Cardio Box</li>
                            <li><?= $ponuda->zumba?> Zumba</li>
                        </ul>
                        <a href="index.php?page=Registracija" class="btn btn-select-plan btn-sm">Izaberi</a>
                    </div>
                </div>
                <?php endforeach;?>

            </div>

        </div>

    </div>
</div>

<div id="fh5co-gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                <h2>Galerija</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row row-bottom-padded-md">
            <div class="col-md-12">
                <ul id="fh5co-portfolio-list">
                    <?php
                        $upit = "SELECT * FROM `galerija` WHERE aktivan = 1";

                        $upit_order = $konekcija->query($upit)->fetchAll();

                        foreach ($upit_order as $order):
                    ?>
                    <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/<?= $order->slika_naziv?>); ">
                        <a>
                            <div class="case-studies-summary">
                                <h2><?= $order->naziv?></h2>
                            </div>
                        </a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="fh5co-testimonial" class="fh5co-bg-section">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <h2>Zadovoljni Clanovi</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row animate-box">
                    <div class="owl-carousel owl-carousel-fullwidth">
                        <div class="item">
                            <div class="testimony-slide active text-center">
                                <figure>
                                    <img src="images/ana_anic.png" alt="osoba">
                                </figure>
                                <span>Ana Anic, Advokat</span>
                                <blockquote>
                                    <p>"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean."</p>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-slide active text-center">
                                <figure>
                                    <img src="images/ivana_ivanic.jpg" alt="osoba">
                                </figure>
                                <span>Ivana Ivanic, Student</span>
                                <blockquote>
                                    <p>&ldquo;Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-slide active text-center">
                                <figure>
                                    <img src="images/sava_savic.jpg" alt="osoba">
                                </figure>
                                <span>Sava Savic, Profesor</span>
                                <blockquote>
                                    <p>&ldquo;Far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






