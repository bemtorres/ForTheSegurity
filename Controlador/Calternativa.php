<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once($rootDir . "/DAO/AlternativaDAO.php");

if(isset($_POST['opcion'])){
	$opc=htmlspecialchars($_POST['opcion']);
	if($opc=="agregar"){

		$id_pregunta=htmlspecialchars($_POST['id_pregunta']);
		$alternativa=htmlspecialchars($_POST['alternativa']);

		$al = new Alternativa(1,$id_pregunta,$alternativa,0,1);
		$estado = AlternativaDAO::agregarAuto($al);
		if($estado){
			$_SESSION['mensaje_alternativa']=1;
			header('Location: ../alternativas.php?id='.$id_pregunta);
		}else{
			$_SESSION['mensaje_alternativa']=-1;
			header('Location: ../alternativas.php?id='.$id_pregunta);
		} 
	}
	elseif($opc=="buscar"){

		if(isset($_POST['id_alternativa'])){
			$ID=htmlspecialchars($_POST['id_alternativa']);
			$encontrado = AlternativaDAO::buscar($ID); 
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