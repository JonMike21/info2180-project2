DROP DATABASE IF EXISTS dolphin_crm;
CREATE DATABASE dolphin_crm;
USE dolphin_crm;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `id` INTEGER AUTO_INCREMENT, 
    `firstname` VARCHAR(45) NOT NULL,
    `lastname` VARCHAR(45) NOT NULL,
    `password` VARCHAR(45) NOT NULL,
    `email` VARCHAR(45) NOT NULL,
    `role` VARCHAR(45) NOT NULL, 
    `created_at` DATETIME NOT NULL,
    PRIMARY KEY(`id`)
);

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
    `id` INTEGER AUTO_INCREMENT,
    `title` VARCHAR(45) NOT NULL,
    `firstname` VARCHAR(45) NOT NULL,
    `lastname` VARCHAR(45) NOT NULL,
    `email` VARCHAR(45) NOT NULL,
    `telephone` VARCHAR(45) NOT NULL,
    `company` VARCHAR(45) NOT NULL,
    `type` VARCHAR(45) NOT NULL,
    `assigned_to` INTEGER NOT NULL,
    `created_by` INTEGER NOT NULL, 
    `created_at` DATETIME NOT NULL,
    `updated_at` DATETIME NOT NULL,
    PRIMARY KEY(`id`)
);

DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes` (
    `id` INTEGER AUTO_INCREMENT,
    `contact_id` INTEGER NOT NULL,
    `comment` TEXT(45) NOT NULL,
    `created_by` INTEGER NOT NULL,
    `created_at` DATETIME NOT NULL,
    PRIMARY KEY(`id`)
);

INSERT INTO `users` VALUES 
(1,'John','Brown','pass123','admin@project.com','Admin',''),
(2,'Jordan','Dwyer','pass1234','admin@project.com','Admin',''),
(3,'Lenroy','Hinds','pass1423','admin@project.com','Admin',''),
(4,'Jim','Williams','pass1235','tester@project.com','Tester',''),
(5,'Tin','Can','pass1623','tester@project.com','Tester','');