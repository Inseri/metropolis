<?php
	session_start ();
?>

<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<meta charset:"UTF-8">
			<title>METROPOLIS VOD</title>
			<link rel="stylesheet" href="css/user.css">
			<link rel="stylesheet" href="css/main.css">
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
			$dbh->exec("SET CHARACTER SET utf8");
		?>
	<?php
		$id = $_POST['mailco'];
			$pass= $_POST['pwdco'];
			$pass = sha1($pass);

				if (!isset($_SESSION['1ogin'])) {
					$req = $dbh->prepare('SELECT email FROM user WHERE email = ?');
					$req->execute(array($id));
				while ($donnees = $req->fetch()){
					$var =  $donnees['email'];
				}

				if($var != $id){
					echo "ERREUR : ID non valide";
					$req->closeCursor();
				} else {
					$req->closeCursor();
					$req2 = $dbh->prepare('SELECT isban FROM user WHERE email = ?');
					$req2->execute(array($id));
						while ($donnees = $req2->fetch()){
							$var2 =  $donnees['isban'];
				}}
 				if($var2 == 1){
					 echo "ERREUR : Votre compte a été suspendu. Veuillez contacter un administrateur via le menu contact.";
					 $req2->closeCursor();
				} else {
                     $req2->closeCursor();
                     $req3 = $dbh->prepare('SELECT mdp FROM user WHERE email = ?');
                     $req3->execute(array($id));
                         while ($donnees = $req3->fetch()){
							 $var3 =  $donnees['mdp'];

                 }
                }
                if($var3 != $pass){
                    echo "ERREUR : Votre mot de passe est erroné";
                    $req3->closeCursor();
                } else {
                    $_SESSION['1ogin'] = $id;
                    $req3->closeCursor();
				}
				}
	?>

		<?php include "hf/header.php"?>
	<main>

		<?php

				if (isset($_SESSION['1ogin'])) {
					$req5 = $dbh->prepare('SELECT MVNOK FROM user WHERE email = ?');
					$req5->execute(array($_SESSION['1ogin']));
						while ($donnees = $req5->fetch()){
							$var5 =  $donnees['MVNOK'];
						}
					$req5->closeCursor();
						if($var5 == 0){
							$req4 = $dbh->prepare('SELECT MVN FROM user WHERE email = ?');
							$req4->execute(array($_SESSION['1ogin']));
								while ($donnees = $req4->fetch()){
									$var4 =  $donnees['MVN'];
								}
							$req4->closeCursor();
								$MVN1 = $var4;
								$MVN2 = $_POST['MVN'];
								if ($MVN1 == $MVN2){
									$up = $dbh->prepare('UPDATE user SET MVNOK = 1 WHERE email = :id');
									$up->execute(array(
										'id' => $_SESSION['1ogin']
									));	
									echo "<script> alert('Le code est validé');</script>";								
								} 

								if ($MVN2 != '') {
									echo "<script> alert('Le code est érroné');</script>";
								}
				
				}

	 				echo '<div class="mainint">
 						<div class="menuuser">';
 					echo '<p class="head">Bienvenu '.$_SESSION['1ogin'].' .</p>';
 					echo '<br>
						<div class="menubtn" id="bienbtn">Index</div>
						<div class="menubtn" id="gesdbtn">Gérer Vos Données</div>
						<div class="menubtn" id="gesfbtn">Gérer Vos Favoris</div>
						<div class="menubtn" id="delebtn">Supprimer Compte</div>
						<div class="menubtn" id="confbtn">Confirmer Mail</div>
 						</div>
 
						<div class="intuser">
							<div class="bien" id="bien" style="display:block">';
								echo"<br><p>Bienvenu sur votre espace personnel.<br><br>Vous trouverez sur cette page toutes les informations concernant votre compte et la gestion de vos favoris<p><br>";
									if ($var5 == 0) {
										echo '<p><span class="urgent">ATTENTION</span> : Votre email n\'a pas été verifiée</p>';
									}
								echo'<img class="pictmetro2" src="img/metropolis.jpg">';
							echo '</div>
	 						<div class="gesd" id="gesd" style="display:none">A venir B</div>
	 						<div class="gesf" id="gesf" style="display:none">A venir C</div>
							 <div class="dele" id="dele" style="display:none">
							 <br><p><span class="urgent">ATTENTION</span> : La suppression du compte est définitive et les informations ne pourront pas être récupérées par les administrateurs de quelque manière il soit !</p><br><p>A n\'utiliser qu\'en parfaite connaissance de cause !</p><br>

							<form method="POST" action="suppression.php">
								 <fieldset>
									<legend> Formulaire de suppression </legend>
									<br>
							 		<label for="mdpd">Entrez votre mot de passe : </label><br><input class="txtinput" type="password" name="mdpd" required><br>
									 <label for="verif">Entrez le texte suivant à la ligne suivante (en respectant la casse) : "A Supprimer" : </label><br><input class="txtinput" type="text" name="verif" required>
									 <input type="submit" id="suppr" value="SUPPRIMER">
								</fieldset>
							</form>

							 <img class="pictmetro" src="img/ruin.jpg">
							 </div>
							<div class="conf" id="conf" style="display:none">';
								if ($var5 == 1){
									echo "<br><p>Vous avez déjà confirmé votre adresse Mail</p><br><p>Le formulaire de confirmation n'est plus disponible à présent.</p><br>";
								} else {
							
								echo '<form method="POST" action="#">
								<label for="MVN">Entrez le code de confirmation à 9 chiffres ci-contre : <input type="text" name="MVN" class="MVN" placeholder="012345678" maxlength="9" required>
								<input type="submit" value="CONFIRMER" id="confirmer">
								</form>';}

							echo '<img class="pictmetro" src="img/metropolis.jpg"></div>
						</div>
					</div>' ;
				}

		?>
</main>
			<?php include "hf/footer.html"?>					
	</body>

		<script src="js/contact.js"></script>
		<script src="js/user_subsys.js"></script>	
</html> 