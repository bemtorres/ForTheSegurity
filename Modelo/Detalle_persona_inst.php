<?php 
class Detalle_persona_inst {
	private $id_deta_pers_inst; //int(11) MAX 11 Null=NO  auto_increment
	private $id_persona; //int(11) MAX 11 Null=NO  
	private $id_institucion; //int(11) MAX 11 Null=NO  

	function __construct($id_deta_pers_inst,$id_persona,$id_institucion){
		$this->id_deta_pers_inst=$id_deta_pers_inst;
		$this->id_persona=$id_persona;
		$this->id_institucion=$id_institucion;
	}

	function getId_deta_pers_inst(){
		return $this->id_deta_pers_inst;
	}

	function getId_persona(){
		return $this->id_persona;
	}

	function getId_institucion(){
		return $this->id_institucion;
	}

	function setId_deta_pers_inst($id_deta_pers_inst){
		$this->id_deta_pers_inst=$id_deta_pers_inst;
	}

	function setId_persona($id_persona){
		$this->id_persona=$id_persona;
	}

	function setId_institucion($id_institucion){
		$this->id_institucion=$id_institucion;
	}

	function __toString(){
		return print_r($this,true);
	}
}