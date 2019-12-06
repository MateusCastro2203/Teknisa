<?php
include __DIR__.'/../control/AgendamentoSalaControl.php';

$agendamentoSala = new AgendamentoSalaControl();

header('Content-type: application/json');

if($agendamentoSala->find()){
    http_response_code(200);
	echo json_encode($agendamentoSala->find());
}else{
    http_response_code(400);
    echo json_encode(array("mensagem" => "Não encontrado"));
}



?>