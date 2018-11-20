<?php

    session_start(); 
    if (!isset($_SESSION['zalogowany1']))
    {
        header('Location: index.php');
		exit();
	}
    ?>
        <html>
<head>
<title>Sieminski</title>
<link rel="stylesheet" href="style1111.css" type="text/css" />
</head>
<?php 
$user = $_SESSION['user'];
$podkatalog = $_POST['podkatalog'];
$_SERVER['DOCUMENT_ROOT'] = "$user/$podkatalog/";
if (is_uploaded_file($_FILES['plik']['tmp_name'])) 
{ echo 'Odebrano plik: '.$_FILES['plik']['name'].'<br/>';
move_uploaded_file($_FILES['plik']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$_FILES['plik']['name']); 
} 
else {echo 'Błąd przy przesyłaniu danych!';} ?>