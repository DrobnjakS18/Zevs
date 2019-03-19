<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeIn">
                        <h1>Treneri</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


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
