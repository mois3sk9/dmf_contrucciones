<?php
	include_once('Conexion.php');
    class Galeria
	{
		private $titulo;  
		private $detalle;
		private $url;
		private $conexion;
		 
		
		private $queryInsertarGaleria="";
		private $queryDeleteGaleria="";
		private $queryConsultarGaleria="";
		
		
		public function Galeria()
		{
			$this->conexion = new Conexion();
		}
		
		
		public function setTitulo( $titulo )
		{
			$this->titulo = $titulo;
		}
		
		public function setDetalle( $detalle )
		{
			$this->detalle = $detalle;
		}
		
		public function setUrl( $url )
		{
			$this->url = $url;
		}
		
		public function getTitulo()
		{
			return $this->Titulo;
		}
		
		public function getDetalle()
		{
			return $this->Detalle;
		}
		
		public function getUrl()
		{
			return $this->url;
		}
		
		public function insertarGaleria($arreglo_galeria)
		{
			$this->setTitulo( $arreglo_galeria["titulo"]);
			$this->setDetalle( $arreglo_galeria["detalle"]);
			$this->setUrl( $arreglo_galeria["url"]);
			$this->conexion = new Conexion();
			$this->queryInsertarGaleria="insert into galeria(titulo,detalle,url) 
			values('$this->titulo','$this->detalle','$this->url')";
			$this->conexion->insertar( $this->queryInsertarGaleria );
			
		}
		
		public function deleteGaleria($id)
		{
			$this->queryDeleteGaleria="delete from galeria where id = $id";
			$this->conexion->insertar( $this->queryDeleteGaleria );
				
		}
		
		public function consultarGaleria()
		{
			$this->queryConsultarGaleria="select * from galeria order by id desc";
			$fotos = $this->conexion->consultar( $this->queryConsultarGaleria );
			
			return $fotos;
		}
		
		public function consultarGaleriaUno($id)
		{
			$this->queryConsultarGaleria="select * from galeria where id = $id";
			$foto = $this->conexion->consultar( $this->queryConsultarGaleria );
			return $foto;
		
		}
		public function consultarFotosUno( $id )
		{
			$consulta = "select fotos.id ,fotos.nombre,fotos.detalle from fotos where id = $id";
			$foto = $this->conexion->consultar( $consulta );
			return $foto;
		
		}
		
	}
	/*Tabla 
	 * create table galeria(id int primary key not null auto_increment,titulo varchar(40), detalle varchar(400), url varchar(140));
	 * */
?>