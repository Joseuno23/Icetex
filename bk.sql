-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.38-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para bd_files
CREATE DATABASE IF NOT EXISTS `bd_files` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bd_files`;

-- Volcando estructura para tabla bd_files.sys_adjuntos
CREATE TABLE IF NOT EXISTS `sys_adjuntos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_radicado` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `archivo` varchar(100) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_files.sys_adjuntos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sys_adjuntos` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_adjuntos` ENABLE KEYS */;

-- Volcando estructura para tabla bd_files.sys_button
CREATE TABLE IF NOT EXISTS `sys_button` (
  `id_button` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `application` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_button`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bd_files.sys_button: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `sys_button` DISABLE KEYS */;
INSERT INTO `sys_button` (`id_button`, `description`, `name`, `application`, `title`) VALUES
	(1, 'Add Radicado', 'BtnAddRadicado', 'RADICADO', 'Radicado'),
	(2, 'Edir Radicado', 'BtnEditRadicado', 'RADICADO', 'Radicado'),
	(3, 'Anular Radicado', 'BtnAnuleRadicado', 'RADICADO', 'Radicado');
/*!40000 ALTER TABLE `sys_button` ENABLE KEYS */;

-- Volcando estructura para tabla bd_files.sys_canal
CREATE TABLE IF NOT EXISTS `sys_canal` (
  `id_canal` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_canal`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_files.sys_canal: 4 rows
/*!40000 ALTER TABLE `sys_canal` DISABLE KEYS */;
INSERT INTO `sys_canal` (`id_canal`, `description`, `status`) VALUES
	(1, 'WEB', 1),
	(2, 'PRESENCIAL', 1),
	(3, 'E-MAIL', 1),
	(4, 'OTRO', 1);
/*!40000 ALTER TABLE `sys_canal` ENABLE KEYS */;

-- Volcando estructura para tabla bd_files.sys_dependencia
CREATE TABLE IF NOT EXISTS `sys_dependencia` (
  `id_dependencia` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_dependencia`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_files.sys_dependencia: 3 rows
/*!40000 ALTER TABLE `sys_dependencia` DISABLE KEYS */;
INSERT INTO `sys_dependencia` (`id_dependencia`, `description`, `status`) VALUES
	(1, 'SISTEMAS', 1),
	(2, 'ARCHIVOS', 1),
	(3, 'OTRO.', 1);
/*!40000 ALTER TABLE `sys_dependencia` ENABLE KEYS */;

-- Volcando estructura para tabla bd_files.sys_icon
CREATE TABLE IF NOT EXISTS `sys_icon` (
  `icon` varchar(50) DEFAULT NULL,
  UNIQUE KEY `icon` (`icon`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bd_files.sys_icon: ~51 rows (aproximadamente)
/*!40000 ALTER TABLE `sys_icon` DISABLE KEYS */;
INSERT INTO `sys_icon` (`icon`) VALUES
	('fa-area-chart'),
	('fa-automobile'),
	('fa-balance-scale'),
	('fa-ban'),
	('fa-bar-chart'),
	('fa-barcode'),
	('fa-bars'),
	('fa-book'),
	('fa-bus'),
	('fa-calendar'),
	('fa-calendar-plus-o'),
	('fa-camera'),
	('fa-cart-arrow-down'),
	('fa-check'),
	('fa-check-square'),
	('fa-circle-o'),
	('fa-clock-o'),
	('fa-close'),
	('fa-cloud'),
	('fa-cloud-download'),
	('fa-cloud-upload'),
	('fa-code'),
	('fa-cog'),
	('fa-cogs'),
	('fa-commenting'),
	('fa-commenting-o'),
	('fa-database'),
	('fa-dollar'),
	('fa-edit'),
	('fa-envelope'),
	('fa-exclamation-triangle'),
	('fa-expeditedssl'),
	('fa-file-excel-o'),
	('fa-file-pdf-o'),
	('fa-file-picture-o'),
	('fa-files-o'),
	('fa-folder'),
	('fa-gear'),
	('fa-gears'),
	('fa-line-chart'),
	('fa-list'),
	('fa-list-ol'),
	('fa-sign-in'),
	('fa-table'),
	('fa-th'),
	('fa-thumbs-down'),
	('fa-thumbs-up'),
	('fa-truck'),
	('fa-upload'),
	('fa-user'),
	('fa-users');
/*!40000 ALTER TABLE `sys_icon` ENABLE KEYS */;

-- Volcando estructura para tabla bd_files.sys_menu
CREATE TABLE IF NOT EXISTS `sys_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `url` varchar(80) DEFAULT NULL,
  `icon` varchar(50) DEFAULT 'fa-circle-o',
  `root` int(11) DEFAULT '0' COMMENT 'RAIZ',
  `status` int(11) DEFAULT '1',
  `last_update` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT '100',
  PRIMARY KEY (`id_menu`),
  KEY `FK_menu_status` (`status`) USING BTREE,
  KEY `FK_menu_tipo_menu` (`type`) USING BTREE,
  CONSTRAINT `sys_menu_ibfk_1` FOREIGN KEY (`status`) REFERENCES `sys_status` (`id_status`),
  CONSTRAINT `sys_menu_ibfk_2` FOREIGN KEY (`type`) REFERENCES `sys_type_menu` (`id_type_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bd_files.sys_menu: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `sys_menu` DISABLE KEYS */;
INSERT INTO `sys_menu` (`id_menu`, `title`, `type`, `url`, `icon`, `root`, `status`, `last_update`, `modified_by`, `order`) VALUES
	(1, 'Usuarios', 3, 'Parameters', 'fa-gears', 0, 1, '2021-05-26 14:41:51', 3, 100),
	(2, 'Tipo Radicado', 2, 'TipoRadicado', 'fa-circle-o', 7, 1, '2021-05-26 14:41:51', 1, 100),
	(3, 'Roles', 2, 'Roles', 'fa-circle-o', 7, 1, '2021-05-26 14:41:51', 1, 100),
	(4, 'Usuarios', 2, 'User', 'fa-users', 1, 1, '2021-05-26 14:41:51', 2, 100),
	(5, 'Permisos Menu', 2, 'Permissions', 'fa-lock', 1, 1, '2021-05-26 14:41:51', 1, 100),
	(6, 'Permisos Botones', 2, 'Buttons', 'fa-lock', 1, 1, '2021-05-26 14:41:51', 1, 100),
	(7, 'Datos Maestros', 3, 'Parameters', 'fa-user-secret', 0, 1, '2021-05-26 14:41:51', 3, 100),
	(8, 'Tipo Documento', 2, 'TipoDocumento', 'fa-circle-o', 7, 1, '2021-05-26 16:01:58', 1, 100),
	(9, 'Dependencias', 2, 'Dependencias', 'fa-circle-o', 7, 1, '2021-05-26 16:02:35', 1, 100),
	(10, 'Canales', 2, 'Canal', 'fa-circle-o', 7, 1, '2021-05-26 16:03:08', 1, 100),
	(11, 'Radicados', 3, 'Radicados', 'fa-file-archive-o', 0, 1, '2021-05-27 09:41:43', 3, 100),
	(12, 'Listar', 2, 'Radicados', 'fa-circle-o', 11, 1, '2021-05-27 09:42:50', 1, 100);
/*!40000 ALTER TABLE `sys_menu` ENABLE KEYS */;

-- Volcando estructura para tabla bd_files.sys_radicado
CREATE TABLE IF NOT EXISTS `sys_radicado` (
  `id_radicado` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre_solicitante` varchar(200) DEFAULT NULL,
  `documento_solicitante` varchar(50) DEFAULT NULL,
  `telefono_solicitante` varchar(50) DEFAULT NULL,
  `direccion_solicitante` varchar(50) DEFAULT NULL,
  `id_canal` int(11) DEFAULT NULL,
  `asunto` varchar(200) DEFAULT NULL,
  `descripcion` mediumtext,
  `id_tipo_radicado` int(11) DEFAULT NULL,
  `id_dependencia` int(11) DEFAULT NULL,
  `id_tipo_documento` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT '1',
  `iv_key` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_radicado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_files.sys_radicado: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sys_radicado` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_radicado` ENABLE KEYS */;

-- Volcando estructura para tabla bd_files.sys_roles
CREATE TABLE IF NOT EXISTS `sys_roles` (
  `id_roles` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `last_update` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_roles`),
  KEY `FK_roles_status` (`status`) USING BTREE,
  CONSTRAINT `sys_roles_ibfk_1` FOREIGN KEY (`status`) REFERENCES `sys_status` (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bd_files.sys_roles: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `sys_roles` DISABLE KEYS */;
INSERT INTO `sys_roles` (`id_roles`, `description`, `status`, `last_update`, `modified_by`) VALUES
	(1, 'USUARIO ROOT', 1, '2021-05-25 15:47:09', 1),
	(2, 'AUXILIAR', 1, '2021-05-25 15:45:05', 1),
	(3, 'FUNCIONARIO', 1, '2021-05-25 15:44:56', 1),
	(4, 'OTRO', 1, '2021-05-25 15:47:02', 1);
/*!40000 ALTER TABLE `sys_roles` ENABLE KEYS */;

-- Volcando estructura para tabla bd_files.sys_roles_button
CREATE TABLE IF NOT EXISTS `sys_roles_button` (
  `id_rol` int(11) DEFAULT NULL,
  `id_button` int(11) DEFAULT NULL,
  KEY `FK_sys_roles_button_sys_button` (`id_button`) USING BTREE,
  KEY `Índice 3` (`id_rol`,`id_button`) USING BTREE,
  CONSTRAINT `sys_roles_button_ibfk_1` FOREIGN KEY (`id_button`) REFERENCES `sys_button` (`id_button`),
  CONSTRAINT `sys_roles_button_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `sys_roles` (`id_roles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bd_files.sys_roles_button: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sys_roles_button` DISABLE KEYS */;
INSERT INTO `sys_roles_button` (`id_rol`, `id_button`) VALUES
	(1, 1);
/*!40000 ALTER TABLE `sys_roles_button` ENABLE KEYS */;

-- Volcando estructura para tabla bd_files.sys_roles_menu
CREATE TABLE IF NOT EXISTS `sys_roles_menu` (
  `id_roles_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_roles` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_roles_menu`),
  UNIQUE KEY `id_roles_id_menu` (`id_roles`,`id_menu`) USING BTREE,
  KEY `FK_roles_menu_menu` (`id_menu`) USING BTREE,
  CONSTRAINT `sys_roles_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `sys_menu` (`id_menu`),
  CONSTRAINT `sys_roles_menu_ibfk_2` FOREIGN KEY (`id_roles`) REFERENCES `sys_roles` (`id_roles`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bd_files.sys_roles_menu: ~17 rows (aproximadamente)
/*!40000 ALTER TABLE `sys_roles_menu` DISABLE KEYS */;
INSERT INTO `sys_roles_menu` (`id_roles_menu`, `id_roles`, `id_menu`) VALUES
	(22, 1, 1),
	(15, 1, 2),
	(3, 1, 3),
	(4, 1, 4),
	(5, 1, 5),
	(6, 1, 6),
	(16, 1, 7),
	(17, 1, 8),
	(18, 1, 9),
	(19, 1, 10),
	(20, 1, 11),
	(21, 1, 12),
	(8, 2, 1),
	(9, 2, 4),
	(10, 3, 1),
	(12, 3, 4),
	(13, 3, 5),
	(14, 3, 6);
/*!40000 ALTER TABLE `sys_roles_menu` ENABLE KEYS */;

-- Volcando estructura para tabla bd_files.sys_seguimiento
CREATE TABLE IF NOT EXISTS `sys_seguimiento` (
  `id_seguimiento` int(11) NOT NULL AUTO_INCREMENT,
  `id_radicado` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_tipo_seguimiento` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `descripcion` longtext,
  PRIMARY KEY (`id_seguimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_files.sys_seguimiento: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `sys_seguimiento` DISABLE KEYS */;
INSERT INTO `sys_seguimiento` (`id_seguimiento`, `id_radicado`, `fecha`, `id_tipo_seguimiento`, `id_usuario`, `titulo`, `descripcion`) VALUES
	(1, 7, '2021-06-03 17:09:07', 1, 1, 'Asignación de caso', 'Se realiza asignación de caso'),
	(2, 7, '2021-06-03 17:09:40', 2, 1, 'Gestión de documento', 'Se solcita firma de');
/*!40000 ALTER TABLE `sys_seguimiento` ENABLE KEYS */;

-- Volcando estructura para tabla bd_files.sys_status
CREATE TABLE IF NOT EXISTS `sys_status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `hex` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bd_files.sys_status: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `sys_status` DISABLE KEYS */;
INSERT INTO `sys_status` (`id_status`, `description`, `color`, `hex`) VALUES
	(1, 'ACTIVO', 'success', '#b6ef9e'),
	(2, 'INACTIVO', 'warning', '#111'),
	(3, 'ELIMINADO', 'danger', '#dd4b39'),
	(4, 'ANULADO', 'default', '#b5bbc8');
/*!40000 ALTER TABLE `sys_status` ENABLE KEYS */;

-- Volcando estructura para tabla bd_files.sys_tipo_documento
CREATE TABLE IF NOT EXISTS `sys_tipo_documento` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_files.sys_tipo_documento: 3 rows
/*!40000 ALTER TABLE `sys_tipo_documento` DISABLE KEYS */;
INSERT INTO `sys_tipo_documento` (`id_tipo`, `description`, `status`) VALUES
	(1, 'RESOLUCIÓN', 1),
	(2, 'EVIDENCIA', 1),
	(3, 'OTRO', 1);
/*!40000 ALTER TABLE `sys_tipo_documento` ENABLE KEYS */;

-- Volcando estructura para tabla bd_files.sys_tipo_radicado
CREATE TABLE IF NOT EXISTS `sys_tipo_radicado` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `last_update` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bd_files.sys_tipo_radicado: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `sys_tipo_radicado` DISABLE KEYS */;
INSERT INTO `sys_tipo_radicado` (`id_tipo`, `description`, `status`, `last_update`, `modified_by`) VALUES
	(5, 'PETICIÓN', 1, '2021-05-26 15:04:53', 1),
	(6, 'QUEJA', 1, '2021-05-26 15:05:40', 1),
	(7, 'RECLAMO', 1, '2021-05-26 15:05:49', 1),
	(8, 'SUGERENCIA', 1, '2021-05-26 15:06:08', 1),
	(9, 'DENUNCIA', 1, '2021-05-26 15:07:06', 1);
/*!40000 ALTER TABLE `sys_tipo_radicado` ENABLE KEYS */;

-- Volcando estructura para tabla bd_files.sys_tipo_seguimiento
CREATE TABLE IF NOT EXISTS `sys_tipo_seguimiento` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_files.sys_tipo_seguimiento: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `sys_tipo_seguimiento` DISABLE KEYS */;
INSERT INTO `sys_tipo_seguimiento` (`id_tipo`, `description`, `status`) VALUES
	(1, 'Solicitar Documentos', 1),
	(2, 'Reasignar Responsable', 1),
	(3, 'Seguimiento General', 1),
	(4, 'Cierre', 1),
	(5, 'Enviar Respuesta', 1);
/*!40000 ALTER TABLE `sys_tipo_seguimiento` ENABLE KEYS */;

-- Volcando estructura para tabla bd_files.sys_type_menu
CREATE TABLE IF NOT EXISTS `sys_type_menu` (
  `id_type_menu` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_type_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bd_files.sys_type_menu: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `sys_type_menu` DISABLE KEYS */;
INSERT INTO `sys_type_menu` (`id_type_menu`, `description`) VALUES
	(1, 'Raiz - Menu principal sin submenu'),
	(2, 'Nivel - Submenu'),
	(3, 'Raiz Con Nivel - Menu principal con submenu'),
	(4, 'Nivel Con Nivel - Submenu con Submenus');
/*!40000 ALTER TABLE `sys_type_menu` ENABLE KEYS */;

-- Volcando estructura para tabla bd_files.sys_users
CREATE TABLE IF NOT EXISTS `sys_users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `cc` varchar(50) DEFAULT NULL,
  `id_dependencia` varchar(50) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `last_entry` datetime DEFAULT NULL,
  `last_date` date DEFAULT '2018-12-01',
  `avatar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_users`),
  KEY `FK_users_status` (`status`) USING BTREE,
  KEY `FK_users_roles` (`rol`) USING BTREE,
  CONSTRAINT `sys_users_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `sys_roles` (`id_roles`),
  CONSTRAINT `sys_users_ibfk_2` FOREIGN KEY (`status`) REFERENCES `sys_status` (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bd_files.sys_users: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `sys_users` DISABLE KEYS */;
INSERT INTO `sys_users` (`id_users`, `name`, `cc`, `id_dependencia`, `user`, `password`, `rol`, `email`, `status`, `last_entry`, `last_date`, `avatar`) VALUES
	(1, 'ADMINISTRADOR', '1043003865', '1', 'admin', '70873e8580c9900986939611618d7b1e', 1, 'jose.narvaez@sonovista.co', 1, '2021-06-03 15:48:53', '2021-05-25', 'avatar.png'),
	(2, 'Otro', 'wewerqr', '2', 'adminp', 'd9b1d7db4cd6e70935368a1efb10e377', 3, 'santos_jrng@hotmail.com', 1, '2021-05-26 15:53:01', '2017-01-01', 'avatar_morena.png');
/*!40000 ALTER TABLE `sys_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
