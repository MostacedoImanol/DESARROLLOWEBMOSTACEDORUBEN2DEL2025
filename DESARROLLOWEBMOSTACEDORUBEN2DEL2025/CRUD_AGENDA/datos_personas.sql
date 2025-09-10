-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2025 a las 23:49:38
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Estructura de tabla para `ocupaciones`
--

CREATE TABLE `ocupaciones` (
  `id` int(5) NOT NULL,
  `nombre` VARCHAR(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ocupaciones`
--

INSERT INTO `ocupaciones` (`id`, `nombre`) VALUES
(1, 'Estudiante'),
(2, 'Desempleado'),
(3, 'soldador'),
(4, 'Costurero'),
(5, 'Ingeniero'),
(6, 'Medico'),
(7, 'Abogado'),
(8, 'Profesor'),
(9, 'Arquitecto'),
(10, 'Contador');


-- --------------------------------------------------------

--
-- Estructura de tabla para `datos`
--

CREATE TABLE `datos` (
  `id` int(11) NOT NULL,
  `fotografia` varchar(40) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(55) NOT NULL,
  `sexo` char(1) NOT NULL,
  `numero_documento` varchar(15) NOT NULL,
  `ocupacion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id`, `fotografia`, `nombres`, `apellidos`, `sexo`, `numero_documento`, `ocupacion_id`) VALUES
(1, 'foto1.jpg', 'Juan Carlos', 'Perez Gomez', 'M', '12345678', 5),
(2, 'foto2.jpg', 'Maria Fernanda', 'Lopez Diaz', 'F', '87654321', 6),
(3, 'foto3.jpg', 'Luis Alberto', 'Martinez Ruiz', 'M', '11223344', 7),
(4, 'foto4.jpg', 'Ana Sofia', 'Garcia Torres', 'F', '44332211', 8),
(5, 'foto5.jpg', 'Carlos Eduardo', 'Rodriguez Sanchez', 'M', '55667788', 9),
(6, 'foto6.jpg', 'Laura Isabel', 'Hernandez Flores', 'F', '88776655', 10),
(7, 'foto7.jpg', 'Jorge Luis', 'Gonzalez Ramirez', 'M', '99887766', 1),
(8, 'foto8.jpg', 'Sofia Valentina', 'Jimenez Morales', 'F', '66778899', 2),
(9, 'foto9.jpg', 'Miguel Angel', 'Vargas Castro', 'M', '33445566', 3),
(10, 'foto10.jpg', 'Camila Andrea', 'Rojas Mendoza', 'F', '66554433', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(6) NOT NULL,
  `username` VARCHAR(35) NOT NULL,
  `password` VARCHAR(30) NOT NULL,
  `rol` VARCHAR(15) NOT NULL
);

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `rol`) VALUES
(1, 'admin', 'admin123', 'administrador'),
(2, 'usuario1', 'pass123', 'usuario'),
(3, 'usuario2', 'pass456', 'usuario'),
(4, 'usuario3', 'pass789', 'usuario'),
(5, 'usuario4', 'pass101', 'usuario');


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ocupaciones`
--
ALTER TABLE `ocupaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ocupaciones`
--
ALTER TABLE `ocupaciones`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

COMMIT;
