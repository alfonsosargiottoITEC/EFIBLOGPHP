<?php session_start(); ?>
<!-- incluimos (importamos) el header y el footer (fondo del file) q se repiten en cada pagina, connection.php trae la func  de conexion a la database y getposts.php funcion de traer posts  -->
<?php include('includes/header.php'); ?> 
<?php include('includes/connection.php'); ?>
<?php $idUser = $_SESSION['user']['id']; ?>
<?php include('includes/getposts.php'); ?>
<?php
// traigolos posts  q corresponden al usuario por su ID
$resultPostUser= $mysqli->query($consultaUser);
?>

<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <h1 class='generalTitle'>MIS PUBLICACIONES</h1>
    </div>
</div>
<div class="row">  </div>
<div class="row">
    <div class="col-1"></div>
    <div class = "col-10">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">TITLE</th>
            <th scope="col">CATEGORY</th>
            <th scope="col">DESCRIPTION</th>
            <th scope="col">IMAGE LINK</th>
            <th scope="col">CREATED DATE</th>
            <th scope="col">LAST MODIFICATION</th>
            <th scope="col">EDIT</th>
            <th scope="col">DELETE</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($resultPostUser as $postUser) : ?>
          <tr>
            <td><?php echo ($postUser["idPublicacion"]); ?></td>
            <td><?php echo ($postUser["tituloPublicacion"]); ?></td>
            <td><?php echo ($postUser["nombreCategoria"]); ?></td>
            <td><?php echo (substr($postUser["descripcionPublicacion"],0,50)).' ...'; ?></td>
            <td><?php echo (substr($postUser["imagenPublicacion"],0,35)).' ...'; ?></td>
            <td><?php echo ($postUser["creadoPublicacion"]); ?></td>
            <td><?php echo ($postUser["actualizadoPublicacion"]); ?></td>
            <td><a href="editPost.php?id=<?php echo ($postUser["idPublicacion"]); ?>&cateID=<?php echo ($postUser["idCategoria"]);?>">Edit</a></td>
            <td><a href="deletePost.php?id=<?php echo ($postUser["idPublicacion"]); ?>">Delete</a></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
</div> 

<?php include('includes/footer.php'); ?> 