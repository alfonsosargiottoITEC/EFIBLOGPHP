<?php
// inicia una sesión
session_start();
?>

<?php if (isset($_SESSION['user'])) : ?>
<!-- si se da, salta al bloque del formulario -->

<?php else : ?>
    <?php
    if (isset($_SESSION['error'])) {?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>ERROR!!</strong> Dato/s incorrecto/s
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        unset($_SESSION['error']);
    }?>
    

<!-- con el php include, traemos el contenido de otro archivo, en este caso el header -->
<?php include('includes/header.php'); ?>


<div class="row">
    <div class="col-4">
    </div>
    <div class="col-4">
        <h1 class='generalTitle'>WELCOME TO EFI BLOG</h1>
    </div>
</div>
<div class="row"></div>
<div class="row">
    <div class="col-4">
    </div>
    <div class="col-3">
    <div class = "form-group"> 
    <!-- los datos de este formulario, se envían a la pag 'access.php' gracias al método 'POST' -->
    <form action="access.php" method="POST">
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name ="email" placeholder="name@example.com">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name = "password" placeholder="**************">
    </div>
    <button class="btn btn-primary" type="submit">Log in </button>
    <span class="w3-right w3-padding w3-hide-small"><a href="recovery.php"> Forgot the password?</a></span>
    </form>
</div>
    </div>
    <div class="col">
    </div>
</div>
<?php include('includes/footer.php'); ?>
<?php endif; ?>