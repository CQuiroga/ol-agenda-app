<?php
	class Contacto {

		private $id;
        private $nombre;
        private $telefono;
        private $email;
        private $estado;

		function __construct(){}

        /* ======================================================
        ============= Métodos Accesores de la clase ========== */

		public function getIdContacto(){
            return $this->id;
        }
    
        public function setIdContacto($id){
            $this->id = $id;
        }
        
        public function getNombre(){
		return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
        }
        
        public function getTelefono(){
            return $this->telefono;
        }
    
        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }

        public function getEmail(){
            return $this->email;
        }
    
        public function setEmail($email){
            $this->email = $email;
        }

        public function getEstado(){
            return $this->estado;
        }
    
        public function setEstado($estado){
            $this->estado = $estado;
        }
	}
?>