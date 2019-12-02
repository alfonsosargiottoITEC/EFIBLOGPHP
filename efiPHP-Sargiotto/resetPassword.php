<?php
include ('includes/connection.php');
include ('includes/header.php');
// acá recibimos los datos del formulario de 'recovery.php' con '$_POST',creamos variables para nombre,apellido,email y contraseña.
$email = $_POST["email"];
$bytes = random_bytes(5);
$newPass = (bin2hex($bytes));
$newPassHash = md5 ($newPass);


$consultaEmailPass = "SELECT * FROM users WHERE email = '$email' " ;
$availableEmail = $mysqli->query($consultaEmailPass);
$checkEmailDB = $availableEmail->fetch_assoc();

?>
 <!-- compara el email ingreado en'register.php' con la consulta de $availableEmail  para ver si hay coincidencias --> 
<?php if (!($checkEmailDB)){ ?>
  <h1><?php echo ('ERROR. Email not registered' );?></h1>
<?php }else
    {
    $resetPassword = " UPDATE users SET password = '$newPassHash' WHERE email = '$email' " ;
    $resultResetPassword = $mysqli->query($resetPassword);
    ?>
    <div class="row">
    <div class="col-4"></div>
    <div class="col-5">
    <?php
    if ($resultResetPassword)
    {
        echo ("Tu password ha sido reseteada!<br/>");
        echo ("Recibirás un correo en tu dirección electrónica con tu nueva password!<br/>");
        echo ("Dirigite a la sección de Log in para acceder a tu cuenta<br/>"); ?>
        <?php require_once ('sendRecEmail.php');?>
    
    <?php }
    else
    {
        echo "ERROR, intente nuevamente<br/>";
    }
    
    }
    ?></div>
<?php include ('footer.php');?>
