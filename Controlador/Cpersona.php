<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once($rootDir . "/DAO/PersonaDAO.php");

if(isset($_POST['opcion'])){
	$opc=htmlspecialchars($_POST['opcion']);
	if($opc=="agregar"){

	}
	elseif($opc=="buscar"){

		if(isset($_POST['id_persona'])){
			$ID=htmlspecialchars($_POST['id_persona']);
			$encontrado = PersonaDAO::buscar($ID); 
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