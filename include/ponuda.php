<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeIn">
                        <h1>Ponuda</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<div id="fh5co-pricing">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <h2>Cenovnik</h2>
            </div>
        </div>
        <div class="row">
            <div class="pricing">
                <?php
                    $upit = "SELECT * FROM ponuda";

                    $ponuda_dohvati = $konekcija->query($upit)->fetchALl();

                    foreach ($ponuda_dohvati as $ponuda):
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
                        <a href="index.php?page=Registracija&&id=<?= $ponuda->id?>" class="btn btn-select-plan btn-sm">Izaberi</a>
                    </div>
                </div>
                <?php endforeach;?>

            </div>
        </div>
    </div>
</div>
