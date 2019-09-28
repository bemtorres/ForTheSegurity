<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once($rootDir . "/DAO/RespuestaDAO.php");

if(isset($_POST['opcion'])){
	$opc=htmlspecialchars($_POST['opcion']);
	if($opc=="agregar"){

	}
	elseif($opc=="buscar"){

		if(isset($_POST['id_respuesta'])){
			$ID=htmlspecialchars($_POST['id_respuesta']);
			$encontrado = RespuestaDAO::buscar($ID); 
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