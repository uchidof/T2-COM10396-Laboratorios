<?php
    class Artigo{
        private int $artigo_id;
        private string $titulo;
        private string $introducao;
        private string $link;  

        public function setArtigo($t, $intro, $lnk){
            $this->titulo = $t;
            $this->introducao = $intro;
            $this->link = $lnk;
        }

        public function __set($atrib, $value)
        {
            $this->$atrib = $value;
        }

        public function __get($atrib)
        {
            return $this->$atrib;
        } 
        
    }
?>