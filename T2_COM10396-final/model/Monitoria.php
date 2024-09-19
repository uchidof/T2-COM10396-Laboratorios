<?php
    class Monitoria{
        private int $monitoria_id;
        private string $nome_monitor;
        private string $sala;
        private string $horario;
        private string $disciplina;        

        public function setMonitoria($n, $s, $h, $dis){
            $this->nome_monitor = $n;
            $this->sala = $s;
            $this->horario = $h;
            $this->disciplina = $dis;
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