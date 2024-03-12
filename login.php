<?php
// Validación de datos
if (!isset($_POST['correo']) || !isset($_POST['contrasena'])) {
  echo "Faltan datos del formulario.";
  exit;
}

// Sanitización de datos
$correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
$contrasena = filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);

// Conectarse a la base de datos
$db = new PDO('mysql:host=localhost;dbname=asistencia', 'root', '');

// Encriptación de la contraseña ingresada
$contrasenaIngresadaEncriptada = hash('sha256', $_POST['contrasena']);

// Validar credenciales
$stmt = $db->prepare('SELECT * FROM usuarios WHERE correo = ? AND contrasena = ?');
$stmt->execute([$correo, $contrasenaIngresadaEncriptada]);
$usuario = $stmt->fetch();

if ($usuario) {
  // Iniciar sesión
  session_start();
  $_SESSION['usuario'] = $usuario;

  // Redirigir a la página principal
  header('Location: asistencia.php');
} else {
  // Mostrar mensaje de error
  echo "Credenciales no válidas.";
}
?>
