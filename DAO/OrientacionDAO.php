<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Orientacion.php");
class OrientacionDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO orientacion (id_orientacion,descripcion,eliminado,activo) VALUES(:id_orientacion,:descripcion,:eliminado,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO orientacion (descripcion,eliminado,activo) VALUES(:descripcion,:eliminado,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM orientacion WHERE id_orientacion=:id_orientacion";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_orientacion' => $id));
		$ba = $rs->fetch();
		$nuevo = new Orientacion($ba['id_orientacion'],$ba['descripcion'],$ba['eliminado'],$ba['activo']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE orientacion SET descripcion=:descripcion,eliminado=:eliminado,activo=:activo WHERE id_orientacion=:id_orientacion";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM orientacion WHERE id_orientacion=:id_orientacion";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_orientacion'=>$nuevo->getId_orientacion()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM orientacion ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Orientacion($ba['id_orientacion'],$ba['descripcion'],$ba['eliminado'],$ba['activo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM orientacion";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_orientacion'] = $nuevo->getId_orientacion();
		$params['descripcion'] = $nuevo->getDescripcion();
		$params['eliminado'] = $nuevo->getEliminado();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['descripcion'] = $nuevo->getDescripcion();
		$params['eliminado'] = $nuevo->getEliminado();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
}