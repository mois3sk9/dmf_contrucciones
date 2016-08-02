<?php

	include_once '../modelo/galeria.php';
	$conexion = new Galeria();
	$fotos = $conexion->consultarGaleria();
	$url = "../publico/galeria/";



    $view = new stdClass();
	$view->template = "includes/galeriaFotografica.php";
	include_once '../vista/masterPage.php';
?>