<div class="e">
	
</div>

<div class="formularioEstilo">
	<form action="insertarImagenProyecto.php" method="post" enctype="multipart/form-data">
		<h1>Insertar Imagen</h1>
		<table>
			<tr>
				<td>Local</td>
				<td>
					<select id="cboLocal" name="cboLocal">
						<option value="seleccionar">Seleccionar</option>
						<?php
						while( $r  = mysql_fetch_array( $llenarCbo ) )
						{
							echo "<option value=$r[2]>".$r[0]."  --  ".$r[3]."</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Titulo</td>
				<td><input type="text"  id="txtTitulo" name="txtTitulo"/></td>
			</tr>
			<tr>
				<td>Detalle</td>
				<td><textarea id="txtDetalle" name="txtDetalle"></textarea></td>
			</tr>
			<tr>
				<td>Subir Foto</td>
				<td><input type="file" id="txtFileProyecto" name="txtFileProyecto" /></td>
			</tr>
			<tr>
				<td colspan="2"> <input type="submit" id="btnSubir" name="btnSubir" /></td>
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