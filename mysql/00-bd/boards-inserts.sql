DROP DATABASE IF EXISTS  `zonas`;
CREATE DATABASE `zonas`;
USE  `zonas`;

CREATE TABLE `Z400`(
    `idregistro` BIGINT UNSIGNED AUTO_INCREMENT,
    `fh` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `cantluz` INT,
    PRIMARY KEY (idregistro)
);

CREATE TABLE `B401`(
    `idregistro`BIGINT UNSIGNED AUTO_INCREMENT,
    `fh` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `entrada` BIT DEFAULT 1,
    PRIMARY KEY (idregistro)
);

CREATE TABLE `B402`(
    `idregistro`BIGINT UNSIGNED AUTO_INCREMENT,
    `fh` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `entrada` BIT DEFAULT 1,
    PRIMARY KEY (idregistro)
);


INSERT INTO `Z400`(`cantluz`) 
VALUES ('4'),('5'),('8'),('20'),('41'),('2'),('77'),('41'),
('4'),('5'),('8'),('20'),('41'),('2'),('77'),('41'),
('4'),('5'),('8'),('20'),('41'),('2'),('77'),('41');

INSERT INTO `B401` 
VALUES (),(),(),(),(),(),(),(),
(),(),(),(),(),(),(),(),(),(),
(),(),(),(),(),(),(),(),(),(),
(),(),(),(),(),(),(),(),(),();

INSERT INTO `B402` 
VALUES (),(),(),(),(),(),(),(),
(),(),(),(),(),(),(),(),(),(),
(),(),(),(),(),(),(),(),(),(),
(),(),(),(),(),(),(),(),(),();