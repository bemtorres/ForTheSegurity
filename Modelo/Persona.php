<?php 
class Persona {
	private $id_persona; //int(11) MAX 11 Null=NO  auto_increment
	private $id_usuario; //int(11) MAX 11 Null=NO  
	private $apellidos; //varchar(100) MAX 100 Null=NO  
	private $foto; //varchar(100) MAX 100 Null=SI  

	function __construct($id_persona,$id_usuario,$apellidos,$foto){
		$this->id_persona=$id_persona;
		$this->id_usuario=$id_usuario;
		$this->apellidos=$apellidos;
		$this->foto=$foto;
	}

	function getId_persona(){
		return $this->id_persona;
	}

	function getId_usuario(){
		return $this->id_usuario;
	}

	function getApellidos(){
		return $this->apellidos;
	}

	function getFoto(){
		return $this->foto;
	}

	function setId_persona($id_persona){
		$this->id_persona=$id_persona;
	}

	function setId_usuario($id_usuario){
		$this->id_usuario=$id_usuario;
	}

	function setApellidos($apellidos){
		$this->apellidos=$apellidos;
	}

	function setFoto($foto){
		$this->foto=$foto;
	}

	function __toString(){
		return print_r($this,true);
	}
}