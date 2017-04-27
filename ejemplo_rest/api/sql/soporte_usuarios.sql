--
-- Estructura de tabla para la tabla `soporte_usuarios`
--

CREATE TABLE IF NOT EXISTS `soporte_usuarios` (
  `idusuario` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mensajeria` varchar(100) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `preferenciacomunicacion` char(1) NOT NULL,
  `rangonomolestar` varchar(50) DEFAULT NULL,
  `tipousuario` char(1) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;