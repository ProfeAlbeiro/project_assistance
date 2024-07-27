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
('1001011021', 1, 'Julián Vargas', 'efren@colegio.edu.co', "3103203211", sha1('12345'), 1);
SELECT * FROM USERS;

-- Insertar Usuarios Profesores
INSERT INTO `users` VALUES
('1001011022', 2, 'Albeiro Ramos', 'eramos@sena.edu.co', "3103203212", sha1('12345'), 1),
('1001011023', 2, 'Jorge Negrete', 'jorge@gmail.com', "3103203213", sha1('12345'), 1);
SELECT * FROM USERS;

-- Insertar Profesores
INSERT INTO TEACHERS VALUES
('1001011022'),
('1001011023');
SELECT * FROM TEACHERS;

-- Insertar Usuarios Estudiantes
INSERT INTO `users` VALUES
('1031041051', 3, 'Pepito Perez', 'pepito@colegio.edu.co', null , sha1('12345'), 1),
('1031041052', 3, 'Marinita García', 'marinita@colegio.edu.co', "3223213241" , sha1('12345'), 1),
('1031041053', 3, 'Josefito Suárez', 'josefito@colegio.edu.co', null , sha1('12345'), 1),
('1031041054', 3, 'Carlitos Duarte', 'josefito@colegio.edu.co', null , sha1('12345'), 1);
SELECT * FROM USERS;

-- Insertar Estudiantes
INSERT INTO STUDENTS VALUES
('1031041051'),
('1031041052'),
('1031041053'),
('1031041054');
SELECT * FROM STUDENTS;

-- Insertar Usuarios Acudientes
INSERT INTO `users` VALUES
('1001011024', 4, 'Madre Pepito', 'villaramos_23@hotmail.com', "3183888421" , sha1('12345'), 1),
('1001011025', 4, 'Madre Marinita-Josefito', 'profealbeiro2020@gmail.com', "3183888422" , sha1('12345'), 1),
('1001011026', 4, 'Madre Carlitos', 'ramoncito029@gmail.com', "3183888423" , sha1('12345'), 1),
('1001011027', 4, 'Padre Carlitos', 'earamos42@misena.edu.co', "3183888424" , sha1('12345'), 1);
SELECT * FROM USERS;

-- Insertar Acudientes
INSERT INTO GUARDIANS VALUES
('1001011024'),
('1001011025'),
('1001011026'),
('1001011027');
SELECT * FROM GUARDIANS;

-- Asociar Acudientes con Estudiantes
INSERT INTO GUARDIANS_STUDENTS VALUES
('1031041051', '1001011024'),
('1031041052', '1001011025'),
('1031041053', '1001011025'),
('1031041054', '1001011026'),
('1031041054', '1001011027');
SELECT * FROM GUARDIANS_STUDENTS;

-- ------------------------------------------------------------------------------------------------------ --
-- 01.03. Insertar Datos Colegio. ----------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------------------------ --
INSERT INTO COLLEGE VALUES
(1, 'Colegio', 'Dirección', 'Teléfono');
SELECT * FROM COLLEGE;

-- ------------------------------------------------------------------------------------------------------ --
-- 01.04. Insertar Jornadas. ---------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------------------------ --
INSERT INTO JOURNES VALUES
(1, 'Mañana', '06:00:00', '12:00:00'),
(2, 'Tarde', '12:00:00', '18:00:00'),
(3, 'Noche', '18:00:00', '22:00:00');
SELECT * FROM JOURNES;

-- ------------------------------------------------------------------------------------------------------ --
-- 01.05. Insertar Grados. ------------------------------------------------------------------------------ --
-- ------------------------------------------------------------------------------------------------------ --
INSERT INTO GRADES VALUES
(0, 'PreEscolar'),
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
(11, 'Undécimo'),
(21, 'Vigésimo_Primero'),
(22, 'Vigésimo_Segundo'),
(23, 'Vigésimo_Tercero'),
(24, 'Vigésimo_Cuarto'),
(25, 'Vigésimo_Quinto'),
(26, 'Vigésimo_Sexto');
SELECT * FROM GRADES;

SELECT * FROM GRADES
ORDER BY grade_id DESC LIMIT 1;

-- ------------------------------------------------------------------------------------------------------ --
-- 01.06. Insertar Grupos. ------------------------------------------------------------------------------ --
-- ------------------------------------------------------------------------------------------------------ --
INSERT INTO COURSES VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '01'),
(5, '02'),
(6, '03');
SELECT * FROM COURSES;

-- ------------------------------------------------------------------------------------------------------ --
-- 01.07. Asociar Estudiantes con Jornada, Grado y Curso. ----------------------------------------------- --
-- ------------------------------------------------------------------------------------------------------ --
INSERT INTO JOURNES_GRADES_COURSES VALUES
('1031041051', 3, 5, 4),
('1031041052', 2, 5, 5),
('1031041053', 2, 5, 6),
('1031041054', 1, 0, 1);
SELECT * FROM JOURNES_GRADES_COURSES;

-- ------------------------------------------------------------------------------------------------------ --
-- 01.08. Insertar estado de asistencias. --------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------------------------ --
INSERT INTO ATTENDS VALUES
(1, 'Normal'),
(2, 'Tardía'),
(3, 'No Asiste'),
(4, 'Extra');
SELECT * FROM ATTENDS;

-- ------------------------------------------------------------------------------------------------------ --
-- 01.09. Insertar Asistencias. ------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------------------------ --
-- Insertar Asistencia Estudiantes a tiempo y tarde
INSERT INTO ASSISTANCES VALUES
('1031041051', 1, "2024-06-06", "12:30"),
('1031041052', 3, "2024-06-06", "12:50");
SELECT * FROM ASSISTANCES;

-- Insertar Inasistencia de Estudiantes.
INSERT INTO ASSISTANCES (student_id, state_id, assistance_date) VALUES
('1031041052', 2, "2024-06-06");
SELECT * FROM ASSISTANCES;

-- Insertar Asistencia calculada de Estudiantes.
INSERT INTO ASSISTANCES (student_id, attend_id, assistance_date, assistance_start_time) VALUES
	('1031041051', 
	IF(TIMESTAMPDIFF(MINUTE, CONCAT(CURDATE(),' ', '06:00:00'), NOW()) <= 10,
		1, 
		IF(TIMESTAMPDIFF(MINUTE, CONCAT(CURDATE(),' ', '06:00:00'), NOW()) > 10 
			AND TIMESTAMPDIFF(MINUTE, CONCAT(CURDATE(),' ', '06:00:00'), NOW()) <= 360,
			3,
			2
		)
	),
	'2024-06-21', '06:00:00'
);
SELECT * FROM ASSISTANCES;

SELECT TIMESTAMPDIFF(MINUTE, CONCAT(CURDATE(),' ', '06:00:00'), NOW()) as prueba;


-- ------------------------------------------------------------------------------------------------------ --
-- 01.10. Insertar Justificación. ----------------------------------------------------------------------- --
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
SELECT * FROM ROLES;

-- ------------------------------------------------------------------------------------------------------ --
-- 02.02. Actualizar Usuarios. -------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------------------------ --
UPDATE USERS SET 
user_email = 'profealbeiro2020@gmail.com'
WHERE user_id = '65465';
SELECT * FROM USERS;

-- ------------------------------------------------------------------------------------------------------ --
-- 02.02. Actualizar Estudiantes. -------------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------------------------ --
UPDATE STUDENTS SET 
student_workdays = 'Mañana',
student_grade = 'Primero',
student_group = 'A'
WHERE student_id = '45648';
SELECT * FROM STUDENTS;

UPDATE STUDENTS SET 
student_workdays = 'Mañana',
student_grade = 'Segundo',
student_group = 'B'
WHERE student_id = '54564';
SELECT * FROM STUDENTS;

UPDATE STUDENTS SET 
student_workdays = 'Tarde',
student_grade = 'Quinto',
student_group = 'C'
WHERE student_id = '87897';
SELECT * FROM STUDENTS;

-- ------------------------------------------------------------------------------------------------------ --
-- 02.03. Actualizar Asistencia. ------------------------------------------------------------------------ --
-- ------------------------------------------------------------------------------------------------------ --
UPDATE ASISTENCIA SET 
estado_id = 2
WHERE estudiante_id = 87897;

UPDATE JOURNES SET 
journe_start_time = '12:00:00'
WHERE journe_id = 2;
SELECT * FROM JOURNES;

UPDATE ATTENDS SET 
attend_state = 'Extra'
WHERE attend_id = 4;
SELECT * FROM ATTENDS;

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
SELECT * FROM GUARDIANS;
SELECT * FROM GUARDIANS_STUDENTS;
SELECT * FROM ASSISTANCES;
SELECT * FROM JUSTIFICATIONS;
