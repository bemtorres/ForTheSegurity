<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Alternativa.php");
class AlternativaDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO alternativa (id_alternativa,id_pregunta,descripcion,eliminado,activo) VALUES(:id_alternativa,:id_pregunta,:descripcion,:eliminado,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO alternativa (id_pregunta,descripcion,eliminado,activo) VALUES(:id_pregunta,:descripcion,:eliminado,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM alternativa WHERE id_alternativa=:id_alternativa";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_alternativa' => $id));
		$ba = $rs->fetch();
		$nuevo = new Alternativa($ba['id_alternativa'],$ba['id_pregunta'],$ba['descripcion'],$ba['eliminado'],$ba['activo']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE alternativa SET id_pregunta=:id_pregunta,descripcion=:descripcion,eliminado=:eliminado,activo=:activo WHERE id_alternativa=:id_alternativa";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM alternativa WHERE id_alternativa=:id_alternativa";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_alternativa'=>$nuevo->getId_alternativa()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM alternativa ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Alternativa($ba['id_alternativa'],$ba['id_pregunta'],$ba['descripcion'],$ba['eliminado'],$ba['activo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM alternativa";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_alternativa'] = $nuevo->getId_alternativa();
		$params['id_pregunta'] = $nuevo->getId_pregunta();
		$params['descripcion'] = $nuevo->getDescripcion();
		$params['eliminado'] = $nuevo->getEliminado();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_pregunta'] = $nuevo->getId_pregunta();
		$params['descripcion'] = $nuevo->getDescripcion();
		$params['eliminado'] = $nuevo->getEliminado();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}

	public static function buscarAll2($id_pregunta) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM alternativa WHERE id_pregunta=:id_pregunta";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_pregunta' => $id_pregunta));
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Alternativa($ba['id_alternativa'],$ba['id_pregunta'],$ba['descripcion'],$ba['eliminado'],$ba['activo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}

	

	
}