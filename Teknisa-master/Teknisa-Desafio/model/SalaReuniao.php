<?php
include __DIR__.'/Conexao.php';

class SalaReuniao extends Conexao{
    private $nome;
    private $quantCad;
    private $contComp;
    private $contProj;
    private $contVideoChamada;

    //FNÇÕES PARA SETAR O NOME DA SALA
    function getNome(){
        return $this->nome;
    }
    function setNome($name){
        $this->nome = $name;
        return $this;
    }

    //FUNÇÕES PARA SETAR A QUANTIDADE DE CADEIRAS QUE A SALA A POSSUI
    function getQuantCad(){
        return $this->quantCad;
    }
    function setQuantCad($cadeiras){
        $this->quantCad=$cadeiras;
        return $this;
    }

    //FUNÇÕES PARA SETAR SE A SALA POSSUI COMPUTADORES
    function getContComp(){
        return $this->contComp;
    }
    function setContComp($computadores){
        $this->contComp = $computadores;
        return $this;
    }

    //FUNÇÕES PARA SETAR SE A SALA POSSUI PROJETOR
    function getContProj(){
        return $this->contProj;
    }
    function setContProj($projetores){
        $this->contProj = $projetores;
        return $this;
    }

    //FUNÇOES PARA SETAR SE A SALA POSSUI SISTEMA PARA VIDEO CHAMADA
    function getContVideoChamada(){
        return $this->contVideoChamada;
    }
    function setContVideoChamada($videoChamada){
        $this->contVideoChamada = $videoChamada;
        return $this;
    }

    //FUNÇÃO PARA INSERIR NA TABELA DO ABANCO DE DADOS AS SALAS
    public function insert ($obj){
        //VALIDAÇÃO PARA VER SE JA EXITE UMA SALA COM ESSE NOME
        $verifica = "SELECT NOMESALA FROM td_salareuniao WHERE NOMESALA = :nome";
        $consulta = Conexao::prepare($verifica);
        $consulta->bindValue('nome', $obj->nome);
        $consulta->execute();
        //VERIFICANDO SE FOI ENCONTRADO ALGUMA SALA
        $count = $consulta->rowCount();
        if($count == 0){
            $sql = "INSERT INTO td_salareuniao(NOMESALA, QUANTCAD, COMPUTADOR, PROJETOR, VIDEOCHAMADA) VALUES (:nome,:quantCad,:contComp,:contProj,:contVideoChamada)";
            $consulta = Conexao::prepare($sql);
            $consulta->bindValue('nome',$obj->nome);
            $consulta->bindValue('quantCad',$obj->quantCad);
            $consulta->bindValue('contcomp',$obj->contComp);
            $consulta->bindValue('contProj',$obj->contProj);
            $consulta->bindValue('contVideoChamada',$obj->contVideoChamada);
            return $consulta->execute();
        }else{
            $retorna = "SALA JÁ EXISTENTE";
            return $retorna;
        }
    }

    //FUNÇÃO PARA FAZER ALTERAÇÃO NA SALA
    public function update($obj,$id = null){
        $sql = "UPDATE td_salareuniao SET NOMESALA = :nome , QUANTCAD = :quantCad, COMPUTADOR = :contComp , PROJETOR = :contProj , VIDEOCHAMADA = :contVideoChamada WHERE ID = :id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('nome',$obj->nome);
        $consulta->bindValue('quantCad',$obj->quantCad);
        $consulta->bindValue('contComp',$obj->contComp);
        $consulta->bindValue('contProj',$obj->contProj);
        $consulta->bindValue('contVideoChamada',$obj->contVideoChamada);
        return $consulta->execute();
    }

    //FUNÇÃO PARA EXCLUIR UMA SALA
    public function delete($obj,$id = null){
		$sql =  "DELETE FROM  tb_salareuniao WHERE ID = :id";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('id',$id);
		return $consulta->execute();
	}



}
?>