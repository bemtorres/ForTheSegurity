<?php
session_start();
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once($rootDir . "/DAO/InstitucionDAO.php");
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
		$nombre=htmlspecialchars($_POST['nombreInstitucion']);
		$correo=htmlspecialchars($_POST['correoInstitucion']);
		$fecha = date("Y-m-d H:i:s");
		$texto = explode('@',$correo); //separa correo
		$username = $texto[0]; //asigna lo primero
		$username = newUsername($username); //comprueba si existe otro igual		
		$pass = substr(str_shuffle("0123456789"), 0,5); 
		$password = hash('sha256', $pass);

		
		$usuario = new Usuario(1,$username,$password,$correo,$fecha,$nombre,1);
		$estado1 = UsuarioDAO::agregarAuto($usuario);

		$usu = UsuarioDAO::buscarUsuario($username);

		$institucion = new Institucion(1,$usu->getId_usuario());
		$estado = InstitucionDAO::agregarAuto($institucion);

		// print_r($usuario);
		// echo "<br>";
		// print_r($institucion);
		if($estado){
			$_SESSION['mensaje_institucion']=1;
			header('Location: ../instituciones.php');
		}else{
			$_SESSION['mensaje_institucion']=-1;
			header('Location: ../nuevoInstitucion.php');
		} 
	}
	elseif($opc=="buscar"){

		if(isset($_POST['id_institucion'])){
			$ID=htmlspecialchars($_POST['id_institucion']);
			$encontrado = InstitucionDAO::buscar($ID); 
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