<?php 
class Pregunta {
	private $id_pregunta; //int(11) MAX 11 Null=NO  auto_increment
	private $fecha; //datetime Null=NO  
	private $descripcion; //varchar(255) MAX 255 Null=NO  
	private $isDelete; //int(11) MAX 11 Null=NO  

	function __construct($id_pregunta,$fecha,$descripcion,$isDelete){
		$this->id_pregunta=$id_pregunta;
		$this->fecha=$fecha;
		$this->descripcion=$descripcion;
		$this->isDelete=$isDelete;
	}

	function getId_pregunta(){
		return $this->id_pregunta;
	}

	function getFecha(){
		return $this->fecha;
	}

	function getDescripcion(){
		return $this->descripcion;
	}

	function getIsDelete(){
		return $this->isDelete;
	}

	function setId_pregunta($id_pregunta){
		$this->id_pregunta=$id_pregunta;
	}

	function setFecha($fecha){
		$this->fecha=$fecha;
	}

	function setDescripcion($descripcion){
		$this->descripcion=$descripcion;
	}

	function setIsDelete($isDelete){
		$this->isDelete=$isDelete;
	}

	function __toString(){
		return print_r($this,true);
	}
}