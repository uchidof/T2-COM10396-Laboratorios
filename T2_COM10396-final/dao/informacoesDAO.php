<?php
require_once "../dao/conexao.php";
require_once "../model/Artigo.php";

class InformacoesDAO{
    private PDO $con;

public function __construct()
{
    $c = new Conexao();
    $this->con = $c->getConexao();
}

public function incluirArtigo(Artigo $artigo){
    $sql = $this->con->prepare("insert into informacoes_uteis 
    (titulo, introducao, link) values 
    (:titulo, :introducao, :link)");
        //Parametriza/Prepara a query

    //Vincula o valor do atributo do OBJETO ao atributo no BD
    $sql->bindValue('titulo', $artigo->titulo);
    $sql->bindValue('introducao', $artigo->introducao);
    $sql->bindValue('link', $artigo->link);
    

    //Realiza a query de INSERCAO no BD
    $sql->execute();
}

//REFAZER
public function excluirMonitoria($id){
    $sql = $this->con->prepare("delete from monitorias where id = :monitoria_id");
        //Parametriza/Prepara a query

    $sql->bindValue(':monitoria_id', $id); //Vincula o valor do atributo do OBJETO ao atributo no BD
    $sql->execute();    //Realiza a query de EXCLUSAO no BD, usando o id Vinculado
}

//REFAZER
public function getArtigos(){  //Adquire os (objetos) monitoria do BD
    $rs = $this->con->query("select * from informacoes_uteis");

    $lista = array();

    while($row = $rs->fetch(PDO::FETCH_OBJ)){   //FETCH_OBJ -> vem direto do BD como OBJETO
        $artigo=new Artigo();
        $artigo->artigo_id=$row->id;  //logo, row eh igual ao BD
        $artigo->titulo=$row->titulo;
        $artigo->introducao=$row->introducao;
        $artigo->link=$row->link;

        $lista[] = $artigo;
    }
    return $lista;
}

}

?>