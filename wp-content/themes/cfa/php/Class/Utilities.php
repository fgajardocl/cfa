<?php
/*********************************************************************************************************

	Archivo		: Utilities.php
	Creador		: Francisco Gajardo
	Descripcion	: Clase para conexion a base de datos

	HISTORIAL DE CAMBIOS
	Nombre				Fecha				Descripcion
	-----------------------------------------------------------------------------------------------

**********************************************************************************************************/

class Utilities{
	private $bd;
	public $lastSql;
	
	public $siteURL 	= '';
	public $mfURL 		= '';
	public $uploadURL 	= '';
    

	function __construct(){
        
	}
	
	
	/*****************************/
	/*** FUNCIONES UTILITARIAS ***/
	/*****************************/
	private function getYoutubeIDFromLink($url){ 
		parse_str( parse_url( $url, PHP_URL_QUERY ) ); 
		$key = !empty( $v ) ? $v : $url; 
		 
		return $key; 
	}
	private function replaceEnter($s){
		$order   = array("\r\n", "\n", "\r");
		$replace = '<br />';
		return str_replace($order,$replace,$s);
	}
	private function replaceDobleBR($s){
		$order   = array("<br /><br />", "<br ><br >", "<br><br>");
		$replace = '<br />';
		$s = str_replace($order,$replace,$s);
		$order   = array("</ul><br />", "</ul><br >", "</ul><br>");
		$replace = '</ul>';
		return str_replace($order,$replace,$s);
	}
	private function randStr($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	/******************/
	
    
    
	public function sendMail($email = 'panxo_g@hotmail.com', $content = ''){
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);                          // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.fgajardo.com';                 // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'devtest@fgajardo.com';                // SMTP username
            $mail->Password = 'K1YJemE{=PtA';                     // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to - 465 - 587

            $mail->setFrom('noreply@enex.cl', 'noreply@enex.cl');
            $mail->addAddress($email);
            //            $content = file_get_contents('mail.html');
            $content = 'MAIL DE PRUEBA 001';

            $mail->isHTML(true);
            $mail->Subject = 'Formulario de contacto desde enex';
            $mail->Body    = $content;
            $mail->AltBody = 'Formulario de contacto desde enex';

            $mail->send();
            
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    
    
    public static function deleteFile($file) {
        return unlink($file);
    }
    
    public static function deleteDirAll($dirPath) {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDirAll($file);
            } else {
                unlink($file);
            }
        }
        sleep(2);
        rmdir($dirPath);
    }
    
    
    public function createDir($path,$permisos=0777){
        if (!file_exists($path)) {
            mkdir($path, $permisos, true);
        }
    }
    
    public function uploadFile($file_name_var,$uploadFileDir,$allowedfileExtensions = ['pdf'],$i = false){
        $rs['msg'] = '';
        $rs['status'] = 'error';
        
        //        var_dump($i);
        //        var_dump($_FILES);
        if($i===false){
            if (isset($_FILES[$file_name_var]) && $_FILES[$file_name_var]['error'] === UPLOAD_ERR_OK){

                $fileTmpPath = $_FILES[$file_name_var]['tmp_name'];
                $fileName = $_FILES[$file_name_var]['name'];
                $fileSize = $_FILES[$file_name_var]['size'];
                $fileType = $_FILES[$file_name_var]['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));

                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

                if (in_array($fileExtension, $allowedfileExtensions)){
                    $dest_path = $uploadFileDir . $newFileName;

                    $this->createDir($uploadFileDir);
                    if(move_uploaded_file($fileTmpPath, $dest_path)){
                        chmod($dest_path, 0666);
                        $rs['msg'] ='File is successfully uploaded.';
                        $rs['new_file_name'] = $newFileName;
                        $rs['status'] = 'ok';
                    }else{
                    $rs ['msg'] = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
                    }
                }else{
                    $rs['msg'] = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
                }
            }else{
                $rs['msg'] = 'There is some error in the file upload. Please check the following error.<br>';
                $rs['error'] = $_FILES[$file_name_var]['error'];
            }
        }else{
            if (isset($_FILES[$file_name_var]) && $_FILES[$file_name_var]['error'][$i] === UPLOAD_ERR_OK){

                $fileTmpPath = $_FILES[$file_name_var]['tmp_name'][$i];
                $fileName = $_FILES[$file_name_var]['name'][$i];
                $fileSize = $_FILES[$file_name_var]['size'][$i];
                $fileType = $_FILES[$file_name_var]['type'][$i];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                
//                var_dump($fileTmpPath);
//                var_dump($fileExtension);

                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

                if (in_array($fileExtension, $allowedfileExtensions)){
                    $dest_path = $uploadFileDir . $newFileName;

                    $this->createDir($uploadFileDir);
                    if(move_uploaded_file($fileTmpPath, $dest_path)){
                        chmod($dest_path, 0666);
                        $rs['msg'] ='File is successfully uploaded.';
                        $rs['new_file_name'] = $newFileName;
                        $rs['status'] = 'ok';
                    }else{
                    $rs ['msg'] = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
                    }
                }else{
                    $rs['msg'] = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
                }
            }else{
                $rs['msg'] = 'There is some error in the file upload. Please check the following error.<br>';
                $rs['error'] = $_FILES[$file_name_var]['error'][$i];
            }
        }
        return $rs;
    }

    
    public function isRecaptcha($secret){
        // return true;
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $myvars = 'secret=' . $secret . '&response=' . $_POST['token'];

        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec( $ch );
        $response = json_decode($response);
        
        return $response->success;
    }


    
    public function is_valid_email($str){
        $matches = null;
        return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $str, $matches));
    }
    public function valida_rut($rut){
        if($rut=='') return false;
        $rut = preg_replace('/[^k0-9]/i', '', $rut);
        $dv  = substr($rut, -1);
        $numero = substr($rut, 0, strlen($rut)-1);
        $i = 2;
        $suma = 0;
        foreach(array_reverse(str_split($numero)) as $v)
        {
            if($i==8)
                $i = 2;

            $suma += $v * $i;
            ++$i;
        }

        $dvr = 11 - ($suma % 11);
        
        if($dvr == 11)
            $dvr = 0;
        if($dvr == 10)
            $dvr = 'K';

        if($dvr == strtoupper($dv))
            return true;
        else
            return false;
    }
    
    public function validar($form = ''){
        $msg = array();
        $isError = false;
        if($form=='contacto'){
            $arrCampos = array(
                'uname'     => array('required'),
                'userEmail' => array('required','mail'),
                'telefono'  => array('required'),
                'content'   => array('required'),
            );
        }else{
            $arrCampos = array(
                'nombre'        => array('required'),
                'apellido'      => array('required'),
                'empresa'       => array('required'),
                'rut'           => array('required','rut'),
                'telefono'      => array('required'),
                'mail'          => array('required','mail'),
                'comentarios'   => array('required'),
            );
        }
        $campos_error = [];

        foreach($arrCampos as $k => $v){
            foreach($v as $k2=>$v2){
                if($v2 == 'required'){
                    if(trim($_POST[$k]) == ''){
                        $msg[] = 'El campo '.$k.' es obligatorio';
                        $isError = true;
                        $campos_error[] = $k;
                    }
                }
                if($v2 == 'mail'){
                    if(!$this->is_valid_email($_POST[$k])){
                        $msg[] = 'Debe ingresar un email válido';
                        $isError = true;
                        $campos_error[] = $k;
                    }
                }
                if($v2 == 'rut'){
                    if(!$this->valida_rut($_POST[$k])){
                        $msg[] = 'Debe ingresar un rut válido';
                        $isError = true;
                        $campos_error[] = $k;
                    }
                }
                if($v2 == 'telefono'){
                    if(!is_numeric($_POST[$k])){
                        $msg[] = 'Debe ingresar un teléfono válido';
                        $isError = true;
                        $campos_error[] = $k;
                    }
                    if($_POST[$k]<10000000){
                        $msg[] = 'Debe ingresar un teléfono válido';
                        $isError = true;
                        $campos_error[] = $k;
                    }
                }
                if($v2 == 'option'){
                    if(trim($_POST[$k]) == '' || $_POST[$k] == '0'){
                        $msg[] = 'Debe ingresar una opción valida';
                        $isError = true;
                        $campos_error[] = $k;
                    }
                }
            }
        }

        return array('msg'=>$msg,'isError'=>$isError,'campos_error'=>$campos_error);
    }
}



?>