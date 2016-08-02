<?php
	include_once '../modelo/contacto.php';
	$conexion = new Contacto();
	$registros = $conexion->getComentarios();
    $view = new stdClass();
	
	$view->template="includes/listar.php";
	include_once '../vista/masterPage.php';
	
	
	
?>