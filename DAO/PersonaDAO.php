<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Persona.php");
class PersonaDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO persona (id_persona,id_usuario,rut,apellidos,foto,sexo) VALUES(:id_persona,:id_usuario,:rut,:apellidos,:foto,:sexo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO persona (id_usuario,rut,apellidos,foto,sexo) VALUES(:id_usuario,:rut,:apellidos,:foto,:sexo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM persona WHERE id_persona=:id_persona";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_persona' => $id));
		$ba = $rs->fetch();
		$nuevo = new Persona($ba['id_persona'],$ba['id_usuario'],$ba['rut'],$ba['apellidos'],$ba['foto'],$ba['sexo']);
		return $nuevo; 
	}
	public static function buscarRut($rut) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM persona WHERE rut=:rut";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('rut' => $rut));
		$ba = $rs->fetch();
		$nuevo = new Persona($ba['id_persona'],$ba['id_usuario'],$ba['rut'],$ba['apellidos'],$ba['foto'],$ba['sexo']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE persona SET id_usuario=:id_usuario,rut=:rut,apellidos=:apellidos,foto=:foto,sexo=:sexo WHERE id_persona=:id_persona";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM persona WHERE id_persona=:id_persona";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_persona'=>$nuevo->getId_persona()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM persona ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Persona($ba['id_persona'],$ba['id_usuario'],$ba['rut'],$ba['apellidos'],$ba['foto'],$ba['sexo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM persona";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_persona'] = $nuevo->getId_persona();
		$params['id_usuario'] = $nuevo->getId_usuario();
		$params['rut'] = $nuevo->getRut();
		$params['apellidos'] = $nuevo->getApellidos();
		$params['foto'] = $nuevo->getFoto();
		$params['sexo'] = $nuevo->getSexo();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_usuario'] = $nuevo->getId_usuario();
		$params['rut'] = $nuevo->getRut();
		$params['apellidos'] = $nuevo->getApellidos();
		$params['foto'] = $nuevo->getFoto();
		$params['sexo'] = $nuevo->getSexo();
		return $params;
	}

	public static function buscarRun($rut) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM persona WHERE rut=:rut";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('rut' => $rut));
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Persona($ba['id_persona'],$ba['id_usuario'],$ba['rut'],$ba['apellidos'],$ba['foto'],$ba['sexo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
}