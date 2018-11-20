<?php

    session_start(); 
    if (!isset($_SESSION['zalogowany1']))
    {
    	header('Location: index.php');
		exit();
	}
    ?>
﻿<!DOCTYPE html>
<html>
    <head>
        <title> Sieminski- Zadanie 7</title> 
        <link rel="stylesheet" href="style1111.css" type="text/css" />
    </head>
    <body>
    <center>
    <?php
        $user = $_SESSION['user'];

        echo "<p><div style='text-align: left;'>/".$user."</div></p>";
      ?></p><br>

        Wgraj plik:<br><br>

        <form action="odbierz.php" method="POST" ENCTYPE="multipart/form-data">
        <input type="file" name="plik"/><br><br>
        <input type="submit" value="Wyślij plik"/></form>
        
        <form method="post" action="dodaj.php"> <?php
        if (isset ($_SESSION['upload'])) echo $_SESSION['upload'];
        if (isset ($_SESSION['failedupload'])) echo $_SESSION['failedupload'];
        ?><br>
        Utwórz nowy katalog:<br>
        <br><input type="text" name="katalog" maxlength="40" required><br><br>
        <input type="submit" value="Utwórz"/>
        </form><br>
       Twoje pliki:<br>
        <?         
         $pliki = array_diff(scandir($user), array('.', '..'));
        foreach($pliki as $file)
        {
    if(is_dir($user . DIRECTORY_SEPARATOR . $file)){
                echo "<a href='podkatalog.php?podkatalog=$file'><img src='katalogi.png'>$file</a>";
            }
            else{
                echo "<a href='$user/$file' download='$file'><img src='pliki.png'>$file</a>";
            }
            }
        ?>
        <br><br>
        <br><br><a href=".."> Cofnij</a></center>
</center>
    </body>
</html>