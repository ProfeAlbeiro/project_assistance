/* ****************************************************************************************************** */
/* -------------------------------------------- 01. INSERTAR -------------------------------------------- */
/* ****************************************************************************************************** */

-- ------------------------------------------------------------------------------------------------------ --
-- 01.01. Insertar Roles. ------------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------------------------ --
-- Insertar Rol Administrador
INSERT INTO ROLES VALUES
(1, 'admin');
SELECT * FROM ROLES;

-- Insertar demás Roles
INSERT INTO ROLES VALUES
(2, 'profesor'),
(3, 'estudiante'),
(4, 'acudiente');
SELECT * FROM ROLES;

-- ------------------------------------------------------------------------------------------------------ --
-- 01.02. Insertar Usuarios. ---------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------------------------ --
-- Insertar Usuarios Administradores
INSERT INTO USERS VALUES
(14785, 1, 'Efren', 'efren@colegio.edu.co', '8cb2237d0679ca88db6464eac60da96345513964', 1);
SELECT * FROM USERS;

-- Insertar demás Usuarios
INSERT INTO `users` VALUES
(65465, 2, 'Julian', 'julian@colegio.edu.co', '8cb2237d0679ca88db6464eac60da96345513964', 1),
(54564, 3, 'Pepito', 'pepito@colegio.edu.co', '8cb2237d0679ca88db6464eac60da96345513964', 1),
(87897, 3, 'Marinita', 'marinita@colegio.edu.co', '8cb2237d0679ca88db6464eac60da96345513964', 1),
(45648, 3, 'Josefito', 'josefito@colegio.edu.co', '8cb2237d0679ca88db6464eac60da96345513964', 1),
(78972, 4, 'Pedro', 'marinita@colegio.edu.co', '8cb2237d0679ca88db6464eac60da96345513964', 1),
(96325, 4, 'Carlos', 'marinita@colegio.edu.co', '8cb2237d0679ca88db6464eac60da96345513964', 1);
SELECT * FROM USERS;

-- Insertar Profesores
INSERT INTO TEACHERS VALUES
(65465);
SELECT * FROM TEACHERS;

-- Insertar Estudiantes
INSERT INTO STUDENTS VALUES
(54564, '6', 'diurna'),
(87897, '7', 'noche'),
(45648, '8', 'diurno');
SELECT * FROM STUDENTS;

-- Insertar Acudientes
INSERT INTO ATTENDANTS VALUES
(78972),
(96325);
SELECT * FROM ATTENDANTS;

-- Asociar Acudientes con Estudiantes
INSERT INTO ATTENDANTS_STUDENTS VALUES
(54564, 78972),
(87897, 78972),
(45648, 96325);
SELECT * FROM ATTENDANTS_STUDENTS;

-- ------------------------------------------------------------------------------------------------------ --
-- 01.03. Insertar Jornadas. ---------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------------------------ --
INSERT INTO WORKDAYS VALUES
(0, 'Diurna'),
(1, 'Tarde'),
(2, 'Noche');
SELECT * FROM WORKDAYS;

-- ------------------------------------------------------------------------------------------------------ --
-- 01.04. Insertar Grados. ------------------------------------------------------------------------------ --
-- ------------------------------------------------------------------------------------------------------ --
INSERT INTO GRADES VALUES
(0, 'Transición'),
(1, 'Primero'),
(2, 'Segundo'),
(3, 'Tercero'),
(4, 'Cuarto'),
(5, 'Quinto'),
(6, 'Sexto'),
(7, 'Séptimo'),
(8, 'Octavo'),
(9, 'Noveno'),
(10, 'Décimo'),
(11, 'Undécimo');
SELECT * FROM GRADES;

-- ------------------------------------------------------------------------------------------------------ --
-- 01.05. Insertar Grupos. ------------------------------------------------------------------------------ --
-- ------------------------------------------------------------------------------------------------------ --
INSERT INTO GROUPS VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');
SELECT * FROM GROUPS;

-- ------------------------------------------------------------------------------------------------------ --
-- 01.06. Asociar Estudiantes con Jornada, Grado y Curso. ----------------------------------------------- --
-- ------------------------------------------------------------------------------------------------------ --
INSERT INTO WORKDAYS_GRADES_GROUPS VALUES
(54564, 0, 1),
(87897, 1, 2),
(45648, 2, 3);
SELECT * FROM WORKDAYS_GRADES_GROUPS;

-- ------------------------------------------------------------------------------------------------------ --
-- 01.07. Insertar Estado. ------------------------------------------------------------------------------ --
-- ------------------------------------------------------------------------------------------------------ --
INSERT INTO ESTADO VALUES
(1,"Si"),
(2,"No"),
(3,"Tarde");
SELECT * FROM ESTADO;

-- ------------------------------------------------------------------------------------------------------ --
-- 01.08. Insertar Asistencias. ------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------------------------ --
-- Insertar Asistencia Estudiantes a tiempo y tarde
INSERT INTO ASSISTANCES VALUES
(87897, 1, "2024-06-06", "12:30"),
(45648, 3, "2024-06-06", "12:50");
SELECT * FROM ASSISTANCES;

-- Insertar Inasistencia de Estudiantes.
INSERT INTO ASSISTANCES (student_id, state_id, assistance_date) VALUES
(54564, 2, "2024-06-06");
SELECT * FROM ASSISTANCES;


-- ------------------------------------------------------------------------------------------------------ --
-- 01.09. Insertar Justificación. ----------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------------------------ --
INSERT INTO JUSTIFICATIONS VALUES
(65465, 54564, 78972, 1, "Cita Médica", 1),
(65465, 45648, 96325, 2, NULL, 0);



/* ****************************************************************************************************** */
/* ------------------------------------------- 02. ACTUALIZAR ------------------------------------------- */
/* ****************************************************************************************************** */

-- ------------------------------------------------------------------------------------------------------ --
-- 02.01. Actualizar Roles. ----------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------------------------ --
UPDATE ROLES SET 
rol_name = 'teacher'
WHERE rol_id = 2;

-- ------------------------------------------------------------------------------------------------------ --
-- 02.02. Actualizar Usuarios. -------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------------------------ --
UPDATE USERS SET 
user_name = 'Jorge'
WHERE user_id = '2';

-- ------------------------------------------------------------------------------------------------------ --
-- 02.03. Actualizar Asistencia. ------------------------------------------------------------------------ --
-- ------------------------------------------------------------------------------------------------------ --
UPDATE ASISTENCIA SET 
estado_id = 2
WHERE estudiante_id = 87897;



/* ****************************************************************************************************** */
/* -------------------------------------------- 03. ELIMINAR -------------------------------------------- */
/* ****************************************************************************************************** */

-- ------------------------------------------------------------------------------------------------------ --
-- 03.01. Eliminar Roles. ------------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------------------------ --
DELETE FROM ROLES
WHERE rol_id = '4';
SELECT * FROM ROLES;

-- ------------------------------------------------------------------------------------------------------ --
-- 03.02. Eliminar Usuarios. ---------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------------------------ --
DELETE FROM USERS
WHERE user_id = '65465';
SELECT * FROM USERS;

-- ------------------------------------------------------------------------------------------------------ --
-- 03.03. Eliminar Profesor. ---------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------------------------ --
DELETE FROM TEACHERS
WHERE teacher_id = '65465';
SELECT * FROM TEACHERS;

-- ------------------------------------------------------------------------------------------------------ --
-- 03.03. Eliminar Asistencia. -------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------------------------ --
DELETE FROM ASSISTANCES
WHERE student_id = 87897;



/* ****************************************************************************************************** */
/* ------------------------------------------- 04. CONSULTAR -------------------------------------------- */
/* ****************************************************************************************************** */

-- ------------------------------------------------------------------------------------------------------ --
-- 04.01. Consultas Generales. -------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------------------------ --
SELECT * FROM ROLES;
SELECT * FROM USERS;
SELECT * FROM TEACHERS;
SELECT * FROM STUDENTS;
SELECT * FROM ATTENDANTS;
SELECT * FROM ATTENDANTS_STUDENTS;
SELECT * FROM ASSISTANCES;
SELECT * FROM JUSTIFICATIONS;
