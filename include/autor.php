<div id="centar_reg_autor">
    <div id="autor">
        <div id="autor_centar">
            <div id="autor_slika">
                <img src="images/IMG-20190208-WA0000.png" alt="autor"/>
            </div>
            <div id="tekst_autor">
                <p>
                    Zovem se Stefan Drobnjak, imam 21 godina i dolazim iz Beograda.Trenutno sam student trece godine Visoke ICT skole.Ovo je drugi sajt iz PHP.
                    <a href="#">Dokumentacija</a>
                </p>
            </div>
        </div>
    </div>
    <div class="rb-box">
        <p>Kako biste ocenili ovaj sajt?</p>
        <div id="rb-1" class="rb">
            <div class="rb-tab rb-tab-active" data-value="1">
                <div class="rb-spot">
                    <span class="rb-txt">1</span>
                </div>
            </div><div class="rb-tab" data-value="2">
                <div class="rb-spot">
                    <span class="rb-txt">2</span>
                </div>
            </div><div class="rb-tab" data-value="3">
                <div class="rb-spot">
                    <span class="rb-txt">3</span>
                </div>
            </div><div class="rb-tab" data-value="4">
                <div class="rb-spot">
                    <span class="rb-txt">4</span>
                </div>
            </div><div class="rb-tab" data-value="5">
                <div class="rb-spot">
                    <span class="rb-txt">5</span>
                </div>
            </div>
        </div>

        <!-- Button -->

        <div class="button-box">
            <button <?php if(isset($_SESSION['korisnik'])):?>
                    class="button trigger"
                    <?php else:?>
                    class="anketa_nije_reg"
                    <?php endif;?>
            >Glasaj</button>
        </div>
        <input type="hidden" name="kor" id="kor" value="<?=$_SESSION['korisnik']->KorID?>"

    </div>
</div>