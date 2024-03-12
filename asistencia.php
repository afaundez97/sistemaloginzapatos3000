<?php
session_start();

// Si no hay un usuario en la sesión, redireccionar a la página de login
if (!isset($_SESSION['usuario'])) {
  header('Location: login.php');
  exit;
}

// Obtener la información del usuario de la sesión
$usuario = $_SESSION['usuario'];

// Mostrar la información del usuario
echo '<h1>Bienvenido, ' . $usuario['nombre'] . '</h1>';
echo '<p>Tu correo electrónico es ' . $usuario['correo'] . '</p>';

// ...

// Incluir el archivo con las funciones de asistencia
include_once 'funciones_asistencia.php';

// Si se ha enviado el formulario de asistencia
if (isset($_POST['fecha']) && isset($_POST['hora_entrada']) && isset($_POST['hora_salida'])) {

  // Registrar la asistencia
  $asistencia_registrada = registrar_asistencia($usuario['id'], $_POST['fecha'], $_POST['hora_entrada'], $_POST['hora_salida']);

  // Mostrar un mensaje de confirmación o error
  if ($asistencia_registrada) {
    echo '<p>Asistencia registrada correctamente.</p>';
  } else {
    echo '<p>Error al registrar la asistencia.</p>';
  }
}

// Mostrar el formulario de asistencia
?>

<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Asistencia</title>
 <link rel="stylesheet" href="style/asistencia.css">
</head>
<body>
<div class="container">
  <img class="logo" src="img/logo.png" alt="Logo">
  <h1 class="titulo">Asistencia</h1>
  <button onclick="location.href='cerrar_sesion.php'">Cerrar sesión</button>

  <div class="formulario">
    <form action="asistencia.php" method="post">
      <label for="fecha">Fecha:</label>
      <input type="date" name="fecha" id="fecha" required>
      <br>
      <label for="hora_entrada">Hora de entrada:</label>
      <input type="time" name="hora_entrada" id="hora_entrada" required>
      <br>
      <label for="hora_salida">Hora de salida:</label>
      <input type="time" name="hora_salida" id="hora_salida" required>
      <br>
      <br>
      <input type="submit" value="Registrar asistencia">
    </form>
  </div>

  <h2>Historial de asistencia</h2>
  <table class="tabla">
    <tr>
      <th>Fecha</th>
      <th>Hora de entrada</th>
      <th>Hora de salida</th>
    <?php
    // Obtener el historial de asistencia del usuario
    $historial_asistencia = obtener_historial_asistencia($usuario['id']);

    // Mostrar cada registro de asistencia
    foreach ($historial_asistencia as $asistencia) {
      echo '<tr>';
      echo '<td>' . $asistencia['fecha'] . '</td>';
      echo '<td>' . $asistencia['hora_entrada'] . '</td>';
      echo '<td>' . $asistencia['hora_salida'] . '</td>';
      echo '</tr>';
    }
    ?>
  </table>
 
</body>
</html>
