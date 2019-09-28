<?php 
class Orientacion {
	private $id_orientacion; //int(11) MAX 11 Null=NO  auto_increment
	private $descripcion; //varchar(255) MAX 255 Null=SI  
	private $eliminado; //int(11) MAX 11 Null=NO  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_orientacion,$descripcion,$eliminado,$activo){
		$this->id_orientacion=$id_orientacion;
		$this->descripcion=$descripcion;
		$this->eliminado=$eliminado;
		$this->activo=$activo;
	}

	function getId_orientacion(){
		return $this->id_orientacion;
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

	function setId_orientacion($id_orientacion){
		$this->id_orientacion=$id_orientacion;
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