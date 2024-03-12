<?php
// Conexión a la base de datos
$db = new PDO('mysql:host=localhost;dbname=asistencia', 'root', '');

// Validación de datos
if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['correo']) || empty($_POST['contrasena'])) {
    echo 'Faltan datos del formulario.';
    exit;
}

// Sanitización de datos
$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
$apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
$correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
$contrasena = filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);

// Encriptación de la contraseña
$contrasenaEncriptada = hash('sha256', $contrasena);

// Redirigir si se presionó el botón "volver"
if (isset($_POST['volver'])) {
    header('Location: login.php');
    exit;
}

// Consulta SQL para insertar el usuario
$stmt = $db->prepare('INSERT INTO usuarios (nombre, apellido, correo, contrasena) VALUES (?, ?, ?, ?)');
$stmt->execute([$nombre, $apellido, $correo, $contrasenaEncriptada]);

// Mensaje de éxito
echo 'Usuario registrado correctamente.';
?>
