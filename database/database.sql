-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-10-2024 a las 14:37:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `gamestore`
--
CREATE DATABASE IF NOT EXISTS `gamestore` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gamestore`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Calificaciones`
--
-- Creación: 20-10-2024 a las 12:36:59
--

DROP TABLE IF EXISTS `Calificaciones`;
CREATE TABLE IF NOT EXISTS `Calificaciones` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `JuegoID` int(11) NOT NULL,
  `Puntuación` int(11) NOT NULL,
  `Comentario` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_juego` (`JuegoID`)
) ;

--
-- RELACIONES PARA LA TABLA `Calificaciones`:
--   `JuegoID`
--       `Juegos` -> `ID`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Juegos`
--
-- Creación: 20-10-2024 a las 12:32:33
--

DROP TABLE IF EXISTS `Juegos`;
CREATE TABLE IF NOT EXISTS `Juegos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` text NOT NULL,
  `Genero` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `Juegos`:
--

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Calificaciones`
--
ALTER TABLE `Calificaciones`
  ADD CONSTRAINT `fk_juego` FOREIGN KEY (`JuegoID`) REFERENCES `Juegos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
