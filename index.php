<?php
	ini_set("display_errors",1);
	error_reporting(E_ALL);
	print("Trying to connect to postgres ... ");
	$connect = pg_connect("host=172.17.0.3 dbname=postgres port=5432 user=postgres password=C4mbi0") or die("No se pudo");
	$stat = pg_connection_status($connect);

	if ($stat === PGSQL_CONNECTION_OK) {
		print("Connection ok " . pg_get_pid($connect));
	} else {
		print("Connection error");
	}