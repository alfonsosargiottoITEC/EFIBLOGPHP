<?php include('includes/connection.php'); ?>

<?php 

$consultaCate = "SELECT categorias.nombre AS 'nombreCategoria', categorias.id as 'idCategoria' FROM categorias" ; 


$resultCate= $mysqli->query($consultaCate);


?>