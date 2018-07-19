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
				<p>COMING SOON</p>
			</div>

			<div class="movieframe wrap">
                
				<?php

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
			?>

			</div>
        </main>

	<?php include "hf/footer.html"?>					
</body>
    <?php include "hf/scripts.html"?>	
</html> 