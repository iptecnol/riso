<?php
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','chinches');
define('DBNAME','TINTAS');

$conexion = mysql_connect(DBHOST,DBUSER,DBPASS);

mysql_select_db(DBNAME,$conexion);

?>
