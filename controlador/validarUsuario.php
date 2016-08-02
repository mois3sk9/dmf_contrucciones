<?php
   
   if( isset( $_SESSION["ad"] ) )
   {
   		session_start();
   }
   else 
   {
    	session_start();
	include_once '../modelo/login.php';
	if( isset( $_POST["txtUsuario"] ) && isset( $_POST["txtPass"] ) ) 
	{
		$conexionLogin = new Login();
		$valid = $conexionLogin->validUser( $_POST["txtUsuario"], $_POST["txtPass"] );
		
		if( $valid[0] == 1 ) // Si existe el usuario 
		{
			
			$_SESSION["adm"] = "fernando";
			header("LOCATION:cHome.php");
			
		}
		else {
			echo "<script>alert('Error en el password/usuario')</script>";
			
		}
	}
		
		   
   }
?>