<?php session_start(); ?>
<?php include ('includes/header.php');?>
<?php include ('includes/connection.php');
// acá recibimos los datos del formulario de 'register.php' con '$_POST',creamos variables para nombre,apellido,idCategoria y contraseña.
$title = $_POST["title"];
$image = $_POST["image"];
$idCategory = $_POST["idCategoriaPost"];
$description = $_POST["description"];
$idUsuario = $_POST ["idUsuario"];


$consultaPost = "SELECT * FROM publicaciones WHERE titulo = '$title' " ;
$availableTitlePost = $mysqli->query($consultaPost);
$availableTitlePost = $availableTitlePost->fetch_assoc();
?>
 <!-- compara el titulo elegido ingresado en'newpost.php' con la consulta de $availableTitlePost  para ver si hay coincidencias --> 
<?php if ($availableTitlePost){ ?>
  <h1><?php echo ('ERROR. TITLE already in use' );?></h1>
<?php }else
    {
    $newPost = "INSERT INTO publicaciones (titulo, image, categoria_id, descripcion, user_id)
                VALUES ('$title', '$image', '$idCategory', '$description', '$idUsuario' )" ;
    ?>
    <div class="row">
    <div class="col-4"></div>
    <div class="col-5">
    <?php
    if ($mysqli->query($newPost))
    {
        echo ("Post creado con éxito! <br/>");
        echo ("El título de tu nueva publicación es: '$title ' <br/>");
        
         ?>
       
    
    <?php }
    else
    {
        echo "ERROR, intente nuevamente<br/>";
    }
    
    }
    ?></div>

<?php include('includes/footer.php'); ?>