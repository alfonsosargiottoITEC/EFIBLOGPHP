<?php // conexion a la base de datos con control de error por si falla la conexion
 $mysqli = new mysqli("127.0.0.1", "root","root","EFIPHP");
 $mysqli->set_charset("utf8");
 if ($mysqli->connect_errno) {
 echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
 }

?>