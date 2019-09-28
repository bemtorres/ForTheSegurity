<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once($rootDir . "/DAO/PreguntaDAO.php");

if(isset($_POST['opcion'])){
	$opc=htmlspecialchars($_POST['opcion']);
	if($opc=="agregar"){
		$opc=htmlspecialchars($_POST['rut']);
		$opc=htmlspecialchars($_POST['nombre']);
		$opc=htmlspecialchars($_POST['apellido']);
		$opc=htmlspecialchars($_POST['correo']);
		$opc=htmlspecialchars($_POST['sexo']);
	}
	elseif($opc=="buscar"){

		if(isset($_POST['id_pregunta'])){
			$ID=htmlspecialchars($_POST['id_pregunta']);
			$encontrado = PreguntaDAO::buscar($ID); 
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