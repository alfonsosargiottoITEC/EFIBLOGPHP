<?php
include ('includes/connection.php');
// acá recibimos los datos del formulario de 'login.php' con '$_POST',creamos variables para usuario y contraseña.
$email = $_POST["email"];
$password = $_POST["password"];
$pass = md5($password);


$consulta = "SELECT * FROM users WHERE email = '$email' and password  = '$pass' ";
$result= $mysqli->query($consulta);
// compara el nombre y la contraseña ingreados en 'login.php' con el array de '$users' para ver si hay coincidencia
foreach ($result as $user) {
    if (($user['email'] == $email) && ($user['password'] == $pass)) {
        $selectedUser = $user;
    }
}
session_start();
// si hay coinicidencia,inicia una sesión y te manda a 'home.php'
if (isset($selectedUser)) {
    //session_start();
    $_SESSION['user'] = $selectedUser;
    header('Location:home.php');
    // si no, te da error y te redirige a 'login.php'
} else {
    $_SESSION['error'] = 'ERROR.Datos inválidos';
    header('Location:login.php');
}
