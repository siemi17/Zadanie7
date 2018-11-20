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
        $podkatalog = $_GET['podkatalog'];
        echo "<p><div style='text-align: left;'>/".$user."/".$podkatalog."</div></p>";?></p><br>
       
        Wgraj plik:<br><br>
        <form action="odbierz2.php" method="POST" ENCTYPE="multipart/form-data">
        <input type="file" name="plik"/><br><br>
        <input type="hidden" name="podkatalog" value="<?php echo $_GET['podkatalog']; ?>" />
        <input type="submit" value="Wyślij plik"/></form>
  
       Twoje pliki:<br>
        <? 
        
         $pliki = array_diff(scandir($user . DIRECTORY_SEPARATOR . $podkatalog), array('.', '..'));
        foreach($pliki as $file)
        {
            if(is_dir($user . DIRECTORY_SEPARATOR . $podkatalog . DIRECTORY_SEPARATOR . $file)){
                echo "<a href='$user/podkatalog.php?podkatalog=$file'><img src='katalogi.png'>$file</a>";
            }
            else{
                echo "<a href='$user/$podkatalog/$file' download='$file'><img src='pliki.png'>$file</a>";
            }
            }
            
        ?>
</center>
    </body>
</html>