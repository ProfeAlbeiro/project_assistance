/* ************************************************************************************* */
/* ---------------------------------- 01. TRIGGERS ------------------------------------- */
/* ************************************************************************************* */

-- ------------------------------------------------------------------------------------- --
-- 01. Despues de Insertar User, insertar código a estudiante. ------------------------- --
-- ------------------------------------------------------------------------------------- --
DROP TRIGGER asignacion_rol_ai;
DELIMITER $$
CREATE TRIGGER asignacion_rol_ai
	AFTER INSERT ON USERS FOR EACH ROW
BEGIN
	IF (NEW.rol_code = 2) THEN
		INSERT INTO PROFESORES VALUES
		(NEW.user_id);
	ELSEIF (NEW.rol_code = 3) THEN
		INSERT INTO ESTUDIANTES VALUES
		(NEW.user_id, null, null);
	ELSEIF (NEW.rol_code = 4) THEN
		INSERT INTO ACUDIENTES VALUES
		(NEW.user_id);
	END IF;    
END;$$
DELIMITER ;

-- ------------------------------------------------------------------------------------- --
-- 02. Despues de . -------------------------------------------------------------------- --
-- ------------------------------------------------------------------------------------- --