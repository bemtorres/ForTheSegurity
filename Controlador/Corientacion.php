<?php
session_start();
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once($rootDir . "/DAO/OrientacionDAO.php");

if(isset($_POST['opcion'])){
	$opc=htmlspecialchars($_POST['opcion']);
	if($opc=="agregar"){
		$nombre=htmlspecialchars($_POST['nombre']);
		$orientacion = new Orientacion(1,$nombre,0,1);
		$e = OrientacionDAO::agregarAuto($orientacion);
		if($estado){
			$_SESSION['mensaje_o']=1;
			header('Location: ../orientaciones.php');
		}else{
			$_SESSION['mensaje_o']=-1;
			header('Location: ../orientaciones.php');
		} 
	}
	elseif($opc=="buscar"){

		if(isset($_POST['id_orientacion'])){
			$ID=htmlspecialchars($_POST['id_orientacion']);
			$encontrado = OrientacionDAO::buscar($ID); 
			print_r($encontrado); 
		}else{
			echo "error";
		}
	}
	elseif($opc=="actualizar"){

	}
	elseif($opc=="eliminar"){

	}
}else{
	echo "error";
}