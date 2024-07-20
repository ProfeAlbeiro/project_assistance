-- ------------------------------------------------------------------------------------- --
-- 02. Bases de Datos. ----------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------- --
SHOW DATABASES;
USE DB_ASSISTANCE;
DROP DATABASE DB_ASSISTANCE;

-- No funciona en azure
-- SET time_zone = '-05:00';
-- SET time_zone = 'US/Pacific';

-- ------------------------------------------------------------------------------------- --
-- 03. Mostrar Tablas. ----------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------- --
SHOW TABLES;

-- ------------------------------------------------------------------------------------- --
-- 04. Mostrar Columnas. --------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------- --
SHOW COLUMNS FROM ROLES;

DESCRIBE COLLEGE;
DESCRIBE ROLES;
DESCRIBE USERS;
DESCRIBE TEACHERS;
DESCRIBE STUDENTS;
DESCRIBE GUARDIANS;
DESCRIBE GUARDIANS_STUDENTS;
DESCRIBE JOURNES;
DESCRIBE GRADES;
DESCRIBE COURSES;
DESCRIBE JOURNES_GRADES_COURSES;
DESCRIBE ATTENDS;
DESCRIBE ASSISTANCES;
DESCRIBE JUSTIFICATIONS;