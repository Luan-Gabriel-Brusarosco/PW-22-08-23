<?php
require_once 'model/Montadora.php';
require_once 'view/montadora.php';

# Removendo 'montadora' da array $url;
array_shift($url);

function get($consulta, $valor=''){
    $montadora = new Montadora();
    $viewMontadora = new viewMontadora();
    if($consulta == "id"){
        $montadora = $montadora->consultarPorId($valor);
        $viewMontadora->exibirMontadoraId($montadora);        
    }
    elseif($consulta == "nome"){
        $montadora = $montadora->consultar($valor);
        $viewMontadora->exibirMontadora($montadora);
    }
    else{
        $montadora = $montadora->consultar();
        $viewMontadora->exibirMontadora($montadora);
    }
} 

function post($dados_montadora){
    $montadora                    = new Montadora();
    $viewMontadora                = new viewMontadora();
    $montadora->nome              = $dados_montadora->nome;
    $montadora->logotipo          = $dados_montadora->logotipo;
    $viewMontadora->exibirMontadora($montadora->cadastrar());
}

switch($method){    
    case "GET":get(@$url[0],@$url[1]);
    break;
    case "POST":post($dadosRecebidos);
    break;
    case "PUT":{
        echo json_encode(["method"=>"PUT"]);
    }
    break;
    case "DELETE":{
        echo json_encode(["method"=>"DELETE"]);
    }
    break;
    default:{
        echo json_encode(["method"=>"ERRO"]);
    }
    break;
}