<?php
include __DIR__.'/../model/SalaReuniao.php';

class SalaReuniaoControl{
    //FUNÇÃO RECURSIVA PARA A CHAMADA DA FUNÇAO INSERT DO MODEL
    function insert($obj){
        $salaReuniao = new SalaReuniao();
        return $salaReuniao->insert($obj);
    }

     //FUNÇÃO RECURSIVA PARA A CHAMADA DA FUNÇAO UPDATE DO MODEL
	function update($obj,$id){
		$salaReuniao = new SalaReuniao();
		return $salaReuniao->update($obj,$id);
	}
    //FUNÇÃO RECURSIVA PARA A CHAMADA DA FUNÇAO DELETE DO MODEL
	function delete($obj,$id){
		$salaReuniao = new SalaReuniao();
		return $salaReuniao->delete($obj,$id);
	}
}
?>