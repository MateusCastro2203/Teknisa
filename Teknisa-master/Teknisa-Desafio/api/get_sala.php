<?php
include __DIR__.'/../control/AgendamentoSalaControl.php';

$SalaControl = new AgendamentoSalaControl();

header('Content-type: application/json');
$data_Reserva = $_POST['data_Reserva'];
$hora_Ini = $_POST['hora_Ini'];
$hora_Fim = $_POST['hora_Fim'];
$salaNome = $_POST['salaNome'];
$quantCad = $_POST['quantCad'];
$contComp = $_POST['contComp'];
$contProj = $_POST['contProj'];
$contVideoChamada = $_POST['contVideoChamada'];

if($SalaControl->find($data_Reserva,$hora_Ini,$hora_Fim,$salaNome,$quantCad,$contComp,$contProj,$contVideoChamada)){
    http_response_code(200);
	echo json_encode($SalaControl->find());
}else{
    http_response_code(400);
    echo json_encode(array("mensagem" => "Não encontrado"));
}



?>