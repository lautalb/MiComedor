-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2019 a las 21:08:17
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletines`
--

CREATE TABLE `boletines` (
  `idBoletin` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `cuerpo1` varchar(255) NOT NULL,
  `cuerpo2` varchar(255) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `habilitado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nombre`) VALUES
(1, 'Frutas'),
(2, 'Verduras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coladeenvio`
--

CREATE TABLE `coladeenvio` (
  `idColaDeEnvio` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `asunto` varchar(45) NOT NULL,
  `mensaje` varchar(45) NOT NULL,
  `idBoletin` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idColaDeEnvioEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coladeenvioestados`
--

CREATE TABLE `coladeenvioestados` (
  `idColaDeEnvioEstado` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `descripcion` datetime NOT NULL,
  `intentos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinatarios`
--

CREATE TABLE `destinatarios` (
  `idRol` int(11) NOT NULL,
  `idBoletin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallelistas`
--

CREATE TABLE `detallelistas` (
  `idProducto` int(11) NOT NULL,
  `idLista` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

CREATE TABLE `donaciones` (
  `idDonacion` int(11) NOT NULL,
  `cantidad` double DEFAULT NULL,
  `motivo` varchar(45) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilitaciones`
--

CREATE TABLE `habilitaciones` (
  `idHabilitacion` int(11) NOT NULL,
  `alta` tinyint(4) NOT NULL,
  `baja` tinyint(4) NOT NULL,
  `modifcar` tinyint(4) NOT NULL,
  `lectura` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `habilitaciones`
--

INSERT INTO `habilitaciones` (`idHabilitacion`, `alta`, `baja`, `modifcar`, `lectura`) VALUES
(1, 1, 1, 1, 1),
(7, 1, 0, 0, 1),
(12, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listas`
--

CREATE TABLE `listas` (
  `idLista` int(11) NOT NULL,
  `fecha` varchar(45) NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `activa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `idLocalidad` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `idProvincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`idLocalidad`, `nombre`, `idProvincia`) VALUES
(1, 'Capital Federal', 1),
(2, 'Avellaneda', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logproductos`
--

CREATE TABLE `logproductos` (
  `idLogProducto` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `movimiento` varchar(20) NOT NULL,
  `cantidad` float NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menuplatos`
--

CREATE TABLE `menuplatos` (
  `idMenuPlatos` int(11) NOT NULL,
  `idMenu` int(11) NOT NULL,
  `idPlato` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `idMenu` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientodonaciones`
--

CREATE TABLE `movimientodonaciones` (
  `idDonacion` int(11) NOT NULL,
  `idMovimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `idMovimiento` int(11) NOT NULL,
  `total` double NOT NULL,
  `concepto` varchar(15) NOT NULL,
  `fecha` datetime NOT NULL,
  `idMovimientoTipos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientotipos`
--

CREATE TABLE `movimientotipos` (
  `idMovimientoTipos` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

CREATE TABLE `parametros` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `valor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parametros`
--

INSERT INTO `parametros` (`id`, `codigo`, `valor`) VALUES
(1, 'comedor', 'El comedor comunitario fue el origen de Alimentar. Fue en el comedor donde surgió la voluntad y la necesidad de trabajar por las familias en situación de vulnerabilidad, brindándoles todas las herramientas para el desarrollo de su potencial. Fue a partir del comedor que el trabajo de Alimentar se expandió para abordar la problemática social desde una perspectiva integral que no sólo aborde la nutrición sino también el desarrollo humano y la educación.  Nuestros comedores alimentan hoy a niños y adolescentes brindándoles un espacio de alimentación saludable y, además, un ámbito de colaboración, interacción y reunión. Los comedores son atendidos, con una dedicación admirable, por nuestras voluntarias que todos los días cocinan y sirven la mesa para que los chicos de la comunidad reciban su cena. Con la convicción de que la alimentación es vital para el desarrollo intelectual de los niños, trabajamos para ofrecer diariamente a los niños y jóvenes de la comunidad una dieta saludable y equilibrada que garantice su desarrollo.'),
(2, 'direccion', 'Av Callao 5758 / CABA'),
(3, 'email', 'info@alimentar.com.ar'),
(4, 'telefono', '4545-4987');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idPermiso` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `idHabilitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idPermiso`, `nombre`, `idHabilitacion`) VALUES
(1, 'productos', 1),
(2, 'platos', 1),
(3, 'menus', 1),
(4, 'usuarios', 1),
(5, 'planillas', 7),
(6, 'boletines', 7),
(7, 'donaciones', 7),
(8, 'gastos', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personamenuplatos`
--

CREATE TABLE `personamenuplatos` (
  `idPersona` int(11) NOT NULL,
  `idMenuPlatos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `idPersona` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `telefono` int(11) NOT NULL,
  `documento` bigint(12) NOT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `idLocalidad` int(11) NOT NULL,
  `idTipoDocumento` int(11) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `fechaNacimiento` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idPersona`, `nombre`, `apellido`, `telefono`, `documento`, `direccion`, `idLocalidad`, `idTipoDocumento`, `sexo`, `fechaNacimiento`) VALUES
(1, 'Ricardo', 'El comandante', 43034958, 8909898, 'la calle falsa 123', 1, 1, 'Masculino', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planillapersona`
--

CREATE TABLE `planillapersona` (
  `idPersona` int(11) NOT NULL,
  `idPlanilla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planillas`
--

CREATE TABLE `planillas` (
  `idPlanilla` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `idMenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platoproducto`
--

CREATE TABLE `platoproducto` (
  `idProducto` int(11) NOT NULL,
  `idPlato` int(11) NOT NULL,
  `cantidad` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `idPlato` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `unidadDeMedida` varchar(10) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idProveedor` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `cuit` bigint(14) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `idLocalidad` varchar(45) NOT NULL,
  `idProvincia` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedoresproductos`
--

CREATE TABLE `proveedoresproductos` (
  `idProveedor` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `idProvincia` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`idProvincia`, `nombre`) VALUES
(1, 'Buenos Aires');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `nombre`, `descripcion`) VALUES
(1, 'voluntario', 'gestiona todo sobre el comedor'),
(2, 'administrador', 'crea usuarios'),
(3, 'donador', 'alguien generoso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolpermisos`
--

CREATE TABLE `rolpermisos` (
  `idRol` int(11) NOT NULL,
  `idPermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rolpermisos`
--

INSERT INTO `rolpermisos` (`idRol`, `idPermiso`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumentos`
--

CREATE TABLE `tipodocumentos` (
  `idTipoDocumento` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipodocumentos`
--

INSERT INTO `tipodocumentos` (`idTipoDocumento`, `nombre`) VALUES
(1, 'DNI'),
(2, 'LC'),
(3, 'LE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `clave` varchar(225) NOT NULL,
  `email` varchar(40) NOT NULL,
  `idRol` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `clave`, `email`, `idRol`, `idPersona`, `activo`) VALUES
(1, 'test', 'e10adc3949ba59abbe56e057f20f883e', 'elcomandanteee@gmail.com', 1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boletines`
--
ALTER TABLE `boletines`
  ADD PRIMARY KEY (`idBoletin`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `coladeenvio`
--
ALTER TABLE `coladeenvio`
  ADD PRIMARY KEY (`idColaDeEnvio`),
  ADD KEY `idColaDeEnvioEstado` (`idColaDeEnvioEstado`);

--
-- Indices de la tabla `coladeenvioestados`
--
ALTER TABLE `coladeenvioestados`
  ADD PRIMARY KEY (`idColaDeEnvioEstado`);

--
-- Indices de la tabla `destinatarios`
--
ALTER TABLE `destinatarios`
  ADD PRIMARY KEY (`idRol`,`idBoletin`),
  ADD KEY `idBoletin` (`idBoletin`);

--
-- Indices de la tabla `detallelistas`
--
ALTER TABLE `detallelistas`
  ADD PRIMARY KEY (`idProducto`,`idLista`),
  ADD KEY `idLista` (`idLista`);

--
-- Indices de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD PRIMARY KEY (`idDonacion`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `habilitaciones`
--
ALTER TABLE `habilitaciones`
  ADD PRIMARY KEY (`idHabilitacion`);

--
-- Indices de la tabla `listas`
--
ALTER TABLE `listas`
  ADD PRIMARY KEY (`idLista`),
  ADD KEY `idProveedor` (`idProveedor`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`idLocalidad`),
  ADD KEY `idProvincia` (`idProvincia`);

--
-- Indices de la tabla `logproductos`
--
ALTER TABLE `logproductos`
  ADD PRIMARY KEY (`idLogProducto`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `menuplatos`
--
ALTER TABLE `menuplatos`
  ADD PRIMARY KEY (`idMenuPlatos`),
  ADD KEY `idMenu` (`idMenu`),
  ADD KEY `idPlato` (`idPlato`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`idMenu`);

--
-- Indices de la tabla `movimientodonaciones`
--
ALTER TABLE `movimientodonaciones`
  ADD KEY `idDonacion` (`idDonacion`),
  ADD KEY `idMovimiento` (`idMovimiento`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`idMovimiento`),
  ADD KEY `idMovimientoTipos` (`idMovimientoTipos`);

--
-- Indices de la tabla `movimientotipos`
--
ALTER TABLE `movimientotipos`
  ADD PRIMARY KEY (`idMovimientoTipos`);

--
-- Indices de la tabla `parametros`
--
ALTER TABLE `parametros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idPermiso`),
  ADD KEY `idHabilitacion` (`idHabilitacion`);

--
-- Indices de la tabla `personamenuplatos`
--
ALTER TABLE `personamenuplatos`
  ADD PRIMARY KEY (`idPersona`,`idMenuPlatos`),
  ADD KEY `idMenuPlatos` (`idMenuPlatos`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`idPersona`),
  ADD KEY `idLocalidad` (`idLocalidad`),
  ADD KEY `idTipoDocumento` (`idTipoDocumento`);

--
-- Indices de la tabla `planillapersona`
--
ALTER TABLE `planillapersona`
  ADD PRIMARY KEY (`idPersona`,`idPlanilla`),
  ADD KEY `idPlanilla` (`idPlanilla`);

--
-- Indices de la tabla `planillas`
--
ALTER TABLE `planillas`
  ADD PRIMARY KEY (`idPlanilla`),
  ADD KEY `idMenu` (`idMenu`);

--
-- Indices de la tabla `platoproducto`
--
ALTER TABLE `platoproducto`
  ADD PRIMARY KEY (`idProducto`,`idPlato`),
  ADD KEY `idPlato` (`idPlato`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`idPlato`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `proveedoresproductos`
--
ALTER TABLE `proveedoresproductos`
  ADD KEY `idProveedor` (`idProveedor`),
  ADD KEY `idProducto` (`idProducto`,`idProveedor`) USING BTREE;

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`idProvincia`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `rolpermisos`
--
ALTER TABLE `rolpermisos`
  ADD KEY `idPermiso` (`idPermiso`),
  ADD KEY `idRol` (`idRol`,`idPermiso`) USING BTREE;

--
-- Indices de la tabla `tipodocumentos`
--
ALTER TABLE `tipodocumentos`
  ADD PRIMARY KEY (`idTipoDocumento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idRol` (`idRol`),
  ADD KEY `idPersona` (`idPersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boletines`
--
ALTER TABLE `boletines`
  MODIFY `idBoletin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `coladeenvio`
--
ALTER TABLE `coladeenvio`
  MODIFY `idColaDeEnvio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  MODIFY `idDonacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `habilitaciones`
--
ALTER TABLE `habilitaciones`
  MODIFY `idHabilitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `listas`
--
ALTER TABLE `listas`
  MODIFY `idLista` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `idLocalidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `logproductos`
--
ALTER TABLE `logproductos`
  MODIFY `idLogProducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menuplatos`
--
ALTER TABLE `menuplatos`
  MODIFY `idMenuPlatos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `idMenu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `idMovimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimientotipos`
--
ALTER TABLE `movimientotipos`
  MODIFY `idMovimientoTipos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `parametros`
--
ALTER TABLE `parametros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `planillas`
--
ALTER TABLE `planillas`
  MODIFY `idPlanilla` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `idPlato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `idProvincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipodocumentos`
--
ALTER TABLE `tipodocumentos`
  MODIFY `idTipoDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boletines`
--
ALTER TABLE `boletines`
  ADD CONSTRAINT `boletines_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `coladeenvio`
--
ALTER TABLE `coladeenvio`
  ADD CONSTRAINT `coladeenvio_ibfk_1` FOREIGN KEY (`idColaDeEnvioEstado`) REFERENCES `coladeenvioestados` (`idColaDeEnvioEstado`);

--
-- Filtros para la tabla `destinatarios`
--
ALTER TABLE `destinatarios`
  ADD CONSTRAINT `destinatarios_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`),
  ADD CONSTRAINT `destinatarios_ibfk_2` FOREIGN KEY (`idBoletin`) REFERENCES `boletines` (`idBoletin`),
  ADD CONSTRAINT `destinatarios_ibfk_3` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`);

--
-- Filtros para la tabla `detallelistas`
--
ALTER TABLE `detallelistas`
  ADD CONSTRAINT `detallelistas_ibfk_1` FOREIGN KEY (`idLista`) REFERENCES `listas` (`idLista`);

--
-- Filtros para la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD CONSTRAINT `donaciones_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `listas`
--
ALTER TABLE `listas`
  ADD CONSTRAINT `listas_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedores` (`idProveedor`),
  ADD CONSTRAINT `listas_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD CONSTRAINT `localidades_ibfk_1` FOREIGN KEY (`idProvincia`) REFERENCES `provincias` (`idProvincia`);

--
-- Filtros para la tabla `logproductos`
--
ALTER TABLE `logproductos`
  ADD CONSTRAINT `logproductos_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `menuplatos`
--
ALTER TABLE `menuplatos`
  ADD CONSTRAINT `menuplatos_ibfk_1` FOREIGN KEY (`idMenu`) REFERENCES `menus` (`idMenu`),
  ADD CONSTRAINT `menuplatos_ibfk_2` FOREIGN KEY (`idPlato`) REFERENCES `platos` (`idPlato`);

--
-- Filtros para la tabla `movimientodonaciones`
--
ALTER TABLE `movimientodonaciones`
  ADD CONSTRAINT `movimientodonaciones_ibfk_1` FOREIGN KEY (`idDonacion`) REFERENCES `donaciones` (`idDonacion`),
  ADD CONSTRAINT `movimientodonaciones_ibfk_2` FOREIGN KEY (`idMovimiento`) REFERENCES `movimientos` (`idMovimiento`);

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`idMovimientoTipos`) REFERENCES `movimientotipos` (`idMovimientoTipos`);

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`idHabilitacion`) REFERENCES `habilitaciones` (`idHabilitacion`);

--
-- Filtros para la tabla `personamenuplatos`
--
ALTER TABLE `personamenuplatos`
  ADD CONSTRAINT `personamenuplatos_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `personas` (`idPersona`),
  ADD CONSTRAINT `personamenuplatos_ibfk_2` FOREIGN KEY (`idMenuPlatos`) REFERENCES `menuplatos` (`idMenuPlatos`);

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`idLocalidad`) REFERENCES `localidades` (`idLocalidad`),
  ADD CONSTRAINT `personas_ibfk_2` FOREIGN KEY (`idTipoDocumento`) REFERENCES `tipodocumentos` (`idTipoDocumento`);

--
-- Filtros para la tabla `planillapersona`
--
ALTER TABLE `planillapersona`
  ADD CONSTRAINT `planillapersona_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `personas` (`idPersona`),
  ADD CONSTRAINT `planillapersona_ibfk_2` FOREIGN KEY (`idPlanilla`) REFERENCES `planillas` (`idPlanilla`);

--
-- Filtros para la tabla `planillas`
--
ALTER TABLE `planillas`
  ADD CONSTRAINT `planillas_ibfk_1` FOREIGN KEY (`idMenu`) REFERENCES `menus` (`idMenu`);

--
-- Filtros para la tabla `platoproducto`
--
ALTER TABLE `platoproducto`
  ADD CONSTRAINT `platoproducto_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`),
  ADD CONSTRAINT `platoproducto_ibfk_2` FOREIGN KEY (`idPlato`) REFERENCES `platos` (`idPlato`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`);

--
-- Filtros para la tabla `proveedoresproductos`
--
ALTER TABLE `proveedoresproductos`
  ADD CONSTRAINT `proveedoresproductos_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedores` (`idProveedor`),
  ADD CONSTRAINT `proveedoresproductos_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`),
  ADD CONSTRAINT `proveedoresproductos_ibfk_3` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `rolpermisos`
--
ALTER TABLE `rolpermisos`
  ADD CONSTRAINT `rolpermisos_ibfk_1` FOREIGN KEY (`idPermiso`) REFERENCES `permisos` (`idPermiso`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`idPersona`) REFERENCES `personas` (`idPersona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
