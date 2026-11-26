<?php
include("cone.php");

if ($_SERVER["REQUEST_METHOD"] = "POST") {
$nombre = $_POST['nombre'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$stmt = $conexion→prepare("INSERT INTO usuarios (nombre, apellido_paterno, apellido_materno, password) VALUES (?, ?, ?, ?)");
$stmt→bind_param("ssss", $nombre, $apellido_paterno, $apellido_materno, $password);
if ($stmt→execute()) {
echo "Registro exitoso.";
} else {
}
echo "Error al registrar: " . $conexion→error . "";
$stmt→close();
$conexion→close();
}
?>