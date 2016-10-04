<html>
<?php
	ini_set("display_errors",1);
	error_reporting(E_ALL);
	define("PG_USER", "postgres");
	define("PG_PASSWD", getenv('PG_PASSWD'));
	define("PG_HOST", "pgdb");
	define("PG_DB", "postgres");
	define("PG_PORT", 5432);
?>
<head>
	<title>Proyecto Final Docker!</title>
	<style type="text/css">
		.container{
			margin: 50px auto;
			width: 300px;
		}
		.header{
		    background-color: #03A9F4;
		    color: white;
		    font-weight: bold;
		    height: 30px;
		    line-height: 30px;
		    padding: 0px 10px;
		    vertical-align: middle;
		    width: 250px;
		}
		.result{
	    	background-color: #c6dbea;
    		padding: 6px 10px;
    		width: 250px;
		}
		.result p {
			margin: 0px;
		}
		.score{
	    	background-color: #f39647;
    		font-weight: bold;
	    	padding: 6px 10px;
    		width: 250px;
		}
		.score p {
			margin: 0px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="header" >Trying to connect to postgres ...</div>
		<?php 
			$connect = pg_connect("host=" . PG_HOST . " dbname=" . PG_DB . " port=" . PG_PORT . " user=" .PG_USER . " password=" . PG_PASSWD ) 
				or die("Couln't connect with postgres db. Verify your connection params");
			$stat = pg_connection_status($connect);
		?>

		<?php if ($stat === PGSQL_CONNECTION_OK): ?>
			<div class="result">
				<p>Connection ok</p>
				<p>Successfully connected to <strong><?= PG_HOST ?></strong> host</p>
				<p>Status:<?= pg_get_pid($connect) ?></p>
				<p>Resource: <?= $connect ?></p>
			</div>
			<div class="score">
				<p>Writing exam value : 0.5%</p>
				<p>Exercise value : 99.5%</p>
			</div>
		<?php else: ?>
			<div class="result">
				<p>Connection error</p>
				<p>Error:<?= pg_last_error($connect) ?></p>
			</div>
		<?php endif; ?>
	</div>
</body>
</html>