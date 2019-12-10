<?php
include __DIR__.'/../model/AgendamentoSala.php';

class AgendamentoSalaControl{
    function insert($obj){
        $agendamentoSala = new AgendamentoSala();
        return $agendamentoSala->insert($obj);
    }
    function find($obj){
        $agendamentoSala = new AgendamentoSala();
        return $agendamentoSala->find($obj);
    }
}

?>