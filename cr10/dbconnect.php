<?php
error_reporting( ~E_DEPRECATED & ~E_NOTICE );

define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'cr10_madiha_attress_biglibrary');

$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
if(!$conn){
	die("connection failed ".mysqli_error());
}
?>