<?php
    class ValidarFile
	{
		//Errores
		private $TAMAÑOMAXIMO = 1;
		private $TAMAÑOSUPERADOHTML=2;
		private $ARCHIVOCARGADOPARCIALMENTE=3;
		private $NOEXISTEARCHIVO=4;
		private $NOHAYDIRECTORIOTEMP=5;
		private $NOHAYPERMISOSWRITE=6;
		private $ERRORDESCONOCIDO=7;
		
		//OBJETO
		private $archivo;
		//partes del objeto
		private $name; //Se guardara el nombre del archivo
		private $size; //Se guardara el tamaño del archivo
		private $type; //El tipo del archivo ejemplo .jpg
		//guarda el error si existe
		private $error;
		
		//Campos a validar
		private $tamañoMaximoAsignado;
		//Tipos de formato
		private $formatoArchivo= array();
		
		
		function Validarfile( $filaCargada )
		{
			$this->archivo = $filaCargada;
			$this->asignarVariables();
			
			
		}
		public function setTamañoMaximo( $tamaño )
		{
			$this->tamañoMaximoAsignado = $tamaño;
		}
		private function asignarVariables()//Desglosara el arreglo de la fila
		{
			$this->name = $this->archivo["name"];
			$this->size = $this->archivo["size"];
			$this->error = $this->archivo["error"];
			$this->type = $this->archivo["type"];
			//Asignacion de los formatos
			$this->formatoArchivo["imagen"][0]= "image/jpeg";
			$this->formatoArchivo["imagen"][1]= "image/png";
			$this->formatoArchivo["imagen"][2]= "image/gif";
			$this->formatoArchivo["imagen"][3]= "image/jpg";
		}
		public function validacion()	
		{
			$error = 0;
			if( $this->error > 0 )
			{
				switch( $this->error )
				{
					case 1:
						$error = "tamaño erroneo";
					break;
					case 2:
						$error = "tamaño del archivo cargado supera el especificado en el formulario HTML";
					break;
					case 3:
						$error = "El archivo se ha cargado parcialmente";
					break;
					case 4:
						$error = "No se he cargado ningun archivo";
					break;
					case 5:
						$error = "No se ha especificado ningun directorio temporal en el archivo php.ini";
					break;
					case 6:
						$error = "Carga Fallida. No sepuede escribir en el directorio";
					break;
					case 7:
						$error = "error no identificado";
					break;
						
				}
			}
			else 
			{
				//Validacion de formato
				$i=0;
				$status=0;
				
				foreach(  $this->formatoArchivo as $k => $z )
				{
					
					
					if( $this->type == $z[$i] )
					{
						$status=1;
					}
					else 
					{
						$error = "Error formato de archivo no valido $";
					}
					
					
					$i++;
				}
				
				if( $status == 1 )
					{
						$error= 0;
					}
					
			}
			
			
			
			
			return $error;
		}
		
		
	}
?>