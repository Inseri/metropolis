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

    session_start ();

    $mail = $_POST['email'];
    $mdp = $_POST['mdp'];
    $mdpv = $_POST['mdpv'];


    if ($mail != '') {
        $req = $dbh->prepare('SELECT email FROM user WHERE email = ?');
        $req->execute(array($mail));
    while ($donnees = $req->fetch()){
        $var =  $donnees['email'];
    }

    if($var != $mail){
        /*echo "ERREUR : ID non valide";*/
        $mail = '';
        $token = 0;
        $req->closeCursor();
    } else {
        $req->closeCursor();
        $token = 1;
        header ('location: recovery.php');
        }
    }

    if ($mdp != '' && $mdpv != '' && $_COOKIE['token'] == 1) {
        $var = 1;
        if ($mdp != $mdpv) {
            /*echo "ERREUR : Les mots de passes ne sont pas identiques";*/
            setcookie('token', '0', time()+900);
            setcookie('id', $mail, time()-10);
            header ('location: recovery.php');
        } else {
            $mdp = sha1($mdp);
            $up = $dbh->prepare('UPDATE user SET mdp = :mdp WHERE email = :id');
            $up->execute(array(
                'mdp' => $mdp,
                'id' => $_COOKIE['id'])
            );
            $token = 2;
            header ('location: recovery.php');
        }}
    
    


    if(isset($_COOKIE['accord']) && !isset($_COOKIE['token'])){
            setcookie('token', '0', time()+900);

        } else if ($token == 1) {
            setcookie('token', '1', time()+900);
            setcookie('id', $mail, time()+900);
            $mail = '';
        } else if ($token == 2) {
            setcookie('token', '2', time()+10);
            setcookie('id', $mail, time()-10);
        }

?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset:"UTF-8">
    		<title>METROPOLIS VOD</title>
            <link rel="stylesheet" href="css/main.css">
            <link rel="stylesheet" href="css/recovery.css">
			<link rel="stylesheet" href="css/footer.css">
    		<link rel="stylesheet" href="css/header.css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	</head>

	<body>

        <?php include "hf/header.php"?>
            

        <main>

        <?php

                    if (!isset($_COOKIE['accord'])){
                        echo '<div class="page pageerr"<p>ERROR : You didn\' allowed the use of cookies, this functionnality is not available</p>';
                    } else if ($_COOKIE['token'] == 0){
                        echo '<div class="page page1">
                            <form method="POST" action="#">
                                <fieldset>
                                    <legend> ID </legend>
                                    <input type="email" name="email" class="txt" placeholder="Your Email" required><br>
                                    <input type="submit" id ="next" value="VERIFY">
                                </fieldset>
                            </form>
                        </div>';

                    } else if ($_COOKIE['token'] == 1){

                        echo '<div class="page page2">
                            <form method="POST" action="#">
                                <fieldset>
                                    <legend> Reset the password </legend>
                                    <input type="password" class="txt" name="mdp" placeholder="Your new password" required><br>
                                    <input type="password" class="txt" name="mdpv" placeholder="Confirm your new password" required><br>
                                    <input type="submit" id ="next2" value="VERIFY">
                                </fieldset>
                            </form>
                        </div>';
                    } else if ($_COOKIE['token'] == 2){

                        echo '<div class="page page3">
                            <p>Your password was successfully modified.<br>You can log in now.</p>
                        </div>';

                    } 
            ?>
        <img class="pictmetro" src="../img/metropolis.jpg">
    </main>

        <?php include "hf/footer.html"?>					
	</body>

        <script src="js/contact.js"></script>
        <script src="js/insc.js"></script>

        </html>