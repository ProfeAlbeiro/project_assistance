<?php
    class Notification{
        private $dbh;
        private $mail;
        
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


        // # RF09_CU09 - Enviar Email a acudiente
        private function send_email($notifications){
            try {
                foreach ($notifications as $notification) {                    
                    $this->mail = Email::conn_smtp();
                    $this->mail->setFrom('MS_YCnkUu@trial-351ndgw8w0rgzqx8.mlsender.net', 'Asistencia Colegios');
                    $this->mail->addAddress($notification['guardian_email'], $notification['guardian_name']);
                    $this->mail->isHTML(true);
                    $this->mail->Subject = $notification['attend_state'];                    
                    $str = '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
                    $str .= '<body style="box-sizing:border-box;font-family:"Roboto",sans-serif;font-weight:400;font-style:normal;">
                                <div>
                                    <div style="background:#0D6EFD;font-size:1.5em;color:#fff;text-align:center;padding:10px;margin:0;border-radius:10px 10px 0 0;">
                                    Asistencia Colegios</div>
                                    <div style="background:#F6F9FF;padding:10px;border:1px solid #ddd;color:#000">
                                    <div style="padding:5px 10px;height:20px;">
                                        <div style="width:50%;float:left;text-align:right;padding-right:10px;"><b>¿Asistencia? :</b></div>
                                        <div>
                                        '.$notification['attend_state'].'
                                        </div>
                                    </div>
                                    <div style="padding:5px 10px;height:20px;">
                                        <div style="width:50%;float:left;text-align:right;padding-right:10px;"><b>Nombre :</b></div>
                                        <div>
                                        '.$notification['student_name'].'
                                        </div>
                                    </div>
                                    <div style="padding:5px 10px;height:20px;">
                                        <div style="width:50%;float:left;text-align:right;padding-right:10px;"><b>Identificación :</b></div>
                                        <div>
                                        '.$notification['student_id'].'
                                        </div>
                                    </div>
                                    <div style="padding:5px 10px;height:20px;">
                                        <div style="width:50%;float:left;text-align:right;padding-right:10px;"><b>Jornada :</b></div>
                                        <div>
                                        '.$notification['journe_name'].'
                                        </div>
                                    </div>
                                    <div style="padding:5px 10px;height:20px;">
                                        <div style="width:50%;float:left;text-align:right;padding-right:10px;"><b>Grupo :</b></div>
                                        <div>
                                        '.$notification['grade_id'].$notification['course_name'].'
                                        </div>
                                    </div>
                                    <div style="padding:5px 10px;height:20px;">
                                        <div style="width:50%;float:left;text-align:right;padding-right:10px;"><b>Celular :</b></div>
                                        <div>
                                        '.$notification['student_phone'].'
                                        </div>
                                    </div>
                                    <div style="padding:5px 10px;height:20px;">
                                        <div style="width:50%;float:left;text-align:right;padding-right:10px;"><b>Fecha :</b></div>
                                        <div>
                                        '.$notification['assistance_date'].'
                                        </div>
                                    </div>
                                    <div style="padding:5px 10px;height:20px;">
                                        <div style="width:50%;float:left;text-align:right;padding-right:10px;"><b>Hora :</b></div>
                                        <div>
                                        '.$notification['assistance_start_time'].'
                                        </div>
                                    </div>
                                    </div>
                                    <div style="background:#0D6EFD;font-size:0.6em;color:#fff;text-align:center;padding:10px;margin:0;border-radius:0 0 10px 10px;">
                                    <div>&copy; Copyright <strong><span>SisWebColegios</span></strong>.</div>
                                    <div>Todos los derechos reservados. Diseñado por <b><a href="#" style="color:#222;">SisWebColegios</a></b></div>
                                    </div>    
                                </div>
                            </body>';
                    $this->mail->Body = $str;
                    $this->mail->send();
                }
            } catch (Exception $e) {
                echo "Error al enviar: {$this->mail->ErrorInfo}";
            }
        }

        // # RF09_CU09 - Consultar Usuarios
        public function create_notification($student_id){
            try {                
                $sql = 'SELECT
                            gd.user_name AS guardian_name,
                            gd.user_email AS guardian_email,
                            gd.user_phone AS guardian_phone,
                            st.user_id AS student_id,
                            st.user_name AS student_name,
                            st.user_phone AS student_phone,
                            st.user_email AS student_email,
                            j.journe_name,
                            g.grade_id,
                            c.course_name,    
                            t.attend_id,
                            t.attend_state,
                            a.assistance_date,
                            a.assistance_start_time
                        FROM GUARDIANS_STUDENTS AS gs
                        JOIN (SELECT * FROM USERS WHERE rol_id = 4) AS gd
                        ON gs.guardian_id = gd.user_id
                        JOIN (SELECT * FROM USERS WHERE rol_id = 3) AS st
                        ON gs.student_id = st.user_id
                        INNER JOIN JOURNES_GRADES_COURSES AS jgg
                        ON st.user_id = jgg.student_id
                        INNER JOIN JOURNES AS j
                        ON jgg.journe_id = j.journe_id
                        INNER JOIN GRADES AS g
                        ON jgg.grade_id = g.grade_id
                        INNER JOIN COURSES AS c
                        ON jgg.course_id = c.course_id
                        INNER JOIN ASSISTANCES AS a
                        ON st.user_id = a.student_id
                        INNER JOIN ATTENDS AS t
                        ON a.attend_id = t.attend_id
                        WHERE st.user_id = :studentId AND (t.attend_id = 2 OR t.attend_id = 3)
                        ORDER BY a.assistance_date DESC, a.assistance_start_time DESC LIMIT 1';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('studentId', $student_id);
                $stmt->execute();
                $notifications = $stmt->fetchAll();                
                $this->send_email($notifications);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }
?>