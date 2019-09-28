<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once($rootDir . "/DAO/Detalle_persona_instDAO.php");


if(isset($_GET['id_persona'])){
	$id_per = $_GET['id_persona'];	
	$id_ins = $_GET['id_i'];
	$d = new Detalle_persona_inst(1,$id_per,$id_ins);
	$listado = Detalle_persona_instDAO::buscarAll();

	$e = Detalle_persona_instDAO::agregarAuto($d);
	if($e){
		$_SESSION['mensaje_institucion']=1;
		header('Location: ../InstitucionPersonas.php');
	}else{
		$_SESSION['mensaje_institucion']=-1;
		header('Location: ../InstitucionPersonas.php');
	} 
}