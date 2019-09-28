<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Institucion.php");
class InstitucionDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO institucion (id_institucion,id_usuario) VALUES(:id_institucion,:id_usuario)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO institucion (id_usuario) VALUES(:id_usuario)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM institucion WHERE id_institucion=:id_institucion";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_institucion' => $id));
		$ba = $rs->fetch();
		$nuevo = new Institucion($ba['id_institucion'],$ba['id_usuario']);
		return $nuevo; 
	}
	public static function buscarIns($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM institucion WHERE id_usuario=:id_usuario";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_usuario' => $id));
		$ba = $rs->fetch();
		$nuevo = new Institucion($ba['id_institucion'],$ba['id_usuario']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE institucion SET id_usuario=:id_usuario WHERE id_institucion=:id_institucion";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM institucion WHERE id_institucion=:id_institucion";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_institucion'=>$nuevo->getId_institucion()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM institucion ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Institucion($ba['id_institucion'],$ba['id_usuario']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM institucion";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_institucion'] = $nuevo->getId_institucion();
		$params['id_usuario'] = $nuevo->getId_usuario();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_usuario'] = $nuevo->getId_usuario();
		return $params;
	}
}