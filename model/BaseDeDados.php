<?php
class BaseDeDados{
    private $servidor;
    private $baseDeDados;
    private $usuario;
    private $senha;

    public function __construct(){
        $this->servidor = 'localhost';
        $this->baseDeDados = 'loja_veiculo';
        $this->usuario = 'root';
        $this->senha = '';
    }
    public function getConexao(){
        return new PDO("mysql:host=$this->servidor;dbname=$this->baseDeDados", $this->usuario, $this->senha);
    }
}