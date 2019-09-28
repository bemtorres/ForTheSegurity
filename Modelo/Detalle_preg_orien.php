<?php 
class Detalle_preg_orien {
	private $id_detalle_pre_o; //int(11) MAX 11 Null=NO  auto_increment
	private $id_pregunta; //int(11) MAX 11 Null=NO  
	private $id_orientacion; //int(11) MAX 11 Null=NO  

	function __construct($id_detalle_pre_o,$id_pregunta,$id_orientacion){
		$this->id_detalle_pre_o=$id_detalle_pre_o;
		$this->id_pregunta=$id_pregunta;
		$this->id_orientacion=$id_orientacion;
	}

	function getId_detalle_pre_o(){
		return $this->id_detalle_pre_o;
	}

	function getId_pregunta(){
		return $this->id_pregunta;
	}

	function getId_orientacion(){
		return $this->id_orientacion;
	}

	function setId_detalle_pre_o($id_detalle_pre_o){
		$this->id_detalle_pre_o=$id_detalle_pre_o;
	}

	function setId_pregunta($id_pregunta){
		$this->id_pregunta=$id_pregunta;
	}

	function setId_orientacion($id_orientacion){
		$this->id_orientacion=$id_orientacion;
	}

	function __toString(){
		return print_r($this,true);
	}
}