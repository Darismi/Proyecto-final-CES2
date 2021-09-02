<?php
    class batido{
        private $tamaño;
        private $tipo_usuario;
        private $batido;
        private $precio;

        public function setPrecio($pre){
            $this->precio = $pre;
        }

        public function getPrecio(){
            return $this->precio;
        }

        public function setTamano($tam){
            $this->tamano = $tam;
        }

        public function getTamano(){
            return $this->tamano;
        }

        public function setTipoUsuario($tipo){
            $this->tipo_usuario = $tipo;
        }

        public function getTipoUsuario(){
            return $this->tipo_usuario;
        }

        public function setBatido($bati){
            $this->batido = $bati;
        }

        public function getBatido(){
            return $this->batido;
        }

        
    }
?>