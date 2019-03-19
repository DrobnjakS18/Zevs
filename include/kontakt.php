<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeIn">
                        <h1>Kontakt</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div id="map" class="fh5co-map"></div>
<!-- END map -->

<div id="fh5co-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-push-1 animate-box">

                <div class="fh5co-contact-info">
                    <h3>Kontakt informacije</h3>
                    <ul>
                        <li class="address">Svetozara Markovica bb, <br> 11000 Beograd</li>
                        <li class="phone"><a href="tel://1234567920">+ 011 1234567</a></li>
                        <li class="email"><a href="mailto:info@yoursite.com">contact@zevs.com</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-md-6 animate-box">
                <h3>Kontaktirajte nas</h3>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <!-- <label for="fname">First Name</label> -->
                            <input type="text" id="ime" name="ime" class="form-control" placeholder="Ime">
                        </div>
                        <div class="col-md-6">
                            <!-- <label for="lname">Last Name</label> -->
                            <input type="text" id="prezime" name="prezime" class="form-control" placeholder="Prezime">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <!-- <label for="email">Email</label> -->
                            <input type="text" id="email"  name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <!-- <label for="subject">Subject</label> -->
                            <input type="text" id="naslov" name="naslov" class="form-control" placeholder="Naslov poruke">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <!-- <label for="message">Message</label> -->
                            <textarea  id="tekst" name="tekst" cols="30" rows="10" class="form-control" placeholder="Tekst poruke"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
<!--                        <input type="submit" value="Posalji" class="btn btn-primary" name="kontakt" id="kontakt">-->
                    <button class="btn btn-primary" onclick="mail()">Posalji</button>
                    </div>
            </div>
        </div>
    </div>
    <div id="reg_greske"></div>
    <div class="ajax_greske"></div>
</div>


