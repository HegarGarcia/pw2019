-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: May 08, 2019 at 05:14 PM
-- Server version: 8.0.16
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalogo`
--

-- --------------------------------------------------------

--
-- Table structure for table `libros`
--

CREATE TABLE `libros` (
  `id` int(11) UNSIGNED NOT NULL,
  `titulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `autor` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `genero` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `idioma` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `resumen` text CHARACTER SET utf8 COLLATE utf8_spanish_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `autor`, `genero`, `idioma`, `resumen`) VALUES
(1, 'Viaje al Centro de la Tierra', 'Julio Verne', 'Aventuras / Ficción y Literatura', 'Español', 'Un antiquísimo manuscrito encontrado por el profesor Lidenbrock prueba que es posible viajar a las entradas de la Tierra. El sabio se pone en marcha de inmediato junto con su sobrino Axel y el guía Hans.\r\n\r\nUn mundo ignoto y misterioso se abre ante los ojos de los intrépidos viajeros, que arriesgan su vida en la empresa.\r\n\r\nLa fértil imaginación de Julio Verne encuentra en estos territorios inexplorados el campo ideal para las más fantásticas aventuras. El resultado es un libro vivo y apasionante.\r\n\r\nLa trama es ágil, sorprendente, inesperada, y mantiene su interés hasta la última página. Julio Verne ha desplegado aquí su poderosa imaginación en una obra que, un siglo después, conserva su arte inimitable para despertar la curiosidad del lector.'),
(2, 'La Isla Del Tesoro', 'Robert Louis Stevenson', 'Aventuras / Novelas / Literatura Juvenil / Clásico', 'Español', '\"Una maáana, un viejo marinero que tenía la cara marcada con la cicatriz de un sable, llegó hasta nuestra casa arrastrando un gastado baúl. Era alto y fuerte y llevaba el pelo recogido en una trenza negra. Sus manos, con las uñas sucias y recomidas sujetaban un bastón. Dentro de la posada, el viejo marinero pidió un vaso de ron y, apurándolo de un solo trago, comenzó a hablar con mi madre.\"\r\n\r\nEl joven Jim Hawkins, hijo de la mesonera de un pequeño pueblo de la costa de Inglaterra, conoce a un viejo marinero borracho y malhumorado, que al morir deja el mapa de un tesoro: un codiciado alijo de oro y plata enterrado por el legendario pirata Flint en una lejana isla tropical.\r\n\r\nJim consigue abordar un barco para ir a la isla, pero, mezclada con la tripulación, una banda de piratas capitaneados por John Silver también perseguiré el botón. Empieza la aventura.');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `admin` char(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `password`, `nombre`, `correo`, `admin`) VALUES
(1, 'pepe', 'pppp', 'Usuario permitido para el sistema', 'telematica@ucol.mx', 'S'),
(2, 'a', 'a', 'Hegar', 'h@u.c', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
