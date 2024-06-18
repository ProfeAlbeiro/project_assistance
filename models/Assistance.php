<?php

    class Assistance{

        private $dbh;        
        private $student_id;        
        private $user_name;        
        private $student_grade;        
        private $student_group;        
        private $assistance_attends;
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

        public function __construct4($student_id,$assistance_attends,$assistance_date,$assistance_start_time){
            $this->student_id = $student_id;            
            $this->assistance_attends = $assistance_attends;
            $this->assistance_date = $assistance_date;            
            $this->assistance_start_time = $assistance_start_time;
        }

        public function __construct7($student_id,$user_name,$student_grade,$student_group,$assistance_attends,$assistance_date,$assistance_start_time){
            $this->student_id = $student_id;
            $this->user_name = $user_name;
            $this->student_grade = $student_grade;
            $this->student_group = $student_group;
            $this->assistance_attends = $assistance_attends;
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
        # Grado
        public function setStudentGrade($student_grade){
            $this->student_grade = $student_grade;
        }
        public function getStudentGrade(){
            return $this->student_grade;
        }        
        # Grupo
        public function setStudentGroup($student_group){
            $this->student_group = $student_group;
        }
        public function getStudentGroup(){
            return $this->student_group;
        }        
        # ¿Asistió?
        public function setAssistanceAttends($assistance_attends){
            $this->assistance_attends = $assistance_attends;
        }
        public function getAssistanceAttends(){
            return $this->assistance_attends;
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
        
        # RF01 - Obtener Asistencias de un Estudiante
        // # RF10_CU10 - Obtener el Usuario por el código
        public function getassistance_last(){
            try {
                $sql = "SELECT
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
                ORDER BY a.assistance_date DESC, a.assistance_start_time DESC LIMIT 1";
                $stmt = $this->dbh->prepare($sql);                
                $stmt->execute();
                $assistanceDb = $stmt->fetch();
                if ($assistanceDb) {
                    $assistance = new Assistance(
                        $assistanceDb['student_id'],
                        $assistanceDb['user_name'],
                        $assistanceDb['student_grade'],
                        $assistanceDb['student_group'],
                        $assistanceDb['assistance_attends'],                        
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
            try {
                $sql = 'INSERT INTO ASSISTANCES VALUES 
                (:student_id,:assistance_attends,:assistance_date,:assistance_start_date)';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('student_id', $this->getStudentId());
                $stmt->bindValue('assistance_attends', $this->getAssistanceAttends());
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
                        ORDER BY a.assistance_date DESC, a.assistance_start_time DESC';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $assistance) {
                    $assistanceObj = new Assistance(
                        $assistance['student_id'],
                        $assistance['user_name'],                        
                        $assistance['student_grade'],
                        $assistance['student_group'],
                        $assistance['assistance_attends'],
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