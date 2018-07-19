<?php include "hf/sessionmatr.php"?>

<!DOCTYPE HTML>
<html lang="en">

    <head>
        <meta charset:"UTF-8">
        <title>METROPOLIS VOD</title>
        <link rel="stylesheet" href="../css/main.css">
	    <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/header.css">
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    </head>
    <?php
        if(isset($_POST['cookie']) && $_POST['cookie'] == "Oui")
            {
                setcookie('accord', 'ok', time() + 365*24*3600, null, null, false, true);
            }
    ?>

<body>
	<?php include "../hf/header.php"?>
    <main>
        <?php
			$gen=$_POST['titre'];
            $nom=$_POST['fname'];
        	$prenom=$_POST['lname'];
            $email=$_POST['mail'];
            $motif=$_POST['motif'];
            $detail=$_POST['detail'];

                
            if ($gen == 'F') {
				$gen = "Ms";
			} else {
				$gen = "Mr";
            }

            if ($motif == 1) {
                $motif = "I've found a bug on the website";
            } else if ($motif == 2) {
                $motif = "I have problems for login";
            } else if ($motif == 3) {
                $motif = "I want to get an access on my private datas";
            } else {
                $motif = "Other";
            }

			$mail= "admin@ryuzendoji.net";
			$sujet= "Support wanted";
			$headers = "Content-type: text/html; charset=UTF-8";
            $message =$gen." ".$nom." ".$prenom.", <br/>";
            $message .="that the Mail address is : ".$email."<br/>";
            $message .="Needs informations about : ".$motif." <br/>";
            $message .="And there are the details : <br/>";
            $message .=$detail." <br/>";



			mail($mail,$sujet,$message,$headers);?>
					
        <p>The mail was successfully sent.</p>
        <p>The team will answer it into the most short delays possible.</p>
        <p>Thanks for your trust.<p>
    </main>

	<?php include "../hf/footer.html"?>					
</body>
    <?php include "../hf/scripts.html"?>	
</html> 