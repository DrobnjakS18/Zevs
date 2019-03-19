<div id="registration-form">
    <div class='fieldset'>
        <legend>Log in</legend>
        <form action="php/login.php" method="post" >
            <div class='row'>
                <label>Email</label>
                <input type="text" placeholder name='email' id='email' >
            </div>
            <div class='row'>
                <label>Lozinka</label>
                <input type="password" placeholder name='lozinka' id='lozinka' >
            </div>
            <div class='row'>
                <label><a href="index.php?page=Ponuda">Registruj se</a></label>
            </div>
            <input type="submit" value="ENTER" name="login">
        </form>
    </div>
    <?php
    if(isset($_SESSION['log_greske'])){

        NizGreske($_SESSION['log_greske'],'log_greske');
    }
    TekstGreske('log_greske_tekst');
    ?>
</div>
<div id="reg_greske"></div>
