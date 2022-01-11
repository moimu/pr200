DROP DATABASE IF EXISTS  `zonas`;
CREATE DATABASE `zonas`;
USE  `zonas`;
CREATE TABLE `zonas`(
    `idzona` SMALLINT UNSIGNED AUTO_INCREMENT,
    `nombre` VARCHAR(100),
    `titulo` VARCHAR(100),
    PRIMARY KEY (idzona)
);
CREATE TABLE `areas`(
    `idarea` SMALLINT UNSIGNED AUTO_INCREMENT,
    `nombre` VARCHAR(100),
    `titulo` VARCHAR(100),
    `idzona` SMALLINT UNSIGNED,
    PRIMARY KEY (idarea),
    FOREIGN KEY (`idzona`) REFERENCES `zonas` (`idzona`)
);
CREATE TABLE `sensores`(
    `idsensor` SMALLINT UNSIGNED AUTO_INCREMENT,
    `nombre` VARCHAR(100),
    PRIMARY KEY (idsensor)
);
CREATE TABLE `magnitudes`(
    `idmagnitud` SMALLINT UNSIGNED AUTO_INCREMENT,
    `nombre` VARCHAR(100),
    `idsensor` SMALLINT UNSIGNED,
    PRIMARY KEY (idmagnitud),
    FOREIGN KEY (`idsensor`) REFERENCES `sensores` (`idsensor`)
);
CREATE TABLE `clientes`(
    `idcliente` INT UNSIGNED AUTO_INCREMENT,
    `uid` VARCHAR(20),
    PRIMARY KEY (idcliente)
);
CREATE TABLE `mediciones`(
    `idmedicion` BIGINT UNSIGNED AUTO_INCREMENT,
    `fh` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `valor` DECIMAL(5,2) DEFAULT 1,
    `idzona` SMALLINT UNSIGNED,
    `idarea` SMALLINT UNSIGNED,
    `idmagnitud` SMALLINT UNSIGNED,
    `idcliente` INT UNSIGNED DEFAULT 1,
    PRIMARY KEY (idmedicion),
    FOREIGN KEY (`idzona`) REFERENCES `zonas` (`idzona`),
    FOREIGN KEY (`idarea`) REFERENCES `areas` (`idarea`),
    FOREIGN KEY (`idmagnitud`) REFERENCES `magnitudes` (`idmagnitud`),
    FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`)
);
CREATE TABLE `servicios`(
    `idservicio` SMALLINT UNSIGNED AUTO_INCREMENT,
    `url` VARCHAR(1000),
    PRIMARY KEY (idservicio)
);
CREATE TABLE `descuentosclima`(
    `iddescuento` SMALLINT UNSIGNED AUTO_INCREMENT,
    `cantluz` TINYINT,
    `temperatura` TINYINT,
    `humedad` TINYINT,
    `descomida` VARCHAR(2),
    `desbebida` VARCHAR(2),
    PRIMARY KEY (iddescuento)
);

INSERT INTO `zonas`(`nombre`,`titulo`)
VALUES ('Z100','Sevilla, Puerto de Indias'),('Z200','Puerta de América'),
('Z300','Amazonia'),('Z400','La Guarida de los Piratas'),('Z500','El Dorado');

INSERT INTO `areas`(`nombre`,`titulo`,`idzona`)
VALUES ('','','1'),('A101','El Desafío','1'),('B101','La Venta del Puerto','1'),
('A201','Anaconda','2'),('A202','Navío Barbarroja','2'),('B201','La Cabaña Criolla','2'),
('A301','Jaguar','3'),('A302','Iguazú','3'),('A303','Topetazú','3'),
('B301','El Fuerte','3'),('B302','El Arsenal','3'),
('A401','Dimensión','4'),('A402','Los Toneles','4'),('B401','El Ancla','4'),('B402','La Taberna','4'),
('A501','Rápidos del Orinoco','5'),('B501','Veracruz','5'),('B502','Come-come','5');

INSERT INTO `sensores`(`nombre`) 
VALUES ('pulsador'),('rfid'),('fotoresistencia'),('DHT11');

INSERT INTO `magnitudes` (`nombre`,`idsensor`)
VALUES ('pulsaciones','1'),('entradas','2'),('luminosidad','3'),
('temperatura','4'),('humedad','4');

INSERT INTO `clientes`(`uid`)
VALUES (''),('qq1r74yz'),('tyh5g6vb');

-- Luminosidad para Zona Z400
INSERT INTO `mediciones`(`valor`,`idzona`,`idarea`,`idmagnitud`) 
VALUES (4.02,'4','1','3'),(5.50,'4','1','3'),(8.66,'4','1','3'),
(20.55,'4','1','3'),(41.08,'4','1','3'),(2.00,'4','1','3'),
(77.66,'4','1','3'),(41.74,'4','1','3'),(4.88,'4','1','3'),
(5.51,'4','1','3'),(8.55,'4','1','3'),(20.95,'4','1','3'),
(41.00,'4','1','3'),(2.00,'4','1','3'),(77.11,'4','1','3'),
(41.15,'4','1','3'),(4.11,'4','1','3'),(5.31,'4','1','3'),
(8.41,'4','1','3'),(20.99,'4','1','3'),(41.22,'4','1','3'),
(2.65,'4','1','3'),(77.10,'4','1','3'),(41.87,'4','1','3');

-- Entradas para área B401
INSERT INTO `mediciones`(`idzona`,`idarea`,`idmagnitud`,`idcliente`) 
VALUES ('4','14','2','2'),('4','14','2','2'),('4','14','2','2'),
('4','14','2','3'),('4','14','2','2'),('4','14','2','3'),
('4','14','2','3'),('4','14','2','2'),('4','14','2','3'),
('4','14','2','3'),('4','14','2','2'),('4','14','2','3'),
('4','14','2','3'),('4','14','2','2'),('4','14','2','3');

-- Entradas para área B402
INSERT INTO `mediciones`(`idzona`,`idarea`,`idmagnitud`,`idcliente`) 
VALUES ('4','15','2','2'),('4','15','2','1'),('4','15','2','2'),
('4','15','2','2'),('4','15','2','2'),('4','15','2','2'),
('4','15','2','2'),('4','15','2','2');

-- url para APIs usadas  pruebas respaldo + colaborativas
INSERT INTO `servicios`(`url`)
VALUES ('https://newflow.tech/pr-200-jsonPruebas/z100-1.php'),
('https://newflow.tech/pr-200-jsonPruebas/z100-2.php'),
('https://newflow.tech/pr-200-jsonPruebas/z200-1.php'),
('https://newflow.tech/pr-200-jsonPruebas/z200-2.php'),
('https://newflow.tech/pr-200-jsonPruebas/z300-1.php'),
('https://newflow.tech/pr-200-jsonPruebas/z300-2.php'),
('https://newflow.tech/pr-200-jsonPruebas/z400-1.php'), 
('https://newflow.tech/pr-200-jsonPruebas/z400-2.php'),
('https://newflow.tech/pr-200-jsonPruebas/z500-1.php'),
('https://newflow.tech/pr-200-jsonPruebas/z500-2.php'),
('http://arduino.proyectos-andres.tech/zonas/pr200/'),
('http://samuel080.me'),
('http://pr200.rafadaw.software/app/mediciones/'),
('https://pr200.jose-velazquez-daw.rocks/api.php'),
('manu.......'),
('ballesteros.......'),
('pablo.........'),
('https://pr200.newflow.tech/api/api.php'),
('http://ismaeldaw080.me/apiIsmael.php'),
('ocete.......');

INSERT INTO `descuentosclima`(`cantluz`,`temperatura`,`humedad`,`descomida`,`desbebida`)
VALUES(49,19,49,'si','si'),
(49,19,50,'no','si'),
(49,20,49,'si','no'),
(49,20,50,'si','no'),
(50,19,49,'no','si'),
(50,19,50,'si','si'),
(50,20,49,'si','no'),
(50,20,50,'si','si');