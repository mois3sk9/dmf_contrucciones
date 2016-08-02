<?php
   include_once '../../modelo/contacto.php';
   
   $comentario[] = array();//Arreglo que almacena todo un comentario
   
   $estado=1;/*Estado que se devuelve por json, si es 1 quiere decir que fallo , si es 0 la operacion tuvo exito*/
   $co;
   if( isset( $_GET["cname"] ) && $_GET["cname"] )
  {
  	$conexion = new Contacto();
  	$comentario["nombre"] = $_GET["cname"];
	$comentario["telefono"] = $_GET["ctelefono"];
	$comentario["email"] = $_GET["cemail"];
	$co = $_GET["ccomentario"];
	$com=$_GET["ccomentario"];
	$comentario["comentario"] =$com;//$_GET["ccomentario"];
	$conexion->insertarComentario( $comentario );
	$estado = 0;//Operacion exitosa
  }
  
  echo json_encode( array(
  "validar" => $estado,
  "cadena"=>$co
  
  ));
    
    
?>