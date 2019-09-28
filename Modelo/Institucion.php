<?php 
class Institucion {
	private $id_institucion; //int(11) MAX 11 Null=NO  
	private $id_usuario; //int(11) MAX 11 Null=NO  

	function __construct($id_institucion,$id_usuario){
		$this->id_institucion=$id_institucion;
		$this->id_usuario=$id_usuario;
	}

	function getId_institucion(){
		return $this->id_institucion;
	}

	function getId_usuario(){
		return $this->id_usuario;
	}

	function setId_institucion($id_institucion){
		$this->id_institucion=$id_institucion;
	}

	function setId_usuario($id_usuario){
		$this->id_usuario=$id_usuario;
	}

	function __toString(){
		return print_r($this,true);
	}
}