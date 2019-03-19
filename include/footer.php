<footer id="fh5co-footer" class="fh5co-bg" style="background-image: url(images/img_bg_1.jpg);" role="contentinfo">
    <div class="overlay"></div>
    <div class="container">

            <div class="col-md-4 col-sm-4 col-xs-6">
                <h3>O nama</h3>
                <p>Teretana Zeus je otvorena 2019 godine kao teretana sa najsavremenijom opremom i sprava za treniranje. U ponudi imamo grupne treninge kao sto su: BodyPump, Cardio box,Yoga,Zumba,BodyStep</p>
            </div>


                <div class="col-md-4 col-sm-4 col-xs-6">
                    <h3>Radno vreme</h3>
                    <ul class="fh5co-footer-links">
                        <li>Ponedeljak - Petak</li>
                        <li>07h - 23h</li>
                        <li></br></li>
                        <li>Subota - Nedelja</li>
                        <li>9h - 21h</li>
                    </ul>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-6">
                    <h3>Kontakt</h3>
                    <ul class="fh5co-footer-links">
                        <li>Email</li>
                        <li>contact@zevs.com</li>
                        <li></br></li>
                        <li>Telefon</li>
                        <li>+011 1234567</li>

                    </ul>
                </div>

        <div class="row copyright">
            <div class="col-md-12 text-center">
                <p>
                    <small class="block">&copy; 2019 Copyright:Stefam Drobnjak</small>
                </p>
                <p>
                <ul class="fh5co-social-icons">
                    <li><a href="https://twitter.com/?lang=en"><i class="icon-twitter"></i></a></li>
                    <li><a href="https://www.facebook.com"><i class="icon-facebook"></i></a></li>
                    <li><a href="https://www.linkedin.com"><i class="icon-linkedin"></i></a></li>
                </ul>
                </p>
            </div>
        </div>

    </div>
</footer>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Stellar Parallax -->
<script src="js/jquery.stellar.min.js"></script>
<!-- Carousel -->
<script src="js/owl.carousel.min.js"></script>
<!-- countTo -->
<script src="js/jquery.countTo.js"></script>
<!-- Magnific Popup -->
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<!-- Main -->
<script src="js/main.js"></script>
<script src="js/smooth-scroll.js"></script>
<script>
    var scroll = new SmoothScroll('a[href*="#"]');
</script>
<script type="text/javascript">

    $(document).ready(function() {
        // load_data(1);
        // function load_data(page){
        //
        //     $.ajax({
        //         url:'php/galerija_paginacija.php',
        //         method:"POST",
        //         dataType:"text",
        //         data:{
        //             page:page
        //         },
        //         success:function (data) {
        //             $("#paginacija").html(data);
        //         }
        //     });
        //
        // }


        $(".main div").hide();
        // Cache tout les textes et les sous-menu

        $(".slidebar li:first").attr("id","active");
        // Ajoute la class active au premier menu

        $(".main div:first").fadeIn();
        // Montre le premier texte à l'apparition de la page


        $('.slidebar a').click(function(e) {
            e.preventDefault();
            if ($(this).closest("li").attr("id") == "active"){
                //si le menu cliquer est déjà ouvert.
                return
            }else{
                $(".main div").hide();
                // Cache tous les éléments

                $(".slidebar li").attr("id","");
                // Rénitialise tout les menu active

                $(this).parent().attr("id","active");
                // active le parent du li selectionner

                $('#' + $(this).attr('name')).fadeIn();
                // Montre le texte
            }


        });

        //GALERIJA TEMPPALE
        /* activate the carousel */
        $("#modal-carousel").carousel({interval:false});

        /* change modal title when slide changes */
        $("#modal-carousel").on("slid.bs.carousel",       function () {
            $(".modal-title")
                .html($(this)
                    .find(".active img")
                    .attr("title"));
        });

        /* when clicking a thumbnail */
        $(".row .thumbnail").click(function(){
            var content = $(".carousel-inner");
            var title = $(".modal-title");

            content.empty();
            title.empty();

            var id = this.id;
            var repo = $("#img-repo .item");
            var repoCopy = repo.filter("#" + id).clone();
            var active = repoCopy.first();

            active.addClass("active");
            title.html(active.find("img").attr("title"));
            content.append(repoCopy);

            // show the modal
            $("#modal-gallery").modal("show");
        });





        //ANKETA

//Switcher function:
        $(".rb-tab").click(function(){
            //Spot switcher:
            $(this).parent().find(".rb-tab").removeClass("rb-tab-active");
            $(this).addClass("rb-tab-active");
        });
        //Save data:
        var survey = [];
        $(".trigger").click(function(){

            var kor = $('#kor').val();

            //Push data:
            for (i=1; i<=$(".rb").length; i++) {
                // var rb = "rb" + i;
                var rbValue = parseInt($("#rb-"+i).find(".rb-tab-active").attr("data-value"));
                //Bidimensional array push:

            };

            $.ajax({
                url:'php/anketa.php',
                method:'post',
                dataType:'json',
                data:{
                    posaji:"anketa",
                    id:rbValue,
                    kor:kor
                },
                success:function (data) {

                    alert(data.msg);
                },
                error:function (xhr,StatusTxt,Error) {
                    var status = xhr.status;
                    switch(status){

                        case 404:
                            alert("Nije pronadjen korisnik");
                            break;
                        case 409:
                            alert("Doslo je do greske prilikom izmene");
                            break;
                        case 500:
                            alert("Server greska");
                            break;
                        default:
                            alert("Greska "+status + " " + StatusTxt );

                    }
                }

            });

        });

        $('.anketa_nije_reg').click(function () {

            alert("Niste se registrovali");
        });








    });
</script>
<script type="text/javascript">

    function Registracija(){


        var nizGresaka = [];
        var ime = $("#ime").val();

        var ime_reg = /^[A-ZČĆŠĐŽ][a-zčćšđž]{2,9}$/;

        if(!ime_reg.test(ime)){

            nizGresaka.push("Ime u losem formatu");
        }
        var prezime = $("#prezime").val();

        var prezime_reg = /^[A-ZČĆŠĐŽ][a-zčćšđž]{2,14}$/;

        if(!prezime_reg.test(prezime)){

            nizGresaka.push("Prezime u losem formatu");
        }
        var godine = $("#godine").val();

        var godine_reg = /^[1-9][0-9]$/;

        if(!godine_reg.test(godine)){

            nizGresaka.push("Godine u losem formatu");
        }

        var telefon = $("#telefon").val();

        var telefon_reg = /^06[01234569][0-9]{6,7}$/

        if(!telefon_reg.test(telefon)){

            nizGresaka.push("Broj telefonva u losem formatu");
        }

        var email = $("#email").val();

        var email_reg = /^[a-zA-Z0-9-_.]+@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*$/;

        if(!email_reg.test(email)){

            nizGresaka.push("Email u losem formatu");
        }


        var lozinka = $("#lozinka").val();

        var lozink_reg = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/;

        if(!lozink_reg.test(lozinka)){

            nizGresaka.push("Lozinka u losem formatu");
        }

        var pol = document.getElementsByName('pol');
        var marker = false;
        for(var j in pol){

            if(pol[j].checked == true){
                marker = true;
            }

        }

        if(!marker){
            alert('Niste izabrali pol');
            return false;
        }

        if(nizGresaka.length != 0){

            var greske = "<ul>";
            for(var i in nizGresaka){

                greske+= "<li>"+nizGresaka[i]+"<li>";
            }
            greske+="</ul>";

            $("#reg_greske").html(greske);
            return false;
        }
        else {
            alert("Uspesno ste se registrovali!");
            return true;
        }
    }


    function Korisnik_unos(){


        var nizGresaka = [];

        var ponuda = $("#ponuda").val();

        if(ponuda == "0"){
            nizGresaka.push('Niste izabrali ponudu');
        }

        var uloga = $("#uloga").val();

        if(uloga == "0"){
            nizGresaka.push('Niste izabrali ulogu');
        }

        var ime = $("#ime").val();

        var ime_reg = /^[A-ZČĆŠĐŽ][a-zčćšđž]{2,9}$/;

        if(!ime_reg.test(ime)){

            nizGresaka.push("Ime u losem formatu");
        }
        var prezime = $("#prezime").val();

        var prezime_reg = /^[A-ZČĆŠĐŽ][a-zčćšđž]{2,14}$/;

        if(!prezime_reg.test(prezime)){

            nizGresaka.push("Prezime u losem formatu");
        }
        var godine = $("#godine").val();

        var godine_reg = /^[1-9][0-9]$/;

        if(!godine_reg.test(godine)){

            nizGresaka.push("Godine u losem formatu");
        }

        var telefon = $("#telefon").val();

        var telefon_reg = /^06[01234569][0-9]{6,7}$/

        if(!telefon_reg.test(telefon)){

            nizGresaka.push("Broj telefonva u losem formatu");
        }

        var email = $("#email").val();

        var email_reg = /^[a-zA-Z0-9-_.]+@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*$/;

        if(!email_reg.test(email)){

            nizGresaka.push("Email u losem formatu");
        }

        <?php if(isset($_GET['id'])):?>

        <?php else:?>
        var lozinka = $("#lozinka").val();

        var lozink_reg = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/;

        if(!lozink_reg.test(lozinka)){

            nizGresaka.push("Lozinka u losem formatu");
        }
        <?php endif;?>

        var pol = document.getElementsByName('pol');
        var marker = false;
        for(var j in pol){

            if(pol[j].checked == true){
                marker = true;
            }

        }

        if(!marker){
            alert('Niste izabrali pol');
            return false;
        }

        if(nizGresaka.length != 0){

            var greske = "<ul>";
            for(var i in nizGresaka){

                greske+= "<li>"+nizGresaka[i]+"<li>";
            }
            greske+="</ul>";

            $("#reg_greske").html(greske);
            return false;
        }
        else {
            <?php if(isset($_GET['id'])):?>
            alert("Uspesno izmenjen korisnik!");
            <?php else:?>
            alert("Uspesan unos novog korisnika!");
            <?php endif;?>
            return true;
        }
    }


    function Login() {

        var nizGresaka = [];

        var email = $("#email").val();

        var email_reg = /^[a-zA-Z0-9-_.]+@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*$/;

        if(!email_reg.test(email)){

            nizGresaka.push("Email u losem formatu");
        }

        var lozinka = $("#lozinka").val();

        var lozink_reg = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/;

        if(!lozink_reg.test(lozinka)){

            nizGresaka.push("Lozinka u losem formatu");
        }

        if(nizGresaka.length != 0){

            var greske = "<ul>";
            for(var i in nizGresaka){

                greske+= "<li>"+nizGresaka[i]+"<li>";
            }
            greske+="</ul>";

            $("#reg_greske").html(greske);
            return false;
        }
        else {
            return true;
        }

    }

    function galerija_insert() {

            var nizGresaka = [];

            var naziv = $('#naziv').val();
            var reNaziv = /^[\w\s]{1,255}$/;

            if(!reNaziv.test(naziv)){

                nizGresaka.push("Naziv u losem formatu");
            }

            var slika = $('#slika').val();

            if(slika == ""){

                nizGresaka.push("Niste izabrali sliku");
            }

            if(nizGresaka.length != 0){

                var greske = "<ul>";
                for(var i in nizGresaka){

                    greske+= "<li>"+nizGresaka[i]+"<li>";
                }
                greske+="</ul>";

                $("#reg_greske").html(greske);
                return false;
            }
            else {
                return true;
            }

    }

    function ponuda_insert() {

        var nizGresaka = [];

        var naziv = $('#naziv').val();
        var reNaziv = /^[A-Z0-9][a-z0-9\s]{2,20}$/;

        if(!reNaziv.test(naziv)){

            nizGresaka.push("Naziv u losem formatu");
        }

        var cena = $('#cena').val();

        var reBrojevi = /^[1-9][0-9]{0,3}$/;

        if(!reBrojevi.test(cena)){

            nizGresaka.push("Cena u losem formatu");
        }

        var BodyStep = $('#BodyStep').val();

        if(!reBrojevi.test(BodyStep)){

            nizGresaka.push("BodyStep u losem formatu");
        }

        var BodyPump = $('#BodyPump').val();

        if(!reBrojevi.test(BodyPump)){

            nizGresaka.push("BodyPump u losem formatu");
        }
        var Yoga = $('#Yoga').val();

        if(!reBrojevi.test(Yoga)){

            nizGresaka.push("Yoga u losem formatu");
        }
        var Cardio_Box = $('#Cardio_Box').val();

        if(!reBrojevi.test(Cardio_Box)){

            nizGresaka.push("Cardio_Box u losem formatu");
        }
        var Zumba = $('#Zumba').val();

        if(!reBrojevi.test(Zumba)){

            nizGresaka.push("Zumba u losem formatu");
        }

        if(nizGresaka.length != 0){

            var greske = "<ul>";
            for(var i in nizGresaka){

                greske+= "<li>"+nizGresaka[i]+"<li>";
            }
            greske+="</ul>";

            $("#reg_greske").html(greske);
            return false;
        }
        else {
            return true;
        }

    }



    function mail() {

        var nizGresaka = [];
        var ime = $("#ime").val();

        var ime_reg = /^[A-ZČĆŠĐŽ][a-zčćšđž]{2,9}$/;

        if(!ime_reg.test(ime)){

            nizGresaka.push("Ime u losem formatu");
        }
        var prezime = $("#prezime").val();

        var prezime_reg = /^[A-ZČĆŠĐŽ][a-zčćšđž]{2,14}$/;

        if(!prezime_reg.test(prezime)){

            nizGresaka.push("Prezime u losem formatu");
        }

        var email = $("#email").val();

        var email_reg = /^[a-zA-Z0-9-_.]+@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*$/;

        if(!email_reg.test(email)){

            nizGresaka.push("Email u losem formatu");
        }

        var naslov = $('#naslov').val();
        var reNaslov = /^[A-Z][a-z]{2,10}$/;

        if(!reNaslov.test(naslov)){

            nizGresaka.push("Naslov u losem formatu");
        }

        var tekst = $('#tekst').val();
        var reTekst = /^[\w\s]{1,255}$/;

        if(!reTekst.test(tekst)){

            nizGresaka.push("Tekst u losem formatu");
        }


        if(nizGresaka.length != 0){

            var greske = "<ul>";
            for(var i in nizGresaka){

                greske+= "<li>"+nizGresaka[i]+"<li>";
            }
            greske+="</ul>";

            $("#reg_greske").html(greske);
            return false;
        }
        else {

            $.ajax({

                url:'mail.php',
                method:"post",
                dataType:'json',
                data:{
                    posalji:"Neki tekst",
                    ime:ime,
                    prezime:prezime,
                    email:email,
                    naslov:naslov,
                    tekst:tekst
                },
                success:function(data){
                    alert(data.msg);
                },
                error:function (xhr,StatusText,Error) {

                                var status = xhr.status;

                                switch (status) {

                                    case "404":
                                        alert("Nemate pristup ovoj stranici");
                                        break;
                                    case "500":
                                        alert("Serverska greska");
                                        break;
                                    default:
                                        alert("Uspesno poslat mail");

                                }
                            }
            });
            return true;
        }
    }

    function Treneri() {

        var nizGresaka = [];
        var ime = $("#ime").val();

        var ime_reg = /^[A-ZČĆŠĐŽ][a-zčćšđž]{2,9}$/;

        if(!ime_reg.test(ime)){

            nizGresaka.push("Ime u losem formatu");
        }
        var prezime = $("#prezime").val();

        var prezime_reg = /^[A-ZČĆŠĐŽ][a-zčćšđž]{2,14}$/;

        if(!prezime_reg.test(prezime)){

            nizGresaka.push("Prezime u losem formatu");
        }

        var slika = $('#slika').val();

        if(slika == ""){

            nizGresaka.push("Niste izabrali sliku");
        }

        var uloga = $("#uloga").val();

        if(uloga == "0"){

            nizGresaka.push("Niste izabrali ulogu");
        }



        if(sport == "0"){

            nizGresaka.push("Niste izabrali sport");
        }


        if(nizGresaka.length != 0){

            var greske = "<ul>";
            for(var i in nizGresaka){

                greske+= "<li>"+nizGresaka[i]+"<li>";
            }
            greske+="</ul>";

            $("#reg_greske").html(greske);
            return false;
        }
        else {
            return true;
        }

    }


    function update_profil() {

        var id = $('#id').val();
        

        var nizGresaka = [];
        var ime = $("#ime").val();

        var ime_reg = /^[A-ZČĆŠĐŽ][a-zčćšđž]{2,9}$/;

        if(!ime_reg.test(ime)){

            nizGresaka.push("Ime u losem formatu");
        }
        var prezime = $("#prezime").val();

        var prezime_reg = /^[A-ZČĆŠĐŽ][a-zčćšđž]{2,14}$/;

        if(!prezime_reg.test(prezime)){

            nizGresaka.push("Prezime u losem formatu");
        }
        var godine = $("#godine").val();

        var godine_reg = /^[1-9][0-9]$/;

        if(!godine_reg.test(godine)){

            nizGresaka.push("Godine u losem formatu");
        }

        var telefon = $("#telefon").val();

        var telefon_reg = /^06[01234569][0-9]{6,7}$/

        if(!telefon_reg.test(telefon)){

            nizGresaka.push("Broj telefonva u losem formatu");
        }

        var email = $("#email").val();

        var email_reg = /^[a-zA-Z0-9-_.]+@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*$/;

        if(!email_reg.test(email)){

            nizGresaka.push("Email u losem formatu");
        }


        if(nizGresaka.length != 0){

            var greske = "<ul>";
            for(var i in nizGresaka){

                greske+= "<li>"+nizGresaka[i]+"<li>";
            }
            greske+="</ul>";

            $("#reg_greske").html(greske);

        }
        else {

            $.ajax({
                url:'php/profil_update.php',
                method:'post',
                dataType:'json',
                data:{
                    izmeni:"Posalji",
                    id:id,
                    ime:ime,
                    prezime:prezime,
                    godine:godine,
                    telefon:telefon,
                    email:email
                },
                success:function (data) {

                    alert(data.msg);
                    
                },
                error:function (xhr,StatusTxt,Error) {
                    var status = xhr.status;
                    switch(status){

                        case "404":
                            alert("Nije pronadjen korisnik");
                            break;
                        case "400":
                            alert("Los zahtev");
                            break;
                        case "409":
                            alert("Doslo je do greske prilikom izmene");
                            break;
                        case "500":
                            alert("Server greska");
                            break;
                        default:
                            alert("Greska "+status + " " + StatusText );

                        }
                    }

            });

        }
    }

    $("#dani_admin").on("click",".dan",function(){

        var id = $(this).data("id");



        $.ajax({

            url:"php/termini.php",
            method:"post",
            dataType:"json",
            data:{

                id:id,
                posalji:'posalji'
            },
            success:function(data){


                var dan = "<table>";
                dan +='<tr>';
                dan +='<th>Sport</th>';
                dan +='<th>Vreme</th>';
                dan +='<th>Trener</th>';
                dan +='<th>Izmeni</th>';
                dan +='<th>Obrisi</th>';
                dan +='</tr>';
                for(var i in data){
                    dan +='<tr>';
                    dan +='<td>'+data[i].sport+'</td>';
                    dan +='<td>'+data[i].pocetak+'-'+data[i].kraj+'</td>';
                    dan +='<td>'+data[i].ime+' '+data[i].prezime+'</td>';
                    dan +="<td><a class='izmena'  href='index.php?page=Termin_insert&&id="+data[i].RasTr+"'>Izmeni</a></td>";
                    dan +="<td><a class='obrisi' href='php/delete/termin_delete.php?id="+data[i].RasTr+"'>Obrisi</a></td>";
                    dan +='</tr>'
                }
                dan +="</table>";
                $("#dan_tabela").show();
                $('#dan_tabela').html(dan);
            },
            error:function(xhr,statusTxt,error){

                var status = xhr.status;

                switch(status){

                    case 404:
                        alert("Nije pronadjeno nista u bazi");
                        break;
                    case 500:
                        alert("Serverska greska");
                        break;
                    default:
                        alert("Greska je sa statusnim kodom: " + status + " - " + statusTxt);
                        break;
                }
            }
        });
    });

    function  aktiviraj_galeriju() {

        var niz = document.getElementsByTagName('input');

        var aktivan = [];
        var svi = [];
        for(var i in niz){

            if(niz[i].type === 'checkbox' && niz[i].checked === true){
                var cekiran = niz[i].value;
                aktivan.push(cekiran);
            }

            svi.push(niz[i].value);
        }
        if(aktivan.length == 0){
            alert("Nije oznacili slike koje ce se prikazivati na pocetnoj stranici!");S
        }

        $.ajax({
            url:'php/aktivan.php',
            method:'POST',
            dataType:'json',
            data:{
                posalji:'aktivan',
                cekiran:aktivan,
                svi:svi
            },
            success:function (data) {

                alert(data.msg);

            },
            error:function (xhr,StatusTxt,Error) {
                var status = xhr.status;
                switch(status){

                    case "404":
                        alert("Nisu cekirana polja");
                        break;
                    case "409":
                        alert("Doslo je do greske prilikom izmene");
                        break;
                    default:
                        alert("Greska "+status + " " + StatusText );

                }
            }
        });

    }





</script>



</body>
</html>

