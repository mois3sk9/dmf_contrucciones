<div class="e"></div>

<div id="galeriaFotografica">
	<ul class="galeriaDis">
		<?php
			while( $r = mysql_fetch_array( $fotos ) )
			{
				echo "<a href=fLocales.php?id=".$r[0].">";
				echo"<li>";
				echo "<img src=".$url.$r[2]."  value=".$r[0]." name=".$r[0]."   />";
				echo "<p>".$r[1]."</p>";
				echo "</li>";
				
			}
		?>
	</ul>
</div>