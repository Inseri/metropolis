<?php
	session_start ();
?>

<!DOCTYPE HTML>
<html lang="en">
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
			$dbh->exec("SET CHARACTER SET utf8");
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
					echo "ERROR : Non valid ID";
					$req->closeCursor();
				} else {
					$req->closeCursor();
					$req2 = $dbh->prepare('SELECT mdp FROM admin WHERE name = ?');
					$req2->execute(array($id));
						while ($donnees = $req2->fetch()){
							$var2 =  $donnees['mdp'];
				}}
 				if($var2 != $pass){
					 echo "ERROR : Non valid password";
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
 					echo '<p class="head">Welcome '.$_SESSION['login'].' .</p>';
 					echo '<br>
						<div class="menubtn" id="cfilmbtn">Create a new movie page</div>
						<div class="menubtn" id="mfilmbtn">Modify a movie page</div>
						<div class="menubtn" id="muserbtn">Manage users</div>
						<div class="menubtn" id="fuserbtn">Watch users\' favorites</div>
						<div class="menubtn" id="ffilmbtn">Watch most fovorited movies</div>
 						</div>
 
						<div class="intkan">
							<div class="cfilm" id="cfilm" style="display:block">
								<form method="POST" action="#" enctype="multipart/form-data">
									<fieldset>
										<legend>Create a new movie page</legend>
										<br>
										<p>All fields market with a red star are required</p><br>
											<label for="titreen">English title<span class="star">*</span> : </label><br>
											<input class="textform" type="text" id="titreen" name="titreen" required><br>
											<label for="titrefr">French title : </label><br>
											<input class="textform" type="text" id="titrefr" name="titrefr"><label> (Keep empty if identical to the english title)</label><br>
											<label for="annee">Year of production<span class="star">*</span> : </label><br>
											<input class="textform" type="text" id="annee" name="annee" required><br>
											<label for="origine">Country of origin<span class="star">*</span> : </label><br>
											<input class="textform" type="text" id="origine" name="origine" required><br>
											<label for="genre">Genre<span class="star">*</span> : </label><br>
											<input class="textform" type="text" id="genre" name="genre" required><label> (Use \'_\' between each genre ex: text 1_text 2)</label><br>
											<label for="realisateur">Producer<span class="star">*</span> : </label><br>
											<input class="textform" type="text" id="realisateur" name="realisateur" required><label> (Use \'_\' between each producer ex: text 1_text 2)</label><br>
											<label for="acteur">Main actors<span class="star">*</span> : </label><br>
											<input class="textform" type="text" id="acteur" name="acteur" required><label> (Use \'_\' between each actor ex: texte 1_texte 2)</label><br>
											<label for="affiche">Movie poster<span class="star">*</span> : </label><br>
											<input type="file" id="affiche" name="affiche" required><br>
											<label for="ba">Trailer<span class="star">*</span> : </label><br>
											<input type="file" id="ba" name="ba"  required><br>
											<label for="syen">Plot in english<span class="star">*</span> : </label><br>
											<textarea class="areaform" id="syen" name="syen" required></textarea><br>
											<label for="syfr">Plot in french<span class="star">*</span> : </label><br>
											<textarea class="areaform" id="syfr" name="syfr" required></textarea><br>
											<input id="valider" type="submit" value="VALIDATE">
											<input id="effacer" type="reset" value="CLEAR">
											</fieldset>
											</form>
							</div>
	 						<div class="mfilm" id="mfilm" style="display:none">Coming soon</div>
	 						<div class="muser" id="muser" style="display:none">Coming soon</div>
	 						<div class="fuser" id="fuser" style="display:none">Coming soon</div>
	 						<div class="ffilm" id="ffilm" style="display:none">Coming soon</div>
						</div>
					</div>' ;
				}

		?>

			<?php include "hf/footer.html"?>					
	</body>

		<script src="js/contact.js"></script>
		<script src="js/kanrisha_subsys.js"></script>	
</html> 