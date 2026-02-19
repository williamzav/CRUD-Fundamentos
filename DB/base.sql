CREATE DATABASE`crud_escuela`;
USE `crud_escuela`;

DROP TABLE IF EXISTS `t_alumnos`;
CREATE TABLE `t_alumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `carrera` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
);

INSERT INTO `t_alumnos` (`nombre`, `carrera`, `edad`, `fecha_registro`) VALUES
('William Garcia', 'Ingeniería en Sistemas', 22, '2026-02-17 07:38:56'),
('Ana Lopez', 'Administración', 21, '2026-02-17 07:38:56'),
('Carlos Mendoza', 'Contabilidad', 23, '2026-02-17 07:38:56'),
('María Fernández', 'Derecho', 24, '2026-02-17 08:15:30'),
('José Ramírez', 'Medicina', 25, '2026-02-17 08:20:45');