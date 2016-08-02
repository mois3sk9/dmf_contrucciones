<div class="e"></div>
<div class="formularioEstilo">
	<h1>Subir foto</h1>
	<form action="subirFotoGaleria.php" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Titulo</td>
				<td><input type="text" id="txtTitulo" name="txtTitulo" /></td>
			</tr>
			<tr>
				<td>Detalle</td>
				<td>
					<textarea id="txtDetalle" name="txtDetalle"></textarea>
				</td>
				
			</tr>
			<tr>
				<td>Fotografia</td>
				<td><input type="file" id="txtFile" name="txtFile" /></td>
					<input type="hidden" name="MAX_FILE_SIZE" value="100000"> 
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="btnEnviarFoto" id="btnEnviarFoto" value="Subir"/>
				</td>
			</tr>
			
		</table>
	</form>
	<?php if( isset( $error ) ){echo "<h1>".$error."</h1> ";}?>
</div>