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
        <h1 class='generalTitle'>NUEVO POST</h1>
    </div>
</div>
<div class="row"> </div>

<div class="row">
    <div class="col-2">
    </div>
    <div class = "col-4">
        <form action= "createnewpost.php" method= "POST">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name= 'title'>
            </div>
            <div class="form-group">
                <label for="imagen">Image link</label>
                <input type="text" class="form-control" id="image" name = 'image'>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="idCategoriaPost" name= 'idCategoriaPost'>
                <?php foreach ($resultCate as $category) : ?>    
                <option value='<?php echo ($category["idCategoria"]); ?>' ><?php echo ($category["nombreCategoria"]); ?></option>
                <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description (255 characters)</label>
                <textarea class="form-control" id="description" name= 'description' required minlength="4" maxlength="254" rows="6"></textarea>
            </div>
            <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo("{$_SESSION['user']['id']}");?>">
            <button type="submit" class="btn btn-success">Create post</button>
        </form>
    </div>
</div>
<?php include('includes/footer.php'); ?>