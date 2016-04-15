<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "telmexdb";
	$db_server = mysqli_connect($host, $user, $password);

	if(!$db_server) die ("No se pudo conectar al servicio de MariaDB: " .mysql_error());
	mysqli_select_db($db_server,$database);
?>