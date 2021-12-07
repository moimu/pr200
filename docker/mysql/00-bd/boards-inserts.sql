DROP DATABASE IF EXISTS  `zonas`;
CREATE DATABASE `zonas`;
USE  `zonas`;

CREATE TABLE `Z400`(
    `idregistro` BIGINT UNSIGNED AUTO_INCREMENT,
    `fh` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `cantluz` DECIMAL(5,2),
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
VALUES ('4.02'),('5.50'),('8.66'),('20.55'),('41.08'),('2.00'),('77.66'),('41.74'),
('4.88'),('5.51'),('8.55'),('20.95'),('41.00'),('2.00'),('77.11'),('41.15'),
('4.11'),('5.31'),('8.41'),('20.99'),('41.22'),('2.65'),('77.10'),('41.87');

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