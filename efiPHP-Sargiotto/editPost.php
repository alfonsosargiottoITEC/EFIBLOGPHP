<?php session_start(); ?>
<!-- incluimos (importamos) el header y el footer (fondo del file) q se repiten en cada pagina, connection.php trae la func  de conexion a la database y getposts.php funcion de traer posts  -->
<?php include('includes/header.php'); ?> 
<?php include('includes/connection.php'); ?>
<?php include('includes/getposts.php'); ?>
<?php include('includes/getcategories.php'); ?>
<?php $idPostEdit = $_GET['id']; ?>
<?php $idCatePostEdit = $_GET['cateID']; ?>
<?php $idUser = $_SESSION['user']['id']; ?>
<?php $contador = 0 ;
$seleccionado = ''; ?>
<?php
  
$consultaEditPost = "SELECT * FROM publicaciones WHERE id = $idPostEdit AND user_id = $idUser";

$resultEditPost= $mysqli->query($consultaEditPost);

$resultEditPost = $resultEditPost->fetch_assoc();
?>

<?php if (!$resultEditPost) { ?>
       <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR!!</strong> Publicación inexistente o no tienes los derechos para editarla!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
    <?php } else
    {?>
  <div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <h1 class='generalTitle'>EDIT POST</h1>
    </div>
</div>
<div class="row"> </div>

<div class="row">
    <div class="col-2">
    </div>
    <div class = "col-4">
        <form action= "confirmEditPost.php" method= "POST"> 
            <div class="form-group">
              <input type="hidden" class="form-control" id="id" name= 'id' value="<?php echo ($idPostEdit); ?>" >
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name= 'title'  value="<?php echo ($resultEditPost["titulo"]); ?>" >
            </div>
            <div class="form-group">
                <label for="image">Image link</label>
                <input type="text" class="form-control" id="image" name = 'image' value="<?php echo ($resultEditPost["image"]); ?>" >
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="idCategoria" name= 'idCategoria'>
                <?php foreach ($resultCate as $category) : ?>     
                    <option value='<?php echo ($category["idCategoria"]); ?>' <?php if ($resultEditPost['categoria_id'] == $category['idCategoria']) {echo ("selected");}  else {echo ("");}?>  ><?php echo ($category["nombreCategoria"]); ?></option>
                <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description (255 characters)</label>
                <textarea class="form-control" id="description" name= 'description' required minlength="4" maxlength="254" rows="6" ><?php echo ($resultEditPost["descripcion"]); ?></textarea>
            </div>
            <div class="form-group">
              <input class = 'form-control' type="hidden" id="idUsuario" name="idUsuario" value="<?php echo("{$_SESSION['user']['id']}");?>">
            </div>
            <button type="submit" class="btn btn-success">CONFIRM EDIT</button>
            <button onclick="location.href='listpost.php'" type="button" class="btn btn-danger" > CANCEL </button>
        </form>
    </div>
</div>

<?php } ?>
<?php include('includes/footer.php'); ?> 