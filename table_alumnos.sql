-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-09-2023 a las 15:53:26
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `BdDPersonal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_alumnos`
--

CREATE TABLE `table_alumnos` (
  `id` int(10) NOT NULL,
  `namefull` varchar(100) DEFAULT NULL,
  `cedula` int(20) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `section` varchar(5) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `fechaRegistro` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `table_alumnos`
--

INSERT INTO `table_alumnos` (`id`, `namefull`, `cedula`, `sexo`, `section`, `foto`, `fechaRegistro`) VALUES
(47, 'andrea2321dfadfd', 123, 'M', 'B', 'fotosAlumnos/cuq.jpg', '03-09-2023 22:26:04 PM'),
(59, 'ggg', 4, 'M', 'B', 'fotosAlumnos/cagtalina ultimo.png', '04-09-2023 10:49:32 AM'),
(60, 'neuvoooo', 1, 'M', 'A', 'fotosAlumnos/cagtalina ultimo.png', '04-09-2023 10:51:58 AM'),
(62, 'andrea', 2, 'M', 'A', 'fotosAlumnos/65bc1a84-3e87-48c8-90dc-699a919cdde2.jpeg', '04-09-2023 19:06:47 PM'),
(63, 'guillermos', 1, 'M', 'A', 'fotosAlumnos/2.png', '04-09-2023 19:14:05 PM');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `table_alumnos`
--
ALTER TABLE `table_alumnos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `table_alumnos`
--
ALTER TABLE `table_alumnos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
