<?php

    class User{
        protected $user_code;
        protected $rol_name;
        protected $rol_id;
        protected $user_id;
        protected $user_name;
        protected $user_email;
        protected $user_phone;
        protected $user_pass;
        protected $user_state;

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

        # Constructor: Objeto 00 parámetros
        public function __construct0(){}

        # Constructor: Objeto 02 parámetros
        public function __construct2($user_id,$user_pass){
            $this->user_id = $user_id;
            $this->user_pass = $user_pass;
        }

        # Constructor: Objeto 08 parámetros
        public function __construct8($user_code, $rol_id, $user_id, $user_name, $user_email, $user_phone, $user_pass, $user_state){
            $this->user_code = $user_code;
            $this->rol_id = $rol_id;
            $this->user_id = $user_id;
            $this->user_name = $user_name;
            $this->user_email = $user_email;
            $this->user_phone = $user_phone;
            $this->user_pass = $user_pass;
            $this->user_state = $user_state;
        }

        # Constructor: Objeto 09 parámetros
        public function __construct9($user_code, $rol_id, $rol_name, $user_id, $user_name, $user_email, $user_phone, $user_pass, $user_state){
            unset($this->dbh);
            $this->user_code = $user_code;
            $this->rol_id = $rol_id;
            $this->rol_name = $rol_name;
            $this->user_id = $user_id;
            $this->user_name = $user_name;
            $this->user_email = $user_email;
            $this->user_phone = $user_phone;
            $this->user_pass = $user_pass;
            $this->user_state = $user_state;
        }

        # Usuario: Código
        public function setUserCode($user_code){
            $this->user_code = $user_code;
        }
        public function getUserCode(){
            return $this->user_code;
        }

        # Rol: Id
        public function setRolCode($rol_id){
            $this->rol_id = $rol_id;
        }
        public function getRolCode(){
            return $this->rol_id;
        }

        # Rol: Nombre
        public function setRolName($rol_name){
            $this->rol_name = $rol_name;
        }
        public function getRolName(){
            return $this->rol_name;
        }        

        # Usuario: Id
        public function setUserId($user_id){
            $this->user_id = $user_id;
        }
        public function getUserId(){
            return $this->user_id;
        }

        # Usuario: Nombre
        public function setUserName($user_name){
            $this->user_name = $user_name;
        }
        public function getUserName(){
            return $this->user_name;
        }

        # Usuario: Email
        public function setUserEmail($user_email){
            $this->user_email = $user_email;
        }
        public function getUserEmail(){
            return $this->user_email;
        }

        # Usuario: Celular
        public function setUserPhone($user_phone){
            $this->user_phone = $user_phone;
        }
        public function getUserPhone(){
            return $this->user_phone;
        }

        # Usuario: Contraseña
        public function setUserPass($user_pass){
            $this->user_pass = $user_pass;
        }
        public function getUserPass(){
            return $this->user_pass;
        }

        # Usuario: Estado
        public function setUserState($user_state){
            $this->user_state = $user_state;
        }
        public function getUserState(){
            return $this->user_state;
        }

        # Usuario: Iniciar sesión
        public function login(){
            try {
                $sql = 'SELECT
                            u.user_code,
                            r.rol_id,
                            r.rol_name,
                            u.user_id,
                            u.user_name,
                            u.user_email,
                            u.user_phone,
                            u.user_pass,
                            u.user_state
                        FROM ROLES AS r
                        INNER JOIN USERS AS u
                        on r.rol_id = u.rol_id
                        WHERE user_id = :userId AND user_pass = :userPass';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userId', $this->getUserId());
                $stmt->bindValue('userPass', sha1($this->getUserPass()));
                $stmt->execute();
                $userDb = $stmt->fetch();
                if ($userDb) {
                    $user = new User(
                        $userDb['user_code'],
                        $userDb['rol_id'],
                        $userDb['rol_name'],
                        $userDb['user_id'],
                        $userDb['user_name'],
                        $userDb['user_email'],
                        $userDb['user_phone'],
                        $userDb['user_pass'],
                        $userDb['user_state']
                    );
                    return $user;
                } else {
                    return false;
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Usuario: Crear
        public function create_user(){
            try {
                $sql = 'INSERT INTO USERS VALUES (
                            :userCode,
                            :rolCode,
                            :userId,
                            :userName,
                            :userEmail,
                            :userPhone,
                            :userPass,
                            :userState
                        )';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userCode', $this->getUserCode());
                $stmt->bindValue('rolCode', $this->getRolCode());
                $stmt->bindValue('userId', $this->getUserId());
                $stmt->bindValue('userName', $this->getUserName());
                $stmt->bindValue('userEmail', $this->getUserEmail());
                $stmt->bindValue('userPhone', $this->getUserPhone());
                $stmt->bindValue('userPass', sha1($this->getUserPass()));
                $stmt->bindValue('userState', $this->getUserState());
                $stmt->execute();
                return $stmt;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Usuario: Consultar
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
                        WHERE r.rol_name NOT IN ('acudiente','estudiante')";
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

        # Usuario: Obtener registro
        public function getuser_bycode($userCode){
            try {
                $sql = 'SELECT
                    u.user_code,
                    r.rol_id,
                    r.rol_name,
                    u.user_id,
                    u.user_name,
                    u.user_email,
                    u.user_phone,
                    u.user_pass,
                    u.user_state
                FROM ROLES AS r
                INNER JOIN USERS AS u
                on r.rol_id = u.rol_id
                WHERE u.user_code = :userCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userCode', $userCode);
                $stmt->execute();
                $userDb = $stmt->fetch();
                $user = new User(
                    $userDb['user_code'],
                    $userDb['rol_id'],
                    $userDb['rol_name'],
                    $userDb['user_id'],
                    $userDb['user_name'],
                    $userDb['user_email'],
                    $userDb['user_phone'],
                    $userDb['user_pass'],
                    $userDb['user_state']
                );
                return $user;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Usuario: Actualizar
        public function update_user(){
            try {
                $sql = 'UPDATE USERS SET                            
                            rol_id = :rolId,
                            user_id = :userId,
                            user_name = :userName,
                            user_email = :userEmail,
                            user_phone = :userPhone,
                            user_pass = :userPass,
                            user_state = :userState
                        WHERE user_code = :userCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userCode', $this->getUserCode());
                $stmt->bindValue('rolId', $this->getRolCode());
                $stmt->bindValue('userId', $this->getUserId());
                $stmt->bindValue('userName', $this->getUserName());
                $stmt->bindValue('userEmail', $this->getUserEmail());
                $stmt->bindValue('userPhone', $this->getUserPhone());
                $stmt->bindValue('userPass', sha1($this->getUserPass()));
                $stmt->bindValue('userState', $this->getUserState());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Usuario: Eliminar
        public function delete_user($userCode){
            try {
                $sql = 'DELETE FROM USERS WHERE user_code = :userCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userCode', $userCode);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }

?>