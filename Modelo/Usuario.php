<?php 
class Usuario {
	private $id_usuario; //int(11) MAX 11 Null=NO  auto_increment
	private $username; //varchar(30) MAX 30 Null=NO  
	private $password; //varchar(64) MAX 64 Null=NO  
	private $correo; //varchar(100) MAX 100 Null=NO  
	private $fecha_create; //datetime Null=NO  
	private $nombre; //varchar(100) MAX 100 Null=NO  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_usuario,$username,$password,$correo,$fecha_create,$nombre,$activo){
		$this->id_usuario=$id_usuario;
		$this->username=$username;
		$this->password=$password;
		$this->correo=$correo;
		$this->fecha_create=$fecha_create;
		$this->nombre=$nombre;
		$this->activo=$activo;
	}

	function getId_usuario(){
		return $this->id_usuario;
	}

	function getUsername(){
		return $this->username;
	}

	function getPassword(){
		return $this->password;
	}

	function getCorreo(){
		return $this->correo;
	}

	function getFecha_create(){
		return $this->fecha_create;
	}

	function getNombre(){
		return $this->nombre;
	}

	function getActivo(){
		return $this->activo;
	}

	function setId_usuario($id_usuario){
		$this->id_usuario=$id_usuario;
	}

	function setUsername($username){
		$this->username=$username;
	}

	function setPassword($password){
		$this->password=$password;
	}

	function setCorreo($correo){
		$this->correo=$correo;
	}

	function setFecha_create($fecha_create){
		$this->fecha_create=$fecha_create;
	}

	function setNombre($nombre){
		$this->nombre=$nombre;
	}

	function setActivo($activo){
		$this->activo=$activo;
	}

	function __toString(){
		return print_r($this,true);
	}
}