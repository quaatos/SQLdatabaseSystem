DROP DATABASE IF EXISTS `quaatos`;
CREATE DATABASE `quaatos`;
USE `quaatos`;
CREATE TABLE `data` (
  id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  age INT,
  Email VARCHAR(100)
);

INSERT INTO `data` (name, age, Email)
VALUES ('quaatos', '17', 'quaatos@gmail.com')

--add whatever you want to add.
--Do not forget, that if you're gonna add stuff in this file, that you will have to update the php
--if you want to run this, you have to use the localhost. Otherwise, the php can not be converted to html.
