<?php include "hf/sessionmatr.php"?>
<?php include "hf/co.php"?>


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
			<div class="rechmenu">
				<form method="POST" action="#">
					<fieldset>
						<legend> Rechercher un film par : </legend>
						<input type="radio" name="rech" value="titre" checked="checked"><label class="pad2"> Titre du film</label><label for="rechval">Votre recherche : </label><input type="text" class="rechbox" name="rechval" placeholder="Votre recherche ici" required><span class="pad2"> </span><input class="rechercher" type="submit" value="RECHERCHER"><br>
						<input type="radio" name="rech" value="annee"><label> Année de production</label><br>
						<input type="radio" name="rech" value="genre"><label> Genre du film</label><br>



					</fieldset>
				</form>
			</div>

			<div class="movieframe wrap">
                
				<?php



					if (!isset($_POST['rechval']) && !isset($_POST['rech'])){
						$req = $dbh->prepare('SELECT * FROM film ORDER BY IDfilm DESC');
						$req->execute();
						while ($donnees = $req->fetch()){
						$var =  $donnees['IDfilm'];
						$var2 = $donnees['titrefr'];
						$var3 = $donnees['affiche'];

						echo '<a class="moviebox" href="details.php?IDfilm='.$var.'"><div >';
						echo '<p class="titre">'.$var2.'</p>';
						echo "<br>";
						echo '<img class="pictfilm" src="aff/'.$var3.'">';
						echo "</div></a>";
						}
					} else {

						$rval = $_POST['rechval'];
						$rmod = $_POST['rech'];
						$like = "%".$rval."%";
						$token = 0;


						if ($rmod == "titre"){

							$reqi = $dbh->prepare("SELECT * FROM film WHERE titrefr LIKE '$like' ORDER BY IDfilm DESC");
							$reqi->execute(array());
						while ($donnees = $reqi->fetch()){
							$vari =  $donnees['titrefr'];

							if (isset($vari)){
								$token = 1;
							$req = $dbh->prepare('SELECT * FROM film WHERE titrefr = ?');
						$req->execute(array($vari));

							
						while ($donnees = $req->fetch()){
							$var =  $donnees['IDfilm'];
							$var2 = $donnees['titrefr'];
							$var3 = $donnees['affiche'];

									echo '<a class="moviebox" href="details.php?IDfilm='.$var.'"><div >';
									echo '<p class="titre">'.$var2.'</p>';
									echo "<br>";
									echo '<img class="pictfilm" src="aff/'.$var3.'">';
									echo "</div></a>";
						}
						}
					}
						if ($token == 0){

							echo "<p>Votre requête a donné aucun résultat.</p>";
							echo '<img class="pictmetro" src="img/metropolis.jpg">';

						}
				
						

						} else if ($rmod == "annee"){



							$reqi = $dbh->prepare('SELECT annee FROM film WHERE annee = ?');
							$reqi->execute(array($rval));
						while ($donnees = $reqi->fetch()){
							$vari =  $donnees['annee'];
				
						}

						 if ($vari != $rval){

							echo "<p>Votre requête a donné aucun résultat.</p>";
							echo '<img class="pictmetro" src="img/metropolis.jpg">';

						 } else {
							$req = $dbh->prepare('SELECT * FROM film WHERE annee = ? ORDER BY IDfilm DESC');
							$req->execute(array($rval));

							
						while ($donnees = $req->fetch()){
							$var =  $donnees['IDfilm'];
							$var2 = $donnees['titrefr'];
							$var3 = $donnees['affiche'];

									echo '<a class="moviebox" href="details.php?IDfilm='.$var.'"><div >';
									echo '<p class="titre">'.$var2.'</p>';
									echo "<br>";
									echo '<img class="pictfilm" src="aff/'.$var3.'">';
									echo "</div></a>";

							}
						}


						} else if ($rmod == "genre"){

							$reqi = $dbh->prepare("SELECT genre, titre FROM genre WHERE genre LIKE '$like' GROUP BY titre");
							$reqi->execute(array());
						while ($donnees = $reqi->fetch()){
							$vari =  $donnees['genre'];
							$vari2 =  $donnees['titre'];


							if (isset($vari)){
								$token = 1;
							$req = $dbh->prepare('SELECT  * FROM film WHERE titrefr = ? ORDER BY titrefr ASC');
						$req->execute(array($vari2));

							
						while ($donnees = $req->fetch()){
							$var =  $donnees['IDfilm'];
							$var2 = $donnees['titrefr'];
							$var3 = $donnees['affiche'];

									echo '<a class="moviebox" href="details.php?IDfilm='.$var.'"><div >';
									echo '<p class="titre">'.$var2.'</p>';
									echo "<br>";
									echo '<img class="pictfilm" src="aff/'.$var3.'">';
									echo "</div></a>";
						}
						}
					}
						if ($token == 0){

							echo "<p>Votre requête a donné aucun résultat.</p>";
							echo '<img class="pictmetro" src="img/metropolis.jpg">';

						}

						}
						

					}
			?>

			</div>
        </main>

	<?php include "hf/footer.html"?>					
</body>
    <?php include "hf/scripts.html"?>	
</html> 