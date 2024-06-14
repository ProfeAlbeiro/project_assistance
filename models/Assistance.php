<?php

    class Assistance{

        private $dbh;
        private $estado_id;
        private $estudiante_id;        
        private $user_name;        
        private $estado_nombre;        
        private $asistencia_fecha;
        private $asistencia_hora_inicio;        

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

        public function __construct4($estado_id, $estudiante_id, $asistencia_fecha, $asistencia_hora_inicio){
            $this->estado_id = $estado_id;
            $this->estudiante_id = $estudiante_id;            
            $this->asistencia_fecha = $asistencia_fecha;
            $this->asistencia_hora_inicio = $asistencia_hora_inicio;
        }
        
        public function __construct6($estudiante_id, $user_name, $estado_id, $estado_nombre, $asistencia_fecha, $asistencia_hora_inicio){
            $this->estudiante_id = $estudiante_id;
            $this->user_name = $user_name;
            $this->estado_id = $estado_id;
            $this->estado_nombre = $estado_nombre;
            $this->asistencia_fecha = $asistencia_fecha;
            $this->asistencia_hora_inicio = $asistencia_hora_inicio;
        }

        # Estado Id
        public function setEstadoId($estado_id){
            $this->estado_id = $estado_id;
        }
        public function getEstadoId(){
            return $this->estado_id;
        }
        # Estado Nombre
        public function setEstadoNombre($estado_nombre){
            $this->estado_nombre = $estado_nombre;
        }
        public function getEstadoNombre(){
            return $this->estado_nombre;
        }
        # Estudiante Id
        public function setEstudianteId($estudiante_id){
            $this->estudiante_id = $estudiante_id;
        }
        public function getEstudianteId(){
            return $this->estudiante_id;
        }        
        # Nombre Usuario
        public function setUserName($user_name){
            $this->user_name = $user_name;
        }
        public function getUserName(){
            return $this->user_name;
        }        
        # Asistencia Fecha
        public function setAsistenciaFecha($asistencia_fecha){
            $this->asistencia_fecha = $asistencia_fecha;
        }
        public function getAsistenciaFecha(){
            return $this->asistencia_fecha;
        }
        # Asistencia Hora Inicio
        public function setAsistenciaHoraInicio($asistencia_hora_inicio){
            $this->asistencia_hora_inicio = $asistencia_hora_inicio;
        }
        public function getAsistenciaHoraInicio(){
            return $this->asistencia_hora_inicio;
        }

        # RF01 - Registrar Asistencia.        
                 // Manual y por Código de Barras
        public function create_assistance(){
            try {
                $sql = 'INSERT INTO ASISTENCIA VALUES 
                (:estadoId,:estudianteId,:asistenciaFecha,:asistenciaHoraInicio)';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('estadoId', $this->getEstadoId());
                $stmt->bindValue('estudianteId', $this->getEstudianteId());                
                $stmt->bindValue('asistenciaFecha', $this->getAsistenciaFecha());
                $stmt->bindValue('asistenciaHoraInicio', $this->getAsistenciaHoraInicio());
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
                                on a.estado_id = s.estado_id';
                        $stmt = $this->dbh->query($sql);
                        foreach ($stmt->fetchAll() as $assistance) {
                            $assistanceObj = new Assistance(
                                $assistance['estudiante_id'],
                                $assistance['user_name'],                        
                                $assistance['estado_id'],
                                $assistance['estado_nombre'],                        
                                $assistance['asistencia_fecha'],
                                $assistance['asistencia_hora_inicio']
                            );
                            array_push($assistanceList, $assistanceObj);
                        }
                        return $assistanceList;
                    } catch (Exception $e) {
                        die($e->getMessage());
                    }
                }
                         
        # RF03 - Obtener Asistencias de un Estudiante
        // # RF10_CU10 - Obtener el Usuario por el código
        public function getassistance_bycode($estudiante_id, $fecha){
            try {
                $sql = "SELECT
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
                        WHERE e.estudiante_id = :estudianteId AND a.asistencia_fecha = :fechaInicio";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('estudianteId', $estudiante_id);
                $stmt->bindValue('fechaInicio', $fecha);
                $stmt->execute();
                $assistanceDb = $stmt->fetch();
                $assistance = new Assistance(
                    $assistanceDb['estudiante_id'],
                    $assistanceDb['user_name'],                        
                    $assistanceDb['estado_id'],
                    $assistanceDb['estado_nombre'],                        
                    $assistanceDb['asistencia_fecha'],
                    $assistanceDb['asistencia_hora_inicio']
                );
                return $assistance;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # ✓ # CHECK - Disparadores de Users a Profesor, Estudiante y Acudiente.
        # Incluir en la DB una tabla con Sedes, jornadas, cursos, etc
        # Relacionar estudiantes con acudientes
        # Consultas en DataTables (Presentación). Incluir los controles pdf, excel, etc.,
        # Responsive de la tabla, traer fecha de js y tamaño de controles.
        # Cierre de DB en PDO
        # Validaciones de todos los formularios.
        # Incluir las Alertas (SweetAlert)

        # RF04 - Actualizar Asistencia por Estudiante
        # RF05 - Eliminar Registro de Asistencia        
        # RF07 - Cantidad de Registros por: Asistencias, Inasistencias y Retardos
        # RF08 - Justificaciones por Inasistencia y por llegada tarde
                 // El Profesor y el Acudiente pueden registrar una justificación
                 // El Profesor y el Administrador pueden validar la justificación

    }

?>