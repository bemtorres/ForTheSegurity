<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once($rootDir . "/DAO/Detalle_persona_instDAO.php");

if(isset($_POST['opcion'])){
	$opc=htmlspecialchars($_POST['opcion']);
	if($opc=="agregar"){

	}
	elseif($opc=="buscar"){

		if(isset($_POST['id_deta_pers_inst'])){
			$ID=htmlspecialchars($_POST['id_deta_pers_inst']);
			$encontrado = Detalle_persona_instDAO::buscar($ID); 
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