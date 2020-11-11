<?php

class GeraChave {
    public $estrelas = array();
    public $numeros = array();

    public function __construct(){
        $this->estrelas = $this->gerar(1, 12, 2);
        $this->numeros = $this->gerar(1, 50, 5);
    }

    private function gerar($min, $max, $num){
        $chave = array();
    
        while(count($chave) < $num){
            $novo = rand($min, $max);
    
            if(!in_array($novo, $chave)){
                array_push($chave, $novo);
            }
        }
    
        sort($chave);
    
        return $chave;
    }

    public function asJson(){
        return json_encode($this);
    }
}

?>