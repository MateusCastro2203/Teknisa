<?php
include __DIR__.'/../model/AgendamentoSala.php';

class AgendamentoSalaControl{
    function insert($obj){
        $agendamentoSala = new AgendamentoSala();
        return $agendamentoSala->insert($obj);
    }
    function find($obj,$id=null){
        $agendamentoSala = new AgendamentoSala();
        return $agendamentoSala->find(1);
    }
}

?>