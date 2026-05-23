create database home_inventory;
use home_inventory;

create table items (
    id int identity(1,1) primary key,
    name varchar(255) not null,
    description text,
    quantity int not null,
    location varchar(255)
);