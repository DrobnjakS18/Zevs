<body>

<div class="fh5co-loader"></div>

<div id="page">
    <nav class="fh5co-nav" role="navigation">
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-right">
                        <p class="num">Kontakt: +011 1234567</p>
                        <ul class="fh5co-social">
                            <li><a href="https://twitter.com/?lang=en"><i class="icon-twitter"></i></a></li>
                            <li><a href="https://dribbble.com"><i class="icon-dribbble"></i></a></li>
                            <li><a href="https://github.com"><i class="icon-github"></i></a></li>
                            <?php if(!isset($_SESSION['korisnik'])):?>
                            <li><a id='uloguj_se' href="index.php?page=Login">Uloguj se</i></a></li>
                            <?php else:?>
                                <li><a id='odjava' href="index.php?page=Profile">Profil</i></a></li>
                            <li><a id='odjava' href="php/loguot.php">Odjava</i></a></li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div id="fh5co-logo"><a href="index.php?page=pocetna"><img src='images/52387578_239919860278372_2664495979843026944_n.png' alt='Zevs logo' style="width:100%;height:100%; margin-left:100px;"/></a></div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <ul >
                            <?php if(isset($_SESSION['korisnik'])):?>
                            <?php if($_SESSION['korisnik']->uloga == "admin"):?>
                            <li><a href="index.php?page=Admin">ADMIN</a></li>
                            <?php endif;?>
                            <?php endif;?>
                            <li class="active"><a href="index.php?page=Pocetna">POCETNA</a></li>
                            <li><a href="index.php?page=Galerija">GALERIJA</a></li>
                            <li><a href="index.php?page=Treneri">TRENERI</a></li>
                            <li><a href="index.php?page=Ponuda">PONUDA</a></li>
                            <li><a href="index.php?page=Autor">AUTOR</a></li>
                            <li><a href="index.php?page=Kontakt">KONTAKT</a></li>
                        </ul>
                    </div>
            </div>
        </div>
    </nav>