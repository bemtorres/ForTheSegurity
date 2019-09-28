<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once($rootDir . "/DAO/PreguntaDAO.php");
require_once($rootDir . "/DAO/UsuarioDAO.php");

function newUsername($usuario){
	$usuario = strtolower($usuario);
	$correoEncontrado = UsuarioDAO::buscarUsuario($usuario);
	
	if($correoEncontrado->getUsername()==$usuario){
		$anexo = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0,1); 
		$usuario = $usuario . $anexo;
		return newUsername($usuario);
	}else{
		return $usuario;
	}
}


if(isset($_POST['opcion'])){
	$opc=htmlspecialchars($_POST['opcion']);
	if($opc=="agregar"){
	
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