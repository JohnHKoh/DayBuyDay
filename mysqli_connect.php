<?php

DEFINE ('DB_USER','swagman');
DEFINE ('DB_PASSWORD','john');
DEFINE ('DB_HOST','localhost');
DEFINE ('DB_NAME','days');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());
?>