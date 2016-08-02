<?php
	include_once 'conexion.php';
    class Proyectos
    {
    	//Tabala proyecto
    	private $proyectoId;
		private $proyectoNombre;
		private $proyectoIcono;
		//Tabla subProyecto
		private $subProyectoId;
		private $subProyectoNombre;
		//Tabla fotos
		private $imagenId;
		private $imagenNombre;
		private $imagenIcono;
		private $imagenDetalle;
		//Conexion
		private $conexion;
		
		//Consultas
		private $queryInsertarProyecto ="";
		private $queryInsertarSubProyecto="";
		private $queryInsertarFoto="";
		private $queryListarProyecto="";
		private $queryListarSubProyecto="";
		private $queryListarFotos="";
		private $queryListarTodoProyecto="";
		
    	public function Proyecto()	
		{
			
		}
		
		
		public function insertarProyecto( $arreglo_proyecto )
		{
			$this->proyectoNombre = $arreglo_proyecto["nombre"];
			$this->proyectoIcono = $arreglo_proyecto["icono"];
			
			$this->conexion = new Conexion();
			$this->queryInsertarProyecto = "
			insert into proyectos (nombre,icono)
			values('$this->proyectoNombre','$this->proyectoIcono')
			";
			$this->conexion->insertar( $this->queryInsertarProyecto );
		}
		public function insertarSubProyecto( $arreglo_subProyecto )
		{
			$this->subProyectoNombre = $arreglo_subProyecto["nombre"];
			$this->proyectoId = $arreglo_subProyecto["padre"];
			$this->conexion = new Conexion();
			$this->queryInsertarSubProyecto = "
			insert into subProyectos(nombre,padre)
			values('$this->subProyectoNombre',$this->proyectoId)
			";
			$this->conexion->insertar( $this->queryInsertarSubProyecto );
			
		}
		public function insertarFoto( $arreglo_foto )
		{
			$this->conexion = new Conexion();
			$this->imagenNombre = $arreglo_foto["nombre"];
			$this->imagenDetalle = $arreglo_foto["detalle"];
			$this->imagenIcono = $arreglo_foto["icono"];
			$this->subProyectoId = $arreglo_foto["padre"];
			$this->queryInsertarFoto = "
			insert into fotos(nombre,detalle,imagen,padre)
			values('$this->imagenNombre','$this->imagenDetalle','$this->imagenIcono',$this->subProyectoId)
			";
			$this->conexion->insertar($this->queryInsertarFoto);
			
			
		}
		
		public function listarProyecto()
		{
			$this->conexion = new Conexion();
			$this->queryListarProyecto = "
			select * from proyectos order by id desc
			";
			$resultado=$this->conexion->consultar($this->queryListarProyecto);
			return $resultado;
			
		}
		
		public function listarSubProyecto( $id )
		{
			
			$this->conexion = new Conexion();
			$this->queryListarSubProyecto = "
			select subproyectos.id, subproyectos.nombre , proyectos.icono from subproyectos, proyectos
			where subproyectos.padre = proyectos.id and subproyectos.padre = $id order by id desc;
			";
			$resultado=$this->conexion->consultar($this->queryListarSubProyecto);
			return $resultado;
			
		}
		
		public function listarFotos( $id )
		{
			$this->conexion = new Conexion();
			$this->queryListarFotos = "
			select fotos.id, fotos.nombre,fotos.detalle,fotos.imagen from fotos where  fotos.padre = $id order by id desc
			";
			$resultado=$this->conexion->consultar($this->queryListarFotos);
			return $resultado;
			
			
			
		}
		
		public function listarCbo()
		{
			$this->conexion = new Conexion();
			$this->queryListarTodoProyecto = "
			select proyectos.nombre as nombre_Proyecto,
			proyectos.icono,
			subproyectos.id as id_subProyecto,
			subproyectos.nombre as
			nombre_subProyectos
			from proyectos,
			subproyectos 
			where proyectos.id=subproyectos.padre;
			";
			$resultado=$this->conexion->consultar($this->queryListarTodoProyecto);
			return $resultado;
			
		}
    }
?>