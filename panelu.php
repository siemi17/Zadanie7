<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany1']))
	{
		header('Location: index.php');
		exit();
	}
	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Sieminski- Panel Klienta</title>
      <link rel="stylesheet" href="style11.css" type="text/css" />
      <link rel="stylesheet" href="fileicon.css" type="text/css" />
</head>

<body>
	
<?php

	echo "<p>Witaj ".$_SESSION['imie1'].'! [ <a href="logout.php">Wyloguj się!</a>]</p>';
    $nick = $_SESSION['user'];
 require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
$rezultat1 = mysqli_query($polaczenie, "SELECT * FROM logi WHERE nick= '$nick' AND ip !=''");
 while ($wiersz = mysqli_fetch_array($rezultat1)) {  /*Dopóki udaje się pobierać do tablicy wynik "rezultat" i zapisywać do zmiennej wiersz, wypisuje wyniki. */
                    $ostatniap = $wiersz [7];
                       echo "Wykryto nieudane logowanie! Ostatnia próba nieprawidowego zalogowania: <font color=red size=5>$ostatniap</font> Jeżeli to nie byłeś/łaś Ty, zgłoś się do administracji.<br><br><br><br><br>";                     
;}


Echo "<center><a href='katalogi/katalog.php?user=$nick'><font color=red size=15>Moj katalog</font> </a></center>";

                    

?>
</body>
</html>