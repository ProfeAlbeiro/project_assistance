<?php

    class Assistance{

        private $dbh;        
        private $student_id;        
        private $user_name;        
        private $journe_name;
        private $journe_start_time;
        private $journe_end_time;
        private $grade_id;
        private $course_name;        
        private $attend_id;
        private $attend_state;
        private $assistance_date;
        private $assistance_start_time;

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
        
        public function __construct2($journe_start_time, $journe_end_time){            
            $this->journe_start_time = $journe_start_time;            
            $this->journe_end_time = $journe_end_time;
        }
        
        public function __construct4($student_id,$attend_id,$assistance_date,$assistance_start_time){            
            $this->student_id = $student_id;            
            $this->attend_id = $attend_id;
            $this->assistance_date = $assistance_date;
            $this->assistance_start_time = $assistance_start_time;
        }

        public function __construct8($student_id,$user_name,$journe_name,$grade_id,$course_name,$attend_state,$assistance_date,$assistance_start_time){
            $this->student_id = $student_id;
            $this->user_name = $user_name;
            $this->journe_name = $journe_name;
            $this->grade_id = $grade_id;
            $this->course_name = $course_name;
            $this->attend_state = $attend_state;
            $this->assistance_date = $assistance_date;            
            $this->assistance_start_time = $assistance_start_time;
        }
        
        # Estudiante Id
        public function setStudentId($student_id){
            $this->student_id = $student_id;
        }
        public function getStudentId(){
            return $this->student_id;
        }        
        # Nombre Usuario
        public function setUserName($user_name){
            $this->user_name = $user_name;
        }
        public function getUserName(){
            return $this->user_name;
        }        
        # Nombre Jornada
        public function setJourneName($journe_name){
            $this->journe_name = $journe_name;
        }
        public function getJourneName(){
            return $this->journe_name;
        }        
        # Hora Inicio Jornada
        public function setJourneStartTime($journe_start_time){
            $this->journe_start_time = $journe_start_time;
        }
        public function getJourneStartTime(){
            return $this->journe_start_time;
        }        
        # Hora Fin Jornada
        public function setJourneEndTime($journe_end_time){
            $this->journe_end_time = $journe_end_time;
        }
        public function getJourneEndTime(){
            return $this->journe_end_time;
        }        
        # Grado
        public function setGradeId($grade_id){
            $this->grade_id = $grade_id;
        }
        public function getGradeId(){
            return $this->grade_id;
        }        
        # Grupo
        public function setCourseName($course_name){
            $this->course_name = $course_name;
        }
        public function getCourseName(){
            return $this->course_name;
        }        
        # Asistencia Id
        public function setAttendId($attend_id){
            $this->attend_id = $attend_id;
        }
        public function getAttendId(){
            return $this->attend_id;
        }
        # ¿Asistió?
        public function setAttendState($attend_state){
            $this->attend_state = $attend_state;
        }
        public function getAttendState(){
            return $this->attend_state;
        }
        # Asistencia Fecha
        public function setAssistanceDate($assistance_date){
            $this->assistance_date = $assistance_date;
        }
        public function getAssistanceDate(){
            return $this->assistance_date;
        }
        # Asistencia Hora Inicio
        public function setAssistanceStartTime($assistance_start_time){
            $this->assistance_start_time = $assistance_start_time;
        }
        public function getAssistanceStartTime(){
            return $this->assistance_start_time;
        }

        public function calculateAttendState($journe_start_time, $journe_end_time){            
            $entry_time = date("H:i:s");
            $entry_time_min = strtotime(date("H:i:s"));

            $start_time = strtotime($journe_start_time);
            $end_time = strtotime($journe_end_time);

            $diff_journal_min = ($end_time - $start_time) / 60;
            $diff_min = intval(($entry_time_min - $start_time) / 60);
            
            if ($diff_min <= 10) {
                $attend_id = 1;
            } elseif ($diff_min > 10 AND $diff_min <= $diff_journal_min) {
                $attend_id = 2;
            } else {
                $attend_id = 3;                        
            }
            return $attend_id;
        }
        
        # RFXX - Obtener Jornada del Estudiante
        public function getJournalByStudent($student_id){
            try {
                $sql = "SELECT
                            s.student_id,
                            j.journe_start_time,
                            j.journe_end_time    
                        FROM students AS s
                        INNER JOIN journes_grades_courses AS jg
                        on s.student_id = jg.student_id
                        INNER JOIN journes AS j
                        on jg.journe_id = j.journe_id
                        WHERE s.student_id = :student_id";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('student_id', $student_id);
                $stmt->execute();
                $journalDb = $stmt->fetch();
                $journal = new Assistance(
                    $journalDb['journe_start_time'],
                    $journalDb['journe_end_time']                    
                );
                $journe_start_time = $journal->getJourneStartTime();
                $journe_end_time = $journal->getJourneEndTime();
                $attend_id = $this->calculateAttendState($journe_start_time, $journe_end_time);
                return $attend_id;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # RF01 - Obtener Asistencias de un Estudiante
        // # RF10_CU10 - Obtener el Usuario por el código
        public function getassistance_last(){
            try {
                $sql = "SELECT
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
                ORDER BY a.assistance_date DESC, a.assistance_start_time DESC";
                $stmt = $this->dbh->prepare($sql);                
                $stmt->execute();
                $assistanceDb = $stmt->fetch();
                if ($assistanceDb) {
                    $assistance = new Assistance(
                        $assistanceDb['student_id'],
                        ucwords(strtolower($assistanceDb['user_name'])),
                        $assistanceDb['journe_name'],
                        $assistanceDb['grade_id'],
                        $assistanceDb['course_name'],
                        $assistanceDb['attend_state'],                        
                        $assistanceDb['assistance_date'],
                        $assistanceDb['assistance_start_time']
                    );
                    return $assistance;
                } else {
                    return false;
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # RF01 - Registrar Asistencia.        
        // Manual y por Código de Barras
        public function create_assistance(){
            // Solucionar el problema cuando NO asiste, o llega después al colegio con excusa
            try {
                $sql = "INSERT INTO ASSISTANCES (student_id, attend_id, assistance_date, assistance_start_time) VALUES (
                            :student_id, 
                            :attend_id,
                            :assistance_date, 
                            :assistance_start_date
                        )";
                $stmt = $this->dbh->prepare($sql);                
                $stmt->bindValue('student_id', $this->getStudentId());                
                $stmt->bindValue('attend_id', $this->getAttendId());                
                $stmt->bindValue('assistance_date', $this->getAssistanceDate());
                $stmt->bindValue('assistance_start_date', $this->getAssistanceStartTime());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }            
        }

        # RF02 - Constular Asistencias                 
        // MultiFiltro. Controles txt, enviar.
        // Una columna con fecha final para el filtro
        public function read_assistance(){
            try {
                $assistanceList = [];
                $sql = 'SELECT
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
                        on a.attend_id = t.attend_id';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $assistance) {
                    $assistanceObj = new Assistance(
                        $assistance['student_id'],
                        ucwords(strtolower($assistance['user_name'])),
                        $assistance['journe_name'],
                        $assistance['grade_id'],
                        $assistance['course_name'],
                        $assistance['attend_state'],
                        $assistance['assistance_date'],
                        $assistance['assistance_start_time']
                    );
                    array_push($assistanceList, $assistanceObj);
                }
                return $assistanceList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // PROBLEMAS A SOLUCIONAR SOBRE LA MARCHA        
        # Consultas en DataTables (Presentación). 
          // Incluir los controles pdf, excel, etc.,
          // Responsive de la tabla Datatables, traer fecha de js y tamaño de controles.        
        # Carga masiva de datos de acuerdo a la tabla de datos del colegio
        # Relacionar estudiantes con acudientes       

        // FUNCIONALIDADES
        # RF04 - Actualizar Asistencia
        # RF05 - Eliminar Asistencia
        # RF07 - Cantidad de Registros por: Asistencias, Inasistencias y Retardos
        # RF08 - Justificaciones por Inasistencia y por llegada tarde
                 // El Profesor y el Acudiente pueden registrar una justificación
                 // El Profesor y el Administrador pueden validar la justificación

    }

?>