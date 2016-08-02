<?php
    include_once '../modelo/proyectos.php';
	$conexion = new Proyectos();
    $marca = $conexion->listarProyecto();
	if(  isset ( $_POST["txtLocal"]  ) && isset( $_POST["cboMarca"] ) )
	{
		
		$subPro = array();
		$subPro["nombre"] = $_POST["txtLocal"];
		$subPro["padre"] = $_POST["cboMarca"];
		$conexion->insertarSubProyecto( $subPro );
		$status="Subido Correctamente";
	}	
    $view = new stdClass();
	$view->template = "includes/insertarSubProyecto.php";
	include_once '../vista/masterPage.php';
?>