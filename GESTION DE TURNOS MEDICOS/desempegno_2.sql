-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-01-2024 a las 14:15:30
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desempegno_2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicas`
--

CREATE TABLE `medicas` (
  `Id_solicitante` int(11) NOT NULL,
  `Nombre_M` varchar(30) NOT NULL,
  `Apellido_M` varchar(30) NOT NULL,
  `Clave` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `Nivel` int(11) NOT NULL,
  `Imagen` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicas`
--

INSERT INTO `medicas` (`Id_solicitante`, `Nombre_M`, `Apellido_M`, `Clave`, `email`, `Nivel`, `Imagen`) VALUES
(2, 'TRINIDAD', 'MORENO', '12345', 'tmoreno@gmail.com', 1, '0'),
(3, 'MARIANO', 'SAUDE', '12345', 'msaude@gmail.com', 2, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `Id_nivel` int(11) NOT NULL,
  `Nivel_acc` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`Id_nivel`, `Nivel_acc`) VALUES
(1, 'Administrador'),
(2, 'Medico'),
(3, 'Paciente'),
(4, 'Secretaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obra_social`
--

CREATE TABLE `obra_social` (
  `Id_obraSocial` int(11) NOT NULL,
  `Obra_Social` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `obra_social`
--

INSERT INTO `obra_social` (`Id_obraSocial`, `Obra_Social`) VALUES
(1, 'APROSS'),
(2, 'OSDE'),
(3, 'SWISS MEDICAL'),
(4, 'PREVENCION SALUD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `Id_paciente` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Dni` int(10) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Clave` varchar(50) NOT NULL,
  `Id_obraSocial` int(11) NOT NULL,
  `Id_nivel` int(11) NOT NULL,
  `Imagen` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`Id_paciente`, `Nombre`, `Apellido`, `Dni`, `Email`, `Clave`, `Id_obraSocial`, `Id_nivel`, `Imagen`) VALUES
(1, 'ANASTACIA', 'PANCRACIA', 24456456, 'pancra@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, 'sue.JPG'),
(2, 'TRINIDAD', 'MORENO', 33456456, 'tmoreno@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 2, 'tmoreno.jpg'),
(3, 'MARIANO', 'SAUDE', 31456456, 'msaude@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3, 2, 'msaude.jpg'),
(4, 'JAVIER', 'ECHEVERRY', 46464646, 'jecheverry@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3, 3, 'avatar-5.jpg'),
(5, 'GABRIELA ', 'NAVARRO', 40456456, 'gnavarro@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 4, 3, 'gnavarro.jpg'),
(6, 'JUANA', 'PEREZ', 66606660, 'jperez@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 4, 'jperez.jpg'),
(8, 'EMANUEL', 'RODRIGUEZ', 35468510, 'emanuel@LP2', '827ccb0eea8a706c4c34a16891f84e7b', 2, 3, 'user.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestaciones`
--

CREATE TABLE `prestaciones` (
  `Id_prestaciones` int(11) NOT NULL,
  `Denominacion` varchar(30) NOT NULL,
  `Extra` varchar(30) NOT NULL,
  `Complejidad` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prestaciones`
--

INSERT INTO `prestaciones` (`Id_prestaciones`, `Denominacion`, `Extra`, `Complejidad`) VALUES
(1, 'PSICOLOGIA', '0', 'N'),
(2, 'TRAUMATOLOGIA', '0', 'N'),
(3, 'TOMOGRAFIA (TAC)', '1500', 'S'),
(4, 'RESONANCIA MAGNETICA', '2500', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `Id_solicitud` int(11) NOT NULL,
  `Id_pacientes` int(11) NOT NULL,
  `Diagonostico` varchar(100) NOT NULL,
  `Id_prestaciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `Id` int(11) NOT NULL,
  `Id_paciente` int(11) NOT NULL,
  `Fecha_consulta` date NOT NULL,
  `Id_prestaciones` int(11) NOT NULL,
  `Fecha_turno` date NOT NULL,
  `Hora` varchar(20) NOT NULL,
  `Diagnostico` varchar(30) DEFAULT NULL,
  `Asistido` varchar(30) NOT NULL DEFAULT 'N',
  `Id_obraSocial` int(11) NOT NULL,
  `Id_solicitante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`Id`, `Id_paciente`, `Fecha_consulta`, `Id_prestaciones`, `Fecha_turno`, `Hora`, `Diagnostico`, `Asistido`, `Id_obraSocial`, `Id_solicitante`) VALUES
(1, 5, '2023-12-22', 3, '2023-12-26', '18:15', 'RESFRÍO Y TOS', 'N', 4, 2),
(2, 1, '2023-12-22', 2, '2024-01-04', '08:20', 'CEFALEA', 'N', 1, 2),
(3, 8, '2023-12-22', 4, '2024-01-06', '15:45', 'TENDINITIS EN BRAZO IZQUIERDO', 'N', 2, 2),
(4, 4, '2023-12-22', 1, '2024-01-03', '10:15', 'CANSANCIO RECURRENTE', 'N', 3, 3),
(5, 6, '2023-12-22', 3, '2023-12-26', '14:20', 'FATIGA MUSCULAR', 'N', 1, 3),
(6, 8, '2023-12-22', 4, '2024-02-20', '15:30', 'INSONMIO', 'N', 2, 3),
(7, 3, '2023-12-22', 2, '2024-01-03', '11:00', 'AUTOCONSULTA', 'N', 3, 3),
(8, 8, '2023-12-22', 4, '2022-01-05', '10:20', '4 DE COPAS', 'S', 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `medicas`
--
ALTER TABLE `medicas`
  ADD PRIMARY KEY (`Id_solicitante`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`Id_nivel`);

--
-- Indices de la tabla `obra_social`
--
ALTER TABLE `obra_social`
  ADD PRIMARY KEY (`Id_obraSocial`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`Id_paciente`);

--
-- Indices de la tabla `prestaciones`
--
ALTER TABLE `prestaciones`
  ADD PRIMARY KEY (`Id_prestaciones`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`Id_solicitud`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `medicas`
--
ALTER TABLE `medicas`
  MODIFY `Id_solicitante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `Id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `obra_social`
--
ALTER TABLE `obra_social`
  MODIFY `Id_obraSocial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `Id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `prestaciones`
--
ALTER TABLE `prestaciones`
  MODIFY `Id_prestaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `Id_solicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
