<?php
	session_start ();
?>

<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<meta charset:"UTF-8">
    		<title>METROPOLIS VOD</title>
			<link rel="stylesheet" href="css/main.css">
			<link rel="stylesheet" href="css/user.css">
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
                     $req3 = $dbh->prepare('SELECT pwd FROM user WHERE email = ?');
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
		
		<?php

				if (isset($_SESSION['1ogin'])) {
	 				echo '<div class="mainint">
 						<div class="menuuser">';
 					echo 'Bienvenu '.$_SESSION['1ogin'].' .';
 					echo '
						<div class="menubtn" id="bienbtn">Bienvenu</div>
						<div class="menubtn" id="gesdbtn">Gérer Vos Données</div>
						<div class="menubtn" id="gesfbtn">Gérer Vos Favoris</div>
						<div class="menubtn" id="delebtn">Supprimer Compte</div>
						<div class="menubtn" id="confbtn">Confirmer Mail</div>
 						</div>
 
						<div class="intuser">
							<div class="bien" id="bien" style="display:block">A venir</div>
	 						<div class="gesd" id="gesd" style="display:none">A venir</div>
	 						<div class="gesf" id="gesf" style="display:none">A venir</div>
	 						<div class="dele" id="dele" style="display:none">A venir</div>
	 						<div class="conf" id="conf" style="display:none">A venir</div>
						</div>
					</div>' ;
				}

		?>

			<?php include "hf/footer.html"?>					
	</body>

		<script src="js/contact.js"></script>
		<script src="js/user_subsys.js"></script>	
</html> 