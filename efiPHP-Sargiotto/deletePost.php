<?php session_start(); ?>
<!-- incluimos (importamos) el header y el footer (fondo del file) q se repiten en cada pagina, connection.php trae la func  de conexion a la database y getposts.php funcion de traer posts  -->
<?php include('includes/header.php'); ?> 
<?php include('includes/connection.php'); ?>
<?php include('includes/getposts.php'); ?>
<?php $idPostDelete = $_GET['id']; ?>
<?php $idUser = $_SESSION['user']['id']; ?>
<?php
$consultaPostDelete = "DELETE  FROM publicaciones WHERE id = $idPostDelete AND user_id = $idUser";
$resultPostDelete= $mysqli->query($consultaPostDelete); 
    if (!$resultPostDelete){ ?>
       <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR!!</strong> Publicación inexistente o no tienes los derechos para borrarla!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
    <?php } else
     {?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>HECHO!!</strong> Publicación borrada con éxito!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <?php   
      }
   
       ?>
<?php



?>

<?php include('includes/footer.php'); ?> 