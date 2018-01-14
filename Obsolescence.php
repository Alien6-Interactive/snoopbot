<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8" />
            <link rel="stylesheet" href="Obsolescence.css" />
            <title> ALIEN 6</title>
</head>

    <body>
			<a href="AcceuilAlien.php"><img class="title" src="Alien6image.png"></a>
			<br>
			<ul class="menu">
			<li><a href="AcceuilAlien.php">Accueil</a></li>
			<li><a href="Alien6Version.php">Versions d'un logiciel</a></li>
			</ul>
            <form action ="Obsolescence.php" method="post" >
				<p>Nom du logiciel : <input type="text" name="loginame" /></p>
				<p>DataBaseVersion : <input type="text" name="dbv" /></p>
				<p>Systeme d'exploitation : <input type="text" name="se" /></p>
				<p>FormValid : <input type="text" name="fv" placeholder="yyyy/MM/dd/"/></p>
				<p><input type="submit" value="Valider" name="envoi"> </p>
            </form>
        <?php
			require("fonctionObsolescence.php");
			if (isset($_POST['loginame'])&&($_POST['loginame'])!="" && isset($_POST['dbv'])&&($_POST['dbv'])!="" && isset($_POST['se'])&&($_POST['se'])!=""&&($_POST['fv'])!="" && isset($_POST['fv'])){
			  
				estObsolete($_POST['loginame'],$_POST['dbv'],$_POST['se'],$_POST['fv']);
			}
			else
			{
				if(isset($_POST['envoi']))
				{
					echo( "<p style=color:#778899;>Veuillez vérifier les informations transmise dans le formulaire</p>");
				}
			}
        ?>
    </body>

</html>