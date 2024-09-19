<?php
require_once "../dao/conexao.php";
require_once "../model/Contato.php";

class ContatoDAO{
    private PDO $con;

    public function __construct()
    {
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    public function incluirContato(Contato $contato){
        $sql = $this->con->prepare("insert into mensagens_contato 
        (nome_remetente, email, assunto, mensagem) values 
        (:nome_remetente, :email, :assunto, :mensagem)");
            //Parametriza/Prepara a query

        //Vincula o valor do atributo do OBJETO ao atributo no BD
        $sql->bindValue(':nome_remetente', $contato->nome_remetente);
        $sql->bindValue(':email', $contato->email);
        $sql->bindValue(':assunto', $contato->assunto);
        $sql->bindValue(':mensagem', $contato->mensagem);
        

        //Realiza a query de INSERCAO no BD
        $sql->execute();
    }

    public function getContatos(){  //Adquire os (objetos) monitoria do BD
        $rs = $this->con->query("select * from mensagens_contato");
    
        $lista = array();
    
        while($row = $rs->fetch(PDO::FETCH_OBJ)){   //FETCH_OBJ -> vem direto do BD como OBJETO
            $contato=new Contato();
            $contato->contato_id=$row->id;  //logo, row eh igual ao BD
            $contato->nome_remetente=$row->nome_remetente;
            $contato->email=$row->email;
            $contato->assunto=$row->assunto;
            $contato->mensagem=$row->mensagem;
            $contato->data_envio=strtotime($row->data_envio);
    
            $lista[] = $contato;
        }
        return $lista;
    }
}

?>