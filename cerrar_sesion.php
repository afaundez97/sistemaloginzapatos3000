<?php
session_start();

// Destruir la sesión
session_destroy();

// Redirigir a la página de inicio
header('Location: index.html');
?>
