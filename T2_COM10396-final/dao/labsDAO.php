<?php
require_once "../dao/conexao.php";
require_once "../model/Contato.php";

class LabsDAO{
    private PDO $con;

public function __construct()
{
    $c = new Conexao();
    $this->con = $c->getConexao();
}

public function getLaboratorios(){  //Adquire as colunas de 'laboratorios' do BD
    $rs = $this->con->query("select * from laboratorios");

    $lista = array();
    while($lab = $rs->fetch(PDO::FETCH_OBJ)){
        $lista[] = $lab;
    }
    return $lista;
}

}

?>