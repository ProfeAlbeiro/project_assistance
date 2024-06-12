<?php

    class Assistance{

        private $dbh;
        private $estado_id;
        private $estudiante_id;        
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

        # Estado Id
        public function setEstadoId($estado_id){
            $this->estado_id = $estado_id;
        }
        public function getEstadoId(){
            return $this->estado_id;
        }
        # Estudiante Id
        public function setEstudianteId($estudiante_id){
            $this->estudiante_id = $estudiante_id;
        }
        public function getEstudianteId(){
            return $this->estudiante_id;
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
                 // MultiFiltro. Controles txt, enviar                 
        # RF03 - Obtener Asistencias de un Estudiante
        # RF04 - Actualizar Asistencia por Estudiante
        # RF05 - Eliminar Registro
        # RF06 - Reportes en Excel y PDF
        # RF07 - Cantidad de Registros por: Asistencias, Inasistencias y Retardos
        # RF08 - Justificaciones por Inasistencia y por llegada tarde
                 // El Profesor y el Acudiente pueden registrar una justificación
                 // El Profesor y el Administrador pueden validar la justificación

    }

?>