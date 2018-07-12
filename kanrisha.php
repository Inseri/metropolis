<?php
	session_start ();
?>

<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<meta charset:"UTF-8">
    		<title>METROPOLIS VOD</title>
			<link rel="stylesheet" href="css/main.css">
			<link rel="stylesheet" href="css/kanrisha.css">
			<link rel="stylesheet" href="css/footer.css">
    		<link rel="stylesheet" href="css/header.css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	</head>

	<body>
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
		?>
	<?php
		$id = $_POST['id'];
			$pass= $_POST['pass'];
			$pass = sha1($pass);

				if (!isset($_SESSION['login'])) {
					$req = $dbh->prepare('SELECT name FROM admin WHERE name = ?');
					$req->execute(array($id));
				while ($donnees = $req->fetch()){
					$var =  $donnees['name'];
				}

				if($var != $id){
					echo "ERREUR : ID non valide";
					$req->closeCursor();
				} else {
					$req->closeCursor();
					$req2 = $dbh->prepare('SELECT mdp FROM admin WHERE name = ?');
					$req2->execute(array($id));
						while ($donnees = $req2->fetch()){
							$var2 =  $donnees['mdp'];
				}}
 				if($var2 != $pass){
					 echo "ERREUR : Mot de passe non valide";
					 $req2->closeCursor();
				} else {
					$_SESSION['login'] = $id;
 					$req2->closeCursor();}
				}
	?>
		<?php include "hf/header.php"?>


		
		<?php

				if (isset($_SESSION['login'])) {
	 				echo '<div class="mainint">
 						<div class="menukan">';
 					echo 'Bienvenu '.$_SESSION['login'].' .';
 					echo '
						<div class="menubtn" id="cfilmbtn">Créer Fiche Film</div>
						<div class="menubtn" id="mfilmbtn">Modifier Fiche Film</div>
						<div class="menubtn" id="muserbtn">Gérer Utilisateurs</div>
						<div class="menubtn" id="fuserbtn">Voir Favoris Utilisateur</div>
						<div class="menubtn" id="ffilmbtn">Voir Films les plus Appréciés</div>
 						</div>
 
						<div class="intkan">
							<div class="cfilm" id="cfilm" style="display:block">
								<form method="POST" action="#" enctype="multipart/form-data">
									<fieldset>
										<legend>Créer une nouvelle fiche film</legend>
										<br>
										<p>Les champs marqués d\'une étoile rouge sont obligatoires</p><br>
											<label for="titrefr">Titre en Français<span class="star">*</span> : </label><br>
											<input class="textform" type="text" id="titrefr" name="titrefr" required><br>
											<label for="titreen">Titre en Anglais : </label><br>
											<input class="textform" type="text" id="titreen" name="titreen"><label> (Laissez vide si le titre est identique au titre français)</label><br>
											<label for="annee">Année de production<span class="star">*</span> : </label><br>
											<input class="textform" type="text" id="annee" name="annee" required><br>
											<label for="origine">Nationalité<span class="star">*</span> : </label><br>
											<input class="textform" type="text" id="origine" name="origine" required><br>
											<label for="genre">Genre<span class="star">*</span> : </label><br>
											<input class="textform" type="text" id="genre" name="genre" required><label> (Utilisez le séparateur \'_\' entre chaque genre ex: texte 1_texte 2)</label><br>
											<label for="realisateur">Réalisateur<span class="star">*</span> : </label><br>
											<input class="textform" type="text" id="realisateur" name="realisateur" required><label> (Utilisez le séparateur \'_\' entre chaque réalisateur ex: texte 1_texte 2)</label><br>
											<label for="acteur">Acteurs principaux<span class="star">*</span> : </label><br>
											<input class="textform" type="text" id="acteur" name="acteur" required><label> (Utilisez le séparateur \'_\' entre chaque acteur ex: texte 1_texte 2)</label><br>
											<label for="affiche">Affiche du film<span class="star">*</span> : </label><br>
											<input type="file" id="affiche" name="affiche" required><br>
											<label for="ba">Bande annonce du film<span class="star">*</span> : </label><br>
											<input type="file" id="ba" name="ba"  required><br>
											<label for="syfr">Synopsis en Français<span class="star">*</span> : </label><br>
											<textarea class="areaform" id="syfr" name="syfr" required></textarea><br>
											<label for="syen">Synopsis en Anglais<span class="star">*</span> : </label><br>
											<textarea class="areaform" id="syen" name="syen" required></textarea><br>
											<input id="valider" type="submit" value="VALIDER">
											<input id="effacer" type="reset" value="EFFACER">
											</fieldset>
											</form>
							</div>
	 						<div class="mfilm" id="mfilm" style="display:none">A venir</div>
	 						<div class="muser" id="muser" style="display:none">A venir</div>
	 						<div class="fuser" id="fuser" style="display:none">A venir</div>
	 						<div class="ffilm" id="ffilm" style="display:none">A venir</div>
						</div>
					</div>' ;
				}

		?>

			<?php include "hf/footer.html"?>					
	</body>

		<script src="js/contact.js"></script>
		<script src="js/kanrisha_subsys.js"></script>	
</html> 