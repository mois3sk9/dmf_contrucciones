<div class="e">
	
</div>
<div class="mostrar">
	<h4>Mensaje</h4> 

	<div class="cabeceraM">
		De : <?php echo utf8_decode( $nombreEmisor ) ;?>  Enviado el dia : <?php echo $fecha;?>
	</div>
	<div class="comentarioM">
		<br/>
		<br/>
		<?php echo utf8_decode( $comentarioEmisor );?>
	</div>
	<div class="cabeceraM">
		Correo Electronico del emisor : <?php echo ( $emailEmisor ) ;?> <br />
		Telefono del emisor : <?php echo $telefonoEmisor;?>
	</div>
	
</div>