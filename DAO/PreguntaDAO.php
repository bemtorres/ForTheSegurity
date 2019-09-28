<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Pregunta.php");
class PreguntaDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO pregunta (id_pregunta,fecha,descripcion,isDelete) VALUES(:id_pregunta,:fecha,:descripcion,:isDelete)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO pregunta (fecha,descripcion,isDelete) VALUES(:fecha,:descripcion,:isDelete)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM pregunta WHERE id_pregunta=:id_pregunta";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_pregunta' => $id));
		$ba = $rs->fetch();
		$nuevo = new Pregunta($ba['id_pregunta'],$ba['fecha'],$ba['descripcion'],$ba['isDelete']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE pregunta SET fecha=:fecha,descripcion=:descripcion,isDelete=:isDelete WHERE id_pregunta=:id_pregunta";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM pregunta WHERE id_pregunta=:id_pregunta";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_pregunta'=>$nuevo->getId_pregunta()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM pregunta ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Pregunta($ba['id_pregunta'],$ba['fecha'],$ba['descripcion'],$ba['isDelete']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM pregunta";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_pregunta'] = $nuevo->getId_pregunta();
		$params['fecha'] = $nuevo->getFecha();
		$params['descripcion'] = $nuevo->getDescripcion();
		$params['isDelete'] = $nuevo->getIsDelete();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['fecha'] = $nuevo->getFecha();
		$params['descripcion'] = $nuevo->getDescripcion();
		$params['isDelete'] = $nuevo->getIsDelete();
		return $params;
	}
}