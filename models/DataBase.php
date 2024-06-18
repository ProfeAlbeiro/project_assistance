<?php
    class DataBase{
        
        # Conexión Azure
        public static function connection(){            
            $hostname = "server-colegios.mysql.database.azure.com";
            $port = "3306";
            $database = "db_assistance";
            $username = "admin_colegio";
            $password = "colegio@123";
            $options = array(
                PDO::MYSQL_ATTR_SSL_CA => 'assets/db/DigiCertGlobalRootCA.crt.pem'
            );
			$pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$database;charset=utf8",$username,$password,$options);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}

        #  Conexión Local
        // public static function connection(){
        //     $hostname = "localhost";
        //     $port = "3306";
        //     $database = "db_asistencia";
        //     $username = "root";
        //     $password = "";
		// 	$pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$database;charset=utf8",$username,$password);
		// 	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// 	return $pdo;
		// }
	}
?>