<?php
	include_once '../modelo/proyectos.php';
	$conexion_proyecto = new Proyectos();
	$fotos = $conexion_proyecto->listarProyecto();
	$url="../publico/proyectos/";
	
    $view = new stdClass();
	$view->template = "includes/empresas.php";
	include_once '../vista/masterPage.php';
	
?>