<?php
include ('includes/connection.php');
include ('includes/header.php');
// acá recibimos los datos del formulario de 'register.php' con '$_POST',creamos variables para nombre,apellido,email y contraseña.
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$password = $_POST["password"];
$pass = md5 ($password);

$consulta = "SELECT * FROM users WHERE email = '$email' " ;
$availableEmail = $mysqli->query($availableEmail);
?>
 <!-- compara el email ingreado en'register.php' con la consulta de $availableEmail  para ver si hay coincidencias --> 
<?php if ($availableEmail){ ?>
  <h1><?php echo ('ERROR. Email address already in use' );?></h1>
<?php }else
    {
    $newUser = "INSERT INTO users (firstname, lastname, email, password)
                VALUES ('$firstname', '$lastname', '$email', '$pass' )" ;
    ?>
    <div class="row">
    <div class="col-4"></div>
    <div class="col-5">
    <?php
    if ($mysqli->query($newUser))
    {
        echo ("Tu cuenta ha sido creado con éxito! bienvenido!<br/>");
        echo ("Recibirás un correo en tu dirección electrónica con tus datos!<br/>");
        echo ("Dirigite a la sección de Log in para acceder a tu cuenta<br/>"); ?>
        <?php require_once ('sendRegEmail.php');?>
    
    <?php }
    else
    {
        echo "ERROR, intente nuevamente<br/>";
    }
    
    }
    ?></div>
<?php include ('footer.php');?>

