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
        <h1 class='generalTitle'>RESET YOUR PASSWORD</h1>
    </div>
</div>
<div class="row"></div>
<div class="row">
    <div class="col-4">
    </div>
    <div class="col-3">
    <div class = "form-group"> 
    <!-- los datos de este formulario, se envían a la pag 'access.php' gracias al método 'POST' -->
    <form action="resetPassword.php" method="POST">
    <label for="email">Email address</label>
    <div class="form-inline">
        <input type="email" class="form-control" id="email" name ="email" placeholder="name@example.com">
        <button class="btn btn-primary" type="submit">Reset password </button>
    </div>
    
    </form>
</div>
    </div>
    <div class="col">
    </div>
</div>
<?php include('includes/footer.php'); ?>
<?php endif; ?>