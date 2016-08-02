<div class="e"></div>
<div id="galeriaFotografica">
	<input type="text" id="typeGaleria" name="typeGaleria" value="1"/>
	<ul class="galeriaDis">
		<?php
			while( $r = mysql_fetch_array( $fotos ) )
			{
				echo"<li>";
				echo "<img src=".$url.$r[3]."  value=".$r[0]." name=".$r[0]."   />";
				echo "<p>".$r[1]."</p>";
				echo "</li>";
				
			}
		?>
	</ul>
</div>