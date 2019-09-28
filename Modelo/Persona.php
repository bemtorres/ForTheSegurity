<?php 
class Persona {
	private $id_persona; //int(11) MAX 11 Null=NO  auto_increment
	private $id_usuario; //int(11) MAX 11 Null=NO  
	private $rut; //varchar(15) MAX 15 Null=NO  
	private $apellidos; //varchar(100) MAX 100 Null=NO  
	private $foto; //varchar(100) MAX 100 Null=SI  
	private $sexo; //int(11) MAX 11 Null=NO  

	function __construct($id_persona,$id_usuario,$rut,$apellidos,$foto,$sexo){
		$this->id_persona=$id_persona;
		$this->id_usuario=$id_usuario;
		$this->rut=$rut;
		$this->apellidos=$apellidos;
		$this->foto=$foto;
		$this->sexo=$sexo;
	}

	function getId_persona(){
		return $this->id_persona;
	}

	function getId_usuario(){
		return $this->id_usuario;
	}

	function getRut(){
		return $this->rut;
	}

	function getApellidos(){
		return $this->apellidos;
	}

	function getFoto(){
		return $this->foto;
	}

	function getSexo(){
		return $this->sexo;
	}

	function setId_persona($id_persona){
		$this->id_persona=$id_persona;
	}

	function setId_usuario($id_usuario){
		$this->id_usuario=$id_usuario;
	}

	function setRut($rut){
		$this->rut=$rut;
	}

	function setApellidos($apellidos){
		$this->apellidos=$apellidos;
	}

	function setFoto($foto){
		$this->foto=$foto;
	}

	function setSexo($sexo){
		$this->sexo=$sexo;
	}

	function __toString(){
		return print_r($this,true);
	}
}