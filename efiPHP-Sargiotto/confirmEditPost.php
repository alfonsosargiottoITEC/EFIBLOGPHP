<?php session_start(); ?>
<!-- incluimos (importamos) el header y el footer (fondo del file) q se repiten en cada pagina, connection.php trae la func  de conexion a la database y getposts.php funcion de traer posts  -->
<?php include('includes/header.php'); ?> 
<?php include('includes/connection.php'); ?>
<?php include('includes/getposts.php'); ?>
<?php 

$id = $_POST["id"];
$title = $_POST["title"];
$image = $_POST["image"];
$category = $_POST ["idCategoria"];
$description  = $_POST ["description"];
$idUser = $_POST["idUsuario"];
$updated = date("Y-m-d H:i:s");


if ($_POST){
  $editDataPost =" UPDATE publicaciones SET titulo= '$title' , image = '$image', descripcion= '$description', categoria_id= '$category', actualizado = '$updated'  WHERE id = '$id' AND user_id = '$idUser' ";
  $resultEditDataPost = $mysqli->query($editDataPost); ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>HECHO!!!</strong> Post editado con éxito!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
<?php } else {?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR!!</strong> algo salió mal!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
<?php }


?>

<?php include('includes/footer.php'); ?> 