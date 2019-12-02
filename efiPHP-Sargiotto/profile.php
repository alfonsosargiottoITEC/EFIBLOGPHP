<?php session_start(); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/connection.php'); ?>

<?php
    if(!isset($_SESSION['user'])){
    header("location: index.php"); // Redirecting To Home Page
    }
?>
<div class="row">  </div>
<div class="row">
    <div class="col-2"></div>
        <div class = "col-4">
            <div class = "col">
                <p><?php echo "BIENVENIDO! ESTE ES TU PERFIL: "; ?> </p>
                <p><?php echo "EMAIL: ", $user['email']; ?> </p>
                <p><?php echo "NOMBRE Y APELLIDO: ", $user['firstname']," " , $user['lastname']; ?> </p>
                <label> AVATAR: </label>
                <img style="display:inline;" src="<?php echo ($user["avatar"]); ?>"  height="70px" width="80px">
                <form action = "changeAvatar.php" method = 'POST'  >
                <div class="form-group">
                    <input class = 'form-control' type="hidden" id="idUsuario" name="idUsuario" value="<?php echo("{$_SESSION['user']['id']}");?>">
                </div>
                <div class="form-group">
                    <label for="chooseAvatar">Change avatar: </label>
                    <input type="text" class="form-control-file" id="avatarUsuario" name = "avatarUsuario" placeholder = "img link" required >
                    <button type="submit" class="btn btn-success">CONFIRM</button>
                </div>
                </form>
                <form action = "changePassword.php" method = 'POST'  >
                <div class="form-group">
                    <input class = 'form-control' type="hidden" id="idUsuario" name="idUsuario" value="<?php echo("{$_SESSION['user']['id']}");?>">
                </div>
                <div class="form-group">
                    <label for="chooseAvatar">Set new password: </label>
                    <input type="password" class="form-control-file" id="newPassword1" name = "newPassword1" placeholder = "*********" required >
                    <label for="chooseAvatar">Repeat please: </label>
                    <input type="password" class="form-control-file" id="newPassword2" name = "newPassword2" placeholder = "*********" required >
                    <button type="submit" class="btn btn-success">CONFIRM NEW PASSWORD </button>
                </div>
                </form>
            </div>
        </div>
    </div>    
</div>

<?php include('includes/footer.php'); ?>