<?php
    session_start();
?>
<html>
	<head>
		<title>Dmf Construcciones</title>
		<link href="../publico/css/estilo.css" rel="stylesheet" />
		<script src="../publico/scripts/jquery.js" type="text/javascript"></script>
		<script src="../publico/scripts/funciones.js" type="text/javascript"></script>
		<script src="../publico/scripts/administrador.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="all">
			<div id="barra">
				<img src="../publico/images/logo.jpg" width="250px" height="90px" style="padding: 5px;"/>
				
			</div>
				<div id="navegacion">
					<div id="nave">
   					<ul>
						<li><a href="../controlador/cHome.php" ><p class="letter">H</p>ome</a></li>
						<li><a href="../controlador/contacto.php"><p class="letter">C</p>ontacto</a></li>
						<li><a href="../controlador/empresas.php"><p class="letter">P</p>royectos</a></li>
						<li ><a href="../controlador/nosotros.php"><p class="Letter">N</p>osotros</a></li>
						<li><a href="../controlador/galeria.php"><p class="letter">G</p>aleria</a></li>
					</ul>
					<div id="adm">
						<?php
						if( isset( $_SESSION["adm"] ))
						{
							if($_SESSION["adm"] == "" )
							{
								
							}
							else {
								echo "<img src='../publico/images/admini.png' id='btnAdm'  width='50px' height='50px'/>";
								echo "<a href='../controlador/destroyS.php'>Cerrar Sesion</a>";
							}
							
						}
						
						
						?>
					</div>
				</div>
				</div>
				<div id="contenido">
					<?php include_once $view->template; ?>
				</div>
			
			<div id="footer">
				<p>Dmf Construcciones Todos Los Derechos reservados </p>
				<p>2013 Moises Sepulveda , Jairo Rupallan</p>
				
				<br />
				<ul>
					<li>Telefono : 555555 </li>
					<li>Email : dmf@dmfcontrucciones.com</li>
				</ul>
	</div>
		</div>
	
		<div id="herramientas"><!--Panel de administracion-->
			<ul>
				<li><a href="insertarProyecto.php"><img src="../publico/images/proyectos.png" width="256px" height="256px" /></a></li>
				<li id="mensajesA"><img src="../publico/images/correo.png" width="256px" height="256px" /></li>
				<li><a href="subirFotoGaleria.php"><img src="../publico/images/galeria.png" width="256px" height="256px" /></a></li>
			</ul>
			<p id="btnCerrarA">X</p>
		</div>
		<div id="galeriaNegra">
			<div class="contenidoGaleria">
				<div>
					<h1 id="tituloFoto"></h1>
					<div>
						<p id="detalleFoto"></p>
					</div>
				</div>
				<div>
					<img id="fotoGaleria"/>
				</div>
				<p class="cerrarGaleria" id="cGaleria">X</p>
			</div>
		</div>
		<div id="alerta">
			<div class="cabeceraA">
				Aviso
			</div>
			<div class="cuerpoA">
				<label id="lblMensaje">Este es el mensaje</label>
			</div>
		</div>
	</body>
</html>