<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once($rootDir . "/DAO/RespuestaDAO.php");

if(isset($_POST['opcion'])){
	$opc=htmlspecialchars($_POST['opcion']);
	if($opc=="agregar"){
	
		$fecha = date("Y-m-d H:i:s");
		$id_persona = htmlspecialchars($_POST['id_persona']);
		$id_respuesta = htmlspecialchars($_POST['id_respuesta']);
		$respuesta = new Respuesta(1,$fecha,$id_persona,$id_respuesta);
		$e = RespuestaDAO::agregarAuto($respuesta);
		if($e){
			$_SESSION['mensaje_respuesta']=1;
			header('Location: ../homePersona.php');
		}else{
			$_SESSION['mensaje_respuesta']=-1;
			header('Location: ../homePersona.php');
		} 
		
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