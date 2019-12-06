<?php
include __DIR__.'/../model/Colaborador.php';

class ColaboradorControl{
    //FUNÇÃO RECURSIVA PARA A CHAMADA DA FUNÇAO INSERT DO MODEL
    function insert($obj){
        $colaborador = new Colaborador();
        return $colaborador->insert($obj);
    }

     //FUNÇÃO RECURSIVA PARA A CHAMADA DA FUNÇAO UPDATE DO MODEL
	function update($obj,$id){
		$colaborador = new Colaborador();
		return $colaborador->update($obj,$id);
	}
    //FUNÇÃO RECURSIVA PARA A CHAMADA DA FUNÇAO DELETE DO MODEL
	function delete($obj,$id){
		$colaborador = new Colaborador();
		return $colaborador->delete($obj,$id);
	}

	function find($id=null){
		$colaborador = new Colaborador();
		return $colaborador->find();
	}
}
?>