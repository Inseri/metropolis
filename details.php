<?php include "hf/sessionmatr.php"?>
<?php
			$host_name = 'db745044935.db.1and1.com';
			$database = 'db745044935';
			$user_name = 'dbo745044935';
			$password = 'Arika-123';

			$dbh = null;
			
			try {
				$dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
			} catch (PDOException $e) {
  			echo "Erreur!: " . $e->getMessage() . "<br/>";
  			die();
			}
			$dbh->exec("SET CHARACTER SET utf8");
			$id = $_GET['IDfilm'];
        ?>

<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset:"UTF-8">
            <title>METROPOLIS VOD</title>
			<link rel="stylesheet" href="css/main.css">
			<link rel="stylesheet" href="css/grid.css">
	        <link rel="stylesheet" href="css/footer.css">
            <link rel="stylesheet" href="css/header.css">
        	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    </head>
<body>
    <?php include "hf/header.php"?>
	
	<?php
	        $reqi = $dbh->prepare('SELECT IDfilm FROM film ORDER BY IDfilm DESC LIMIT 1');
			$reqi->execute();
		while ($donnees = $reqi->fetch()){
			$vari =  $donnees['IDfilm'];
		}

		if ($_GET['IDfilm'] > $vari){
			echo "<p>ERREUR : ID non valide</p>";
			echo '<img class="pictmetro" src="img/metropolis.jpg">';
		} else {
	        $req = $dbh->prepare('SELECT * FROM film WHERE IDfilm = ?');
			$req->execute(array($id));
		while ($donnees = $req->fetch()){
			$var =  $donnees['titrefr'];
			$var2 =  $donnees['annee'];
			$var3 =  $donnees['nation'];
			$var4 =  $donnees['affiche'];
			$var5 =  $donnees['ba'];
			$var6 =  $donnees['synopsisfr'];
		}
			$req2 = $dbh->prepare('SELECT * FROM realisateur WHERE titre = ?');
			$req2->execute(array($var));

			$req3 = $dbh->prepare('SELECT * FROM genre WHERE titre = ?');
			$req3->execute(array($var));

			$req4 = $dbh->prepare('SELECT * FROM acteur WHERE titre = ?');
			$req4->execute(array($var));
		}


	?>
		<?php

			if ($_GET['IDfilm'] <= $vari){

        echo'<main>

			<div class="gridframe">
				<div class="gridelem titre"><p>'.$var.'</p></div>
  				<div class="gridelem affiche"><img class="pictbox" src="aff/'.$var4.'"></div>
  				<div class="gridelem onglet"><p>Réalisateur(s) : </p></div>
				  <div class="gridelem info">';

					while ($donnees = $req2->fetch()){
						$var7 =  $donnees['patr'];
						echo '<span class="pad"> '.$var7.' </span> ';
					}
				 
				echo '</div>
  				<div class="gridelem onglet"><p>Année de production : </p></div>
  				<div class="gridelem  info"><p>'.$var2.'</p></div>
  				<div class="gridelem onglet"><p>Origine : </p></div>
  				<div class="gridelem  info"><p>'.$var3.'</p></div>
				<div class="gridelem onglet"><p>Genre(s) : </p></div>
				<div class="gridelem info">';
					
					while ($donnees = $req3->fetch()){
						$var8 =  $donnees['genre'];
						echo '<span class="pad"> '.$var8.' </span> ';
					}

				echo '</div>
  				<div class="gridelem onglet"><p>Acteurs Principaux : </p></div>
				<div class="gridelem info">';
					
					while ($donnees = $req4->fetch()){
						$var9 =  $donnees['patr'];
						echo '<span class="pad"> '.$var9.' </span> ';
					}

				echo '</div>
				<div class="gridelem synmenu onglet"><p>Synopsis : </p></div>
				<div class="gridelem syncontent"><p>'.$var6.'</p></div>
  				<div class="gridelem"></div>
				<div class="gridelem video"><video controls src="ba/'.$var5.'">Veuillez mettre à jour votre navigateur</video></div>
				<div class="gridelem"></div>
  				<div class="gridelem"></div>
				<div class="gridelem"></div>
				<div class="gridelem"></div>
				<div class="gridelem"></div>
  				<div class="gridelem"></div>
				<div class="gridelem"></div>
				<div class="gridelem"></div>
  				<div class="gridelem fav"><p>Mettre en Favoris<p></div>
			</div>
    
		</main>';
	}?>

	<?php include "hf/footer.html"?>					
</body>
    <?php include "hf/scripts.html"?>	
</html> 