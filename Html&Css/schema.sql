DROP DATABASE IF EXISTS dolphin_crm;
CREATE DATABASE dolphin_crm;
USE dolphin_crm;

DROP TABLE IF EXISTS users;
CREATE TABLE Users (
    id INTEGER IDENTITY(0,1) PRIMARY KEY, 
    firstname VARCHAR NOT NULL,
    lastname VARCHAR NOT NULL,
    password VARCHAR NOT NULL,
    email VARCHAR NOT NULL,
    role VARCHAR NOT NULL, 
    created_at DATETIME NOT NULL default 'Date()',
);

DROP TABLE IF EXISTS Contacts;
CREATE TABLE Contacts (
    id INTEGER IDENTITY(0,1) PRIMARY KEY,
    title VARCHAR NOT NULL,
    firstname VARCHAR NOT NULL,
    lastname VARCHAR NOT NULL,
    email VARCHAR NOT NULL,
    telephone VARCHAR NOT NULL,
    company VARCHAR NOT NULL,
    type VARCHAR NOT NULL,
    assigned_to INTEGER NOT NULL,
    created_by INTEGER NOT NULL, 
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
);

DROP TABLE IF EXISTS Notes;
CREATE TABLE Notes (
    id INTEGER IDENTITY(0,1) PRIMARY KEY,
    contact_id INTEGER NOT NULL,
    comment TEXT NOT NULL,
    created_by INTEGER NOT NULL,
    created_at DATETIME NOT NULL default 'Date()',
);

/**INSERT INTO Users VALUES ('$fname','$lname','$password',admin@project.com),
('fname','lname','password123',admin@project.com,'',Date()),
('fname','lname','password123',admin@project.com),
('fname','lname','password123',admin@project.com),
('fname','lname','password123',admin@project.com);*/