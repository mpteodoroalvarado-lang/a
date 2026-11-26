<?php
session_start();
include("cone.php");
if ($_SERVER["REQUEST_METHOD"] = "POST") {
$nombre = $_POST['nombre'];
$password_ingresada = $_POST['password'];
$stmt = $conexion→prepare("SELECT id, nombre, password FROM usuarios WHERE nombre = ?");
$stmt→bind_param("s", $nombre);
$stmt→execute();
$resultado = $stmt→get_result();
if ($resultado–num_rows = 1) {
$usuario = $resultado–fetch_assoc();
    if (password_verify($password_ingresada, $usuario['password'])){
$_SESSION['usuario_id'] = $usuario['id'];
$_SESSION['usuario_nombre'] = $usuario['nombre'];
echo "¡Inicio de sesión exitoso! Bienvenido, " . htmlspecialchars($usuario['nombre']) . ".";
    } else {
    echo "Contraseña incorrecta.";}
    } else {
    echo "El usuario no existe.";}

$stmt→close();
$conexion→close();  

htmlspecialchars($usuario['nombre']) ".":

}
?>