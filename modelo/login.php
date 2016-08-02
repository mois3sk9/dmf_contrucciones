<?php
include_once 'conexion.php';
    class Login
    {
    	private $user;
		private $pass;
		
		private $conexion;
		
		private $sqlValidar = "";
		
    	function Login()
		{
			$this->conexion = new Conexion();
		}
		
		public function setUser( $user )
		{
			$this->user = $user;
		}
		public function setPass( $pass )
		{
			$this->pass = $pass;
		}
		public function getUser()
		{
			return $this->user;
		}
		public function getPass()
		{
			return $this->pass;
		}
		
		/* Validar existencia del usuario*/
		public function validUser( $usuario , $pass )
		{
			$this->setUser( $usuario );
			$this->setPass( $pass );
			
			$this->sqlValidar = "select count(*) from adm where usuario = '$usuario' and pass = '$pass'";
			$resultado = $this->conexion->consultar( $this->sqlValidar );
			//Si resultado es 1 existe el usuario si es 0 , el usuario no existe
			$reg = mysql_fetch_row( $resultado );
			return $reg;
			
		}
		
		/*
		 * create table adm(id int primary key not null,usuario varchar(100) , pass varchar(100) );
		 * */
    }
?>