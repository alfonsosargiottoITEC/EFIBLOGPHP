<?php
session_start();
if (!isset($_SESSION['user'])) //si no está logueado, te redirige a la location del header, es decir a la pág para que te loguees.
header ('Location:login.php');
?>