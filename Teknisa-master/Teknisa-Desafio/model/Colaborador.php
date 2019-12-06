<?php
include __DIR__.'/Conexao.php';

class Colaborador extends Conexao {

    //DECLARAÇÃO DE VARIAVEIS
    private $nome;
    private $email;
    private $telefone;

 


    //SETANDO AS VARIAVEIS JÁ DECLARADAS
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
        //VALIDAÇÃO PARA VER SE JA EXITE UM USUARIO COM ESSE NOME OU EMAIL
        $verifica = "SELECT INTO tb_colaborador(NOMECOLAB, EMAILCOLAB) WHERE NOMECOLAB = :nome OR EMAILCOLAB = :email";
        $consulta = Conexao::prepare($verifica);
        $consulta->bindValue('nome', $obj->nome);
        $consulta->bindValue('email', $obj->email);
        $consulta->execute();
        //VERIFICANDO SE FOI ENCONTRADO ALGUM USUARIO
        $count = $consulta->rowCount();
        if($count == 0){
            $sql = "INSERT INTO tb_colaborador(NOMECOLAB, EMAILCOLAB, TELEFONECOLAB) VALUES (:nome , :email, :telefone)";
            $consulta = Conexao::prepare($sql);
            $consulta->bindValue('nome', $obj->nome);
            $consulta->bindValue('email', $obj->email);
            $consulta->bindValue('telefone', $obj->$telefone);
            return $consulta->execute();
        }else{
            $retorna = "COLABORADOR EXITENTE";
            return $retorna;
        }
        
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
    public function find($id = null){
        $sql =  "SELECT * FROM tb_colaborador WHERE ID = :id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id',$id);
        $consulta->execute();
        $count = $consulta->rowCount();
        if($count == 0){
            echo "Não foi encontrado usuario com esse email";
        }else{
            $consulta->execute();
            return $consulta->fetch();
        }
    }


}
?>