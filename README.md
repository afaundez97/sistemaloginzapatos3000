Descripción del proyecto de asistencia a empleados de Zapatos3000
Título: Sistema de asistencia a empleados de Zapatos3000

Descripción:

Este proyecto desarrolla un sistema de asistencia a empleados de Zapatos3000 que permite:

Registro de asistencia: Los empleados de Zapatos3000 pueden registrar su asistencia de forma fácil y rápida.
Historial de asistencia: Los empleados de Zapatos3000 pueden consultar su historial de asistencia en cualquier momento.
Control de asistencia: Zapatos3000 puede controlar la asistencia de sus empleados y mejorar la productividad.
Tecnologías:

HTML
CSS
PHP
MySQL
Base de datos:

Se crearon dos tablas en la base de datos MySQL:
usuarios: Almacena la información de los usuarios, como nombre, correo electrónico, contraseña y rol.
asistencia: Almacena los registros de asistencia de los empleados, como fecha, hora de entrada y hora de salida.


Funcionalidades:

Registro de asistencia: Los empleados de Zapatos3000 pueden registrar su asistencia indicando la fecha, la hora de entrada y la hora de salida.
Historial de asistencia: Los empleados de Zapatos3000 pueden consultar su historial de asistencia, incluyendo la fecha, la hora de entrada y la hora de salida.
Cierre de sesión: Los empleados de Zapatos3000 pueden cerrar sesión del sistema.


Despliegue:

El sistema se ha desplegado y probado en un servidor local.




Código SQL:

Tabla usuarios:

SQL
CREATE TABLE usuarios (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL,
  correo VARCHAR(255) UNIQUE NOT NULL,
  contrasena VARCHAR(255) NOT NULL,
  rol VARCHAR(255) NOT NULL DEFAULT 'usuario',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



Tabla asistencia:

SQL
CREATE TABLE asistencia (
  id INT PRIMARY KEY AUTO_INCREMENT,
  usuario_id INT NOT NULL,
  fecha DATE NOT NULL,
  hora_entrada TIME NOT NULL,
  hora_salida TIME NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
