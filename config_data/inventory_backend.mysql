DROP DATABASE IF EXISTS home_inventory;
CREATE DATABASE home_inventory;
USE home_inventory;

CREATE TABLE categories (
    id   INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE items (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(255) NOT NULL,
    category_id INT,
    quantity    INT NOT NULL DEFAULT 0,
    status      ENUM('In Stock', 'Low Stock', 'Out of Stock') NOT NULL DEFAULT 'In Stock',
    date_added  DATE NOT NULL DEFAULT (CURDATE()),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

INSERT INTO categories (name) VALUES
('Electronics'),
('Furniture'),
('Stationery'),
('Appliances'),
('Tools');