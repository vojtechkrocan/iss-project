<?php
	require_once '../../web-config.php';

	$db = new mysqli($servername, $username, $password, $dbname);
	if ($db->connect_error)
		die("Nepodařilo se připojit k databázi: " . $db->connect_error);

	echo ("DEBUG: Připojení k DB bylo úspěšné.</br>");
?>
