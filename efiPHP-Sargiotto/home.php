<?php
// hacemos que chequee que se cumpla con los requisitos de 'security.php' para que se continúe ejecutando la pag
require('includes/security.php');


?>

<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-2"></div>
    <div class = "col-4">
        <p><?php echo "BIENVENIDO: ". $user['firstname'], " ", $user['lastname']; ?> </p>
        <a class="btn btn-primary" href="newpost.php" role="button">Create a post</a>
        <a class="btn btn-info" href="listpost.php" role="button">See my posts</a>      
    </div>
    <div class="col-2"></div>
</div>
<?php include('includes/footer.php'); ?>


