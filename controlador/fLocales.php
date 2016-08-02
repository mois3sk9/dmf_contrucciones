<?php
	if(! isset( $_GET["id"] ) )
	{
		header("LOCATION:cHome.php");
	}
   	include_once '../modelo/proyectos.php';
	$conexion_proyecto = new Proyectos();
	$fotos = $conexion_proyecto->listarFotos( $_GET["id"] );
	$url="../publico/proyectos/";
   	
   	$view = new stdClass();
	$view->template = "includes/fLocales.php";
	include_once '../vista/masterPage.php';
?>

