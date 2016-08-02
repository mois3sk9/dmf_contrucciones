/**
 * @author moises
 */

$(document).ready( cerrarA );

function cerrarA()
{
	var adm=$( "#herramientas" );
	var cerrar = $( "#btnCerrarA" );
	var abrir = $( "#btnAdm" );
	var mensajes = $("#mensajesA");
	cerrar.click(
		function()
		{
			adm.fadeOut( "slow" );
		}
	);
	
	abrir.click(function()
	{
		adm.fadeIn("slow");
		
	});
	
	mensajes.click( function()
	{
		window.location = "mensajes.php";
	}
	);
	
}

