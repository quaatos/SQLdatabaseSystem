DROP DATABASE IF EXISTS `quaatos`;
CREATE DATABASE `quaatos`;
USE `quaatos`;

CREATE TABLE `users` (
  id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255),
  age INT,
  Email VARCHAR(100)
);

INSERT INTO `users` (name, age, Email)
VALUES ('quaatos', '17', 'quaatos@gmail.com');

INSERT INTO `users` (name, age, Email)
VALUES ('joe', '69', 'joe@mama.hub');

INSERT INTO `users` (name, age, Email)
VALUES ('bardo', '45', 'whois@bardo.com');

INSERT INTO `users` (name, age, Email)
VALUES ('emil', '10', 'emil@protonmail.tor');

INSERT INTO `users` (name, age, Email)
VALUES ('arnold', '78', 'ArnoldSn@whaha.zet');

INSERT INTO `users` (name, age, Email)
VALUES ('upsilon', '1200', 'ups@postarrive.co.uk');

INSERT INTO `users` (name, age, Email)
VALUES ('vlad', '87', 'vlad@impalor.sl');

INSERT INTO `users` (name, age, Email)
VALUES ('stalin', '120', 'stalin@ussr.ru');
