<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Usuario.php");
class UsuarioDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO usuario (id_usuario,username,password,correo,fecha_create,nombre,activo) VALUES(:id_usuario,:username,:password,:correo,:fecha_create,:nombre,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO usuario (username,password,correo,fecha_create,nombre,activo) VALUES(:username,:password,:correo,:fecha_create,:nombre,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM usuario WHERE id_usuario=:id_usuario";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_usuario' => $id));
		$ba = $rs->fetch();
		$nuevo = new Usuario($ba['id_usuario'],$ba['username'],$ba['password'],$ba['correo'],$ba['fecha_create'],$ba['nombre'],$ba['activo']);
		return $nuevo; 
	}
	public static function buscarCorreo($correo) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM usuario WHERE correo=:correo";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('correo' => $correo));
		$ba = $rs->fetch();
		$nuevo = new Usuario($ba['id_usuario'],$ba['username'],$ba['password'],$ba['correo'],$ba['fecha_create'],$ba['nombre'],$ba['activo']);
		return $nuevo; 
	}
	public static function buscarUsuario($username) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM usuario WHERE username=:username";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('username' => $username));
		$ba = $rs->fetch();
		$nuevo = new Usuario($ba['id_usuario'],$ba['username'],$ba['password'],$ba['correo'],$ba['fecha_create'],$ba['nombre'],$ba['activo']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE usuario SET username=:username,password=:password,correo=:correo,fecha_create=:fecha_create,nombre=:nombre,activo=:activo WHERE id_usuario=:id_usuario";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM usuario WHERE id_usuario=:id_usuario";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_usuario'=>$nuevo->getId_usuario()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM usuario ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Usuario($ba['id_usuario'],$ba['username'],$ba['password'],$ba['correo'],$ba['fecha_create'],$ba['nombre'],$ba['activo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM usuario";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_usuario'] = $nuevo->getId_usuario();
		$params['username'] = $nuevo->getUsername();
		$params['password'] = $nuevo->getPassword();
		$params['correo'] = $nuevo->getCorreo();
		$params['fecha_create'] = $nuevo->getFecha_create();
		$params['nombre'] = $nuevo->getNombre();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['username'] = $nuevo->getUsername();
		$params['password'] = $nuevo->getPassword();
		$params['correo'] = $nuevo->getCorreo();
		$params['fecha_create'] = $nuevo->getFecha_create();
		$params['nombre'] = $nuevo->getNombre();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
}