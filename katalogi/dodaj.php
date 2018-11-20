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
<body>
<?php
$katalog = $_POST['katalog']; 
$user = $_SESSION['user'];
if ($katalog){
mkdir("$user/$katalog", 0777, true);
}
echo "Dodano katalog.";
?>
</body>
</html>