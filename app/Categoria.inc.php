<?php
	
	/**
	 * 
	 */
	class Categoria
	{
		
		private $id;
		private $categoria;

		public function __construct($id, $categoria)
		{
			
			$this -> id =$id;
			$this -> categoria =$categoria;

		}


		public function obtener_id(){
			return $this -> id;
		}

		public function obtener_categoria(){
			return $this -> categoria;
		}

		public function cambiar_categoria($categoria){
			return $this -> $categoria;
		}


	}

?>