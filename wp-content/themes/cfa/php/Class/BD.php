<?php
class BD{
    private $server = '';
    private $user 	= '';
    private $pass	= '';
    private $bd		= '';
	
	public $mysqli;
	
	function __construct(){
        if($_SERVER['SERVER_NAME']=='localhost'){
            $this->server   = 'localhost';
            $this->user 	= 'root';
            $this->pass	    = '';
            $this->bd		= 'relacionestoxicas';
        }elseif($_SERVER['SERVER_NAME']=='dev.d85estudio.com'){
            $this->server   = 'localhost';
            $this->user 	= 'd85estud_d85';
            $this->pass	    = '&kAE)8Um1iR_';
            $this->bd		= 'd85estud_relacionestoxicas';
        }else{
            $this->server   = 'localhost';
            $this->user 	= 'relacion_toxica';
            $this->pass	    = '5#kD2TI[VO]S';
            $this->bd		= 'relacion_toxica';
        }
		$this->connect();
	}
	
	private function connect(){
		$this->mysqli = new mysqli($this->server, $this->user, $this->pass, $this->bd);
		
		if ($this->mysqli->connect_errno){
			return false;
		}else{
			return true;
		}
	}
}




?>