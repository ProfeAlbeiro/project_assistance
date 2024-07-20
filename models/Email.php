<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'phpmailer/Exception.php';
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';
    
    class Email{
        public static function conn_smtp(){            
            $mail = new PHPMailer(true);            
            $mail->SMTPDebug  = 0; 
            $mail->isSMTP();
            $mail->Host       = 'smtp.mailersend.net';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'MS_YCnkUu@trial-351ndgw8w0rgzqx8.mlsender.net';
            $mail->Password   = 'eFKhp12ntnvyeLEL';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            $mail->CharSet    = "UTF-8";
            return $mail;
        }
    }
?>