<?php
	print("Trying to connect to postgres ... ");
	$connect = pq_connect("host=172.17.0.3 dbname=postgres port=5432 user=postgres password=C4mb10") or die("Cannot connect to postgres");
	print_r(var_export($connect,true));
