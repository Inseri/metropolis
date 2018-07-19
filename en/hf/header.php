<header>
    <div class="flag">
        <a href="../index.php"><img src="../img/fr.png" alt="fr"></a>
    </div>
    <div class="logo">
        <a href="index.php"><img src="../img/logo.png" alt="Metropolis VOD"></a>
    </div>
</header>
<nav>
    <div class="menu vidlist">
        <a href="films.php">
            <p>Video Library</p>
        </a>
    </div>
    <div class="menu whorus">
        <a href="whorus.php">
            <p>Who are us ?</p>
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
            <legend>General Informations</legend>
            <br>
            <p>All fields are required</p>
            <br>
            <label>Titre : </label>
            <input type="radio" name="titre" value="Mme" id="F" required/><label for="F">Ms</label>
            <input type="radio" name="titre" value="M" id="M" required/><label for="M">Mr</label><br>
            <label for="fname"> First Name : </label><br><input type="text" name="fname" id="fname" class="txtinput" placeholder="Your First Name" required/><br>
            <label for="lname"> Last Name : </label><br><input type="text" name="lname" id="lname" class="txtinput" placeholder="Your Last Name" required/><br>
            <label for="mail"> Email : </label><br><input type="email" name="mail" id="mail" class="txtinput" placeholder="Your email" required/><br>
        </fieldset>
        <fieldset>
            <legend>Your Demand</legend>
            <label for="motif">Your demand concerns :</label><br>
            <select class="motif" name="motif" id="motif" required>
                                    <option value="1">I've found a bug on the website</option>
                                    <option value="2">I have some problems for log in</option>
                                    <option value="3">I want to get an access to my private datas</option>
                                    <option value="4">Other</option>
                                </select><br>
            <label for="detail">Complementary informationss : </label><br>
            <textarea class="detail" name="detail" id="detail" required></textarea><br><br>
            <input id="valider" type="submit" value="SEND">
            <input id="annuler" type="reset" value="CANCEL">
        </fieldset>
    </form>
</div>
<div id="conn" style="display:none">
    <form class="conn" method="post" action="user.php">
        <fieldset>
            <legend>Log In</legend>
            <label for="mailco"> Email : </label><br><input type="email" name="mailco" id="mailco" class="txtinputco" placeholder="Your email" required/><br>
            <label for="pwdco"> Password : </label><input type="password" name="pwdco" id="pwdco" class="txtinputco" placeholder="Your Password" required/><br>
            <a class="recovery" href="recovery.php"> Forgotten password ?</a>
            <input id="validerco" type="submit" value="LOGIN">
            <input id="annulerco" type="reset" value="RESET">
        </fieldset>
    </form>
</div>