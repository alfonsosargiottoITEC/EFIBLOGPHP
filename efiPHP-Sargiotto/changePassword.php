<?php session_start(); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/connection.php'); ?>
<?php
$idUser = $_POST ['idUsuario'];
$newPassword1 = $_POST ['newPassword1'];
$newPassword2 = $_POST ['newPassword2'];
$newPassword3 = md5 ($newPassword2);

$consultaUser = "SELECT * FROM users WHERE id = $idUser ";
$checkUser = $mysqli->query ($consultaUser);
$checkID = $checkUser->fetch_assoc();

if (!$checkID){
    echo('error al cambiar la contraseña');
}else {
    if ($newPassword1 != $newPassword2){?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>ERROR!!!</strong> Las contraseñas no coinciden!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    
    
    <?php }else {

        $updatePassword = "UPDATE users SET password = '$newPassword3' where id = '$idUser' ";
        $updatePassword = $mysqli->query ($updatePassword);
        ?> 
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>HECHO!!!</strong> Contraseña actualizada!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php $_SESSION['user']['avatar'] = $newAvatar;
    }
}

?>





<?php include('includes/footer.php'); ?>