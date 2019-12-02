<?php session_start(); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/connection.php'); ?>
<?php $idSection = $_GET ['idCategoria']; ?>
<?php include('includes/getposts.php'); ?>
<?php



$result= $mysqli->query($consulta);
$checkPosts = $result->fetch_array() ;
?>

<div class="row">
    <?php if(empty($checkPosts)){ ?>
        <div class="col-3"></div>
        <div class="col-6">
            <h2>TODAVIA NO HAY PUBLICACIONES EN ESTA CATEGORÍA </h2>
        </div>
        <?php }else { ?>
        <div class="col-4"></div>
        <div class="col-6">
            <h1 class='generalTitle'>NOTICIAS SOBRE <?php echo ($checkPosts['nombreCategoria']); ?>  </h1>
    </div>
</div>
<div class="row">  </div>
<div class="row">
    <div class="col-2"></div>
    <div class = "col-4">
        <?php foreach ($result as $post) : ?>
            <div class="card" style="width: 80rem;">
                <img class="card-img-top" src="<?php echo ($post["imagenPublicacion"]); ?>" >
                <div class="card-body">
                    <medium class="text-muted"><a href="section.php?idCategoria=<?php echo ($post["idCategoria"]); ?>" class="badge badge-primary"><?php echo ($post["nombreCategoria"]); ?></a></medium>
                    <medium class="text-muted"><?php echo (substr($post["actualizadoPublicacion"],5,11)); ?>hs</medium>
                    <h1 class="card title-center"><a href="post.php?idPublicacion=<?php echo ($post["idPublicacion"]); ?>" class="badge badge-light"><?php echo ($post["tituloPublicacion"]); ?></a></h1>
                    <p class="card-text"><?php echo (substr($post["descripcionPublicacion"],0,150)).'...'; ?></p>
                    <div class="card-footer">
                        <img style="display:inline;" src="<?php echo ($post["avatarUsuario"]); ?>"  height="42px" width="42px">
                        <p style="display:inline; white-space:nowrap;"> By  <a href="userPosts.php?idUsuario=<?php echo ($post["idUsuario"]); ?>" class="badge badge-info"> <?php echo ($post["nombreUsuario"]." ".$post["apellidoUsuario"]); ?></a></p>
                    </div>
                </div>
            </div>
            <div class="row"> .</div>
        <?php endforeach; ?>
    </div>
</div>
        <?php } ?>
<div class="row">



<?php include('includes/footer.php'); ?>