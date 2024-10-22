create table admins
(
id int auto_increment primary key,
name varchar(50) not null,
username varchar(20) not null unique,
email varchar(50) not null unique,
password varchar(50) not null,
role char(10) not null,
status boolean default 0,
created_at datetime not null,
update_at datetime null
);


create table animal_categories
(
id int auto_increment primary key,
name varchar(50) not null,
status boolean default 0,
created_at datetime not null,
update_at datetime null
created_by int not null,
update_by int null
);


create table animals
(
id int auto_increment primary key,
animal_category_id int not null,
name varchar(50) not null,
breed varchar(50),
size varchar(30),
age int,
color varchar(40),
gender varchar(50),
status boolean default 0,
created_at datetime not null,
update_at datetime null
created_by int not null,
update_by int null
);
