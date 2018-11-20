<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: index.php');
		exit();
	}

	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
	
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM users WHERE user='%s'",
		mysqli_real_escape_string($polaczenie,$login))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$wiersz = $rezultat->fetch_assoc();
                    $ip = $_SERVER["REMOTE_ADDR"];
                    function ip_details($ip) 
                    {
                     $json = file_get_contents ("https://ipinfo.io/{$ip}/geo");
                    $details = json_decode ($json);
                    return $details;
                    }
                    $data = date("Y-m-d H:i:s");
                    $datae == 0;
                    $ipe == 0;
                    $proby = 0;
                    $proby1 = 1;
                    $login = $_POST['login'];
				if (password_verify($haslo, $wiersz['pass']))
				{
                     $result = mysqli_query ($polaczenie, "SELECT * FROM users");
					$_SESSION['zalogowany1'] = true;
					$_SESSION['id'] = $wiersz['id'];
					$_SESSION['user'] = $wiersz['user'];	
					$_SESSION['email'] = $wiersz['email'];
                    $_SESSION['imie1'] = $wiersz['imie'];
					$_SESSION['nazwisko1'] = $wiersz['nazwisko'];
                    mysqli_query($polaczenie, "UPDATE logi SET datagodz = '$data', ip = '$ip', proby = '$proby' WHERE nick = '$login' AND iperror = ''"); 
                    mysqli_query($polaczenie, "DELETE FROM logi WHERE nick = '$login' AND iperror != ''"); 
                        $rezultat->free_result();
					header('Location: panelu.php');
				}
		    	else 
				{
                    $polaczenie->query("INSERT INTO logi VALUES (NULL, '$login', '$datae', '$ipe', '$proby', CURRENT_TIMESTAMP, '$ip', 0)");  
                    $rezultatb = mysqli_query($polaczenie, "SELECT count(`proby`) as totalb FROM `logi`  WHERE `ip` ='' and nick = '$login' ");
                    $datab=mysqli_fetch_assoc($rezultatb);
                    $datac = $datab['totalb'];
                    mysqli_query($polaczenie, "UPDATE logi SET proby = '$datac', ostatnia_proba = NOW() WHERE nick = '$login' AND iperror = '' "); 
                    $rezultatb->free_result();               
                    $pozostalo = 3 - $datac;
    $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
                   
                    header('Location: index.php');
                }}
		     else {
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
			}	
		}	
		$polaczenie->close();
	}
	
?>