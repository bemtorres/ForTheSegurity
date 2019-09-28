<?php 
class Alternativa {
	private $id_alternativa; //int(11) MAX 11 Null=NO  auto_increment
	private $id_pregunta; //int(11) MAX 11 Null=NO  
	private $descripcion; //varchar(255) MAX 255 Null=NO  
	private $eliminado; //int(11) MAX 11 Null=NO  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_alternativa,$id_pregunta,$descripcion,$eliminado,$activo){
		$this->id_alternativa=$id_alternativa;
		$this->id_pregunta=$id_pregunta;
		$this->descripcion=$descripcion;
		$this->eliminado=$eliminado;
		$this->activo=$activo;
	}

	function getId_alternativa(){
		return $this->id_alternativa;
	}

	function getId_pregunta(){
		return $this->id_pregunta;
	}

	function getDescripcion(){
		return $this->descripcion;
	}

	function getEliminado(){
		return $this->eliminado;
	}

	function getActivo(){
		return $this->activo;
	}

	function setId_alternativa($id_alternativa){
		$this->id_alternativa=$id_alternativa;
	}

	function setId_pregunta($id_pregunta){
		$this->id_pregunta=$id_pregunta;
	}

	function setDescripcion($descripcion){
		$this->descripcion=$descripcion;
	}

	function setEliminado($eliminado){
		$this->eliminado=$eliminado;
	}

	function setActivo($activo){
		$this->activo=$activo;
	}

	function __toString(){
		return print_r($this,true);
	}
}