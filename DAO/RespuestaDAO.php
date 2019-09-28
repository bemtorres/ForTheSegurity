<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Respuesta.php");
class RespuestaDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO respuesta (id_respuesta,fecha_creacion,id_persona,id_alternativa) VALUES(:id_respuesta,:fecha_creacion,:id_persona,:id_alternativa)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO respuesta (fecha_creacion,id_persona,id_alternativa) VALUES(:fecha_creacion,:id_persona,:id_alternativa)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM respuesta WHERE id_respuesta=:id_respuesta";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_respuesta' => $id));
		$ba = $rs->fetch();
		$nuevo = new Respuesta($ba['id_respuesta'],$ba['fecha_creacion'],$ba['id_persona'],$ba['id_alternativa']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE respuesta SET fecha_creacion=:fecha_creacion,id_persona=:id_persona,id_alternativa=:id_alternativa WHERE id_respuesta=:id_respuesta";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM respuesta WHERE id_respuesta=:id_respuesta";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_respuesta'=>$nuevo->getId_respuesta()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM respuesta ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Respuesta($ba['id_respuesta'],$ba['fecha_creacion'],$ba['id_persona'],$ba['id_alternativa']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM respuesta";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_respuesta'] = $nuevo->getId_respuesta();
		$params['fecha_creacion'] = $nuevo->getFecha_creacion();
		$params['id_persona'] = $nuevo->getId_persona();
		$params['id_alternativa'] = $nuevo->getId_alternativa();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['fecha_creacion'] = $nuevo->getFecha_creacion();
		$params['id_persona'] = $nuevo->getId_persona();
		$params['id_alternativa'] = $nuevo->getId_alternativa();
		return $params;
	}
}