CREATE DATABASE yeticave
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE UTF8_GENERAL_CI;

USE yeticave;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR NOT NULL UNIQUE,
    code VARCHAR
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    creation_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    email  VARCHAR NOT NULL UNIQUE,
    name CHAR(64) NOT NULL,
    password CHAR(64) NOT NULL,
    contacts VARCHAR NOT NULL
);

CREATE TABLE lots (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_add TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    name CHAR(64) NOT NULL,
    description TEXT,
    image_link CHAR(64),
    price_start INT NOT NULL,
    data_final TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    step_bid INT NOT NULL,
    author INT NOT NULL,
    winner INT NOT NULL,
    category INT NOT NULL
);

CREATE TABLE bid (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data_create TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    price INT NOT NULL,
    user_id INT NOT NULL,
    lot_id INT NOT NULL
);

CREATE UNIQUE INDEX email ON users(email);
CREATE UNIQUE INDEX category_name ON categories(name);
CREATE INDEX lot ON lots(name);

