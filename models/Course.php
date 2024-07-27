<?php

    class Course{
        private $course_id;
        private $course_name;

        public function __construct(){
            try {
                $this->dbh = DataBase::connection();
                $a = func_get_args();
                $i = func_num_args();
                if (method_exists($this, $f = '__construct' . $i)) {
                    call_user_func_array(array($this, $f), $a);
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function __construct0(){}

        public function __construct2($course_id,$course_name){
            $this->course_id = $course_id;
            $this->course_name = $course_name;
        }

        # Curso: Id
        public function setCourseId($course_id){
            $this->course_id = $course_id;
        }
        public function getCourseId(){
            return $this->course_id;
        }

        # Curso: Nombre
        public function setCourseName($course_name){
            $this->course_name = $course_name;
        }
        public function getCourseName(){
            return $this->course_name;
        }

        # Curso: Registrar
        public function create_course(){
            try {
                $sql = 'INSERT INTO COURSES VALUES (
                            :courseId,
                            :courseName                            
                        )';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('courseId', $this->getCourseId());
                $stmt->bindValue('courseName', $this->getCourseName());                
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Curso: Consultar
        public function read_course(){
            try {
                $courseList = [];
                $sql = 'SELECT * FROM COURSES';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $course) {
                    $courseObj = new Course(
                        $course['course_id'],
                        $course['course_name']
                    );
                    array_push($courseList, $courseObj);
                }
                return $courseList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Curso: Obtener Registro
        public function getcourse_bycode($course_id){
            try {
                $sql = 'SELECT * FROM COURSES
                        WHERE course_id=:courseId';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('courseId', $course_id);
                $stmt->execute();
                $courseDb = $stmt->fetch();
                $course = new Course(
                    $courseDb['course_id'],                    
                    $courseDb['course_name']                    
                );
                return $course;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Curso: Actualizar
        public function update_course(){
            try {
                $sql = 'UPDATE COURSES SET
                            course_id = :courseId,
                            course_name = :courseName                            
                        WHERE course_id = :courseId';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('courseId', $this->getCourseId());                
                $stmt->bindValue('courseName', $this->getCourseName());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Curso: Eliminar
        public function delete_course($id_course){
            try {
                $sql = 'DELETE FROM COURSES WHERE course_id = :courseId';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('courseId', $id_course);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }

?>