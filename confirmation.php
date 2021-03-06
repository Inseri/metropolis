<?php
	session_start ();
?>
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
        <main class="insc">
        <?php

$titre = $_POST['titre'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$bdate = $_POST['bdate'];
$email = $_POST['mail'];
$pwd = $_POST['pwd'];
$pwdc = $_POST['pwdc'];
$pwdl = strlen(utf8_decode($pwd));
$err = 0;
$MVN = 0;
$MVNOK = 0;
$cdate = 0;
$isban = 0;
$pattern1 = '#[0-9?+=|*{}()[\]°",;:!/\# _$<>]#';
$pattern2 = '#^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$#iD';
$pattern3 = '#^(((((1[26]|2[048])00)|[12]\d([2468][048]|[13579][26]|0[48]))-((((0[13578]|1[02])-(0[1-9]|[12]\d|3[01]))|((0[469]|11)-(0[1-9]|[12]\d|30)))|(02-(0[1-9]|[12]\d))))|((([12]\d([02468][1235679]|[13579][01345789]))|((1[1345789]|2[1235679])00))-((((0[13578]|1[02])-(0[1-9]|[12]\d|3[01]))|((0[469]|11)-(0[1-9]|[12]\d|30)))|(02-(0[1-9]|1\d|2[0-8])))))$#';




                    if ($titre == 'F') {
                        $titre = "Madame";
                    } else {
                        $titre = "Monsieur";
                    }

                    if ($pwd != $pwdc){
                        echo '<p class="err">ERREUR : Les mots de passe ne sont pas identiques </p><br>';
                        $err++;
                    } else if ( $pwdl < 8 ){
                        echo '<p class="err">ERREUR : Le mot de passe fait moins de 8 caractères </p><br>';
                        $err++;
                    } else if ( $pwdl > 15 ){
                        echo '<p class="err">ERREUR : Le mot de passe fait plus de 15 caractères </p><br>';
                        $err++;
                    } else {
                        $pwd = sha1($pwd);
                    }
                    if (preg_match($pattern1,$fname) || preg_match($pattern1,$lname)){
                        echo '<p  class="err">ERREUR : Un nom ou un prénom ne peut contenir de chiffres et de caractères spéciaux</p><br>';
                        $err++;
                    }

                    if(!preg_match($pattern2,$email)){
                        echo '<p  class="err">ERREUR : Un mail doit contenir un @ et ne peut contenir de caractères spéciaux ni d\'espaces.<p>
                        <p>De plus, il ne peut y avoir de lettres en majuscules</p><br>';
                        $err++;
                    }

                    if (!preg_match($pattern3,$bdate)){
                        echo '<p class="err">ERREUR : Votre date de naissance doit être au format AAAA-MM-JJ ou la date renseignée n\'est pas valide.</p><br>';
                        $err++;
                    }

                    $req2 = $dbh->prepare('SELECT email FROM user WHERE email = ?');
					$req2->execute(array($email));
				while ($donnees = $req2->fetch()){
					$var2 =  $donnees['email'];
                    }
                    
                    if ($var2 == $email){
                        echo '<p class="err">ERREUR : Vous avez déjà un compte d\'inscrit. Vous pouvez récupérer votre mot de passe en cliquant ><a href="recovery.php">ici</a><. Si vous n\'êtes pas à l\'origine de l\'inscription, veuillez contacter un administrateur via le formulaire contact disponible en haut de page</p><br>';
                        $err++;
                    }

                    if ($err == 0){
                        $MVN = rand(100000000,999999999);
                        $cdate = date("Y-m-d H:i:s");


                        $req = $dbh->prepare('INSERT INTO user(titre, nom, prenom, email, mdp, birthdate, created, MVN, MVNOK, isban) VALUES(:titre, :nom, :prenom, :email, :mdp, :birthdate, :created, :MVN, :MVNOK, :isban)');

$req->execute(array(
    'titre' => $titre,
    'nom' => $fname,
    'prenom' => $lname,
    'email' => $email,
    'mdp' => $pwd,
    'birthdate' => $bdate,
    'created' => $cdate,
    'MVN' => $MVN,
    'MVNOK' => $MVNOK,
    'isban' => $isban
    ));

    $mail= $email;
    $sujet= "Confirmation d'inscription à Metropolis VOD";
    $headers = "Content-type: text/html; charset=UTF-8";
    $message =$titre." ".$fname." ".$lname.", <br/>";
    $message .="Voici le résumé de vos identifiants :<br/>";
    $message .="Adresse Mail (à utiliser pour vous connecter) : ".$mail."<br/>";
    $message .="Mot de passe : #SECRET# <br/>";
    $message .="Date de naissance : ".$bdate." <br/>";
    $message .="ID de confirmation (à recopier dans la partie correspondante de votre interface utilisateur) : ".$MVN." <br/>";
    $message .="<br/>";
    $message .="Je vous remercie de votre confiance et je vous souhaite un bon visionnage.";


    mail($mail,$sujet,$message,$headers);

                        echo '<br><br><p class="fel">Félicitation ! Vous êtes à présent inscrit au service de VOD ! </p><br><br><p class="fel">Un mail vous sera envoyé afin de confirmer votre adresse mail et que vous puissiez conserver vos identifiants (hors mot de passe pour des raisons de sécurité).</p><br><br><p class="fel"><a class="link" href="index.php">Cliquez ici pour retourner à la page principale ou cliquez sur l\'icone "<i class="fas fa-user-alt"></i>" en haut de page pour vous connecter immédiatement.</p></a><br>';
                    } else {
                        echo '<a href="register.php">Cliquez ici pour complèter à nouveau le formulaire d\'inscription</a><br>';
                    }
	?>
                    <img class="pictmetro" src="img/metropolis.jpg">
    </main>

        <?php include "hf/footer.html"?>					
	</body>

        <script src="js/contact.js"></script>
        <script src="js/insc.js"></script>

        </html>