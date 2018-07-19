<?php include "hf/sessionmatr.php"?>
<?php
    if(isset($_POST['cookie']) && $_POST['cookie'] == "Oui")
        {
            setcookie('accord', 'ok', time()+365*24*3600);
            header("Location: index.php");
        }
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


        <div class="kanrisha" id="kanrishafr" style="display : none">
            <p>Administrator Login :</p><br>
                <form method="POST" action="kanrisha.php">
                    <input type="text" id="id" name="id" placeholder="Login"><br><br>
                    <input type="password" id="pass" name="pass" placeholder="Password"><br><br>
                    <input type="submit" id="submit" value="VALIDATE">
                    <input type="reset" id="reset" value="CANCEL">
                </form>

        </div>
        <main id="main">
            <div class="prez"><h1>Director's Words</h1><p>You can't go to the theater ?<br>So brint it with you where you want, when you want and at a very competitive price<br> Enjoy the last movies 3 months after their release at theaters !<br> Even if you are alone on your smarphone or at home with your friends and family, enjoy a true theatrical experience thanks to 4K resolution and Dolby Surround 7.1 sound system !<br>
            </div>
            <div class="nouv"><h1>The Last Movies</h1>
                <div class="movieframe  wrap">
                
                    <?php

                        $req = $dbh->prepare('SELECT * FROM film ORDER BY IDfilm DESC LIMIT 5');
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
            </div>
            <div class="favs"><h1>Users' most Favorites Movies</h1>
            <div class="movieframe">#INSERT PHP CODE HERE#</div>
            </div>
        </main>
        <?php
            if(!isset($_COOKIE['accord'])) {
                echo"<div class='cookie' style='display : inline-block'>This website use cookies to allow it to function properly and for statistic use. However, these cookies won't be used for any advertisement use of any kind. The acceptation is valable for 1 (one) year. Do you accept them ? ?
                    <form method='POST' action='index.php'>";
                echo'<input type="hidden" name="cookie" id="cookie" value ="Oui">
                    <input id="oui" type="submit"  value="YES">
                    <input id="non" type="reset" value="NO">
                    </form>
                    </div>';
            }
        ?>
	    <?php include "hf/footer.html"?>					
    </body>
     <?php include "hf/scripts.html"?>
</html>