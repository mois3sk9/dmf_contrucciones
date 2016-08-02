<?php
   class Conexion
   {
   		private $host="localhost";
		private $bdd="dmf";
		private $usuario="root";
		private $pass="";
		private $conexion; //Instancia a la base de datos
		
   		public function Conexion()
		{
				
		}
		public function conectar()
		{
			$this->conexion = mysql_connect( $this->host,$this->usuario,$this->pass )
			or die( "No se ha podido conectar" );
			mysql_select_db( $this->bdd ) or die( "Error en la base de datos" );
		}
		
		public function insertar( $query )
		{
			$this->conectar();
			mysql_query( $query,$this->conexion )
			or die( "Error en la consulta" . $query);
		}
		
		public function consultar( $query )
		{
			$this->conectar();
			$resultado = mysql_query( $query,$this->conexion )
			or die( "Error en la consulta". $query);
			
			return $resultado;/*Se retorna el resultado para ser recorrido*/
		}
   }
   /*
    * create table contacto(id int primary key not null auto_increment,nombre varchar( 100 ),email varchar(40),fono int(20),comentario varchar(400),fecha date);
    * 
    * */
?>