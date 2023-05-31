<?php
Class Conexion{ 
	private $servidor = "mysql:host=localhost;dbname=inventario";
	private $usuario = "root";
	private $contra = "";
	private $opciones  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $conn;
 	
	public function abrirConexion(){
 		try{
 			$this->conn = new PDO($this->servidor, $this->usuario, $this->contra, $this->opciones);
 			return $this->conn;
 		}
 		catch (PDOException $e){
 			echo "Hay un problema con la conexión: " . $e->getMessage();
 		} 
    } 
	public function cerrarConexion(){
   		$this->conn = null;
 	} 
} 
?>