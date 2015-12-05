<?php
	session_save_path("tmp/");
	session_start();
	/*
	echo("USER: ");
	var_dump($_SESSION['user']);
	echo("WORKER: ");
	var_dump($_SESSION['worker']);
	*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>�et�zec multikin</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<!-- TODO:
 - prihlaseni uzivatele
 - registrace uz.
 - zakazat stranky neprihlasenemu uzovateli
 - predelat tlacitka
 - phpeeckem nainsertovat sedadla
 - do programu kalendar - jinak zobrazovat dnes, zitra, pozitri...a pak kalendar
 - pozadi
-->
<body>
	<?php
		include 'header.php';
		require_once 'db_connection.php';
		//require_once 'user_check.php';
	?>
	<div class="content">
		<h2>Nejnov�j�� filmy</h2>
		<?php
			$sql = "SELECT nazev, delka FROM Film ORDER BY id_filmu DESC LIMIT 6";
			//$stmt = $db->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
			$result = $db->query($sql);
			if ($result->num_rows > 0)
			{
				$divide = 0;
				while($row = $result->fetch_assoc())
				{
					if($divide % 3 == 0)
						echo("<div class='movies'>");
					echo("<table class='moviesTable'>");
					echo("<tr><td height='230px'><img src='img/movies/asd.jpg' width='100%' height='100%'></td></tr>");
					echo("<tr><td height='45px'><span class=''>" . $row["nazev"] . "</span></td></tr>");
					echo("<tr><td><span class='description'>" . $row["delka"] . " minut</span></td></tr>");
					echo("</table>");
					if($divide % 3 == 2)
						echo("</div>");
					$divide++;
				}
			}
			else
			    echo ("Doslo k SQL chybe: " . $db->error);
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
