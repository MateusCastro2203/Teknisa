<?php

include __DIR__.'/../control/ColaboradorControl.php';

$colaborador = new ColaboradorControl();

header('Content-type: application/json');

if($colaborador->find(2)){
    http_response_code(200);
	echo json_encode($colaborador->find());
}else{
    http_response_code(400);
    echo json_encode(array("mensagem" => "Não encontrado"));
}

?>