<?php 
class Respuesta {
	private $id_respuesta; //int(11) MAX 11 Null=NO  auto_increment
	private $fecha_creacion; //datetime Null=NO  
	private $id_persona; //int(11) MAX 11 Null=NO  
	private $id_alternativa; //int(11) MAX 11 Null=NO  

	function __construct($id_respuesta,$fecha_creacion,$id_persona,$id_alternativa){
		$this->id_respuesta=$id_respuesta;
		$this->fecha_creacion=$fecha_creacion;
		$this->id_persona=$id_persona;
		$this->id_alternativa=$id_alternativa;
	}

	function getId_respuesta(){
		return $this->id_respuesta;
	}

	function getFecha_creacion(){
		return $this->fecha_creacion;
	}

	function getId_persona(){
		return $this->id_persona;
	}

	function getId_alternativa(){
		return $this->id_alternativa;
	}

	function setId_respuesta($id_respuesta){
		$this->id_respuesta=$id_respuesta;
	}

	function setFecha_creacion($fecha_creacion){
		$this->fecha_creacion=$fecha_creacion;
	}

	function setId_persona($id_persona){
		$this->id_persona=$id_persona;
	}

	function setId_alternativa($id_alternativa){
		$this->id_alternativa=$id_alternativa;
	}

	function __toString(){
		return print_r($this,true);
	}
}