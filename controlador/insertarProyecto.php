<?php
	include_once '../modelo/proyectos.php';

	if( isset( $_POST["txtNombreProyecto"] ) && isset( $_FILES["txtFileProyecto"] ) )
	{
		$conexion = new Proyectos();
		$arreglo_proyecto = array();
		$arreglo_proyecto["nombre"] = $_POST["txtNombreProyecto"];
		$arreglo_proyecto["icono"] = $_FILES["txtFileProyecto"]["name"];
		
		$foto = array();
		
		$foto['url'] = $_FILES['txtFileProyecto']['name'];
		$ruta="../publico/proyectos/";
		$maxUrl= 100000;
		$typeUrl=$_FILES['txtFileProyecto']['type'];
		$size=$_FILES['txtFileProyecto']['size'];
		$error;
		
		if( $_FILES["txtFileProyecto"]["error"] > 0 )
		{
			switch ( $_FILES["txtFileProyecto"]["error"] )
			{
				case 1:
					$error = "tamaño erroneo";
				break;
				case 2:
					$error = "tamaño del archivo cargado supera el especificado en el formulario HTML";
				break;
				case 3:
					$error = "El archivo se ha cargado parcialmente";
				break;
				case 4:
					$error = "No se he cargado ningun archivo";
				break;
				case 5:
					$error = "No se ha especificado ningun directorio temporal en el archivo php.ini";
				break;
				case 6:
					$error = "Carga Fallida. No s epuede escribir en el directorio";
				break;
				case 7:
					$error = "error no identificado";
				break;
			}
			
		}
		else {
			if( !( strpos( $typeUrl, "jpg" ) || strpos($typeUrl, "gif") || strpos($typeUrl, "png") || 
		strpos($typeUrl, "jpeg") ||  ( $size > $maxUrl ) ) )
		{
			$error = "Error extension erronea";
		}
		else {
			if( move_uploaded_file( $_FILES['txtFileProyecto']['tmp_name'],$ruta.$foto["url"] ) )
			{
				$conexion->insertarProyecto($arreglo_proyecto);
				$error = "Proyecto Subido Exitosamente";
			}
		}
		}
		
	}
	

    $view = new stdClass();
	$view->template = "includes/insertarProyecto.php";
	include_once '../vista/masterPage.php';
?>