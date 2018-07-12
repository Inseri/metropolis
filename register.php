<?php include "hf/sessionmatr.php"?>

<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset:"UTF-8">
            <title>METROPOLIS VOD</title>
            <link rel="stylesheet" href="css/main.css">
	        <link rel="stylesheet" href="css/footer.css">
            <link rel="stylesheet" href="css/header.css">
        	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    </head>
<body>
	<?php include "hf/header.php"?>
        <main>
            <form class="conreg" method="post" action="confirmation.php">
                <fieldset>
                    <legend>Formulaire d'inscription</legend>
                    <br>
                    <p>Tous les champs sont obligatoires</p>
                    <br>
                        <label>Titre : </label>
                        <input type="radio" name="titre" value="Mme" id="F" required/><label for="F">Mme</label>
                        <input type="radio" name="titre" value="M" id="M" required/><label for="M">M</label><br>
                        <label for="fname"> Nom : </label><br><input type="text" name="fname" id="fname" class="txtinput" placeholder="Votre nom" required/><br>
                        <label for="lname"> Prénom : </label><br><input type="text" name="lname" id="lname" class="txtinput" placeholder="Votre prénom" required/><br>
                        <label for="bdate"> Date de naissance (sous la forme AAAA-MM-JJ): </label><br><input class="txtinput" type="date" name="bdate" required/><br>
			            <label for="mail"> Email : </label><br><input type="email" name="mail" id="mail" class="txtinput" placeholder="Votre email" required/><br>
			            <label for="pwd"> Mot de passe : </label><input type="password" name="pwd" id="pwd" class="txtinput" placeholder="Mot de Passe" required/><br>
			            <label for="pwdc"> Confirmation du mot de passe : </label><input type="password" name="pwdc" id="pwdc" class="txtinput" placeholder="Mot de Passe" required/><br>
                        <input id="valider" type="submit" value="S'INSCRIRE">
                        <input id="annuler" type="reset" value="RESET">
                </fieldset>
            </form>
        </main>
	<?php include "hf/footer.html"?>					
</body>
    <?php include "hf/scripts.html"?>	
</html> 