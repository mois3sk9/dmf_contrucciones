<?php
	include_once('../modelo/galeria.php');
	include_once('../modelo/validacionUpload.php');
	$conexion = new Galeria();
	$validation;
	/**
	 * 	Valor 1: UPLOAD_ERR_INI_SIZE
		Valor2: UPLOAD_ERR_FORM_SIZE
		Valor 3: UPLOAD_ERR_PARTIAL
		Valor 4: UPLOAD_ERR_NO_FILE
		Valor 6: UPLOAD_ERR_NO_TMP_DIR
		Valor 7: UPLOAD_ERR_CANT_WRITE
	 * */
	if( isset ( $_POST["txtTitulo"] ) && isset ( $_POST["txtDetalle"] ) && isset( $_FILES["txtFile"] ) )
	{
		
		
		$foto = array();
		$foto['titulo'] = $_POST['txtTitulo'];
		$foto['detalle']=$_POST['txtDetalle'];
		$foto['url'] = $_FILES['txtFile']['name'];
		$ruta="../publico/galeria/";
		$maxUrl= 100000;
		$typeUrl=$_FILES['txtFile']['type'];
		$size=$_FILES['txtFile']['size'];
		$error;
		
		if( $_FILES["txtFile"]["error"] > 0 )
		{
			switch ( $_FILES["txtFile"]["error"] )
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
			if( move_uploaded_file( $_FILES['txtFile']['tmp_name'],$ruta.$foto["url"] ) )
			{
				$conexion->insertarGaleria($foto);
				$error = "Subido Exitosamente";
			}
		}
		}
		
			
	
	
	}
	
	
    $view= new stdClass();
	$view->template= "includes/subirFotoGaleria.php";
	
	include_once '../vista/masterPage.php';
?>