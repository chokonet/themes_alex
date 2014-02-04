<?php

	/**
	 * Clase usuario
	 *
	 * @todo Implementar el metodo getNombre
	 */
	class Usuario {

		private $nombre;
		private $grado;


		// metodos (funciones)
		public function getNombre($clave){

			if ($clave == '0001'):
				return $this->nombre = 'Alejandro Cervantes';
			elseif($clave == '0002'):
				return $this->nombre = 'Carlos Lopez';
			endif;

		}

		// metodos (funciones)
		public function getGrado($clave){

			if ($clave == '0001'):
				return $this->grado = '1er. Grado';
			elseif($clave == '0002'):
				return $this->grado = '2do. Grado';
			endif;

		}



	}


	/**
	 * @todo Heredar de la clase: Usuario, el metodo getNombre.
	 * @todo Implemetar getters y setters para calificacion y promedio.
	 */
	class Estudiante extends Usuario {

		private $espanol;
		private $matematicas;
		private $historia;
		private $promedio;
		private $clave;



		public function setPromedio($clave, $espanol, $matematicas, $historia){

			$this->clave = $clave;
			$this->espanol = $espanol;
			$this->matematicas = $matematicas;
			$this->historia = $historia;

			$this->nombre = $this->getNombre($clave);
			$this->grado = $this->getGrado($clave);

			$this->promedio = ($espanol + $matematicas + $historia) / 3;

		}



		public function getPromedio(){

			return array(
					'clave'          => $this->clave,
					'nombre'         => $this->nombre,
					'calificaciones' => array(
									'espanol'     => $this->espanol,
									'matematicas' => $this->matematicas,
									'historia'    => $this->historia,
									'promedio'    => $this->promedio
								)
				);

		}

	}

$clase = new Estudiante;

$clase->setPromedio('0001',7,9,10);

$estudiante = $clase->getPromedio();
echo '<pre>';
print_r($estudiante);
echo '</pre>';










