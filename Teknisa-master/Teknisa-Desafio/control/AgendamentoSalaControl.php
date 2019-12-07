<?php
include __DIR__.'/../model/AgendamentoSala.php';

class AgendamentoSalaControl{
    function insert($obj){
        $agendamentoSala = new AgendamentoSala();
        return $agendamentoSala->insert($obj);
    }
    function find($data_Reserva,$hora_Ini,$hora_Fim,$salaNome,$quantCad,$contComp,$contProj,$contVideoChamada){
        $agendamentoSala = new AgendamentoSala();
        return $agendamentoSala->find($data_Reserva,$hora_Ini,$hora_Fim,$salaNome,$quantCad,$contComp,$contProj,$contVideoChamada);
    }
}

?>