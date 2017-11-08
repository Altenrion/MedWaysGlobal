# init.sql

CREATE DATABASE IF NOT EXISTS vuznauka DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE vuznauka;
SOURCE /db/vuznauka.sql;

create user altenrion identified by 'altenrion-db';
grant all privileges on vuznauka.* to 'altenrion'@'%';
grant all privileges on vuznauka.* to 'root'@'%';
