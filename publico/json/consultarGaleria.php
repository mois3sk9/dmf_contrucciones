<?php
   	include_once '../../modelo/galeria.php';
	$conexion = new Galeria();
	$id = $_GET["id"];
	if( $_GET["type"] == 1)
	{
	$foto = mysql_fetch_row( $conexion->consultarGaleriaUno( $id ) );
	
	}
	else {
		$foto = mysql_fetch_row( $conexion->consultarFotosUno( $id ) );
	}
	$titulo = $foto[1];
	$detalle = $foto[2];
	
	echo json_encode( array(
	"tit"=>$titulo,
	"det"=>$detalle
	));
	
?>