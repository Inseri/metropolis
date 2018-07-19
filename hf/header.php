<header>
    <div class="flag">
        <a href="en/index.php"><img src="img/en.jpg" alt="en"></a>
    </div>
    <div class="logo">
        <a href="index.php"><img src="img/logo.png" alt="Metropolis VOD"></a>
    </div>
</header>
<nav>
    <div class="menu vidlist">
        <a href="films.php">
            <p>Vidéothèque</p>
        </a>
    </div>
    <div class="menu whorus">
        <a href="presentation.php">
            <p>Présentation</p>
        </a>
    </div>
    <div id="contactbtn" class="menu contact">
        <p>Contact</p>
    </div>
    <?php
    	if (!isset($_SESSION['login']) && !isset($_SESSION['1ogin']))  {
            echo '<div id="connbtn" class="menu connexion">
                    <i class="fas fa-user-alt"></i>
                    </div>
                    <div class="menu register">
                    <a href="register.php"><i class="fas fa-edit"></i></a>
                    </div>';
        }
        if (isset($_SESSION['login'])){
            echo'<div class="menu deco">
                    <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                    </div>
                    <div class="menu home">
                    <a href="kanrisha.php"><i class="fas fa-home"></i></a>
                    </div>';
        }
        if (isset($_SESSION['1ogin'])){
            echo'<div class="menu deco">
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                </div>
                <div class="menu home">
                <a href="user.php"><i class="fas fa-home"></i></a>
                </div>';
        }
    ?>
</nav>


<div class="contactform" id="contact" style="display : none">
    <form method="post" action="traitement.php">
        <fieldset>
            <legend>Informations Générales</legend>
            <br>
            <p>Tous les champs sont obligatoires</p>
            <br>
            <label>Titre : </label>
            <input type="radio" name="titre" value="Mme" id="F" required/><label for="F">Mme</label>
            <input type="radio" name="titre" value="M" id="M" required/><label for="M">M</label><br>
            <label for="fname"> Nom : </label><br><input type="text" name="fname" id="fname" class="txtinput" placeholder="Votre nom" required/><br>
            <label for="lname"> Prénom : </label><br><input type="text" name="lname" id="lname" class="txtinput" placeholder="Votre prénom" required/><br>
            <label for="mail"> Email : </label><br><input type="email" name="mail" id="mail" class="txtinput" placeholder="Votre email" required/><br>
        </fieldset>
        <fieldset>
            <legend>Votre Demande</legend>
            <label for="motif">Votre demande concerne :</label><br>
            <select class="motif" name="motif" id="motif" required>
                                    <option value="1">J'ai repéré un bug dans le site</option>
                                    <option value="2">J'ai des soucis de connexion</option>
                                    <option value="3">Je souhaite accéder à mes données conformément à la CNIL</option>
                                    <option value="4">Autres demandes</option>
                                </select><br>
            <label for="detail">Informations complémentaires : </label><br>
            <textarea class="detail" name="detail" id="detail" required></textarea><br><br>
            <input id="valider" type="submit" value="ENVOYER">
            <input id="annuler" type="reset" value="ANNULER">
        </fieldset>
    </form>
</div>
<div id="conn" style="display:none">
    <form class="conn" method="post" action="user.php">
        <fieldset>
            <legend>Connexion</legend>
            <label for="mailco"> Email : </label><br><input type="email" name="mailco" id="mailco" class="txtinputco" placeholder="Votre email" required/><br>
            <label for="pwdco"> Mot de passe : </label><input type="password" name="pwdco" id="pwdco" class="txtinputco" placeholder="Mot de Passe" required/><br>
            <a class="recovery" href="recovery.php"> Mot de passe oublié ?</a>
            <input id="validerco" type="submit" value="CONNEXION">
            <input id="annulerco" type="reset" value="RESET">
        </fieldset>
    </form>
</div>