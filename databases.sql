-- Create database `expensemanager`;
-- show databases; 

-- use `expensemanager`;
-- drop table users;

-- CREATE TABLE roles (
-- 	roles_id INT AUTO_INCREMENT PRIMARY KEY Not Null,
--     display_name varchar(45),
--     `description` varchar(200),
--     created_at DATE DEFAULT (CURDATE())
-- );

CREATE TABLE IF NOT EXISTS `users`(
	id INT AUTO_INCREMENT PRIMARY KEY Not Null,
    name varchar(100),
    email varchar(100),
    password varchar(250),
    role varchar(100),
    updated_at timestamp,
    created_at DATE DEFAULT (CURDATE())
);

-- ALTER TABLE expenses change users_id id INT;
-- ALTER TABLE users CHANGE users_roleId role varchar(45);

-- describe expenses;

-- create table if not exists expenses(
-- 	expenses_id INT AUTO_INCREMENT PRIMARY KEY Not Null,
--     expense_category varchar(45),
--     `description` varchar(200),
--     entry_date date,
--     created_at DATE DEFAULT (CURDATE()),
--     usersExpenses_id int Not Null,
--     foreign key (usersExpenses_id) references users(id)
-- );

-- create table if not exists expenseCategory(
--  	category_id INT AUTO_INCREMENT PRIMARY KEY Not Null,
--      category_name varchar(45),
--      `description` varchar(200),
--      created_at DATE DEFAULT (CURDATE()),
--      expenses_id INT Not Null,
--      foreign key (expenses_id) references expenses(expenses_id)
-- );