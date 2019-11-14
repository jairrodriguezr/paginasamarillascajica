<?php

class Usuarios {
	
	private $id;
	private $nombre;
	private $usuario;
	private $correo;
	private $clave;
	private $fecha_reg;
	private $activo;

	public function __construct($id, $nombre, $usuario, $correo, $clave, $fecha_reg, $activo ){

		$this -> id =$id;
		$this -> nombre =$nombre;
		$this -> usuario =$usuario;
		$this -> correo =$correo;
		$this -> clave =$clave;
		$this -> fecha_reg =$fecha_reg;
		$this -> activo =$activo;
	}

	public function obtener_id(){
		return $this -> id;
	}

	public function obtener_nombre(){
		return $this -> nombre;
	}

	public function obtener_usuario(){
		return $this -> usuario;
	}

	public function obtener_correo(){
		return $this -> correo;
	}

	public function obtener_clave(){
		return $this -> clave;
	}

	public function cambiar_correo($correo){
		$this -> correo = $correo;
	}

	public function cambiar_clave($clave){
		$this -> clave = $clave;
	}

}

?>