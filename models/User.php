<?php    

    class User{
        // 1ra Parte: Atributos
        private $dbh;
        private $rol_id;
        private $rol_name;
        private $user_id;
        private $user_name;        
        private $user_email;
        private $user_phone;
        private $user_pass;
        private $user_state;

        // 2da Parte: Sobrecarga Constructores
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
        
        # Constructor: Objeto 07 parámetros
        public function __construct7($user_id, $rol_id, $user_name, $user_email, $user_phone, $user_pass, $user_state){            
            $this->user_id = $user_id;
            $this->rol_id = $rol_id;            
            $this->user_name = $user_name;
            $this->user_email = $user_email;
            $this->user_phone = $user_phone;
            $this->user_pass = $user_pass;
            $this->user_state = $user_state;            
        }
        
        public function __construct8($rol_id, $rol_name, $user_id, $user_name, $user_email, $user_phone, $user_pass, $user_state){
            unset($this->dbh);
            $this->rol_id = $rol_id;
            $this->rol_name = $rol_name;
            $this->user_id = $user_id;
            $this->user_name = $user_name;
            $this->user_email = $user_email;
            $this->user_phone = $user_phone;
            $this->user_pass = $user_pass;
            $this->user_state = $user_state;            
        }

        // 3ra Parte: Setter y Getters
        # Código Rol
        public function setRolCode($rol_id){
            $this->rol_id = $rol_id;
        }
        public function getRolCode(){
            return $this->rol_id;
        }
        # Nombre Rol
        public function setRolName($rol_name){
            $this->rol_name = $rol_name;
        }
        public function getRolName(){
            return $this->rol_name;
        }
        # Código Usuario
        public function setUserId($user_id){
            $this->user_id = $user_id;
        }
        public function getUserId(){
            return $this->user_id;
        }
        # Nombre Usuario
        public function setUserName($user_name){
            $this->user_name = $user_name;
        }
        public function getUserName(){
            return $this->user_name;
        }                
        # Email Usuario
        public function setUserEmail($user_email){
            $this->user_email = $user_email;
        }
        public function getUserEmail(){
            return $this->user_email;
        }
        # Celular Usuario
        public function setUserPhone($user_phone){
            $this->user_phone = $user_phone;
        }
        public function getUserPhone(){
            return $this->user_phone;
        }
        # Contraseña Usuario
        public function setUserPass($user_pass){
            $this->user_pass = $user_pass;
        }
        public function getUserPass(){
            return $this->user_pass;
        }
        # Estado Usuario
        public function setUserState($user_state){
            $this->user_state = $user_state;
        }
        public function getUserState(){
            return $this->user_state;
        }        

        // 4ta Parte: Persistencia a la Base de Datos

        # RF01_CU01 - Iniciar Sesión
        public function login(){
            try {
                $sql = 'SELECT
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
                        WHERE user_id = :user_id AND user_pass = :userPass';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('user_id', $this->getUserId());
                $stmt->bindValue('userPass', sha1($this->getUserPass()));
                $stmt->execute();
                $userDb = $stmt->fetch();                
                if ($userDb) {
                    $user = new User(
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

        # RF03_CU03 - Registrar Rol
        public function create_rol(){
            try {
                $sql = 'INSERT INTO ROLES VALUES (:rolCode,:rolName)';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $this->getRolCode());
                $stmt->bindValue('rolName', $this->getRolName());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # RF04_CU04 - Consultar Roles
        public function read_roles(){
            try {
                $rolList = [];
                $sql = 'SELECT * FROM ROLES';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $rol) {
                    $rolObj = new User;
                    $rolObj->setRolCode($rol['rol_id']);
                    $rolObj->setRolName($rol['rol_name']);
                    array_push($rolList, $rolObj);
                }
                return $rolList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # RF05_CU05 - Obtener el Rol por el código
        public function getrol_bycode($rolCode){
            try {
                $sql = "SELECT * FROM ROLES WHERE rol_id=:rolCode";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $rolCode);
                $stmt->execute();
                $rolDb = $stmt->fetch();
                $rol = new User;
                $rol->setRolCode($rolDb['rol_id']);
                $rol->setRolName($rolDb['rol_name']);
                return $rol;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # RF06_CU06 - Actualizar Rol
        public function update_rol(){
            try {
                $sql = 'UPDATE ROLES SET
                            rol_id = :rolCode,
                            rol_name = :rolName
                        WHERE rol_id = :rolCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $this->getRolCode());
                $stmt->bindValue('rolName', $this->getRolName());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # RF07_CU07 - Eliminar Rol
        public function delete_rol($rolCode){
            try {
                $sql = 'DELETE FROM ROLES WHERE rol_id = :rolCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $rolCode);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # RF08_CU08 - Registrar Usuario
        public function create_user(){
            try {
                $sql = 'INSERT INTO USERS VALUES (
                            :userId,
                            :rolCode,
                            :userName,                                                        
                            :userEmail,
                            :userPhone,
                            :userPass,
                            :userState
                        )';
                $stmt = $this->dbh->prepare($sql);
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

        // # RF09_CU09 - Consultar Usuarios
        public function read_users(){
            try {
                $userList = [];
                $sql = 'SELECT
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
                        on r.rol_id = u.rol_id';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $user) {                    
                    $userObj = new User(
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

        // # RF10_CU10 - Obtener el Usuario por el código
        public function getuser_bycode($userCode){
            try {
                $sql = 'SELECT
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
                        WHERE user_id=:userCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userCode', $userCode);
                $stmt->execute();
                $userDb = $stmt->fetch();
                $user = new User(
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

        //  # RF11_CU11 - Actualizar usuario
         public function update_user(){
            try {
                $sql = 'UPDATE USERS SET
                            user_id = :userId,
                            rol_id = :rolCode,                            
                            user_name = :userName,                            
                            user_email = :userEmail,
                            user_phone = :userPhone,
                            user_pass = :userPass,
                            user_state = :userState
                        WHERE user_id = :userId';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $this->getRolCode());
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

        // # RF12_CU12 - Eliminar Usuario
        public function delete_user($userCode){
            try {
                $sql = 'DELETE FROM USERS WHERE user_id = :userCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userCode', $userCode);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // PROBLEMAS A SOLUCIONAR SOBRE LA MARCHA
        # ✓ # Incluir en la DB una tabla con Jornadas, grados y grupos
        
        # Carga masiva de datos Usuarios - Estudiantes
        # Disparadores de Users a Profesor, Estudiante y Acudiente.
          // Revisar porque genera conflicto cuando se actualicen los datos

        // VALIDACIONES
        # Validaciones de todos los formularios.
        # Cierre de DB en PDO
        # Incluir las Alertas (SweetAlert)
        # Pruebas Unitarias, Integración, Funcionales, Sistema

    
    }

?>