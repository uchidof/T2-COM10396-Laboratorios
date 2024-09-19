<?php
    class Contato{
        private int $contato_id;
        private string $nome_remetente;
        private string $email;
        private string $assunto;
        private string $mensagem;
        private int $data_envio;

        public function setMensagem($n, $e, $ass, $msg){
            $this->nome_remetente = $n;
            $this->email = $e;
            $this->assunto = $ass;
            $this->mensagem = $msg;
        }

        public function __set($atrib, $value)
        {
            $this->$atrib = $value;
        }

        public function __get($atrib)
        {
            return $this->$atrib;
        } 
        
        

        public function setDtEnvio($dataE){    //Set o valor da data em TimeStamp 
            $this->data_envio = strtotime($dataE); 
                //String de DateTime sera transformada em int TimeStamp
        }
    }
?>