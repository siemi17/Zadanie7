<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany1'])) && ($_SESSION['zalogowany1']==true))
	{
		header('Location: panelu.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Sieminski</title>
<link rel="stylesheet" href="style11.css" type="text/css" />
</head>

<body>
<center>	
<div id="logowanie">
	<form action="zaloguj.php" method="post">
		Login: <br /> <input type="text" name="login" /> <br />
		Hasło: <br /> <input type="password" name="haslo" /> <br /><br />
		<input type="submit" value="Zaloguj się" />
	    <br /><br>
	</form>
	    <a href="rejestracja.php">Rejestracja</a><br><br>
        <a href="..">Cofnij</a></center>
	
<?php
echo '<div id=blad>';
    if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
    echo '</div';
?>
<br><br>
</body>
</html>