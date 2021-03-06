/*
Navicat MySQL Data Transfer

Source Server         : Mysql Local
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : conta_01

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-09-28 19:09:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for activo_fijo
-- ----------------------------
DROP TABLE IF EXISTS `activo_fijo`;
CREATE TABLE `activo_fijo` (
  `id_activo` int(11) NOT NULL,
  `nombre_activo` varchar(255) DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `valor_activo` int(11) DEFAULT NULL,
  `valor_residual` int(11) DEFAULT NULL,
  `estado_activo` int(11) DEFAULT '1',
  `id_partner` int(11) DEFAULT NULL,
  `id_usario_asignado` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  `id_factura` int(11) DEFAULT NULL,
  `img_activo` varchar(255) DEFAULT 'not_found.png',
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_activo`),
  KEY `fk01_activo_fijo` (`empresa_id`),
  KEY `fk03_acitvo_fijo` (`id_partner`),
  KEY `fk04_activo_fijo` (`id_factura`),
  KEY `fk02_activo_fijo` (`id_usario_asignado`),
  KEY `fk05_activo_fijo` (`id_categoria`),
  CONSTRAINT `fk01_activo_fijo` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id_empresa`),
  CONSTRAINT `fk02_activo_fijo` FOREIGN KEY (`id_usario_asignado`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `fk03_acitvo_fijo` FOREIGN KEY (`id_partner`) REFERENCES `partner` (`id_partner`),
  CONSTRAINT `fk04_activo_fijo` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`),
  CONSTRAINT `fk05_activo_fijo` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_activo` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of activo_fijo
-- ----------------------------

-- ----------------------------
-- Table structure for activo_fijo_depreciacion
-- ----------------------------
DROP TABLE IF EXISTS `activo_fijo_depreciacion`;
CREATE TABLE `activo_fijo_depreciacion` (
  `id_depreciacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `estado_depreciacion` int(11) DEFAULT NULL,
  `fecha_depreciacion` date DEFAULT NULL,
  `cantidad_depreciar` int(11) DEFAULT NULL,
  `valor_depreciacion` int(11) DEFAULT NULL,
  `valor_residual` int(11) DEFAULT NULL,
  `id_activo_fijo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_depreciacion`),
  KEY `fk01_activo_depreacicion` (`id_activo_fijo`),
  CONSTRAINT `fk01_activo_depreacicion` FOREIGN KEY (`id_activo_fijo`) REFERENCES `activo_fijo` (`id_activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of activo_fijo_depreciacion
-- ----------------------------

-- ----------------------------
-- Table structure for asigna_activo
-- ----------------------------
DROP TABLE IF EXISTS `asigna_activo`;
CREATE TABLE `asigna_activo` (
  `id_asigna_activo` int(11) NOT NULL AUTO_INCREMENT,
  `id_activo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_asigancaion` int(11) NOT NULL,
  `id_usuario_write` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_asigna_activo`),
  KEY `asigna_actibo_fk01` (`id_activo`),
  KEY `asigna_actibo_fk02` (`id_usuario`),
  CONSTRAINT `asigna_actibo_fk01` FOREIGN KEY (`id_activo`) REFERENCES `activo_fijo` (`id_activo`),
  CONSTRAINT `asigna_actibo_fk02` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of asigna_activo
-- ----------------------------

-- ----------------------------
-- Table structure for banco
-- ----------------------------
DROP TABLE IF EXISTS `banco`;
CREATE TABLE `banco` (
  `id_banco` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_banco` varchar(255) DEFAULT NULL,
  `codigo_banco` varchar(255) DEFAULT NULL,
  `telefono_banco` int(11) DEFAULT NULL,
  `email_banco` varchar(255) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `id_usuario_write` int(11) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_banco`),
  KEY `banco_fk01` (`id_empresa`),
  CONSTRAINT `banco_fk01` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banco
-- ----------------------------

-- ----------------------------
-- Table structure for categoria_activo
-- ----------------------------
DROP TABLE IF EXISTS `categoria_activo`;
CREATE TABLE `categoria_activo` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descrip_categorio` varchar(255) DEFAULT NULL,
  `porsentaje` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categoria_activo
-- ----------------------------

-- ----------------------------
-- Table structure for cuenta_contables
-- ----------------------------
DROP TABLE IF EXISTS `cuenta_contables`;
CREATE TABLE `cuenta_contables` (
  `id_cuenta` int(11) NOT NULL,
  `nombre_cuenta` varchar(255) NOT NULL,
  `tipo_cuenta` int(11) NOT NULL,
  `codigo_cuenta` varchar(255) DEFAULT NULL,
  `empresa_idempresa` int(11) NOT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `id_usuario_write` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cuenta`),
  KEY `fk01_cuenta_contable` (`empresa_idempresa`),
  KEY `fk02_cuneta_contable` (`id_usuario_write`),
  KEY `fk03_cuenta_contable` (`tipo_cuenta`),
  CONSTRAINT `fk01_cuenta_contable` FOREIGN KEY (`empresa_idempresa`) REFERENCES `empresa` (`id_empresa`),
  CONSTRAINT `fk03_cuenta_contable` FOREIGN KEY (`tipo_cuenta`) REFERENCES `cuenta_tipo_cuenta` (`id_tipo_cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cuenta_contables
-- ----------------------------

-- ----------------------------
-- Table structure for cuenta_tipo_cuenta
-- ----------------------------
DROP TABLE IF EXISTS `cuenta_tipo_cuenta`;
CREATE TABLE `cuenta_tipo_cuenta` (
  `id_tipo_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_cuenta` varchar(255) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `id_usario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cuenta_tipo_cuenta
-- ----------------------------

-- ----------------------------
-- Table structure for detalle_factura
-- ----------------------------
DROP TABLE IF EXISTS `detalle_factura`;
CREATE TABLE `detalle_factura` (
  `id_detalle_factura` int(11) NOT NULL AUTO_INCREMENT,
  `id_factura` int(11) NOT NULL,
  `id_partner` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` double NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_impuesto` int(11) DEFAULT NULL,
  `descripcion` text,
  `sub_total` double DEFAULT NULL,
  `total_impuesto` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`id_detalle_factura`),
  KEY `fk01_detalle` (`id_factura`),
  KEY `fk02_detalle` (`id_partner`),
  KEY `fk03_detalle` (`id_empresa`),
  CONSTRAINT `fk01_detalle` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`),
  CONSTRAINT `fk02_detalle` FOREIGN KEY (`id_partner`) REFERENCES `partner` (`id_partner`),
  CONSTRAINT `fk03_detalle` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detalle_factura
-- ----------------------------

-- ----------------------------
-- Table structure for empresa
-- ----------------------------
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(255) NOT NULL,
  `empresa_idempresa` int(11) NOT NULL,
  `sitio_web` varchar(255) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `razon_social` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `logo_empresa` varchar(255) DEFAULT NULL,
  `nit` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `pais` int(255) DEFAULT NULL,
  `id_usuario` varchar(255) DEFAULT NULL,
  `fecha_ultima_modifi` datetime DEFAULT NULL,
  `moneda` varchar(255) DEFAULT NULL,
  `estado_empresa` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of empresa
-- ----------------------------
INSERT INTO `empresa` VALUES ('2', 'Libreria Analy', '0', null, '2017-09-24', '1', 'Libreria Analy', null, '54792516', null, '11908289', 'San juan sac', 'Guatemal', '1', null, null, null, '1');

-- ----------------------------
-- Table structure for factura
-- ----------------------------
DROP TABLE IF EXISTS `factura`;
CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `id_partner` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `numero_factura` int(11) DEFAULT NULL,
  `serie_factura` varchar(2000) DEFAULT NULL,
  `saldo_factura` double DEFAULT NULL,
  `total_factura` double DEFAULT NULL,
  `sub_total` double DEFAULT NULL,
  `total_impuesto` double DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `estado_factura` int(11) DEFAULT '1',
  PRIMARY KEY (`id_factura`),
  KEY `factura_fk01` (`id_empresa`),
  KEY `factura_fk02` (`id_partner`),
  KEY `factura_fk03` (`id_usuario`),
  CONSTRAINT `factura_fk01` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`),
  CONSTRAINT `factura_fk02` FOREIGN KEY (`id_partner`) REFERENCES `partner` (`id_partner`),
  CONSTRAINT `factura_fk03` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of factura
-- ----------------------------

-- ----------------------------
-- Table structure for partner
-- ----------------------------
DROP TABLE IF EXISTS `partner`;
CREATE TABLE `partner` (
  `id_partner` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `proveedor` int(11) DEFAULT NULL,
  `cliente` int(11) DEFAULT NULL,
  `empresa` int(11) DEFAULT NULL,
  `nit` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `sitio_web` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `movil` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `fecha_creacion` date DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `partner_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_partner`),
  KEY `fk01_partner` (`empresa_id`),
  KEY `fk02_usuario` (`usuario_id`),
  CONSTRAINT `fk01_partner` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id_empresa`),
  CONSTRAINT `fk02_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of partner
-- ----------------------------

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `fecha_creacion` date DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `image_perfil` varchar(255) DEFAULT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk01_usuario` (`empresa_id`) USING BTREE,
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'Administrado', 'admin@conta.com', '123', '1', '2017-09-25', null, null, null);
