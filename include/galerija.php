<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeIn">
                        <h1>Galerija</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<div id="fh5co-gallery">

<!--    <div id="paginacija">-->
<!---->
<!--    </div>-->

    <div class="container">
        <div class="row">
            <hr>

            <div class="row">

                <?php
                $upit = "SELECT * FROM galerija";

                $upit_gal = $konekcija->query($upit)->fetchAll();
                foreach($upit_gal as $slika):

                ?>

                    <div class="col-12 col-md-4 col-sm-6">
                        <a title="Image 1" href="#">
                            <img class="thumbnail img-responsive" id="<?= $slika->id?>" src="<?= 'images/'.$slika->slika_naziv?>">
                        </a>
                    </div>
                <?php endforeach;?>
            </div>
            <hr>
        </div>
    </div>

    <div class="hidden" id="img-repo">

        <?php
        $upit = "SELECT * FROM galerija";

        $upit_gal = $konekcija->query($upit)->fetchAll();

        foreach($upit_gal as $slika):
        ?>
        <!-- #image-1 -->
        <div class="item" id="<?= $slika->id?>">
            <img class="thumbnail img-responsive"  title="<?= $slika->naziv?>" src="<?= 'images/'.$slika->slika_naziv?>">
        </div>
        <?php endforeach;?>

    </div>

    <div class="modal" id="modal-gallery" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
<!--                    <button class="close" type="button" data-dismiss="modal">×</button>-->
                    <h3 class="modal-title"></h3>
                </div>
                <div class="modal-body">
                    <div id="modal-carousel" class="carousel">

                        <div class="carousel-inner">
                        </div>

                        <a class="carousel-control left" href="#modal-carousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                        <a class="carousel-control right" href="#modal-carousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>

