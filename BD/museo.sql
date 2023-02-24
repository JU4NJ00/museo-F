-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2023 a las 00:04:22
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `museo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoriaboss` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `iniciales` varchar(45) NOT NULL,
  `contador` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoriaboss`, `nombre`, `iniciales`, `contador`) VALUES
(1, 'Muebles', 'M', 14),
(2, 'Libros', 'L', 18),
(3, 'Elementos ferroviarios', 'E-F', 1),
(4, 'naza juanjo stefi', 'N-J-S', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorialibro`
--

CREATE TABLE `categorialibro` (
  `idcategorias` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `iniciales` varchar(20) NOT NULL,
  `contador` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorialibro`
--

INSERT INTO `categorialibro` (`idcategorias`, `nombre`, `iniciales`, `contador`) VALUES
(1, 'Historia ferrocarril', 'H-F', 13),
(2, 'Libros Talleres', 'L-T', 1),
(3, 'Varios', 'V', 2),
(4, 'histora segundo', 'H-S', 2),
(5, 'libros tecnicaturas', 'L-T', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventariolibros`
--

CREATE TABLE `inventariolibros` (
  `idlibro` int(11) NOT NULL,
  `autor` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) NOT NULL,
  `editorial` varchar(45) DEFAULT NULL,
  `fechaedicion` date DEFAULT NULL,
  `lugar` varchar(45) DEFAULT NULL,
  `paginas` int(11) DEFAULT NULL,
  `modoadquisicion` varchar(45) DEFAULT NULL,
  `nomdonante` varchar(45) DEFAULT NULL,
  `fechaingreso` date DEFAULT NULL,
  `descripcion` varchar(250) NOT NULL,
  `procedencia` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  `categoria_idcategoriaboss` int(11) NOT NULL,
  `categorialibro_idcategorias` int(11) NOT NULL,
  `usuarios_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventariolibros`
--

INSERT INTO `inventariolibros` (`idlibro`, `autor`, `nombre`, `editorial`, `fechaedicion`, `lugar`, `paginas`, `modoadquisicion`, `nomdonante`, `fechaingreso`, `descripcion`, `procedencia`, `estado`, `codigo`, `activo`, `categoria_idcategoriaboss`, `categorialibro_idcategorias`, `usuarios_idusuario`) VALUES
(29, 'Scalabrini Ortiz, Raul y Otros', 'Historia de los ferrocarriles Argentinos', 'Talleres graficos de los Ferrocarriles del Es', '1947-01-01', 'Santiago de Chile', 516, 'Donacion', 'Anonimo', '2013-07-10', 'Tapa dura, de color azul oscuro con letras doradas', 'San Cristobal', 'Bueno', '2-4-H-F', 1, 2, 1, 13),
(30, 'Villamea Victoriano, Civilo Rino', 'Señalizacion y reglamento de los Ferrocarrile', 'Talleres graficos de la E.G.I.F', '1956-01-01', 'Buenos Aires', 224, 'Donacion', 'Anonimo', '2013-07-01', 'Tapa blanda, blanca con letras negras y recuadros rojos', 'San Cristobal', 'Bueno', '2-1-T', 0, 2, 2, 13),
(34, 'Scalabrini Ortiz, Raúl y otros', 'Historia de los Ferrocarriles Argentinos', 'Talleres Gráficos de los Ferrocarriles del Es', '1947-01-01', 'Santiago de Chile', 516, 'Donacion', 'Prof. Elina Núñez', '2013-11-01', ':  tapa dura, de color bordó con letras doradas', 'San Cristóbal', 'Bueno', '2-5-H-F', 1, 2, 1, 13),
(35, 'Scalabrini Ortiz, Raúl y otros', 'Historia de los Ferrocarriles Argentinos', 'Talleres Gráficos de los Ferrocarriles del Es', '1947-01-01', 'Santiago de Chile', 516, 'Donacion', 'Panca Peralta ( averiguar nombre) ', '2014-05-01', 'tapa dura, de color azul  oscuro con letras doradas', 'San Cristóbal', 'Bueno', '2-6-H-F', 1, 2, 1, 13),
(36, 'Scalabrini Ortiz, Raúl y otros', 'Historia de los Ferrocarriles Argentinos', 'Talleres Gráficos de los Ferrocarriles del Es', '1947-01-01', 'Santiago de Chile', 516, 'Donacion', 'anónimo', '2014-09-01', 'tapa dura, de color azul  oscuro con letras doradas poco visibles ', 'San Cristóbal', 'Regular', '2-7-H-F', 1, 2, 1, 13),
(37, 'Scalabrini Ortiz, Raúl y otros', 'Historia de los Ferrocarriles Argentinos', 'Talleres Gráficos de los Ferrocarriles del Es', '1947-01-01', 'Santiago de Chile', 516, 'Donacion', 'Walter Guzmán ', '2016-10-01', 'tapa dura, de color bordó con letras doradas', 'Rafaela', 'Bueno', '2-8-H-F', 1, 2, 1, 13),
(38, 'Scalabrini Ortiz, Raúl y otros', 'Historia de los Ferrocarriles Argentinos', 'Talleres Gráficos de los Ferrocarriles del Es', '1947-01-01', 'Santiago de Chile', 516, 'Donacion', 'anónimo', '2016-11-01', 'tapa dura, de color bordó con letras poco legiles y con caja un poco deteriorada del mismo color ', 'San Cristóbal ', 'Bueno', '2-9-H-F', 1, 2, 1, 13),
(39, 'Scalabrini Ortiz, Raúl y otros', 'Historia de los Ferrocarriles Argentinos', 'Talleres Gráficos de los Ferrocarriles del Es', '1947-01-01', 'Santiago de Chile', 516, 'Donacion', 'anónimo', '2016-11-01', 'tapa dura, de color verde con letras doradas y cubierta  deteriorada del mismo color, con letras y con dibujo de riel. Tiene caja también verde.', 'San Cristóbal ', 'Bueno', '2-10-H-F', 1, 2, 1, 13),
(40, 'Addisi Federico Gastón ( compilador) y otros', 'Raúl Scalabrini Ortiz, sus lucha y sus enseña', 'Ediciones Fabro', '2009-01-01', 'Buenos Aires', 182, 'Donacion', 'Walter Guzmán', '2016-10-01', 'tapa blanca con letras rojas y foto ', 'Rafaela', 'Muy Bueno', '2-11-H-F', 1, 2, 1, 13),
(41, 'López Mario Justo (h)', 'Historia de los Ferrocarriles Nacionales ( in', 'Lumiere', '1994-01-01', 'Argentina', 439, 'Donacion', 'Walter Guzmán', '2016-10-01', 'tapa roja con letras blancas  y fotografía de locomotora', 'Rafaela', 'Muy Bueno', '2-12-H-F', 1, 2, 1, 13),
(42, 'Varios ( según las diferentes ponencias)', 'Seminario: Experiencias de utilización altern', 'Fundación de los Ferrocarriles Españoles', '0001-01-01', 'Madrid', 399, 'Donacion', 'Walter Guzmán', '2016-10-01', 'tapa blanca, con letras rojas y dibujo', 'Rafaela', 'Muy Bueno', '2-13-H-F', 1, 2, 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventariomuebles`
--

CREATE TABLE `inventariomuebles` (
  `idmuebles` int(11) NOT NULL,
  `designacion` varchar(60) NOT NULL,
  `modoadquisicion` varchar(60) DEFAULT NULL,
  `nomdonante` varchar(50) DEFAULT NULL,
  `fechaing` date DEFAULT NULL,
  `datodescr` varchar(260) NOT NULL,
  `procedencia` varchar(160) DEFAULT NULL,
  `estadoconserv` varchar(60) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  `categoria_idcategoriaboss` int(11) NOT NULL,
  `usuarios_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventariomuebles`
--

INSERT INTO `inventariomuebles` (`idmuebles`, `designacion`, `modoadquisicion`, `nomdonante`, `fechaing`, `datodescr`, `procedencia`, `estadoconserv`, `codigo`, `activo`, `categoria_idcategoriaboss`, `usuarios_idusuario`) VALUES
(48, 'Barra de boleteria', 'Donacion', 'Belgrano Cargas', '2013-09-01', 'De madera, pintada de color verde, de 1,18m de largo x 0,20cm de ancho y 1,17m de altura (falta la base de una pata)', 'San Cristobal. Estacion Ferrocarril General Belgrano ', 'Bueno', '1-4-M', 1, 1, 13),
(49, 'Estanteria de pie', 'Donacion', 'Escuela Nro 40', '2012-09-01', 'De madera, barnizada, de 3 estantes, de 0,96cm de largo x 0,78 cm de alto y 0,16cm de ancho', 'San Cristobal. Escuela Nro 40', 'Bueno', '1-5-M', 1, 1, 13),
(50, 'Armario de dos cuerpos', 'Donacion', 'Comisión Directiva Banco Credicoop Sucursal San Cr', '2016-01-01', 'de nerolite color marrón, con  dos puertas de vidrio corredizas,  borde de metal, con un divisorio interno vertical  y un  estante en cada uno, de aproximadamente 1, 72 m  de largo  x 0, 82 de alto  y   0, 33 .de ancho', 'San Cristóbal', 'Bueno', '1-7-M', 1, 1, 13),
(51, 'Asiento de coche motor', 'Donacion', 'Familia de Paula Hernandez', '2013-09-01', 'tapizado en cuerina color marrón, con un posa brazo y patas de hierro de 1,34 m de largo x 0,98 cm de alto y 0,47 de ancho', 'San Cristobal', 'Regular', '1-6-M', 0, 1, 14),
(53, 'mesa', 'Donacion', 'Gonzalo Ibáñez ', '2013-09-01', 'de nerolite   color blanco,  con cuatro patas de  caño gris , de 1, 50 m  de largo  x   o, 80 cm. de ancho y 0, 78 de altura', 'San Cristóbal', 'Excelente', '1-8-M', 1, 1, 13),
(54, 'estantería', 'Donacion', 'Poder Judicial,  Distrito N° 10   de San Cristóbal', '2017-07-01', 'de nerolite,   color marrón,  para colgar, con tres estantes, de 1 , 25 m. de largo  x   0, 29cm  de ancho x  0, 96 cm de altura ', 'San Cristóbal', 'Muy Bueno', '1-9-M', 1, 1, 13),
(55, 'armario ', 'Donacion', 'Poder Judicial ,  Distrito N° 10   de San Cristóba', '2017-07-01', 'de nerolite,    color marrón ,  con dos puertas corredizas , con un divisorio vertical y 1 estante  , de 1, 27  de largo  x   0, 42  de ancho x  0, 75 de alto', 'San Cristóbal', 'Muy Bueno', '1-10-M', 1, 1, 13),
(56, 'exhibidor- vitrina', 'Donacion', 'Prof. Marta González  ', '2013-09-01', 'de madera,    pintado de color marrón  oscuro ,  con seis patas, con 1 estante  inferior de madera y  vidrios repartidos cubriendo el estante superior , de 3 m  de largo  x   0, 68 cm de ancho x  0, 82 cm de alto', 'San Cristóbal', 'Bueno', '1-11-M', 1, 1, 13),
(57, 'mesa', 'Donacion', 'Anónima', '2013-09-01', 'de madera barnizada, marrón ,  con 4 patas talladas en la parte inferior y superior,  con tapa superior dividida en tres partes, la central extraíble; en el interior tiene dos cajoncitos, de 0, 77 c m  de largo  x   0, 58 cm de ancho x  0, 82 cm de alto', 'San Cristóbal', 'Bueno', '1-12-M', 1, 1, 13),
(58, 'Estantería de pie', 'Donacion', 'Escuela N° 40', '2013-09-01', 'de madera, barnizada,  de 3 estantes, de 0,60 cm  de largo  x 0, 76 cm de alto  y   0,15 cm de ancho', 'San Cristóbal. Escuela  N° 40 ', 'Bueno', '1-13-M', 1, 1, 13),
(59, 'escritorio', 'Donacion', 'Escuela N° 40 ', '2013-09-01', 'de madera pintado de color verde,  con 4 patas, de 0, 90 c m  de largo  x   0, 60 cm de ancho x  0, 78 cm de alto', 'San Cristóbal', 'Regular', '1-14-M', 1, 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `fecha_alta` date NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `clave` varchar(255) NOT NULL,
  `tipodeusuario` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `apellido`, `dni`, `fecha_alta`, `telefono`, `email`, `clave`, `tipodeusuario`) VALUES
(13, 'naza', 'madero', '12345678', '2022-08-31', '3408676767', 'nazarenomadero2017@gmail.com', '$2y$10$6ODttZbpVAz846iPr72PJOce3KlWSzzxGjQWljh.NFV6K05w717Xm', '1'),
(14, 'encargado', 'ferro', '87654321', '2022-10-04', '3408682511', 'nlcroiss@gmail.com', '$2y$10$OouGmE/YlCETAolpZ3J8fuuss4OHhVvqXrp.PShEfEe8LEqVVXCtO', '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoriaboss`);

--
-- Indices de la tabla `categorialibro`
--
ALTER TABLE `categorialibro`
  ADD PRIMARY KEY (`idcategorias`);

--
-- Indices de la tabla `inventariolibros`
--
ALTER TABLE `inventariolibros`
  ADD PRIMARY KEY (`idlibro`),
  ADD KEY `fk_libros_categoria1_idx` (`categoria_idcategoriaboss`),
  ADD KEY `fk_libros_categorialibro1_idx` (`categorialibro_idcategorias`),
  ADD KEY `fk_inventariolibros_usuarios1_idx` (`usuarios_idusuario`);

--
-- Indices de la tabla `inventariomuebles`
--
ALTER TABLE `inventariomuebles`
  ADD PRIMARY KEY (`idmuebles`),
  ADD KEY `fk_inventariomuebles_categoria1_idx` (`categoria_idcategoriaboss`),
  ADD KEY `fk_inventariomuebles_usuarios1_idx` (`usuarios_idusuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoriaboss` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categorialibro`
--
ALTER TABLE `categorialibro`
  MODIFY `idcategorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `inventariolibros`
--
ALTER TABLE `inventariolibros`
  MODIFY `idlibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `inventariomuebles`
--
ALTER TABLE `inventariomuebles`
  MODIFY `idmuebles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inventariolibros`
--
ALTER TABLE `inventariolibros`
  ADD CONSTRAINT `fk_inventariolibros_usuarios1` FOREIGN KEY (`usuarios_idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_libros_categoria1` FOREIGN KEY (`categoria_idcategoriaboss`) REFERENCES `categoria` (`idcategoriaboss`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_libros_categorialibro1` FOREIGN KEY (`categorialibro_idcategorias`) REFERENCES `categorialibro` (`idcategorias`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inventariomuebles`
--
ALTER TABLE `inventariomuebles`
  ADD CONSTRAINT `fk_inventariomuebles_categoria1` FOREIGN KEY (`categoria_idcategoriaboss`) REFERENCES `categoria` (`idcategoriaboss`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inventariomuebles_usuarios1` FOREIGN KEY (`usuarios_idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
