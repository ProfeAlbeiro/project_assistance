/* ************************************************************************************* */
/* ---------------------------------- 01. USUARIOS ------------------------------------- */
/* ************************************************************************************* */

-- ------------------------------------------------------------------------------------- --
-- 01.01. Consultar Usuarios y Roles. -------------------------------------------------- --
-- ------------------------------------------------------------------------------------- --
select 
    r.rol_code,
    r.rol_name,
    user_code,
    user_name,
    user_lastname,
    user_id,
    user_email,
    user_pass,
    user_state
  from ROLES as r
  inner join USERS as u
  on r.rol_code=u.rol_code
  WHERE user_code=1;
  
/* ************************************************************************************* */
/* --------------------------------- 02. ASISTENCIA ------------------------------------ */
/* ************************************************************************************* */

-- ------------------------------------------------------------------------------------- --
-- 02.01. Consultar Estudiantes. ------------------------------------------------------- --
-- ------------------------------------------------------------------------------------- --
SELECT
	u.user_name,
    e.estudiante_id
FROM USERS AS u
INNER JOIN ESTUDIANTES AS e
on u.user_id = e.estudiante_id;

-- ------------------------------------------------------------------------------------- --
-- 02.02. Consultar Estudiantes, asistencia y estado ----------------------------------- --
-- ------------------------------------------------------------------------------------- --
SELECT
	e.estudiante_id,
    u.user_name,    
    a.estado_id,
    s.estado_nombre,
    a.asistencia_fecha,
    a.asistencia_hora_inicio
FROM USERS AS u
INNER JOIN ESTUDIANTES AS e
on u.user_id = e.estudiante_id
INNER JOIN ASISTENCIA AS a
on e.estudiante_id = a.estudiante_id
INNER JOIN ESTADO AS s
on a.estado_id = s.estado_id
ORDER BY a.asistencia_fecha DESC, a.asistencia_hora_inicio DESC;

-- ------------------------------------------------------------------------------------- --
-- 02.03. Consultar Estudiante, asistencia y estado ------------------------------------ --
-- ------------------------------------------------------------------------------------- --
SELECT
	e.estudiante_id,
	u.user_name,    
	a.estado_id,
	s.estado_nombre,
	a.asistencia_fecha,
	a.asistencia_hora_inicio
FROM USERS AS u
INNER JOIN ESTUDIANTES AS e
on u.user_id = e.estudiante_id
INNER JOIN ASISTENCIA AS a
on e.estudiante_id = a.estudiante_id
INNER JOIN ESTADO AS s
on a.estado_id = s.estado_id
WHERE e.estudiante_id = 54564 AND a.asistencia_fecha = '2024-06-14';

-- ------------------------------------------------------------------------------------- --
-- 02.03. Consultar Estudiante, asistencia y estado ------------------------------------ --
-- ------------------------------------------------------------------------------------- --
SELECT	
	e.estudiante_id,
    u.rol_code,
	u.user_name,    
	a.estado_id,
	s.estado_nombre,
	a.asistencia_fecha,
	a.asistencia_hora_inicio
FROM USERS AS u
INNER JOIN ESTUDIANTES AS e
on u.user_id = e.estudiante_id
INNER JOIN ASISTENCIA AS a
on e.estudiante_id = a.estudiante_id
INNER JOIN ESTADO AS s
on a.estado_id = s.estado_id
WHERE u.rol_code = 3
ORDER BY a.asistencia_fecha DESC, a.asistencia_hora_inicio DESC LIMIT 1;