<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="AlienVersion.css" />
		<title>ALIEN 6</title>
	</head>

    <body>
		<a href="AcceuilAlien.php"><img class="title" src="Alien6image.png"></a>	
		<ul class="menu">
			<li><a href="AcceuilAlien.php">Accueil</a></li>
			<li><a href="Obsolescence.php">Obsolescence d'un logiciel</a></li>
			
		</ul>
        <form action ="Alien6version.php" method="post" >
			<p>Nom du logiciel :<input type="text" name="loginame" class="champ"/></p>
			<p>Système d'exploitation :<select name="os" id="os" class="champ">
				<option value="LINUX REDHAT EL6/POWER 64BIT">LINUX REDHAT EL6/POWER 64BIT</option>
				<option value="AIX 6.1">AIX 6.1</option>
				<option value="WINDOWS SERVER 2008/X64 64BIT">WINDOWS SERVER 2008/X64 64BIT</option>
				<option value="AIX 7.1">AIX 7.1</option>
				<option value="LINUX SUSE SLES11/X86_64 64BIT">LINUX SUSE SLES11/X86_64 64BIT</option>
				<option value="SOLARIS/SPARC 11">SOLARIS/SPARC 11</option>
				<option value="WINDOWS SRV 2008 R2/X64 64BIT">WINDOWS SRV 2008 R2/X64 64BIT</option>
				<option value="LINUX SUSE SLES12/X86_64 64BIT">LINUX SUSE SLES12/X86_64 64BIT</option>
				<option value="LINUX SUSE SLES11/POWER 64BIT">LINUX SUSE SLES11/POWER 64BIT</option>
				<option value="WINDOWS SERVER 2012/X64 64BIT">WINDOWS SERVER 2012/X64 64BIT</option>
				<option value="SOLARIS/SPARC 10">SOLARIS/SPARC 10</option>
				<option value="LINUX REDHAT EL6/X86_64 64BIT">LINUX REDHAT EL6/X86_64 64BIT</option>
				<option value="LINUX REDHAT EL7/POWER 64BIT">LINUX REDHAT EL7/POWER 64BIT</option>
				<option value="HP-UX 11.31/IA64 64BIT">HP-UX 11.31/IA64 64BIT</option>
				<option value="SOLARIS/X64 10">SOLARIS/X64 10</option>
				<option value="WINDOWS SRV 2012 R2/X64 64BIT">WINDOWS SRV 2012 R2/X64 64BIT</option>
				<option value="LINUX REDHAT EL7/X86_64 64BIT">LINUX REDHAT EL7/X86_64 64BIT</option>
				<option value="AIX 7.2">AIX 7.2</option>
				<option value="WINDOWS SERVER 2016 LTSB 64BIT">WINDOWS SERVER 2016 LTSB 64BIT</option>
				<option value="LINUX REDHAT EL7/ZSERIES 64BIT">LINUX REDHAT EL7/ZSERIES 64BIT</option>
				<option value="Z/OS 2.2 64BIT">Z/OS 2.2 64BIT</option>
				<option value="Z/OS 1.13 64 BIT">Z/OS 1.13 64 BIT</option>
				<option value="Z/OS 1.12 64 BIT">Z/OS 1.12 64 BIT</option>
				<option value="Z/OS 2.1 64 BIT">Z/OS 2.1 64 BIT</option>
			</select></p>
			<p><input type="submit" value="Toutes les Versions disponible " class="button"></p>
        </form>
        <?php
        if (isset($_POST['loginame'])&&($_POST['loginame'])!="" && isset($_POST['os'])&&($_POST['os'])!=""){
            $nomLogiciel=$_POST['loginame'];
            $osp=$_POST['os'];
            $bd=new PDO("mysql:host=localhost;dbname=mises_a_jours","root","");
            $bd->query('SET NAMES utf8');
            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $requete=$bd->prepare("SELECT distinct Product_Version,dataBase_Version,Operating_System, Database_Supported_Until, Scope_Supported_Until, Operating_System_Supported_Until from $nomLogiciel where Operating_System='$osp'");
            $requete->execute();
            $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
            echo "<p style=color:#778899;>Toutes les version disponibles pour le logiciel : $nomLogiciel</p>";
            echo ("<table style=color:#778899;> <tr >
						   <th>Product_Version </th>
						   <th>dataBase_Version </th>
						   <th>Operating_System </th>
						   <th>Database_Supported_Until</th>
						   <th>Scope_Supported_Until</th>
						   <th>Operating_System_Supported_Until</th>
						   </tr>");
			foreach($tab as $cle => $val)
			{
                foreach($val as $cle1 =>$val1)
				{
					if( $cle1 != "ID")
					{
						echo("<tr><td> $val[Product_Version]</td>");
						echo("<td > $val[dataBase_Version]</td>");
						echo("<td > $val[Operating_System]</td>");
						echo("<td > $val[Database_Supported_Until]</td>");
						echo("<td > $val[Scope_Supported_Until]</td>");
						echo("<td > $val[Operating_System_Supported_Until]</td><tr>");
					}
				}
			}
            echo "</table></br>";
        }
        ?>
    </body>

</html>