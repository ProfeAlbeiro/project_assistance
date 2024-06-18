/* ************************************************************************************* */
/* ---------------------------------- 01. USUARIOS ------------------------------------- */
/* ************************************************************************************* */

-- ------------------------------------------------------------------------------------- --
-- 01.01. Consultar Roles y Usuarios. -------------------------------------------------- --
-- ------------------------------------------------------------------------------------- --
select    
    r.rol_id,
    r.rol_name,
    u.user_id,
    u.user_name,
    u.user_email,
    u.user_pass,
    u.user_state
  from ROLES as r
  inner join USERS as u
  on r.rol_id = u.rol_id
  WHERE user_id = 45648;

/* ************************************************************************************* */
/* --------------------------------- 02. ASISTENCIA ------------------------------------ */
/* ************************************************************************************* */

-- ------------------------------------------------------------------------------------- --
-- 02.01. Consultar Estudiante, asistencia y estado ------------------------------------ --
-- ------------------------------------------------------------------------------------- --
SELECT
	s.student_id,    
	u.user_name,
    s.student_grade,
    s.student_group,
    a.assistance_attends,
    a.assistance_date,
    a.assistance_start_time
FROM USERS AS u
INNER JOIN STUDENTS AS s
on u.user_id = s.student_id
INNER JOIN ASSISTANCES AS a
on s.student_id = a.student_id
WHERE u.rol_id = 3
ORDER BY a.assistance_date DESC, a.assistance_start_time DESC;

-- ------------------------------------------------------------------------------------- --
-- 02.01. Consultar Estudiante, asistencia y estado ------------------------------------ --
-- ------------------------------------------------------------------------------------- --
SELECT
	s.student_id,    
	u.user_name,
    s.student_grade,
    s.student_group,
    a.assistance_attends,
    a.assistance_date,
    a.assistance_start_time
FROM USERS AS u
INNER JOIN STUDENTS AS s
on u.user_id = s.student_id
INNER JOIN ASSISTANCES AS a
on s.student_id = a.student_id
WHERE u.rol_id = 3
ORDER BY a.assistance_date DESC, a.assistance_start_time DESC LIMIT 1;