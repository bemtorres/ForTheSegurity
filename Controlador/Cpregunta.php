<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once($rootDir . "/DAO/PreguntaDAO.php");
require_once($rootDir . "/DAO/OrientacionDAO.php");

require_once($rootDir . "/DAO/Detalle_preg_orienDAO.php");

if(isset($_POST['opcion'])){

	$opc=htmlspecialchars($_POST['opcion']);
	if($opc=="agregar"){
		if(isset($_POST['items'])){
			
			$p = htmlspecialchars($_POST['pregunta']);
			$fecha = date("Y-m-d H:i:s");
			$pregunta =new  Pregunta(1,$fecha,$p,9999);
			$estado = PreguntaDAO::agregarAuto($pregunta);
			$p = PreguntaDAO::buscarNumero(9999);
			$p->setIsDelete(0);
			$estado1 = PreguntaDAO::actualizar($p);

			$items = $_POST['items'];
			foreach ($items as $i) {
				$n = new Detalle_preg_orien(1,$p->getId_pregunta(),$i);
				$e = Detalle_preg_orienDAO::agregarAuto($n);
			}
			if($e){
				$_SESSION['mensaje_p']=1;
				header('Location: ../preguntas.php');
			}else{
				$_SESSION['mensaje_p']=-1;
				header('Location: ../nuevoPregunta.php');
			} 	
			
		}else{
			$_SESSION['mensaje_p']=-1;
			header('Location: ../nuevoPregunta.php');
		}
	
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