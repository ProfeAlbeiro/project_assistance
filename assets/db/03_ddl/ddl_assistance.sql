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

DESCRIBE ROLES;
DESCRIBE USERS;
DESCRIBE TEACHERS;
DESCRIBE STUDENTS;
DESCRIBE ATTENDANTS;
DESCRIBE ATTENDANTS_STUDENTS;
DESCRIBE JOURNES;
DESCRIBE GRADES;
DESCRIBE GROUPS;
DESCRIBE JOURNES_GRADES_GROUPS;
DESCRIBE ASSISTANCES;
DESCRIBE JUSTIFICATIONS;