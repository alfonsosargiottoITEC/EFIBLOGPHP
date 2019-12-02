<?php session_start(); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/connection.php'); ?>
<?php
// recibo los id del usuario y del avatar
$newAvatar = $_POST ['avatarUsuario'];
$idUser = $_POST ['idUsuario'];

// busco en la DB al usuario correspondiente al ID
$consultaAvatar = "SELECT * FROM users WHERE id = $idUser ";
$changeAvatar = $mysqli->query ($consultaAvatar);
$checkID = $changeAvatar->fetch_assoc();

//si el id no existe, da error, de lo contrario se ejecuta el else donde hace el update a la DB
if (!$checkID){
    echo('error al cambiar el avatar');
}else {
    $updateAvatar = "UPDATE users SET avatar = '$newAvatar' where id = '$idUser' ";
    $updateAvatar = $mysqli->query ($updateAvatar);
    ?> 
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>HECHO!!!</strong> Avatar actualizado!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php $_SESSION['user']['avatar'] = $newAvatar;
}

?>





<?php include('includes/footer.php'); ?>