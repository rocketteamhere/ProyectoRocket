<?php //Datos de conexión a la base de datos
$hostname = 'localhost';
$database = 'dbrocket';
$username = 'root';
$password = '';

$mysqli = new mysqli($hostname, $username,$password, $database);
if ($mysqli -> connect_errno) {
die( "Fallo la conexión al servidor de MySQL: (" . $mysqli -> mysqli_connect_errno() 
. ") " . $mysqli -> mysqli_connect_error());
} ?>