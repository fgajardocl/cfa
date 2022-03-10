<?php
/*********************************************************************************************************

	Archivo		: BD.php
	Creador		: Francisco Gajardo
	Fecha		: 2019-03-01
	Descripcion	: Clase para conexion a base de datos

	HISTORIAL DE CAMBIOS
	Nombre				Fecha				Descripcion
	-----------------------------------------------------------------------------------------------

**********************************************************************************************************/

class Site{
	private $bd;
	public $lastSql;
	
	public $siteURL 	= '';
	public $mfURL 		= '';
	public $uploadURL 	= '';

	public $mail_Host       = 'smtp.gmail.com';
	public $mail_SMTPAuth   = true;
	public $mail_Username   = 'contacto@vestingpartners.cl';
	public $mail_Password   = 'V3sting2021';
	public $mail_SMTPSecure = 'ssl';
	public $mail_Port       = 465;

	function __construct(){
		$this->util = new Utilities();
	}
	
	private function randStr($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
    
	/***************************/
	/*** OBTENER DATOS SITIO ***/
	/***************************/
	public function getChat($from = '0'){
		$sql = "
            SELECT * FROM 02_chat a
            INNER JOIN 01_usuario b ON a.usu_id = b.usu_id
            WHERE a.cha_estado = 2
            -- AND a.cha_id>'".$from."'
            ORDER BY a.cha_fecha ASC 
		";
		$data = array();
		if($rs = $this->bd->mysqli->query($sql)){
			while($obj = $rs->fetch_object()){
				$data[] = array(
                    'cha_id'      => $obj->cha_id,
                    'cha_text'    => $obj->cha_text,
                    'cha_fecha'   => $obj->cha_fecha,
                    'cha_estado'  => $obj->cha_estado,
                    'usu_nombre'  => $obj->usu_nombre,
                    'usu_inicial' => $obj->usu_inicial,
                    'usu_tipo'    => $obj->usu_tipo,
                );
			}
		}
		
		return $data;
	}
	/************************/
	
	/**************************/
	/*** SETEAR DATOS SITIO ***/
	/**************************/
    public function addContacto(){
		global $wpdb;

		$table = 'xjjn_contacto';
		if($_POST['tipo_form']=='contacto'){
			$upload_dir = wp_upload_dir();
            $arrAdjuntos = array();
            $rs_upload = $this->util->uploadFile('adjuntos',$upload_dir['basedir'].'/uploads_contacts/',['pdf']);
			$arrAdjuntos[] = $rs_upload['new_file_name'];
            
			$data = array(
				'con_nombre' 	=> $_POST['uname'],
				'con_email' 	=> $_POST['userEmail'],
				'con_telefono' 	=> $_POST['telefono'],
				'con_mensaje' 	=> $_POST['content'],
			);
			$format = array('%s','%s','%s','%s');
		}else{
			$data = array(
				'con_nombre' 		=> $_POST['nombre'],
				'con_apellido' 		=> $_POST['apellido'],
				'con_empresa' 		=> $_POST['empresa'],
				'con_telefono' 		=> $_POST['telefono'],
				'con_rut' 			=> $_POST['rut'],
				'con_mail' 			=> $_POST['mail'],
				'con_comentarios' 	=> $_POST['comentarios'],
				'con_tipo_contacto' => $_POST['tipo_form']=='contacto'?1:2,
			);
			$format = array('%s','%s','%s','%s','%s','%s','%s','%d');
		}
		
		if($wpdb->insert($table,$data,$format)){
			$lastId = $wpdb->insert_id;
			$status = 'ok';

			// $this->sendMail('panxo_g@hotmail.com');
			$this->sendMail('contacto@vestingpartners.cl');
		}
		
		//RESPONDER
		$response = array();
		$response['status'] = $status;
		$response['sql'] 	= $sql;
		$response['lastId'] = $lastId;
		return $response;
	}
	/************************/
	
	/**************************/
	/*** MOD DATOS SITIO ***/
	/**************************/
	public function setOptions($data){
        
        foreach($data as $k=>$v){
            
            $sql = "
                UPDATE `03_opciones` SET `op_value`='".$v."' WHERE  `op_key`='".$k."';
            ";
            $status = 'error';
            if($rs = $this->bd->mysqli->query($sql)){
                $status = 'ok';
            }
            
        }
		
		return $status;
	}
    
    
    
	public function sendMail($email){
        
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);                          // Passing `true` enables exceptions
        try {

            $mail->SMTPDebug = 1;                                 // Enable verbose debug output
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                      // Set mailer to use SMTP
            
            $mail->Host 		= $this->mail_Host;
            $mail->SMTPAuth 	= $this->mail_SMTPAuth;
            $mail->Username 	= $this->mail_Username;
            $mail->Password 	= $this->mail_Password;
            $mail->SMTPSecure 	= $this->mail_SMTPSecure;
            $mail->Port 		= $this->mail_Port;

            $mail->setFrom('contacto@vestingpartners.cl', 'Vesting Partners');
            $mail->addAddress($email);

            if($_POST['tipo_form']=='contacto'){
                
            }else{
                
            }
        
            $content = "
            <table rules=\"all\" style=\"border-color:#666\" cellpadding=\"10\">
                <tbody>
                    <tr style=\"background:#eee\">
                        <td><strong>Nuevo Contacto:</strong> </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><strong>Nombre</strong> </td>
                        <td>".$_POST['uname']."</td>
                    </tr>   
                    <tr>
                        <td><strong>Email</strong> </td>
                        <td>".$_POST['userEmail']."</td>
                    </tr>   
                    <tr>
                        <td><strong>Telefono</strong> </td>
                        <td>".$_POST['telefono']."</td>
                    </tr>   
                    <tr>
                        <td><strong>Mensaje</strong> </td>
                        <td>".$_POST['content']."</td>
                    </tr>             
                </tbody>
            </table>";

            $mail->isHTML(true);
            $mail->Subject = 'Nuevo mensaje de contacto';
            $mail->Body    = $content;
            $mail->AltBody = 'Nuevo mensaje de contacto';

            $mail->send();
            
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
	public function sendTestMail($email = 'panxo_g@hotmail.com', $content = ''){
        
        
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);                          // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 1;
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();

            $mail->Host 		= $this->mail_Host;
            $mail->SMTPAuth 	= $this->mail_SMTPAuth;
            $mail->Username 	= $this->mail_Username;
            $mail->Password 	= $this->mail_Password;
            $mail->SMTPSecure 	= $this->mail_SMTPSecure;
            $mail->Port 		= $this->mail_Port;

            $mail->setFrom('test@test.cl', 'Test');
            $mail->addAddress($email);
            $content = '<h2>test de content</h2>';
            
            $mail->isHTML(true);
            $mail->Subject = 'Subject';
            $mail->Body    = $content;
            $mail->AltBody = 'Subject';
            
            //            var_dump($content);
            
            $mail->send();
            
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}



?>