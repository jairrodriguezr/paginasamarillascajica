<?php

class Establecimientos {
	
	private $id;
	private $nombre;
	private $telefono;
	private $direccion;
	private $web;
	private $descripcion;
	private $id_usuario;
	private $id_categoria;
	private $fecha_reg;


	public function __construct($id, $nombre, $telefono, $direccion, $web, $descripcion, $id_usuario, $id_categoria, $fecha_reg){

		$this -> id =$id;
		$this -> nombre =$nombre;
		$this -> telefono =$telefono;
		$this -> direccion =$direccion;
		$this -> web =$web;
		$this -> descripcion =$descripcion;
		$this -> id_usuario =$id_usuario;
		$this -> id_categoria =$id_categoria;
		$this -> fecha_reg =$fecha_reg;
		
	}

	public function obtener_id(){
		return $this -> id;
	}

	public function obtener_nombre(){
		return $this -> nombre;
	}

	public function obtener_telefono(){
		return $this -> telefono;
	}

	public function obtener_direccion(){
		return $this -> direccion;
	}

	public function obtener_web(){
		return $this -> web;
	}

	public function obtener_descripcion(){
		return $this -> descripcion;
	}

	public function obtener_id_usuario(){
		return $this -> id_usuario;
	}

	public function obtener_id_categoria(){
		return $this -> id_categoria;
	}

		public function cambiar_telefono($telefono){
		$this -> telefono = $telefono;
	}

	public function cambiar_direccion($direccion){
		$this -> direccion = $direccion;
	}

	public function cambiar_web($web){
		$this -> web = $web;
	}
	
	public function cambiar_descripcion($descripcion){
		$this -> descripcion = $descripcion;
	}
	public function obtener_fecha_reg(){
		return $this -> fecha_reg;
	}

}

?>