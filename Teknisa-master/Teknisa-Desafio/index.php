<?php
header("Access-Control-Allow-Origin: *");

define('PASTAPROJETO','Teknisa/Teknisa-master/Teknisa-Desafio/');
/* Função criada para retornar o tipo de requisição */

function checkRequest() {
	$method = $_SERVER['REQUEST_METHOD'];
	switch ($method) {
	  case 'PUT':
	  	$answer = "update";
	    break;
	  case 'POST':	  
	  	$answer = "post";
	    break;
	  case 'GET':
	  	$answer = "get";
	    break;
	  case 'DELETE':
	  	$answer = "delete";
	    break;	
	  default:
	    handle_error($method);  
	    break;
	}
	return $answer;
}

$answer = checkRequest();
$request = $_SERVER['REQUEST_URI']; 
// IDENTIFICA A URI DA REQUISIÇÃO

switch ($request) {
	case '/'.PASTAPROJETO:
	  require __DIR__.'/api/api.php';
	  var_dump($answer);
        break;
    case '/'.PASTAPROJETO.'colaborador':
        require __DIR__.'/api/'.$answer.'_colaborador.php';
        break;
    case '/'.PASTAPROJETO.'sala':
        require __DIR__.'/api/'.$answer.'_sala.php';
		break;
	case '/'.PASTAPROJETO.'agendamento':
		require __DIR__.'/api/'.$answer.'_agendamento.php';
		break;
    
    default:
        require __DIR__ .'/api/404.php';
        break;
}