<?php
    require_once "models/User.php";
    class Student extends User{

        # Constructor: Sobrecarga y conexión pdo
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

        # Estudiante: Crear
        public function create_student(){
            try {
                $sql = 'INSERT INTO STUDENTS VALUES (:studentId)';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('studentId', $this->getUserId());
                $stmt->execute();
                return $stmt;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Estudiante: Consultar
        public function read_users(){
            try {
                $userList = [];
                $sql = "SELECT
                            u.user_code,
                            r.rol_id,
                            r.rol_name,
                            user_id,
                            user_name,
                            user_email,
                            user_phone,
                            user_pass,
                            user_state
                        FROM ROLES AS r
                        INNER JOIN USERS AS u
                        on r.rol_id = u.rol_id
                        WHERE r.rol_name IN ('estudiante')";
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $user) {
                    $userObj = new User(
                        $user['user_code'],
                        $user['rol_id'],
                        $user['rol_name'],
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