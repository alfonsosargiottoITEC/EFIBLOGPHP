<?php session_start(); ?>
<!-- incluimos (importamos) el header y el footer (fondo del file) q se repiten en cada pagina, connection.php trae la func  de conexion a la database y getposts.php funcion de traer posts  -->
<?php include('includes/header.php'); ?> 
<?php include('includes/connection.php'); ?>
<?php include('includes/getposts.php'); ?>
<?php 

// hacemos la consulta a la base de datos
$result= $mysqli->query($consulta);

?>
<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <h1 class='generalTitle'>ÚLTIMAS PUBLICACIONES</h1>
    </div>
</div>
<div class="row">  </div>
<div class="row">
    <div class="col-2"></div>
    <div class = "col-4">
        <!-- recorremos con foreach lo q nos trae esa consulta y lo insertamos en html  -->
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

<div class="row">
<?php include('includes/footer.php'); ?>