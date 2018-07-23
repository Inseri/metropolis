<?php include "hf/sessionmatr.php"?>
<?php
                $mdp = $_POST['mdpd'];
                $mdp = sha1($mdp);
                $verif = $_POST['verif'];
                $id = $_SESSION['1ogin'];
            ?>
    <?php include "hf/co.php"?>

            <?php
            if (isset($_SESSION['1ogin'])) {
					$req = $dbh->prepare('SELECT mdp FROM user WHERE email = ?');
					$req->execute(array($id));
						while ($donnees = $req->fetch()){
                            $var =  $donnees['mdp'];
                        }
					$req->closeCursor();
						if($var != $mdp){
                            $err =  "<p>ERREUR : Le mot de passe est erroné.</p>";
                        } else {
                            if ($verif != "A Supprimer"){
                                $err =  "<p>ERREUR : La phrase de confirmation est erronée.</p>";
                            } else {
                                $del = $dbh->prepare('DELETE FROM user WHERE email= ?');
                                $del->execute(array($id));
                                session_unset();
                                session_destroy();
                                header ('location: index.php');
                            }
                        }				
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
    
        <main>

<?php echo $err; ?>
    
        </main>

	<?php include "hf/footer.html"?>					
</body>
    <?php include "hf/scripts.html"?>	
</html> 