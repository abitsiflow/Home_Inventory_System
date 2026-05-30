create database home_inventory;
use home_inventory;

CREATE TABLE categories (
    id INT IDENTITY(1,1) PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE items (
    id INT IDENTITY(1,1) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category_id INT FOREIGN KEY REFERENCES categories(id),
    quantity INT NOT NULL DEFAULT 0,
    status VARCHAR(20) NOT NULL DEFAULT 'In Stock'
                CHECK (status IN ('In Stock', 'Low Stock', 'Out of Stock')),
    date_added  DATE NOT NULL DEFAULT GETDATE()
);

