-- MySQL Script generated by MySQL Workbench
-- Fri Aug  2 07:14:56 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_assistance
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_assistance
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_assistance` DEFAULT CHARACTER SET utf8 ;
USE `db_assistance` ;

-- -----------------------------------------------------
-- Table `db_assistance`.`ROLES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_assistance`.`ROLES` (
  `rol_id` INT NOT NULL AUTO_INCREMENT,
  `rol_name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`rol_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_assistance`.`USERS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_assistance`.`USERS` (
  `user_code` INT NOT NULL AUTO_INCREMENT,
  `rol_id` INT NOT NULL,
  `user_id` VARCHAR(20) NOT NULL,
  `user_name` VARCHAR(200) NOT NULL,
  `user_email` VARCHAR(200) NOT NULL,
  `user_phone` VARCHAR(20) NULL,
  `user_pass` VARCHAR(200) NOT NULL,
  `user_state` TINYINT NOT NULL,
  INDEX `ind_user_rol` (`rol_id` ASC),
  UNIQUE INDEX `user_email_UNIQUE` (`user_email` ASC),
  UNIQUE INDEX `user_id_UNIQUE` (`user_id` ASC),
  PRIMARY KEY (`user_code`),
  CONSTRAINT `fk_user_rol`
    FOREIGN KEY (`rol_id`)
    REFERENCES `db_assistance`.`ROLES` (`rol_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_assistance`.`STUDENTS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_assistance`.`STUDENTS` (
  `student_id` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`student_id`),
  CONSTRAINT `fk_student_user`
    FOREIGN KEY (`student_id`)
    REFERENCES `db_assistance`.`USERS` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_assistance`.`ATTENDS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_assistance`.`ATTENDS` (
  `attend_id` INT NOT NULL,
  `attend_state` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`attend_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_assistance`.`ASSISTANCES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_assistance`.`ASSISTANCES` (
  `student_id` VARCHAR(20) NOT NULL,
  `attend_id` INT NOT NULL,
  `assistance_date` DATE NOT NULL,
  `assistance_start_time` TIME NOT NULL,
  INDEX `ind_assistance_student` (`student_id` ASC),
  INDEX `ind_assistance_attend` (`attend_id` ASC),
  CONSTRAINT `fk_assistance_student`
    FOREIGN KEY (`student_id`)
    REFERENCES `db_assistance`.`STUDENTS` (`student_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_assistance_attend`
    FOREIGN KEY (`attend_id`)
    REFERENCES `db_assistance`.`ATTENDS` (`attend_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_assistance`.`GUARDIANS_TYPE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_assistance`.`GUARDIANS_TYPE` (
  `guardian_type_id` INT NOT NULL AUTO_INCREMENT,
  `guardian_type_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`guardian_type_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_assistance`.`GUARDIANS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_assistance`.`GUARDIANS` (
  `guardian_id` VARCHAR(20) NOT NULL,
  `guardian_type_id` INT NOT NULL,
  PRIMARY KEY (`guardian_id`),
  INDEX `ind_guardian_type_id` (`guardian_type_id` ASC),
  CONSTRAINT `fk_attendant_user`
    FOREIGN KEY (`guardian_id`)
    REFERENCES `db_assistance`.`USERS` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_guardian_type_id`
    FOREIGN KEY (`guardian_type_id`)
    REFERENCES `db_assistance`.`GUARDIANS_TYPE` (`guardian_type_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_assistance`.`GUARDIANS_STUDENTS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_assistance`.`GUARDIANS_STUDENTS` (
  `student_id` VARCHAR(20) NOT NULL,
  `guardian_id` VARCHAR(20) NOT NULL,
  INDEX `ind_attendant_student_student` (`student_id` ASC),
  INDEX `ind_attendant_student_attendant` (`guardian_id` ASC),
  CONSTRAINT `fk_attendant_student_student`
    FOREIGN KEY (`student_id`)
    REFERENCES `db_assistance`.`STUDENTS` (`student_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_attendant_student_attendant`
    FOREIGN KEY (`guardian_id`)
    REFERENCES `db_assistance`.`GUARDIANS` (`guardian_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_assistance`.`TEACHERS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_assistance`.`TEACHERS` (
  `teacher_id` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`teacher_id`),
  CONSTRAINT `fk_teacher_user`
    FOREIGN KEY (`teacher_id`)
    REFERENCES `db_assistance`.`USERS` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_assistance`.`JUSTIFICATIONS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_assistance`.`JUSTIFICATIONS` (
  `student_id` VARCHAR(20) NOT NULL,
  `attendant_id` VARCHAR(20) NULL,
  `teacher_id` VARCHAR(20) NULL,
  `justification_description` VARCHAR(45) NOT NULL,
  `justification_evidence` VARCHAR(200) NOT NULL,
  `justification_validation` TINYINT NOT NULL,
  INDEX `ind_justification_teacher` (`teacher_id` ASC),
  INDEX `ind_justification_attendant` (`attendant_id` ASC),
  INDEX `ind_justification_assistance` (`student_id` ASC),
  CONSTRAINT `fk_justification_teacher`
    FOREIGN KEY (`teacher_id`)
    REFERENCES `db_assistance`.`TEACHERS` (`teacher_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_justification_attendant`
    FOREIGN KEY (`attendant_id`)
    REFERENCES `db_assistance`.`GUARDIANS` (`guardian_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_justification_assistance`
    FOREIGN KEY (`student_id`)
    REFERENCES `db_assistance`.`ASSISTANCES` (`student_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_assistance`.`JOURNES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_assistance`.`JOURNES` (
  `journe_id` INT NOT NULL AUTO_INCREMENT,
  `journe_name` VARCHAR(45) NOT NULL,
  `journe_start_time` TIME NOT NULL,
  `journe_end_time` TIME NOT NULL,
  `journe_min_before` INT NOT NULL,
  `journe_min_after` INT NOT NULL,
  `journe_min_nonattend` INT NOT NULL,
  PRIMARY KEY (`journe_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_assistance`.`GRADES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_assistance`.`GRADES` (
  `grade_id` INT NOT NULL,
  `grade_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`grade_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_assistance`.`COURSES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_assistance`.`COURSES` (
  `course_id` INT NOT NULL AUTO_INCREMENT,
  `course_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`course_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_assistance`.`MATRICULATED`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_assistance`.`MATRICULATED` (
  `student_id` VARCHAR(20) NOT NULL,
  `journe_id` INT NULL,
  `grade_id` INT NULL,
  `course_id` INT NULL,
  INDEX `ind_journe_grade_group_journe` (`journe_id` ASC),
  INDEX `ind_journe_grade_group_grade` (`grade_id` ASC),
  INDEX `ind_journe_grade_group_group` (`course_id` ASC),
  PRIMARY KEY (`student_id`),
  CONSTRAINT `fk_journe_grade_group_student`
    FOREIGN KEY (`student_id`)
    REFERENCES `db_assistance`.`STUDENTS` (`student_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_journe_grade_group_journe`
    FOREIGN KEY (`journe_id`)
    REFERENCES `db_assistance`.`JOURNES` (`journe_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_journe_grade_group_grade`
    FOREIGN KEY (`grade_id`)
    REFERENCES `db_assistance`.`GRADES` (`grade_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_journe_grade_group_group`
    FOREIGN KEY (`course_id`)
    REFERENCES `db_assistance`.`COURSES` (`course_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_assistance`.`COLLEGE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_assistance`.`COLLEGE` (
  `college_id` INT NOT NULL AUTO_INCREMENT,
  `college_name` VARCHAR(100) NULL,
  `college_address` VARCHAR(100) NULL,
  `college_phone` VARCHAR(20) NULL,
  PRIMARY KEY (`college_id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
