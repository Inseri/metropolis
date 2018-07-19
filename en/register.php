<?php include "hf/sessionmatr.php"?>

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
            <form class="conreg" method="post" action="confirmation.php">
                <fieldset>
                    <legend>Registering form</legend>
                    <br>
                    <p>All fields are required</p>
                    <br>
                        <label>Gender : </label>
                        <input type="radio" name="titre" value="F" id="F" required/><label for="F">Ms</label>
                        <input type="radio" name="titre" value="M" id="M" required/><label for="M">Mr</label><br>
                        <label for="fname"> First name : </label><br><input type="text" name="fname" id="fname" class="txtinput" placeholder="Your first name" required/><br>
                        <label for="lname"> Last name : </label><br><input type="text" name="lname" id="lname" class="txtinput" placeholder="Your last name" required/><br>
                        <label for="bdate"> Birthdate (in YYYY-MM-DD format): </label><br><input class="txtinput" type="date" name="bdate" required/><br>
			            <label for="mail"> Email : </label><br><input type="email" name="mail" id="mail" class="txtinput" placeholder="Your email" required/><br>
			            <label for="pwd"> Password (8 character minimum and 15 characters maximum): </label><input type="password" name="pwd" id="pwd" class="txtinput" placeholder="password" required/><br>
			            <label for="pwdc"> Password confirmation : </label><input type="password" name="pwdc" id="pwdc" class="txtinput" placeholder="password" required/><br>
                        <input id="valider" type="submit" value="REGISTER">
                        <input id="annuler" type="reset" value="RESET">
                </fieldset>
            </form>
        </main>
	<?php include "hf/footer.html"?>					
</body>
    <?php include "hf/scripts.html"?>	
</html> 