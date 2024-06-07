
-- Datos Roles

INSERT INTO `roles` (`rol_code`, `rol_name`) VALUES
(1, 'admin'),
(2, 'profesor'),
(3, 'estudiante'),
(4, 'acudiente');

-- Datos Usuario

INSERT INTO `users` VALUES
(1, 14785, 'Efren', 'efren@colegio.edu.co', '8cb2237d0679ca88db6464eac60da96345513964', 1),
(2, 65465, 'Julian', 'julian@colegio.edu.co', '8cb2237d0679ca88db6464eac60da96345513964', 1),
(3, 54564, 'Pepito', 'pepito@colegio.edu.co', '8cb2237d0679ca88db6464eac60da96345513964', 1),
(3, 87897, 'Marinita', 'marinita@colegio.edu.co', '8cb2237d0679ca88db6464eac60da96345513964', 1),
(3, 45648, 'Josefito', 'josefito@colegio.edu.co', '8cb2237d0679ca88db6464eac60da96345513964', 1),
(4, 78972, 'Pedro', 'marinita@colegio.edu.co', '8cb2237d0679ca88db6464eac60da96345513964', 1),
(4, 96325, 'Carlos', 'marinita@colegio.edu.co', '8cb2237d0679ca88db6464eac60da96345513964', 1);


INSERT INTO `acudientes` VALUES
(78972),
(96325);


INSERT INTO `estudiantes` VALUES
(54564, '6', 'diurna'),
(87897, '7', 'noche'),
(45648, '8', 'diurno');

INSERT INTO `acudientes_estudiante` VALUES
(78972, 54564),
(78972, 87897),
(96325, 45648);

INSERT INTO `profesores` VALUES
(65465);

INSERT INTO `estado` VALUES
(1,"asistencia"),
(2,"no asistencia"),
(3,"llegada tarde");

INSERT INTO `asistencia`(`estudiante_id`, `estado_id`, `asistencia_fecha`) VALUES
(54564, 2, "2024-06-06");

INSERT INTO `asistencia` VALUES
(87897, 1, "2024-06-06", "12:30"),
(45648, 3, "2024-06-06", "12:50");

INSERT INTO `justificaciones` VALUES
(65465, 54564, 78972, 1, "Cita Médica", 1),
(65465, 45648, 96325, 2, NULL, 0);

