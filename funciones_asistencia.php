<?php

// Función para registrar la asistencia de un usuario
function registrar_asistencia($usuario_id, $fecha, $hora_entrada, $hora_salida) {
  // Conectarse a la base de datos
  $db = new PDO('mysql:host=localhost;dbname=asistencia', 'root', '');

  // Preparar la consulta para insertar la asistencia
  $stmt = $db->prepare('INSERT INTO asistencia (usuario_id, fecha, hora_entrada, hora_salida) VALUES (?, ?, ?, ?)');

  // Ejecutar la consulta con los datos del usuario
  $stmt->execute([$usuario_id, $fecha, $hora_entrada, $hora_salida]);

  // Si la consulta se ejecutó correctamente, retornar true
  return $stmt->rowCount() > 0;
}

// Función para obtener el historial de asistencia de un usuario
function obtener_historial_asistencia($usuario_id) {
  // Conectarse a la base de datos
  $db = new PDO('mysql:host=localhost;dbname=asistencia', 'root', '');

  // Preparar la consulta para obtener el historial de asistencia
  $stmt = $db->prepare('SELECT * FROM asistencia WHERE usuario_id = ?');

  // Ejecutar la consulta con el ID del usuario
  $stmt->execute([$usuario_id]);

  // Retornar el resultado de la consulta como un array
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
