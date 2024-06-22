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
  WHERE user_id = 1001011021;  
  

/* ************************************************************************************* */
/* --------------------------------- 02. ASISTENCIA ------------------------------------ */
/* ************************************************************************************* */

-- ------------------------------------------------------------------------------------- --
-- 02.01. Consultar Estudiantes y jornada ---------------------------------------------- --
-- ------------------------------------------------------------------------------------- --
SELECT
	s.student_id,
    j.journe_start_time,
    j.journe_end_time    
FROM students AS s
INNER JOIN journes_grades_courses AS jg
on s.student_id = jg.student_id
INNER JOIN journes AS j
on jg.journe_id = j.journe_id;

-- ------------------------------------------------------------------------------------- --
-- 02.02. Consultar Estudiante, asistencia y estado ------------------------------------ --
-- ------------------------------------------------------------------------------------- --
SELECT
	s.student_id,    
	u.user_name,    
    j.journe_name,
    g.grade_id,
    c.course_name,    
    t.attend_state,
    a.assistance_date,
    a.assistance_start_time
FROM USERS AS u
INNER JOIN STUDENTS AS s
on u.user_id = s.student_id
INNER JOIN JOURNES_GRADES_COURSES AS jgg
on s.student_id = jgg.student_id
INNER JOIN JOURNES AS j
on jgg.journe_id = j.journe_id
INNER JOIN GRADES AS g
on jgg.grade_id = g.grade_id
INNER JOIN COURSES AS c
on jgg.course_id = c.course_id
INNER JOIN ASSISTANCES AS a
on s.student_id = a.student_id
INNER JOIN ATTENDS AS t
on a.attend_id = t.attend_id
ORDER BY a.assistance_date DESC, a.assistance_start_time DESC LIMIT 1;

-- ------------------------------------------------------------------------------------- --
-- 02.03. Consultar Estudiantes, asistencia y estado ------------------------------------ --
-- ------------------------------------------------------------------------------------- --
SELECT
	s.student_id,    
	u.user_name,    
    j.journe_name,
    g.grade_id,
    c.course_name,    
    t.attend_state,
    a.assistance_date,
    a.assistance_start_time
FROM USERS AS u
INNER JOIN STUDENTS AS s
on u.user_id = s.student_id
INNER JOIN JOURNES_GRADES_COURSES AS jgg
on s.student_id = jgg.student_id
INNER JOIN JOURNES AS j
on jgg.journe_id = j.journe_id
INNER JOIN GRADES AS g
on jgg.grade_id = g.grade_id
INNER JOIN COURSES AS c
on jgg.course_id = c.course_id
INNER JOIN ASSISTANCES AS a
on s.student_id = a.student_id
INNER JOIN ATTENDS AS t
on a.attend_id = t.attend_id
ORDER BY a.assistance_date DESC, a.assistance_start_time DESC;