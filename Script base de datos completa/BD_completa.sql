-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 08:39 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dimayor2`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendario_partidos`
--

CREATE TABLE `calendario_partidos` (
  `id_calendario` int(11) NOT NULL,
  `nom_fecha` varchar(20) NOT NULL,
  `id_partido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendario_partidos`
--

INSERT INTO `calendario_partidos` (`id_calendario`, `nom_fecha`, `id_partido`) VALUES
(1, 'Fecha 1', 1),
(2, 'Fecha 1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` int(11) NOT NULL,
  `nom_equipo` varchar(80) NOT NULL,
  `ciu_equipo` varchar(60) NOT NULL,
  `titulos_liga_equi` int(11) NOT NULL,
  `id_presidente` int(11) DEFAULT NULL,
  `id_estadio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `nom_equipo`, `ciu_equipo`, `titulos_liga_equi`, `id_presidente`, `id_estadio`) VALUES
(1, 'Once caldas', 'Manizales', 4, 1, 1),
(2, 'Atletico nacional', 'Medellín', 17, 2, 2),
(3, 'America de cali', 'Cali', 13, 4, 3),
(4, 'Deportivo cali', 'Cali', 9, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `estadios`
--

CREATE TABLE `estadios` (
  `id_estadio` int(11) NOT NULL,
  `nom_estadio` varchar(60) NOT NULL,
  `cap_estadio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estadios`
--

INSERT INTO `estadios` (`id_estadio`, `nom_estadio`, `cap_estadio`) VALUES
(1, 'Palogrande', 28678),
(2, 'Atanasio Girardot', 44739),
(3, 'Pascual Guerrero', 46400),
(4, 'Monumental de Palmaseca', 41500);

-- --------------------------------------------------------

--
-- Table structure for table `faltas`
--

CREATE TABLE `faltas` (
  `id_falta` int(11) NOT NULL,
  `tipo_tarjeta` varchar(20) NOT NULL,
  `Tip_falta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `goles`
--

CREATE TABLE `goles` (
  `id_gol` int(11) NOT NULL,
  `tipo_gol` varchar(20) NOT NULL,
  `fecha_gol` date NOT NULL,
  `minuto_gol` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goles`
--

INSERT INTO `goles` (`id_gol`, `tipo_gol`, `fecha_gol`, `minuto_gol`) VALUES
(1, 'Saque de banda', '2021-05-19', '00:39:29'),
(2, 'Tiro libre', '2021-05-19', '00:42:00'),
(3, 'Tiro penal', '2021-05-19', '00:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `jugadores`
--

CREATE TABLE `jugadores` (
  `id_jugador` int(11) NOT NULL,
  `no_camiseta` int(11) NOT NULL,
  `nom_jugador` varchar(80) NOT NULL,
  `fec_nac_jugador` date NOT NULL,
  `pos_jugador` int(11) DEFAULT NULL,
  `id_gol` int(11) DEFAULT NULL,
  `id_falta` int(11) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jugadores`
--

INSERT INTO `jugadores` (`id_jugador`, `no_camiseta`, `nom_jugador`, `fec_nac_jugador`, `pos_jugador`, `id_gol`, `id_falta`, `id_equipo`) VALUES
(1, 1, 'Gerardo ortiz', '1980-12-17', 1, NULL, NULL, 1),
(2, 9, 'Jefersson duque', '1985-02-03', 7, NULL, NULL, 2),
(3, 1, 'Aldair quintana', '1992-08-27', 1, NULL, NULL, 2),
(4, 2, 'Jonatan Alvarez', '1991-01-05', 7, NULL, NULL, 2),
(5, 10, 'Andres Andrade', '1985-02-04', 6, NULL, NULL, 2),
(6, 11, 'Jarlan Barrera', '1982-05-06', 5, NULL, NULL, 2),
(7, 8, 'Neyder moreno', '1990-09-16', 6, NULL, NULL, 2),
(8, 6, 'Bryan rovira', '1992-02-18', 4, NULL, NULL, 2),
(9, 15, 'Baldomero perlaza', '1990-02-09', 4, NULL, NULL, 2),
(10, 4, 'Danovis Banguero', '1998-08-20', 2, NULL, NULL, 2),
(11, 3, 'Emmanuel Olivera', '1994-08-24', 2, NULL, NULL, 2),
(12, 5, 'Brayan cordoba', '1998-08-07', 2, NULL, NULL, 2),
(13, 3, 'Yoiber Gónzales', '1999-05-25', 2, NULL, NULL, 1),
(14, 2, 'Jesus David Murillo', '1998-08-13', 2, NULL, NULL, 1),
(15, 4, 'David valencia', '1999-01-06', 2, NULL, NULL, 1),
(16, 5, 'Tomas clavijo', '1995-08-28', 3, NULL, NULL, 1),
(17, 6, 'Robert mejia', '1999-02-05', 4, NULL, NULL, 1),
(18, 15, 'Sebastian Guzman', '1998-07-20', 4, NULL, NULL, 1),
(19, 20, 'Alejandro garcia', '1997-07-23', 5, NULL, NULL, 1),
(20, 10, 'Harrison Otalvaro', '1998-09-09', 6, NULL, NULL, 1),
(21, 11, 'David lemos', '1995-02-15', 7, NULL, NULL, 1),
(22, 9, 'Mender Garcia', '2000-09-23', 7, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `partidos`
--

CREATE TABLE `partidos` (
  `id_partido` int(11) NOT NULL,
  `cod_partido` varchar(30) NOT NULL,
  `fecha_partido` date NOT NULL,
  `hora_partido` time NOT NULL,
  `id_equipo_local` int(11) DEFAULT NULL,
  `id_equipo_visit` int(11) DEFAULT NULL,
  `nom_partido` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partidos`
--

INSERT INTO `partidos` (`id_partido`, `cod_partido`, `fecha_partido`, `hora_partido`, `id_equipo_local`, `id_equipo_visit`, `nom_partido`) VALUES
(1, 'OC-ATN', '2021-06-01', '20:00:00', 1, 2, 'Once caldas - Atletico nacional'),
(2, 'AMC-DC', '2021-05-25', '15:40:00', 3, 4, 'America de cali - Deportivo cali');

-- --------------------------------------------------------

--
-- Table structure for table `posiciones`
--

CREATE TABLE `posiciones` (
  `id_posicion` int(11) NOT NULL,
  `nom_posicion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posiciones`
--

INSERT INTO `posiciones` (`id_posicion`, `nom_posicion`) VALUES
(1, 'Portero'),
(2, 'Defensa central'),
(3, 'Lateral'),
(4, 'Mediocampista defensivo'),
(5, 'Mediocampista'),
(6, 'Mediocampista ofensivo'),
(7, 'Delantero centro'),
(8, 'Extremo');

-- --------------------------------------------------------

--
-- Table structure for table `presidentes`
--

CREATE TABLE `presidentes` (
  `id_presidente` int(11) NOT NULL,
  `nom_presidente` varchar(80) NOT NULL,
  `fec_nac_pre` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presidentes`
--

INSERT INTO `presidentes` (`id_presidente`, `nom_presidente`, `fec_nac_pre`) VALUES
(1, 'Tulio Mario Castrillón', '1971-07-06'),
(2, 'Juan David Pérez\r\n', '1968-05-14'),
(3, 'Mauricio Romero Sellarés', '1970-05-17'),
(4, 'Álvaro Martínez', '1975-06-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendario_partidos`
--
ALTER TABLE `calendario_partidos`
  ADD PRIMARY KEY (`id_calendario`),
  ADD KEY `id_partido` (`id_partido`);

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `id_presidente` (`id_presidente`),
  ADD KEY `id_estadio` (`id_estadio`);

--
-- Indexes for table `estadios`
--
ALTER TABLE `estadios`
  ADD PRIMARY KEY (`id_estadio`);

--
-- Indexes for table `faltas`
--
ALTER TABLE `faltas`
  ADD PRIMARY KEY (`id_falta`);

--
-- Indexes for table `goles`
--
ALTER TABLE `goles`
  ADD PRIMARY KEY (`id_gol`);

--
-- Indexes for table `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id_jugador`),
  ADD KEY `pos_jugador` (`pos_jugador`),
  ADD KEY `id_gol` (`id_gol`),
  ADD KEY `id_falta` (`id_falta`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indexes for table `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`id_partido`),
  ADD KEY `id_equipo_local` (`id_equipo_local`),
  ADD KEY `id_equipo_visit` (`id_equipo_visit`);

--
-- Indexes for table `posiciones`
--
ALTER TABLE `posiciones`
  ADD PRIMARY KEY (`id_posicion`);

--
-- Indexes for table `presidentes`
--
ALTER TABLE `presidentes`
  ADD PRIMARY KEY (`id_presidente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendario_partidos`
--
ALTER TABLE `calendario_partidos`
  MODIFY `id_calendario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `estadios`
--
ALTER TABLE `estadios`
  MODIFY `id_estadio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faltas`
--
ALTER TABLE `faltas`
  MODIFY `id_falta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goles`
--
ALTER TABLE `goles`
  MODIFY `id_gol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id_jugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `partidos`
--
ALTER TABLE `partidos`
  MODIFY `id_partido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posiciones`
--
ALTER TABLE `posiciones`
  MODIFY `id_posicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `presidentes`
--
ALTER TABLE `presidentes`
  MODIFY `id_presidente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calendario_partidos`
--
ALTER TABLE `calendario_partidos`
  ADD CONSTRAINT `calendario_partidos_ibfk_1` FOREIGN KEY (`id_partido`) REFERENCES `partidos` (`id_partido`);

--
-- Constraints for table `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`id_presidente`) REFERENCES `presidentes` (`id_presidente`),
  ADD CONSTRAINT `equipos_ibfk_2` FOREIGN KEY (`id_estadio`) REFERENCES `estadios` (`id_estadio`);

--
-- Constraints for table `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`pos_jugador`) REFERENCES `posiciones` (`id_posicion`),
  ADD CONSTRAINT `jugadores_ibfk_2` FOREIGN KEY (`id_gol`) REFERENCES `goles` (`id_gol`),
  ADD CONSTRAINT `jugadores_ibfk_3` FOREIGN KEY (`id_falta`) REFERENCES `faltas` (`id_falta`),
  ADD CONSTRAINT `jugadores_ibfk_4` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`);

--
-- Constraints for table `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `partidos_ibfk_1` FOREIGN KEY (`id_equipo_local`) REFERENCES `equipos` (`id_equipo`),
  ADD CONSTRAINT `partidos_ibfk_2` FOREIGN KEY (`id_equipo_visit`) REFERENCES `equipos` (`id_equipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
