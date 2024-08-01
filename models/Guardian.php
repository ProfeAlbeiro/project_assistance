<?php
    require_once "models/User.php";
    class Guardian extends User{
        private $guardian_type_name;
        # Sobrecarga de constructores y conexión pdo
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

        # Constructor: Objeto 09 parámetros
        public function __construct9($rol_id, $rol_name, $guardian_type_name, $user_id, $user_name, $user_email, $user_phone, $user_pass, $user_state){
            unset($this->dbh);
            $this->rol_id = $rol_id;
            $this->rol_name = $rol_name;
            $this->guardian_type_name = $guardian_type_name;
            $this->user_id = $user_id;
            $this->user_name = $user_name;
            $this->user_email = $user_email;
            $this->user_phone = $user_phone;
            $this->user_pass = $user_pass;
            $this->user_state = $user_state;
        }

        # Acudiente: Tipo de Acudiente
        public function setGuardianTypeName($guardian_type_name){
            $this->guardian_type_name = $guardian_type_name;
        }
        public function getGuardianTypeName(){
            return $this->guardian_type_name;
        }

        # Acudiente: Crear
        public function create_guardian(){
            try {
                $sql = 'INSERT INTO GUARDIANS VALUES (:guardianId)';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('guardianId', $this->getUserId());
                $stmt->execute();
                return $stmt;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Acudiente: Consultar
        public function read_users(){
            try {
                $userList = [];
                $sql = "SELECT
                            r.rol_id,
                            r.rol_name,
                            gt.guardian_type_name,
                            user_id,    
                            user_name,
                            user_email,
                            user_phone,
                            user_pass,
                            user_state
                        FROM ROLES AS r
                        INNER JOIN USERS AS u
                        on r.rol_id = u.rol_id
                        INNER JOIN GUARDIANS AS g
                        on u.user_id = g.guardian_id
                        INNER JOIN GUARDIANS_TYPE AS gt
                        on gt.guardian_type_id = g.guardian_type_id
                        WHERE r.rol_name IN ('acudiente')";
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $user) {
                    $userObj = new Guardian(
                        $user['rol_id'],
                        $user['rol_name'],
                        $user['guardian_type_name'],
                        $user['user_id'],
                        ucwords(strtolower($user['user_name'])),
                        $user['user_email'],
                        $user['user_phone'],
                        $user['user_pass'],
                        $user['user_state']
                    );
                    array_push($userList, $userObj);
                }
                return $userList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }
?>