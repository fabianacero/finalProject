<?php
	ini_set("display_errors",1);
	error_reporting(E_ALL);
	print("Trying to connect to postgres ... ");
	//$connect = pg_connect("host=172.17.0.3 dbname=postgres port=5432 user=postgres password=C4mbi0") 
	define("PG_PASSWD", getenv('PG_PASSWD'));
	define("PG_HOST", "172.17.0.3");
	$connect = pg_connect("host=" . PG_HOST . " dbname=postgres port=5432 user=postgres password=" . PG_PASSWD ) 
		or die("couln't connect with postgres db. Verify your connection params");
	$stat = pg_connection_status($connect);

	if ($stat === PGSQL_CONNECTION_OK) {
		print("Connection ok " . pg_get_pid($connect));
	} else {
		print("Connection error");
	}