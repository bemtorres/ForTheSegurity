<?php
session_start();
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once($rootDir . "/DAO/PersonaDAO.php");
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
		$rut=htmlspecialchars($_POST['run']);
		$nombre=htmlspecialchars($_POST['nombre']);
		$apellido=htmlspecialchars($_POST['apellido']);
		$correo=htmlspecialchars($_POST['correo']);
		$sexo=htmlspecialchars($_POST['sexo']);

		$fecha = date("Y-m-d H:i:s");
		$texto = explode('@',$correo); //separa correo
		$username = $texto[0]; //asigna lo primero
		$username = newUsername($username); //comprueba si existe otro igual		
		// $pass = substr(str_shuffle("0123456789"), 0,5); 
		$pass = "12345";
		$password = hash('sha256', $pass);
		
		$usuario = new Usuario(1,$username,$password,$correo,$fecha,$nombre,3,1);
		$estado1 = UsuarioDAO::agregarAuto($usuario);

		$usu = UsuarioDAO::buscarUsuario($username);
		$persona = new Persona(1,$usu->getId_usuario(),$rut,$apellido,"",$sexo);
		$estado = PersonaDAO::agregarAuto($persona);
	
		if($estado){
			$_SESSION['mensaje_persona']=1;
			header('Location: ../personas.php');
		}else{
			$_SESSION['mensaje_persona']=-1;
			header('Location: ../nuevoPersona.php');
		} 

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