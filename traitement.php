<?php include "hf/sessionmatr.php"?>

<!DOCTYPE HTML>
<html lang="fr">

    <head>
        <meta charset:"UTF-8">
        <title>METROPOLIS VOD</title>
        <link rel="stylesheet" href="../css/main.css">
	    <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/header.css">
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    </head>
    <?php
        if(isset($_POST['cookie']) && $_POST['cookie'] == "Oui")
            {
                setcookie('accord', 'ok', time() + 365*24*3600, null, null, false, true);
            }
    ?>

<body>
	<?php include "../hf/header.php"?>
    <main>
        <?php
			$gen=$_POST['titre'];
            $nom=$_POST['fname'];
        	$prenom=$_POST['lname'];
            $email=$_POST['mail'];
            $motif=$_POST['motif'];
            $detail=$_POST['detail'];

                
            if ($gen == 'F') {
				$gen = "Madame";
			} else {
				$gen = "Monsieur";
            }

            if ($motif == 1) {
                $motif = "J'ai repéré un bug dans le site";
            } else if ($motif == 2) {
                $motif = "J'ai des soucis de connexion";
            } else if ($motif == 3) {
                $motif = "Je souhaite accéder à mes données conformément à la CNIL";
            } else {
                $motif = "Autres demandes";
            }

			$mail= "admin@ryuzendoji.net";
			$sujet= "Demande de Contact";
			$headers = "Content-type: text/html; charset=UTF-8";
            $message =$gen." ".$nom." ".$prenom.", <br/>";
            $message .="dont  l'adresse mail est : ".$email."<br/>";
            $message .="A besoin d'information au sujet de : ".$motif." <br/>";
            $message .="Et voici le contenu de son message : <br/>";
            $message .=$detail." <br/>";



			mail($mail,$sujet,$message,$headers);?>
					
        <p>Le mail à bien envoyé</p>
        <p>L'équipe y répondra dans les plus brefs délais</p>
        <p>Merci de votre confiance<p>
    </main>
    <?php
        if(!isset($_COOKIE['accord'])) {
            echo"<div class='cookie' style='display : inline-block'>Ce site utilise des cookies afin de fonctionner et à des fins de statistiques. Toutefois, aucune utilisation à but publicitaire de ceux-ci ne sera faite. L'acceptation est valable 1 (un) an. Les acceptez-vous ?
                <form method='POST' action='#'>";
            echo'<input type="hidden" name="cookie" id="cookie" value ="Oui">
                <input id="oui" type="submit"  value="OUI">
                <input id="non" type="reset" value="NON">
                </form>
                </div>';
        }
    ?>
	<?php include "../hf/footer.html"?>					
</body>
    <?php include "../hf/scripts.html"?>	
</html> 