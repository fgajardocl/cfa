<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('../../../../wp-load.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

include 'Class/Utilities.php';
include 'Class/Site.php';

$Utilities = new Utilities();
$Site = new Site();

if($Utilities->isRecaptcha(RECAPTCHA_APP_SECRET)){
    $rs_val = $Utilities->validar($_POST['tipo_form']);
    if(!$rs_val['isError']){
        if($Site->addContacto()){
            ?><script>parent.SITE.formMessage('¡Formulario enviado correctamente!');</script><?php
        }else{?>
            <script>parent.SITE.formMessage('Hubo un error enviando el formulario. Por favor intente más tarde.');</script>
        <?php }
    }else{
        ?><script>parent.SITE.errorForm('<?php echo json_encode($rs_val);?>');</script><?php
    }
}else{
    ?><script>parent.SITE.formMessage('La validación captcha no ha sido superada.');</script><?php
}

