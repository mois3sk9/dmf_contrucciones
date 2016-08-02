<div class="e">
	
</div>
<div class="formularioEstilo">
	<h1>Proyecto</h1>
	<form action="insertarProyecto.php" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Nombre</td>
				<td> <input type="text" name="txtNombreProyecto" id="txtNombreProyecto" /></td>
			</tr>
			<tr>
				<td>
					Subir Icono Marca
				</td>
				<td>
					<input  type="file" name="txtFileProyecto" id="txtFileProyecto"/>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="btnEnviar" id="btnEnviar" value="Enviar"/></td>
			</tr>
		</table>
	</form>
	<?php if( isset( $error ) ){echo "<h1>".$error."</h1> ";}?>
</div>
<div class="indices">
	<ul>
		<li><a href="insertarProyecto.php">Proyectos</a></li>
		<li><a href="insertarSubProyecto.php">SubProyectos</a></li>
		<li><a href="insertarImagenProyecto.php">Fotos</a></li>
	</ul>	
</div>