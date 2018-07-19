<?php
	session_start ();
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
                        $titre = "Ms";
                    } else {
                        $titre = "Mr";
                    }

                    if ($pwd != $pwdc){
                        echo '<p class="err">ERROR : Both passwords are not identical </p><br>';
                        $err++;
                    } else if ( $pwdl < 8 ){
                        echo '<p class="err">ERROR : Your password is shorter than 8 characters </p><br>';
                        $err++;
                    } else if ( $pwdl > 15 ){
                        echo '<p class="err">ERREUR : Your password is longer than 15 characters </p><br>';
                        $err++;
                    } else {
                        $pwd = sha1($pwd);
                    }
                    if (preg_match($pattern1,$fname) || preg_match($pattern1,$lname)){
                        echo '<p  class="err">ERROR : A last name or a first name can\'t have numbers and specials characters</p><br>';
                        $err++;
                    }

                    if(!preg_match($pattern2,$email)){
                        echo '<p  class="err">ERROR : A mail address must have an @ can\'t have capital letters and specials characters except . and -.</p><br>';
                        $err++;
                    }

                    if (!preg_match($pattern3,$bdate)){
                        echo '<p class="err">ERROR : Your birstdate must be in YYYY/MM/DD format or the input date is wrong.</p><br>';
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
    $sujet= "Registering confirmation to Metropolis VOD";
    $headers = "Content-type: text/html; charset=UTF-8";
    $message =$titre." ".$fname." ".$lname.", <br/>";
    $message .="There is a resume of your credentials :<br/>";
    $message .="Mail address (for use to log in) : ".$mail."<br/>";
    $message .="Password : #SECRET# <br/>";
    $message .="Birthdate : ".$bdate." <br/>";
    $message .="confirmation ID (You must wirte it in the dedicated menu of your user interface) : ".$MVN." <br/>";
    $message .="<br/>";
    $message .="I want to thanks you for your trust and good watching !";


    mail($mail,$sujet,$message,$headers);

                        echo '<br><br><p class="fel">Congratulation ! You are now registered to our VOD service ! </p><br><br><p class="fel">A mail will be send to you to allow you to get your confirmation code and to keep a summary of your credentials (except your password for security reasons)</p><br><br><p class="fel"><a class="link" href="index.php">Click here to come back to the home page or click on the"<i class="fas fa-user-alt"></i>" icon at the upper area of the page to login immediately</p></a><br>';
                    } else {
                        echo '<a href="register.php">Click here to redo the registering form</a><br>';
                    }
	?>
                    <img class="pictmetro" src="../img/metropolis.jpg">
    </main>

        <?php include "hf/footer.html"?>					
	</body>

        <script src="js/contact.js"></script>
        <script src="js/insc.js"></script>

        </html>