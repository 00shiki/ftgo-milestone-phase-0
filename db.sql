CREATE DATABASE ultralingo_db;

USE ultralingo_db;

CREATE TABLE users (
    user_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(20),
    password VARCHAR(60)
);

CREATE TABLE classes (
    class_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    description TEXT,
    image VARCHAR(100),
    price INT
);

CREATE TABLE carts (
    user_id INT UNSIGNED,
    class_id INT UNSIGNED,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (class_id) REFERENCES classes(class_id)
);

CREATE TABLE contacts (
    contact_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(20),
    phone_number VARCHAR(12),
    message TEXT
);

INSERT INTO classes (
    name,
    description,
    image,
    price
) VALUES
("Bahasa Jepang Dasar", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam, error?", "/assets/img/bahasa_jepang_dasar.jpeg", 50000),
("Bahasa Jepang Menengah", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam, error?", "/assets/img/bahasa_jepang_menengah.jpg", 100000),
("Bahasa Jepang Lanjutan", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam, error?", "/assets/img/bahasa_jepang_lanjutan.jpeg", 150000),
("Bahasa Korea Dasar", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam, error?", "/assets/img/bahasa_korea_dasar.jpg", 50000),
("Bahasa Korea Menengah", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam, error?", "/assets/img/bahasa_korea_menengah.jpg", 100000),
("Bahasa Korea Lanjutan", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam, error?", "/assets/img/bahasa_korea_lanjutan.jpg", 150000),
("Bahasa Mandarin Dasar", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam, error?", "/assets/img/bahasa_mandarin_dasar.jpg", 50000),
("Bahasa Mandarin Lanjutan", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam, error?", "/assets/img/bahasa_mandarin_lanjutan.jpg", 100000);
