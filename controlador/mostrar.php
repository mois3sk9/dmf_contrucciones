<?php
    include_once '../modelo/contacto.php';
	$conexion = new Contacto();
	
	
	if( isset( $_GET["id"] ) )
	{
		$id = $_GET["id"];
		$resultado=array();
		$resultado= $conexion->comentario( $id );
		$nombreEmisor = $resultado[1];
		$emailEmisor = $resultado[2];
		$comentarioEmisor = $resultado[4];
		$telefonoEmisor = $resultado[3];
		$fecha = $resultado[5];
	}
	else 
	{
		header( "LOCATION:cHome.php" );
	}
	
	$view = new stdClass();
	$view->template="includes/mostrar.php";
	include_once '../vista/masterPage.php';
	
?>