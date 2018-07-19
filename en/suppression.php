<?php include "hf/sessionmatr.php"?>
<?php
                $mdp = $_POST['mdpd'];
                $mdp = sha1($mdp);
                $verif = $_POST['verif'];
                $id = $_SESSION['1ogin'];
            ?>
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
            if (isset($_SESSION['1ogin'])) {
					$req = $dbh->prepare('SELECT mdp FROM user WHERE email = ?');
					$req->execute(array($id));
						while ($donnees = $req->fetch()){
                            $var =  $donnees['mdp'];
                        }
					$req->closeCursor();
						if($var != $mdp){
                            $err =  "<p>ERROR : Invalid password.</p>";
                        } else {
                            if ($verif != "For Deletion"){
                                $err =  "<p>ERROR : Invalid confirmation sentence.</p>";
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

<?php echo $err; ?>
    
        </main>

	<?php include "hf/footer.html"?>					
</body>
    <?php include "hf/scripts.html"?>	
</html> 