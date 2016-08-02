<?php
	include_once '../modelo/proyectos.php';
	$conexion = new Proyectos();
	/*Listar Cbo*/
	$llenarCbo = $conexion->listarCbo();
	
	if( isset( $_POST["txtTitulo"] ) && isset( $_POST["cboLocal"] ) && isset($_POST["txtDetalle"] ) &&
	isset( $_FILES["txtFileProyecto"] ) 
	)
	{
		
		$arreglo_proyecto = array();
		$arreglo_proyecto["nombre"] = $_POST["txtTitulo"];
		$arreglo_proyecto["icono"] = $_FILES["txtFileProyecto"]["name"];
		$arreglo_proyecto["detalle"] = $_POST["txtDetalle"];
		$arreglo_proyecto["padre"] = $_POST["cboLocal"];
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
				$conexion->insertarFoto( $arreglo_proyecto );
				$error = "Foto Subida Exitosamente";
			}
		}
		}
	}
	
    $view = new stdClass();
	$view->template = "includes/insertarImagenProyecto.php";
	
	include_once '../vista/masterPage.php';
?>