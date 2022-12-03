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
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

ALTER TABLE `contacts`  
    ADD CONSTRAINT `fk_contacts1` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`),  
    ADD CONSTRAINT `fk_contacts2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes` (
    `id` INTEGER AUTO_INCREMENT,
    `contact_id` INTEGER NOT NULL,
    `comment` TEXT(45) NOT NULL,
    `created_by` INTEGER NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`) 
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

ALTER TABLE `notes`  
    ADD CONSTRAINT `fk_notes_contacts1` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`),
    ADD CONSTRAINT `fk_notes_contacts2` FOREIGN KEY (`created_by`) REFERENCES `contacts` (`id`);

INSERT INTO `users` VALUES 
(NULL,'John','Brown','pass123','admin@project.com','Admin',CURRENT_TIMESTAMP),
(NULL,'Jordan','Dwyer','pass1234','admin@project.com','Admin',CURRENT_TIMESTAMP),
(NULL,'Lenroy','Hinds','pass1423','admin@project.com','Admin',CURRENT_TIMESTAMP),
(NULL,'Jim','Williams','pass1235','tester@project.com','Tester',CURRENT_TIMESTAMP),
(NULL,'Tin','Can','pass1623','tester@project.com','Tester',CURRENT_TIMESTAMP);

INSERT INTO `contacts` VALUES 
(NULL,'Manager','Johnny','Brown','Rus@project.com','8994231','CompanyRUs','Sales Lead',2,1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
(NULL,'Manager','Jack','Daniels','Rus@project.com','8994231','CompanyRUs','Sales Lead',2,1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
(NULL,'Asst Manager','Janai','Williams','Rus@project.com','8994231','CompanyRUs','Support',2,1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);

INSERT INTO `notes` VALUES 
(NULL,1,'Johnny made this note',1,CURRENT_TIMESTAMP),
(NULL,2,'Jack made this noe',2,CURRENT_TIMESTAMP),
(NULL,1,'Support is a bad role',1,CURRENT_TIMESTAMP);