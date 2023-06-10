<?php

class ConfigBD{
    
    public $host;
    public $usuario;
    public $senha ;
    public $base ;
    public $ambiente = 0; # 0 - testes_noteRodrigo;  1 - producao

    

    public function configurarBD(){

        if ($this->ambiente == 0){
            $this->host = 'localhost';
            $this->usuario ='root';
            $this->senha = '';
            $this->base = 'bd_sisvendas1';    
        }
    }

    public function getConfig(){
        $this->configurarBD();
        
        $con = mysqli_connect(
        $this->host,
        $this->usuario,
        $this->senha,
        $this->base
        ) or die('Erro ao conectar ao banco de dados');
        //echo $strcon->conbd_host . '_x__<br>';

        return $con;
    }

    
}


 ?>