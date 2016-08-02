/**
 * @author moises
 */
function validar()
{
	bandera=true;
	var nombre= document.getElementById( "txtNombre" ).value;
	var telefono= document.getElementById( "txtTelefono" ).value;
	var comentario= document.getElementById( "txtComentario" ).value;
	var email = document.getElementById( "txtEmail" ).value;
	
	if( isNaN( telefono ) || telefono.length <=5 )
	{
		mostrarAlerta( "Error no es numero de telefono Valido" );
		bandera=false;	
	}
	if( email.indexOf( "@",0 )== -1 || 
	email.indexOf( ".",0 ) == -1 ||
	email == "" )
	{
		mostrarAlerta(" Error en el email" );
		bandera = false;
	}
	if( nombre.length <2 || comentario.length < 10 )
	{
		mostrarAlerta(" Rellene todos los campos antes de continuar" );
		bandera = false;
	}
	
	return bandera;
}

$( document ).ready( acciones );


function acciones()
{
	
	$( "#txtComentario" ).focus(
		function()
		{
			this.value = this.value.trim();//Cada vez que se le da el foco al textarea le saca los espacios en blancos
		}
	);
	
	
	$( "#formularioC" ).submit(
		function()
		{
			var nombre=$( "#txtNombre" ).val();
			var telefono=$( "#txtTelefono" ).val();
			var email=$( "#txtEmail" ).val();
			var comentario=$( "#txtComentario" ).val();
			if ( !validar() )
			{
				return false;
			}
			
			//Manda el contenido del formulario mediante Ayax
			
			$.get(
					"../vista/includes/insertarC.php",
					{
						cname : nombre,
						ctelefono: telefono,
						cemail : email,
						ccomentario : comentario
					} , 
					insertarComentario,
					"json" );
			
			return false;
		}
		
	);
	
}
function limpiar()
{
	document.getElementById( "txtNombre" ).value = "";
	document.getElementById( "txtTelefono" ).value = "";
	document.getElementById( "txtComentario" ).value = "";
	document.getElementById( "txtEmail" ).value = "";
}

function insertarComentario( respuesta )
{
	if( respuesta.validar == 0 )
	{
		limpiar();
		mostrarAlerta( "Mensaje enviado Correctamente" );
		
	}
	else
	{
		mostrarAlerta( "Ha ocurrido un error intentelo Nuevamente" );
	}
	
}




function mostrarAlerta( mensaje )
{
	mensaje = mensaje.trim();//Se eliminan los espacios en blanco a la derecha
	
	if( mensaje )//Si el mensaje existe 
	{
		$("#lblMensaje").html( mensaje );//Se pasa el mensaje al label 
		//Se muestra la alerta
		$("#alerta").fadeIn( "slow" ,
			function()
			{
				//Funcion callback que desaparece la alerta luego de 3 Segundos
				$("#alerta").delay( 3000 ).fadeOut( "slow" );
			}
		);
	}
}
var slider = 1;
var tiempo=4000;
$( document ).ready( setInterval( "autoPlaySlider()",tiempo) );//ejecutara la funcion cada 4 segundos

function autoPlaySlider()//Le da autoplay al slider
{
	/*Instancias a los checkbox del slider*/
	var checkboxs = $( ".sl" );//Devuelve los 5 checkboxs en un arreglo
	if(checkboxs.length>0)
	{
		tiempo=4000;
		if( slider>checkboxs.length-1 ) //cuando avanza la variable slider mas de los checkbox que hay vuelve al primero
		{
			slider=0;
		}
		
		checkboxs[ slider ].checked=true;
		slider++;
	}
	
}

$( document ).ready( pulsado );
function pulsado()//Tomara el checkbox pulsado y le pasara su indice a la variable slider
{
	var checkboxs = $( ".sl" );
	checkboxs.click( function(){
		slider = this.value;
	} );
}

function procesarFoto( respuesta )
{
	
	$("#tituloFoto").html( respuesta.tit );
	$("#detalleFoto").html( respuesta.det );
}

$( document ).ready( galeria );
function galeria()//Asigna una rotacion dinamica a cada foto
{
	 var fotos = $( ".galeriaDis li" );//Se obtiene los contendor de las fotos
	 
	 fotos.each(
	 	function()
	 	{
	 		var rotacion = "rotate( "+( Math.random()+2 )+"deg )";
	 		$( this ).css( "transform",rotacion );
	 	}
	 );
	 var url;
	 var foto = $( ".galeriaDis li img" );
	 var tipo = $("#typeGaleria").val();
	 foto.click(
	 	function()
	 	{
	 		url= $(this).attr("src");
	 		var id = this.name;
	 		 var tipo = $("#typeGaleria").val();
	 		$.get(
	 			"../publico/json/consultarGaleria.php",
	 			{
	 			id : id,
	 			type : tipo
	 			},
	 			procesarFoto,
	 			"json"
	 		);
	 		
	 		$("#fotoGaleria").attr("src",url);
	 		$("#galeriaNegra").fadeIn("slow");
	 	}
	 	
	 );
	 $("#cGaleria").click(function()
	 {
	 	$("#galeriaNegra").fadeOut("slow");
	 });
}


