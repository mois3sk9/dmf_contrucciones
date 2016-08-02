<?php
	
	if( isset ($_SESSION["adm"] ) )
	{
		
		header("LOCATION:cHome.php");	
	}
	$view = new stdClass();
	$view->template = 'includes/login.php';
	
	include_once '../vista/masterPage.php';
	
	    
?>