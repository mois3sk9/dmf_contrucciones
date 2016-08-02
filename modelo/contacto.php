<?php
	require_once 'conexion.php';//Clase conexion para conectar con la bdd
	
    class Contacto
    {
    	private $id;
    	private $nombre;
		private $telefono;
		private $email;
		private $fecha;
		private $comentario;
		private $conexion;/*Almacenara un objeto 
		 * de la clase Conexion*/
	    
		 
		//Querys
		/*Inserta un registro*/
		private $queryInsertar = "";
		/*Borra un regristro*/
		private $queryDelete="";
		/*Obtiene todos los comentarios*/
		private $queryComentarios="";
		/*Query que retorna un unico comentario dependiendo del id*/
		private $unComentario="";
		
		public function Contacto()
		{
			$this->conexion = new Conexion();
		}
		
		public function setId( $id )
		{
			$this->id = $id;
		}
		public function setNombre( $nombre )
		{
			$this->nombre = $nombre;
		}
		public function setTelefono( $telefono )
		{
			$this->telefono = $telefono;
		}
		public function setEmail( $email )
		{
			$this->email = $email;
		}
		public function setFecha( $fecha )
		{
			$this->fecha = $fecha;
		}
		public function setComentario( $comentario )
		{
			$this->comentario = $comentario;
		}
		
		public function getNombre()
		{
			return $this->nombre;
		}
		public function getTelefono()
		{
			return $this->telefono;
		}
		public function getEmail()
		{
			return $this->email;
		}
		public function getComentario()
		{
			return $this->comentario;
		}
		public function getFecha()
		{
			return $this->fecha;
		}
		public function getId()
		{
			return $this->id;
		}
		
		public function getComentarios()
		{
			/*Funcion la cual retorna todos los registros
			 * de comentarios almacenados en la base
			 * de datos
			 */
			 $this->limpiarVariables();
			 $this->conexion = new Conexion();
			 $registros[]=array();
			 $this->queryComentarios="select * from contacto";
			 $resultado=$this->conexion->consultar( $this->queryComentarios );
			 
			 
			 return $resultado;
		} 
		public function deleteComentario( $id )
		{
			/*funcion que elimina un comentario
			 * Dependiendo del id*/
			 $this->limpiarVariables();
			 $this->queryDelete = "delete from contacto where id = $id";
			 $conexion = new Conexion();
			 $conexion->insertar( $this->queryDelete );
			 
		}
		public function insertarComentario( $arreglo_comentario )
		{
			/*Funcion la cual insertar un comentario
			 * Recibe como parametro un arreglo
			 * con los datos del comentario
			 */
			 
			 $this->limpiarVariables();
			 $this->setNombre( $arreglo_comentario["nombre"] );
			 $this->setTelefono( $arreglo_comentario["telefono"] );
			 $this->setEmail( $arreglo_comentario["email"] );
			 $this->setComentario( $arreglo_comentario["comentario"] );
			 $this->conexion = new Conexion();
			 $this->queryInsertar="insert into contacto ( nombre,fono,email,comentario,fecha )
				values( '$this->nombre',$this->telefono,'$this->email','$this->comentario',curdate() )";
			
			 $this->conexion->insertar( $this->queryInsertar );
			 
		}
		public function comentario( $id )
		{
			 $this->limpiarVariables();
			 $this->conexion = new Conexion();
			 $this->setId( $id );//Se pasa el id a la variable global
			 $this->unComentario="select * from Contacto where id = $id";
			 $resultado =  $this->conexion->consultar( $this->unComentario );
			 $arreglo = mysql_fetch_row( $resultado );
			 return $arreglo;
			 
		}
		public function limpiarVariables()
		{
			$this->nombre="";
			$this->telefono="";
			$this->email="";
			$this->comentario="";
			$this->id="";
			$this->fecha="";
		}
		
    }
?>