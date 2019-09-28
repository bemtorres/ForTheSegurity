<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Detalle_persona_inst.php");
class Detalle_persona_instDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO detalle_persona_inst (id_deta_pers_inst,id_persona,id_institucion) VALUES(:id_deta_pers_inst,:id_persona,:id_institucion)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO detalle_persona_inst (id_persona,id_institucion) VALUES(:id_persona,:id_institucion)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM detalle_persona_inst WHERE id_deta_pers_inst=:id_deta_pers_inst";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_deta_pers_inst' => $id));
		$ba = $rs->fetch();
		$nuevo = new Detalle_persona_inst($ba['id_deta_pers_inst'],$ba['id_persona'],$ba['id_institucion']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE detalle_persona_inst SET id_persona=:id_persona,id_institucion=:id_institucion WHERE id_deta_pers_inst=:id_deta_pers_inst";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM detalle_persona_inst WHERE id_deta_pers_inst=:id_deta_pers_inst";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_deta_pers_inst'=>$nuevo->getId_deta_pers_inst()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM detalle_persona_inst ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Detalle_persona_inst($ba['id_deta_pers_inst'],$ba['id_persona'],$ba['id_institucion']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM detalle_persona_inst";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_deta_pers_inst'] = $nuevo->getId_deta_pers_inst();
		$params['id_persona'] = $nuevo->getId_persona();
		$params['id_institucion'] = $nuevo->getId_institucion();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_persona'] = $nuevo->getId_persona();
		$params['id_institucion'] = $nuevo->getId_institucion();
		return $params;
	}
	public static function busarPersonaIns($id_institucion) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM detalle_persona_inst WHERE id_institucion=:id_institucion";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_institucion' => $id_institucion));
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Detalle_persona_inst($ba['id_deta_pers_inst'],$ba['id_persona'],$ba['id_institucion']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
}