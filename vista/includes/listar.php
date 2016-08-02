

<div class="e">
	
</div>
<div id="listarMensajes">
	<table>
		<thead>
			<tr>
				<th>
				<th>Nombre
				<th>Telefono
				<th>Email
				<th>Comentario
				<th>Fecha
			</tr>
		</thead>
		
		<tbody>
			<?php
				
				while( $r = mysql_fetch_array( $registros ) )
				{
					echo "<tr>";
						echo "<td><a href=mostrar.php?id=".$r['id'].">Seleccionar</a></td>";
						echo "<td>".$r['nombre']."</td>";
						echo "<td>".$r['fono']."</td>";
						echo "<td>".$r['email']."</td>";
						echo "<td>". utf8_decode( substr($r['comentario'], 0,20)."..." )."</td>";
						echo "<td>".$r['fecha']."</td>";
						echo "<td><a href=eliminarMensaje.php?id=$r[0]>Eliminar</a>	</td>";
					echo "</tr>";
				}
			?>
		</tbody>
	</table>
</div>