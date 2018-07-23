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
        ?>

<!DOCTYPE HTML>
<html lang="en">
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
						<legend> Search a movie by : </legend>
						<input type="radio" name="rech" value="titre" checked="checked"><label class="pad2"> Movie's title</label><label for="rechval">Your search : </label><input type="text" class="rechbox" name="rechval" placeholder="Your search here" required><span class="pad2"> </span><input class="rechercher" type="submit" value="SEARCH"><br>
						<input type="radio" name="rech" value="annee"><label> Year of production</label><br>
						<input type="radio" name="rech" value="genre"><label> Genre</label><span class="pad2"> </span><label>/!\ BEWARE : This searching mode is experimental. You must enter the genre in french.</label><br>



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
						$var2 = $donnees['titreen'];
						$var3 = $donnees['affiche'];

						echo '<a class="moviebox" href="details.php?IDfilm='.$var.'"><div >';
						echo '<p class="titre">'.$var2.'</p>';
						echo "<br>";
						echo '<img class="pictfilm" src="../aff/'.$var3.'">';
						echo "</div></a>";
						}
					} else {

						$rval = $_POST['rechval'];
						$rmod = $_POST['rech'];
						$like = "%".$rval."%";
						$token = 0;


						if ($rmod == "titre"){

							$reqi = $dbh->prepare("SELECT * FROM film WHERE titreen LIKE '$like' ORDER BY IDfilm DESC");
							$reqi->execute(array());
						while ($donnees = $reqi->fetch()){
							$vari =  $donnees['titreen'];

							if (isset($vari)){
								$token = 1;
							$req = $dbh->prepare('SELECT * FROM film WHERE titreen = ?');
						$req->execute(array($vari));

							
						while ($donnees = $req->fetch()){
							$var =  $donnees['IDfilm'];
							$var2 = $donnees['titreen'];
							$var3 = $donnees['affiche'];

									echo '<a class="moviebox" href="details.php?IDfilm='.$var.'"><div >';
									echo '<p class="titre">'.$var2.'</p>';
									echo "<br>";
									echo '<img class="pictfilm" src="../aff/'.$var3.'">';
									echo "</div></a>";
						}
						}
					}
						if ($token == 0){

							echo "<p>Your request didn't give any result.</p>";
							echo '<img class="pictmetro" src="../img/metropolis.jpg">';

						}
				
						

						} else if ($rmod == "annee"){



							$reqi = $dbh->prepare('SELECT annee FROM film WHERE annee = ?');
							$reqi->execute(array($rval));
						while ($donnees = $reqi->fetch()){
							$vari =  $donnees['annee'];
				
						}

						 if ($vari != $rval){

							echo "<p>Your request didn't give any result.</p>";
							echo '<img class="pictmetro" src="../img/metropolis.jpg">';

						 } else {
							$req = $dbh->prepare('SELECT * FROM film WHERE annee = ? ORDER BY IDfilm DESC');
							$req->execute(array($rval));

							
						while ($donnees = $req->fetch()){
							$var =  $donnees['IDfilm'];
							$var2 = $donnees['titreen'];
							$var3 = $donnees['affiche'];

									echo '<a class="moviebox" href="details.php?IDfilm='.$var.'"><div >';
									echo '<p class="titre">'.$var2.'</p>';
									echo "<br>";
									echo '<img class="pictfilm" src="../aff/'.$var3.'">';
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
							$req = $dbh->prepare('SELECT  * FROM film WHERE titrefr = ? ORDER BY titreen ASC');
						$req->execute(array($vari2));

							
						while ($donnees = $req->fetch()){
							$var =  $donnees['IDfilm'];
							$var2 = $donnees['titreen'];
							$var3 = $donnees['affiche'];

									echo '<a class="moviebox" href="details.php?IDfilm='.$var.'"><div >';
									echo '<p class="titre">'.$var2.'</p>';
									echo "<br>";
									echo '<img class="pictfilm" src="../aff/'.$var3.'">';
									echo "</div></a>";
						}
						}
					}
						if ($token == 0){

							echo "<p>Your request didn't give any result.</p>";
							echo '<img class="pictmetro" src="../img/metropolis.jpg">';

						}

						}
						

					}
			?>
			</main>

	<?php include "hf/footer.html"?>					
</body>
    <?php include "hf/scripts.html"?>	
</html> 