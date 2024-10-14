-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-10-2024 a las 10:34:37
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `game_store`
--
CREATE DATABASE IF NOT EXISTS `game_store` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `game_store`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Calificaciones`
--

DROP TABLE IF EXISTS `Calificaciones`;
CREATE TABLE IF NOT EXISTS `Calificaciones` (
  `ID` int(255) NOT NULL,
  `Juego_ID` int(255) NOT NULL,
  `Puntuación` int(5) NOT NULL,
  `Comentario` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_juego` (`Juego_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Juegos`
--

DROP TABLE IF EXISTS `Juegos`;
CREATE TABLE IF NOT EXISTS `Juegos` (
  `ID` int(255) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Género` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Calificaciones`
--
ALTER TABLE `Calificaciones`
  ADD CONSTRAINT `fk_juego` FOREIGN KEY (`Juego_ID`) REFERENCES `Juegos` (`ID`);
COMMIT;
