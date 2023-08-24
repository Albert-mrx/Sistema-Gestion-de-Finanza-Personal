-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2023 a las 22:46:07
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_finanzas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(1, 'Alimentos'),
(2, 'Transporte'),
(3, 'Vivienda'),
(4, 'Entretenimiento'),
(5, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id_gasto` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `forma_pago` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `nota` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id_gasto`, `id_usuario`, `monto`, `forma_pago`, `fecha`, `id_categoria`, `nota`) VALUES
(1, 1, '23.00', 'al contado', '2023-07-11', 2, 'microbus'),
(11, 1, '150.45', 'tarjeta de credito', '2023-07-12', 3, 'alquiler depa'),
(12, 1, '45.00', 'paypal', '2023-07-12', 5, 'danzas'),
(15, 1, '8.50', 'al contado', '2023-07-13', 1, 'lomo fino'),
(16, 1, '50.00', 'cash', '2023-07-13', 5, 'me compre un intrumento de viento'),
(17, 1, '3.00', 'cash', '2023-07-13', 5, 'ayudin para lavar'),
(18, 1, '2.00', 'cash', '2023-07-15', 1, 'pan para la cena'),
(19, 1, '20.30', 'paypal', '2023-07-15', 5, 'importacion de celular'),
(20, 1, '100.00', 'paypal', '2023-07-15', 4, 'consola'),
(23, 1, '2.00', 'cash', '2023-07-20', 1, 'galletas oreo'),
(24, 1, '34.00', 'al contado', '2023-07-20', 4, 'play'),
(25, 2, '80.00', 'tarjeta de credito', '2023-07-20', 5, 'cursilerias'),
(26, 2, '230.00', 'paypal', '2023-07-20', 3, 'alquiler de habitacion'),
(27, 10, '500.00', 'tarjeta de credito', '2023-07-22', 3, 'Alquiler de habitacion'),
(28, 12, '1200.00', 'paypal', '2023-07-26', 5, 'compra de pencil'),
(29, 18, '23.50', 'cash', '2023-07-28', 1, 'pan con chicharron'),
(30, 18, '170.00', 'paypal', '2023-07-28', 5, 'teclado gamer'),
(31, 36, '200.00', 'giro', '2023-07-29', 4, 'juegos'),
(32, 36, '8.50', 'cash', '2023-07-29', 1, 'asado'),
(33, 18, '4.00', 'cash', '2023-08-09', 1, 'jugo de quinua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id_ingreso` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `forma_pago` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `nota` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`id_ingreso`, `id_usuario`, `monto`, `forma_pago`, `fecha`, `nota`) VALUES
(1, 1, '20.50', 'checke', '2023-07-19', 'bono por hijo de mi trabajo'),
(2, 1, '1200.00', 'giro', '2023-07-20', 'deuda de un cliente por desarrollo'),
(3, 1, '200.00', 'paypal', '2023-07-20', 'saldo prestado a un familiar'),
(4, 2, '2020.00', 'transferencia bancaria', '2023-07-20', 'deuda entre amigos'),
(5, 2, '40.00', 'giro', '2023-07-20', 'ingreso por recarga '),
(6, 1, '8.50', 'recarga', '2023-07-20', ' hicimos una recarga'),
(7, 2, '1000.00', 'al contado', '2023-07-20', 'venta de licuadora'),
(8, 9, '100.00', 'giro', '2023-07-20', 'por derechos de autor'),
(9, 10, '10.00', 'paypal', '2023-07-22', 'recarga a un usuario'),
(10, 1, '120.00', 'giro', '2023-07-26', 'venta de celular'),
(11, 12, '23.00', 'cash', '2023-07-26', 'entrada por recarga'),
(12, 36, '45.00', 'cash', '2023-07-29', 'venta pollo'),
(13, 18, '1000.00', 'trabjo de programacion', '2023-08-09', 'monto girado de programacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `foto_perfil` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `correo`, `password`, `foto_perfil`) VALUES
(1, 'lucas alberto', 'admin@gmail.com', 'Alberto120@.com', 'usuario1.jpg'),
(2, 'lucas', 'Lucas@gmail.com', 'Lucas23%.com', 'usuario1.jpg'),
(3, 'riko', 'riko@gmail.com', 'Rikos20@', 'usuario1.jpg'),
(7, 'carlos', 'carlitos@gmail.com', 'Carlos23@', 'usuario1.jpg'),
(8, 'carla', 'carla@gmail.com', 'Luxor45@', 'usuario1.jpg'),
(9, 'maximo', 'maximo23@gmail.com', 'Maximo99@', 'usuario1.jpg'),
(10, 'rocio', 'rocio@gmail.com', 'Rocio12@', 'usuario1.jpg'),
(12, 'margot roci', 'margot@gmail.com', 'Margot20@', 'usuario1.jpg'),
(16, 'test', 'test@gmail.com', 'Test23@gmail.com', 'users1690570017.jpg'),
(18, 'Luis alberto', 'alberthumpiri@gmail.com', 'Luis23@gmail.com', 'yo.jpg'),
(20, 'wanda', 'wanda@gmail.com', 'wanda23D@.com', 'users1690571782.jpg'),
(22, 'william vargas', 'william@gmail.com', 'William23@.com', 'users1690572803.jpg'),
(28, 'Dalto', 'dalto@gmail.com', 'Dalto23@gmail.com', 'users1690586918.jpg'),
(35, '', '', '', 'users1690597573.jpg'),
(36, 'frank', 'terter@gmail.com', 'Tester23@.com', 'users1690597575.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id_gasto`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id_ingreso`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id_gasto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD CONSTRAINT `gastos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `gastos_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD CONSTRAINT `ingresos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
