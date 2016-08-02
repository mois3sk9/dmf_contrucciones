<?php
	
	if( isset( $_GET["id" ] ) )
	{
		include_once '../modelo/contacto.php';
		$conexion = new Contacto();
		$conexion->deleteComentario( $_GET["id"] );
	}	
	
    $view = new stdClass();
	$view->template = "includes/eliminarComentario.php";
	include_once '../vista/masterPage.php';
?>