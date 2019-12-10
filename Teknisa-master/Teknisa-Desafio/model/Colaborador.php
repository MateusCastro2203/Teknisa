<?php
include __DIR__.'/Conexao.php';

class Colaborador extends Conexao {

    //DECLARAÇÃO DE VARIAVEIS
    private $idcolab;
    private $nome;
    private $email;
    private $telefone;

 


    //SETANDO AS VARIAVEIS JÁ DECLARADAS
    public function getId(){
        return $this->idcolab;
    }

    public function setId($idcolab){
        $this->idcolab = $idcolab;
        return $this;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }


    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
        return $this;
    }


    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
        return $this;
    }

    
    //FUNÇÃO PARA INSERIR NA TABELA DO ABANCO DE DADOS OS COLABORADORES
    public function insert($obj){
            $sql = "INSERT INTO tb_colaborador(NOMECOLAB, EMAILCOLAB, TELEFONECOLAB) VALUES (:nome , :email, :telefone)";
            $consulta = Conexao::prepare($sql);
            $consulta->bindValue('nome', $obj->nome);
            $consulta->bindValue('email', $obj->email);
            $consulta->bindValue('telefone', $obj->telefone);
            return $consulta->execute();
        
    }

    //FUNÇÃO PARA EXCLUIR UM USUARIO
    public function delete($obj,$id = null){
		$sql =  "DELETE FROM  tb_colaborador WHERE ID = :id";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('id',$id);
        return $consulta->execute();
	}

    //FUNÇÃO PARA FAZER ALTERAÇÃO NO USUARIO
    public function update($obj,$id = null){
        $sql = "UPDATE tb_colaborador SET NOMECOLAB = :nome , EMAILCOLAB = :email TELEFONECOLAB = :telefone WHERE ID = :id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('nome', $obj->nome);
        $consulta->bindValue('email', $obj->email);
        $consulta->bindValue('telefone', $obj->$telefone);
        $consulta->bindValue('id',$id);
        return $consulta->execute();
    }
    //FUNÇÃO PARA BUSCAR O USUARIO
    public function find(){
        $sql =  "SELECT *FROM tb_colaborador WHERE 1";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        $count = $consulta->rowCount();
        return $consulta->fetchAll();
    }

    public function findone(){
        
    }

}
?>