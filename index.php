<?php include "hf/sessionmatr.php"?>
<?php
    if(isset($_POST['cookie']) && $_POST['cookie'] == "Oui")
        {
            setcookie('accord', 'ok', time()+365*24*3600);
            header("Location: index.php");
        }
?>
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


        <div class="kanrisha" id="kanrishafr" style="display : none">
            <p>Connexion Admin :</p><br>
                <form method="POST" action="kanrisha.php">
                    <input type="text" id="id" name="id" placeholder="Identifiant"><br><br>
                    <input type="password" id="pass" name="pass" placeholder="Mot de Passe"><br><br>
                    <input type="submit" id="submit" value="VALIDER">
                    <input type="reset" id="reset" value="ANNULER">
                </form>

        </div>
        <main id="main">
            <div class="prez"><h1>Le mot du Directeur</h1><p>Vous ne pouvez pas vous rendre au cinéma ? <br>Alors emmenez-le avec vous, partout où vous voulez et sur tout vos écrans à un prix compétitif ! <br> Profitez des derniers films 3 mois après leur sortie cinéma !<br> Que vous soyez en déplacement sur votre smarphone seul ou chez vous en famille ou en amis, vous pouvez à présent profiter d'une expérience cinématographique exceptionnelle grâce au support de la 4K et du son Dolby Surround en 7.1.<br>
            </div>
            <div class="nouv"><h1>Les nouveautés</h1>
                <div><span>#Insérer code php ici#<span></div>
            </div>
            <div class="favs"><h1>Les favoris des utilisateurs</h1>
                <div><span>#Insérer code php ici#<span></div>
            </div>
        </main>
        <?php
            if(!isset($_COOKIE['accord'])) {
                echo"<div class='cookie' style='display : inline-block'>Ce site utilise des cookies afin de fonctionner et à des fins de statistiques. Toutefois, aucune utilisation à but publicitaire de ceux-ci ne sera faite. L'acceptation est valable 1 (un) an. Les acceptez-vous ?
                    <form method='POST' action='index.php'>";
                echo'<input type="hidden" name="cookie" id="cookie" value ="Oui">
                    <input id="oui" type="submit"  value="OUI">
                    <input id="non" type="reset" value="NON">
                    </form>
                    </div>';
            }
        ?>
	    <?php include "hf/footer.html"?>					
    </body>
     <?php include "hf/scripts.html"?>
</html> 
