<?php session_start(); ?>
<?php include('includes/header.php'); ?>
<?php $id = $_GET['idPublicacion']; ?>
<?php include('includes/getposts.php'); ?>


<?php





$resultPost= $mysqli->query($consultaPost);

$resultPost = $resultPost->fetch_assoc();
?>

<?php if (!$resultPost) : ?>
  <h1><?php echo ('Lo siento, esta publicación no existe' );?></h1>
<?php else : ?>
<div class="row" >
<div class="col-3"></div>
<div class="col-8">
  <h1 class = 'postTitle'><?php echo ($resultPost["tituloPublicacion"]); ?></h1>
</div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-8">
        <div class="row"></div>
        <div class="div">
          <img style="display:inline;" src="<?php echo ($resultPost["avatarUsuario"]); ?>"  height="42px" width="42px">
          <h5 style="display:inline; white-space:nowrap;"><?php echo ('By '.$resultPost["nombreUsuario"].' '.$resultPost["apellidoUsuario"]); ?></h5>
        </div>
        <img src="<?php echo ($resultPost["imagenPublicacion"]); ?>"  height="600" width="800px">
        <div class="div">
          <i><h6 style="display:inline;"><?php echo ('Category: '.$resultPost["nombreCategoria"].' // '); ?></h6></i>
          <h6 style="display:inline; white-space:nowrap;"><?php echo (' Created: '.$resultPost["creadoPublicacion"].'hs. // Last Update: '.$resultPost["actualizadoPublicacion"].'hs.'); ?></h6>
        </div>
</div>
<div class="row"></div>
<div class="row">
  <div class="col-2"></div>
  <div class="col-8">
  <p class= 'parrafo'><?php echo ($resultPost["descripcionPublicacion"]); ?></p>
  </div>
  <div class="col-2"></div>
</div>
<div class="row">.</div>





<?php endif; ?>



<?php include('includes/footer.php'); ?>