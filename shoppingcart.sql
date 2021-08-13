-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2021 a las 22:51:21
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `idarticulo` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` varchar(400) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT 1,
  `precio` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`idarticulo`, `idcategoria`, `codigo`, `nombre`, `stock`, `descripcion`, `imagen`, `condicion`, `precio`) VALUES
(1, 1, '101', 'Bicicleta MTB 26', 10, 'Marco Dragón- Aro Doble Pared 26-ACTION- 18 Cambios- Freno Cromado(Qilong)- Asientos New Century- Aro Doble Pared 26', '1613709279.jpg', 1, '324.99'),
(2, 1, '102', 'Bicicleta MTB replica de aluminio 26', 10, 'Marco REPLICA ALUMINIO- Aro Doble Pared 26-ACTION- 18 Cambios- Freno Cromado(Qilong)- Asientos New Century- Aro Doble Pared 26', '1613709257.jpg', 1, '374.99'),
(3, 2, '1001', 'Asiento NEW CENTURY', 10, 'Asiento 100% calidad de Cuero.', '1613707018.jpg', 1, '15.99'),
(4, 2, '1002', 'ARO ALUMINIO 7x24', 10, 'ARO SOLO ALUMINIO 7x24 ACTION.', '1613707155.jpg', 1, '24.99'),
(5, 2, '1003', 'ARO DOBLE PARED  26', 9, 'ARO DOBLE PARED COMPLETO 26 ACTION.', '1613707246.jpg', 1, '34.99'),
(6, 2, '1004', 'ARO  7x26', 10, 'ARO COMPLETO 7x26 ACTION.', '1613707680.jpg', 1, '29.99'),
(7, 2, '1005', 'CABLE Y FUNDA DE FRENO', 10, 'CABLE Y FUNDA DE FRENO 1.5 x 1800MM ACTION-', '1613707970.jpg', 1, '3.99'),
(8, 2, '1006', 'CADENA MTB', 10, 'CADENA MTB 116 MAYA', '1613708038.jpg', 1, '9.99'),
(9, 2, '1007', 'CADENA PASEO', 10, 'CADENA PASEO 114 MAYA', '1613708079.jpg', 1, '7.99'),
(10, 2, '1008', 'CATALINA TRIPLE PLASTIFICADO', 10, 'CATALINA TRIPLE PLASTIFICADO GRIS 28/38/48 x 170MM ACTION.', '1613708143.jpg', 1, '19.99'),
(11, 2, '1009', 'EJE CENTRAL CON TAZA', 10, 'EJE CENTRAL CON TAZA CENTRAL QILONG', '1613708215.jpg', 1, '9.99'),
(12, 2, '1010', 'FRENO CROMADO', 10, 'FRENO V BRAY CROMADO QILONG', '1613708257.jpg', 1, '24.99'),
(13, 2, '1011', 'FRENO  PLASTIFICADO', 10, 'FRENO V BRAY PLASTIFICADO QILONG.', '1613708317.jpg', 1, '23.99'),
(14, 2, '1012', 'TAZA HORQUILLA', 10, 'TAZA HORQUILLA CROMADO QILONG', '1613708365.jpg', 1, '5.99'),
(15, 2, '1013', 'MAZA QILONG', 10, 'MAZA 36H 14G CROMADO QILONG', '1613708415.jpg', 1, '8.49'),
(16, 2, '1014', 'PEDAL MTB-1', 10, 'PEDAL MTB-1 CON BILLA QILONG', '1613708464.jpg', 1, '8.99'),
(17, 2, '1015', 'TIMON CROMADO', 10, 'TIMON CROMADO 580MM CON CODO 150x100 Y BRIDGE ACTION', '1613708525.jpg', 1, '19.99'),
(18, 2, '1016', 'TUBO DE ASIENTO', 10, 'TUBO DE ASIENTO N° 7 ACTION', '1613708627.jpg', 1, '3.99'),
(19, 2, '1017', 'CAMBIO MOTO', 10, 'CAMBIO MOTO DORADO SAIGUAN', '1613708752.jpg', 1, '44.99'),
(20, 2, '1018', 'LLANTA 26', 10, 'LLANTA  26 x 2.20 ACTION', '1613708868.jpg', 1, '23.99'),
(21, 2, '1019', 'CAMARA 26', 10, 'CAMARA 26 x 2.20 ACTION', '1613708929.jpg', 1, '11.99'),
(22, 2, '1020', 'DESCARRILADOR', 10, 'Descarrilado cambios Moto', '1613709087.jpg', 1, '13.99'),
(23, 2, '1021', 'DESVIADOR', 10, 'Desviador cambios de bicicleta', '1613709125.jpg', 1, '6.99'),
(24, 2, '1022', 'PIÑON TRASERO', 10, 'Piñon trasero 26 dientes -Bicimex', '1613709186.jpg', 1, '13.99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idcarrito` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `condicion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `condicion`) VALUES
(1, 'bicicletas', 'Bicicletas MTB 26 y replicas.', 1),
(2, 'accesorios', 'Accesorios de todo tipo para su bicicleta.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deseos`
--

CREATE TABLE `deseos` (
  `iddeseo` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `deseos`
--

INSERT INTO `deseos` (`iddeseo`, `idarticulo`, `idusuario`) VALUES
(1, 1, 1),
(2, 2, 1),
(15, 4, 1),
(16, 3, 1),
(17, 6, 1),
(18, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`iddetalle_venta`, `idventa`, `idarticulo`, `cantidad`, `precio_venta`) VALUES
(1, 1, 5, 1, '34.99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `clave` varchar(64) DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT 1,
  `apellidos` varchar(100) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `codigo_postal` varchar(20) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `direccion`, `telefono`, `email`, `cargo`, `login`, `clave`, `condicion`, `apellidos`, `pais`, `codigo_postal`, `ciudad`, `imagen`) VALUES
(1, 'Joan', 'Jr. Necochea 280', '999555217', 'remnyachizot2015@gmail.com', 'cliente', 'Joan', '4fc0b3354106bf2c38a62bf9503acae9d4d03e84b4a3c5a83b60931693a24298', 1, 'Roca Hormaza', 'Perú', '12006', 'Huancayo', '1612716728.png'),
(2, 'JoanJose', 'Jr. Necochea 280', '985868674', 'joanjose_04@hotmail.com', 'administrador', 'JoanJose', 'e0281b9dceed1a31230382f596f05d03ba78532713a48412ffb17b381e459b3b', 1, 'Roca Hormaza', 'Perú', '12006', 'Huancayo', 'default.png'),
(3, 'Mariza', 'Av. Aviación 280', '999555218', 'maestra@gmail.com', 'cliente', 'Mariza', '1d60d46c36a1b7f58e26c01b95091739604b7e79f5050b9c7e5cec7a04666063', 1, 'De la Cuz', 'Perú', '11007', 'Callao', 'default.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `clavetransaccion` varchar(200) DEFAULT NULL,
  `paypaldatos` text DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `total_compra` decimal(11,2) DEFAULT NULL,
  `condicion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `idusuario`, `clavetransaccion`, `paypaldatos`, `fecha_hora`, `total_compra`, `condicion`) VALUES
(1, 1, 'n5m3ji1p01v2s1sh95u3triurf', '{\"id\":\"PAYID-MAYHKXI6DP72810S3823994T\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"2X519923M34563452\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-qkz8b5062302@business.example.com\",\"first_name\":\"John\",\"last_name\":\"Doe\",\"payer_id\":\"P5LKJQU3WMSKS\",\"shipping_address\":{\"recipient_name\":\"John Doe\",\"line1\":\"Free Trade Zone\",\"city\":\"Lima\",\"state\":\"Lima\",\"postal_code\":\"07001\",\"country_code\":\"PE\"},\"phone\":\"5158655025\",\"country_code\":\"PE\",\"business_name\":\"John Doe Test Store\"}},\"transactions\":[{\"amount\":{\"total\":\"9.45\",\"currency\":\"USD\",\"details\":{\"subtotal\":\"9.45\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"CKEJH6TK94C76\",\"email\":\"sb-bw3p75060743@personal.example.com\"},\"description\":\"Compra de productos a BuyStack: 9.45\",\"custom\":\"n5m3ji1p01v2s1sh95u3triurf#LB3lgv1210bgmvwBqsJOkw==\",\"item_list\":{\"shipping_address\":{\"recipient_name\":\"John Doe\",\"line1\":\"Free Trade Zone\",\"city\":\"Lima\",\"state\":\"Lima\",\"postal_code\":\"07001\",\"country_code\":\"PE\"}},\"related_resources\":[{\"sale\":{\"id\":\"7MK56452N4024581F\",\"state\":\"completed\",\"amount\":{\"total\":\"9.45\",\"currency\":\"USD\",\"details\":{\"subtotal\":\"9.45\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"0.81\",\"currency\":\"USD\"},\"parent_payment\":\"PAYID-MAYHKXI6DP72810S3823994T\",\"create_time\":\"2021-02-20T02:35:27Z\",\"update_time\":\"2021-02-20T02:35:27Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v1/payments/sale/7MK56452N4024581F\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https://api.sandbox.paypal.com/v1/payments/sale/7MK56452N4024581F/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https://api.sandbox.paypal.com/v1/payments/payment/PAYID-MAYHKXI6DP72810S3823994T\",\"rel\":\"parent_payment\",\"method\":\"GET\"}]}}]}],\"create_time\":\"2021-02-20T02:35:09Z\",\"update_time\":\"2021-02-20T02:35:27Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v1/payments/payment/PAYID-MAYHKXI6DP72810S3823994T\",\"rel\":\"self\",\"method\":\"GET\"}]}', '2021-02-19 21:35:05', '34.99', 'aprovado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idarticulo`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  ADD KEY `fk_articulo_categoria_idx` (`idcategoria`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idcarrito`),
  ADD KEY `fk_usuario_carrito` (`idusuario`),
  ADD KEY `fk_articulo_carrito` (`idarticulo`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `deseos`
--
ALTER TABLE `deseos`
  ADD PRIMARY KEY (`iddeseo`),
  ADD KEY `fk_usuario_deseos` (`idusuario`),
  ADD KEY `fk_deseos_articulo` (`idarticulo`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`iddetalle_venta`),
  ADD KEY `fk_detalle_ingreso_ingreso_idx` (`idventa`),
  ADD KEY `fk_detalle_ingreso_articulo_idx` (`idarticulo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `fk_ingreso_usuario_idx` (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `idarticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `idcarrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `deseos`
--
ALTER TABLE `deseos`
  MODIFY `iddeseo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `fk_articulo_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `fk_articulo_carrito` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_carrito` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `deseos`
--
ALTER TABLE `deseos`
  ADD CONSTRAINT `fk_deseos_articulo` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_deseos` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `fk_detalle_ingreso_articulo` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_ingreso_venta` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_ingreso_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
