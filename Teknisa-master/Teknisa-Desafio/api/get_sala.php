<?php
include __DIR__.'/../control/SalaReuniaoControl.php';

$SalaControl = new AgendamentoSalaControl();

header('Content-type: application/json');


if($SalaControl->find()){
    http_response_code(200);
	echo json_encode($SalaControl->find());
}else{
    http_response_code(400);
    echo json_encode(array("mensagem" => "Não encontrado"));
}



?>