<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Detalle_preg_orien.php");
class Detalle_preg_orienDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO detalle_preg_orien (id_detalle_pre_o,id_pregunta,id_orientacion) VALUES(:id_detalle_pre_o,:id_pregunta,:id_orientacion)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO detalle_preg_orien (id_pregunta,id_orientacion) VALUES(:id_pregunta,:id_orientacion)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM detalle_preg_orien WHERE id_detalle_pre_o=:id_detalle_pre_o";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_detalle_pre_o' => $id));
		$ba = $rs->fetch();
		$nuevo = new Detalle_preg_orien($ba['id_detalle_pre_o'],$ba['id_pregunta'],$ba['id_orientacion']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE detalle_preg_orien SET id_pregunta=:id_pregunta,id_orientacion=:id_orientacion WHERE id_detalle_pre_o=:id_detalle_pre_o";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM detalle_preg_orien WHERE id_detalle_pre_o=:id_detalle_pre_o";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_detalle_pre_o'=>$nuevo->getId_detalle_pre_o()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM detalle_preg_orien ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Detalle_preg_orien($ba['id_detalle_pre_o'],$ba['id_pregunta'],$ba['id_orientacion']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM detalle_preg_orien";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_detalle_pre_o'] = $nuevo->getId_detalle_pre_o();
		$params['id_pregunta'] = $nuevo->getId_pregunta();
		$params['id_orientacion'] = $nuevo->getId_orientacion();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_pregunta'] = $nuevo->getId_pregunta();
		$params['id_orientacion'] = $nuevo->getId_orientacion();
		return $params;
	}


	public static function buscarAll2($id_pregunta) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM detalle_preg_orien WHERE id_pregunta=:id_pregunta";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_pregunta' => $id_pregunta));
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Detalle_preg_orien($ba['id_detalle_pre_o'],$ba['id_pregunta'],$ba['id_orientacion']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
}