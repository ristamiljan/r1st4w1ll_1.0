/*
Migrations doesn't create database, you can use homestead database(config/database.php)
or to create your own as we recommend:  create database if not exists r1st4w4ll;
*/

create table if not exists users(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) UNIQUE
);