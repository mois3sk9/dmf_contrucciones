<div class="e">
	
</div>
<div class="e"></div>
<div class="formularioEstilo">
	<h1>SubProyectos ;D</h1>
	<form action="insertarSubProyecto.php" method="post">
		<table>
			<tr>
				<td>Marca</td>
				<td>
					<select id="cboMarca" name="cboMarca">
						<option value="seleccionar">Seleccionar</option>
						<?php
							while( $r = mysql_fetch_array( $marca ) )
							{
								echo "<option value=$r[0]>$r[1]</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Nombre Local/Direccion</td>
				<td><input type="text" id="txtLocal" name="txtLocal" /></td>
			</tr>
			<tr>
				<td colspan="2"> <input type="submit" id="btnEnviar" name="btnEnviar" value="Subir" /></td>
			</tr>
		</table>
	</form>
	<?php if( isset( $status ) ){echo "<h1>$status</h1> ";}?>
</div>
<div class="indices">
	<ul>
		<li><a href="insertarProyecto.php">Proyectos</a></li>
		<li><a href="insertarSubProyecto.php">SubProyectos</a></li>
		<li><a href="insertarImagenProyecto.php">Fotos</a></li>
	</ul>	
</div>