<?php
session_start();
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once($rootDir . "/DAO/UsuarioDAO.php");
require_once($rootDir . "/DAO/InstitucionDAO.php");

$username = strtolower(htmlspecialchars($_POST['username']));
$password = htmlspecialchars($_POST['password']);

$pass = hash('sha256', $password);
$us = UsuarioDAO::buscarUsuario($username);
if($us->getUsername()==$username){
    if($us->getPassword()==$pass){
        $_SESSION['id_acceso']=$us->getId_usuario();
        switch ($us->getTipo_usuario()) {
            case 1:
                header('Location: ../home.php');
                break;
            case 2:
                 $id_ins =  InstitucionDAO::buscarIns($us->getId_usuario())->getId_institucion();
                $_SESSION['id_inst']=$id_ins;
                header('Location: ../InstitucionHome.php');
                break;
            case 3:
                header('Location: ../homePersona.php');
                break;
        }
    }else{
        // echo "1";
        header('Location: ../index.php');
    }  
}else{
    // echo "2";
    // $_SESSION['mensaje_institucion']=-1;
	header('Location: ../index.php');
}

?>