<?php
include __DIR__.'/SalaReuniao.php';

class AgendamentoSala extends SalaReuniao{
  private $data_Reserva;
  private $hora_Ini;
  private $hora_Fim;
  


  function getDataReserva(){
    return $this->data_reserva;
}
  function setDataReserva($data_reserva){
    $this->data_reserva = $data_reserva;
    return $this;
}

  function getHoraIni(){
      return $this->hora_Ini;
  }
  function setHoraIni($hora_Ini){
      $this->hora_Ini = $hora_Ini;
      return $this;
  }

  function getHoraFim(){
      return $this->hora_Fim;
  }
  function setHoraFim($hora_Fim){
      $this->hora_Fim = $hora_Fim;
      return $this;
  }

  public function insert($obj ,$idsala=null,$idcolaborador=null){
      $sql = "INSERT INTO tb_agendamento(IDSALA,IDCOLABORADOR, HORAFIM, HORAINI, DATA) VALUES (:idsala,:idcolaborador, :hora_Fim , :hora_Ini, :data_reserva)";
      $consulta = Conexao::prepare($sql);
      $consulta->bindValue('idsala',  $idsala);
      $consulta->bindValue('idcolaborador',  $idcolaborador);
      $consulta->bindValue('hora_Fim', $obj->hora_Fim);
      $consulta->bindValue('hora_Ini', $obj->hora_Ini);
      $consulta->bindValue('data', $obj->data_reserva);
      return $consulta->execute();
  }

  public function find($data_Reserva=null,$hora_Ini=null,$hora_Fim=null,$salaNome=null,$quantCad=null,$contComp=null,$contProj=null,$contVideoChamada=null){
      $sql = "SELECT NOME FROM td_salareuniao WHERE ID NOT IN (SELECT IDSALA FROM tb_agendamento WHERE DATA = :data_Reserva 
      AND (hora_Ini BETWEEN :hora_Ini AND :hora_Fim OR hora_Fim BETWEEN :hora_Ini and :hora_Fim) 
      AND NOMESALA = :salaNome
      AND QUANTCAD >= :quantCad
      AND COMPUTADOR = :contComp
      AND PROJETOR = :contProj 
      AND VIDEOCHAMADA = :contVideoChamada)";
      $consulta = Conexao::prepare($sql);
      $consulta->bindValue('data_Reserva ', $data_Reserva);
      $consulta->bindValue('hora_Ini', $hora_Ini);
      $consulta->bindValue('hora_Fim', $hora_Fim);
      $consulta->bindValue('salaNome', $salaNome);
      $consulta->bindValue('quantCad', $quantCad);
      $consulta->bindValue('quantComp', $contComp);
      $consulta->bindValue('contProj', $contProj);
      $consulta->bindValue('contVideoChamada', $contVideoChamada);
      $consulta->execute();
      $count = $consulta->rowCount();
      if($count == 0){
        echo "Não foi encontrado sala ";
    }else{
        
        return $consulta->fetch();
    }
  }







}




?>